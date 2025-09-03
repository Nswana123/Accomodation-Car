<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\AccommodationProvider;
use App\Models\Unit;
use App\Models\UnitType;
use App\Models\Booking;
use App\Models\Payment;
use Carbon\Carbon;
use App\Models\UnitSuite;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class BookingController extends Controller
{
public function create()
{
    $unitTypes = UnitType::with('units')->get();
    $customers = User::where('group_id', '2')->get();
     $user = auth()->user();
        $permissions = $user->user_group->permissions;
    return view('bookings.create', compact('unitTypes', 'customers','permissions'));
}
public function store(Request $request)
{
    $request->validate([
        'customer_id'    => 'required|exists:users,id',
        'unit_id'        => 'required|exists:units,id',
        'check_in_date'  => 'required|date',
        'check_out_date' => 'required|date|after:check_in_date',
        'guests'         => 'required|integer|min:1',
    ]);

    // Parse dates
    $checkIn  = Carbon::parse($request->check_in_date)->startOfDay();
    $checkOut = Carbon::parse($request->check_out_date)->startOfDay();

    // Calculate number of nights
    $nights = $checkIn->diffInDays($checkOut);

    if ($nights < 1) {
        return back()->withErrors([
            'check_out_date' => 'Check-out must be at least 1 day after check-in.'
        ])->withInput();
    }

    // Get unit price
    $unit = Unit::findOrFail($request->unit_id);
    $pricePerNight = $unit->price_per_day;

    // Calculate total price
    $totalPrice = $pricePerNight * $nights;

    // Store booking with status Completed (since payment is made now)
    $booking = Booking::create([
        'customer_id'    => $request->customer_id,
        'unit_id'        => $request->unit_id,
        'suite_id'       => null,
        'check_in_date'  => $checkIn,
        'check_out_date' => $checkOut,
        'guests'         => $request->guests,
        'total_price'    => $totalPrice,
        'status'         => 'Checked-In',
    ]);

    // Create payment record with method Cash and status Completed
    Payment::create([
        'booking_id'       => $booking->id,
        'amount'           => $totalPrice,
        'payment_method'   => 'Cash',
        'status'           => 'Completed',
        'payment_date'     => now(),
        'reference_number' => null,
    ]);

    return redirect()->back()->with('success', 'Booking and payment recorded successfully.');
}

    public function processPayment(Request $request)
    {
        // Validate the booking data
    $validated = $request->validate([
        'unit_id' => 'required|exists:units,id',
        'check_in' => 'required|date|after_or_equal:today',
        'check_out' => 'required|date|after:check_in',
        'guests' => 'required|integer|min:1',
        'method' => 'required|in:Cash,mobile_money_payment,card,bank_transfer',
        'amount' => 'required|numeric|min:0',
        'payment_number' => 'required_if:method,mobile_money_payment',
        'reference' => 'required_if:method,mobile_money_payment,bank_transfer',
        'cardNumber' => 'required_if:method,card',
        'cardExpiry' => 'required_if:method,card',
        'cardCVC' => 'required_if:method,card',
        'bankName' => 'required_if:method,bank_transfer',
        'accountNumber' => 'required_if:method,bank_transfer',
    ]);

    try {
        // Get the unit
        $unit = Unit::findOrFail($request->unit_id);
        
       $checkIn  = new \DateTime($request->check_in);
        $checkOut = new \DateTime($request->check_out);
        $interval = $checkIn->diff($checkOut);
        $nights   = $interval->days;

        // Treat same-day booking as 1 night
        if ($nights === 0) {
            $nights = 1;
        }

        $totalPrice = $unit->price_per_day * $nights;

        // Create the booking
        $booking = Booking::create([
            'customer_id' => Auth::id(),
            'unit_id' => $request->unit_id,
            'check_in_date' => $request->check_in,
            'check_out_date' => $request->check_out,
            'guests' => $request->guests,
            'booking_no' => $this->generateBookingNumber(),
            'total_price' => $totalPrice,
            'status' => 'Pending',
        ]);

        // Map payment method to match enum values
        $paymentMethodMap = [
            'mobile_money_payment' => 'Mobile Money',
            'bank_transfer' => 'Bank Transfer',
            'card' => 'Card',
            'Cash' => 'Cash',
        ];
        $paymentMethod = $paymentMethodMap[$request->method];

        // Create the payment
        $payment = Payment::create([
            'booking_id' => $booking->id,
            'amount' => $totalPrice,
            'payment_method' => $paymentMethod,
            'reference_number' => $request->reference ?? ($paymentMethod === 'Cash' ? 'CASH-' . time() : null),
            'status' => $paymentMethod === 'Cash' ? 'Completed' : 'Pending',
        ]);

        // If payment is successful, update booking status
        if ($payment->status === 'Completed') {
            $booking->update(['status' => 'Confirmed']);
        }

        return redirect()->back()->with('success', 'Booking and payment processed successfully!');

    } catch (\Exception $e) {
        return redirect()->back()
            ->with('error', 'Error processing booking: ' . $e->getMessage())
            ->withInput();
    }
}
public function carHireBookingStore(Request $request)
{
    // Validate the booking data
    $validated = $request->validate([
        'unit_id'    => 'required|exists:units,id',
        'pickup'     => 'required|string|max:255',
        'destination'=> 'required|string|max:255',
        'check_in'   => 'required|date|after_or_equal:today',
        'check_out'  => 'required|date|after_or_equal:check_in',
        'guests'     => 'required|integer|min:1',
        'method'     => 'required|in:Cash,mobile_money_payment,card,bank_transfer',
    ]);

    try {
        // Get the unit
        $unit = Unit::findOrFail($request->unit_id);

        // Calculate stay duration and total price
        $checkIn  = new \DateTime($request->check_in);
        $checkOut = new \DateTime($request->check_out);
        $interval = $checkIn->diff($checkOut);
        $nights   = $interval->days;

        // Treat same-day booking as 1 night
        if ($nights === 0) {
            $nights = 1;
        }

        $totalPrice = $unit->price_per_day * $nights;

        // Create the booking
        $booking = Booking::create([
            'customer_id'   => Auth::id(),
            'unit_id'       => $request->unit_id,
            'pickup'        => $request->pickup,
            'destination'   => $request->destination,
            'check_in_date' => $request->check_in,
            'check_out_date'=> $request->check_out,
            'guests'        => $request->guests,
            'method'        => $request->method,
            'booking_no'    => $this->generateBookingNumber(),
            'total_price'   => $totalPrice,
            'status'        => 'Pending',
        ]);

        return redirect()->back()->with('success', 'Booking created successfully!');
    } catch (\Exception $e) {
        return redirect()->back()
            ->with('error', 'Error processing booking: ' . $e->getMessage())
            ->withInput();
    }
}

protected function generateBookingNumber()
{
    do {
        $bookingNo = str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
    } while (Booking::where('booking_no', $bookingNo)->exists());

    return $bookingNo;
}
public function BookSuitePackage(Request $request)
{
    $validated = $request->validate([
        'suite_id' => 'required|exists:unit_suites,id',
        'check_in' => 'required|date|after_or_equal:today',
        'check_out' => 'required|date|after_or_equal:check_in',
        'pickup'     => 'required|string|max:255',
        'destination'=> 'required|string|max:255',
        'guests' => 'required|integer|min:1',
        'method' => 'required|in:Cash,mobile_money_payment,card,bank_transfer',
        'amount' => 'required|numeric|min:0',
        'payment_number' => 'required_if:method,mobile_money_payment',
        'reference' => 'required_if:method,mobile_money_payment,bank_transfer',
        'cardNumber' => 'required_if:method,card',
        'cardExpiry' => 'required_if:method,card',
        'cardCVC' => 'required_if:method,card',
        'bankName' => 'required_if:method,bank_transfer',
        'accountNumber' => 'required_if:method,bank_transfer',
    ]);

    try {
        $unit = UnitSuite::findOrFail($request->suite_id);

       $checkIn  = new \DateTime($request->check_in);
        $checkOut = new \DateTime($request->check_out);
        $interval = $checkIn->diff($checkOut);
        $nights   = $interval->days;

        // Treat same-day booking as 1 night
        if ($nights === 0) {
            $nights = 1;
        }

        $totalPrice = $unit->total_price_per_day * $nights;
        // Create booking
        $booking = Booking::create([
            'customer_id' => Auth::id(),
            'suite_id' => $request->suite_id,
            'check_in_date' => $request->check_in,
            'check_out_date' => $request->check_out,
            'pickup'        => $request->pickup,
            'destination'   => $request->destination,
            'guests' => $request->guests,
            'booking_no' => $this->generateBookingNumber(),
            'total_price' => $totalPrice,
            'status' => 'Pending',
        ]);

        $paymentMethodMap = [
            'mobile_money_payment' => 'Mobile Money',
            'bank_transfer' => 'Bank Transfer',
            'card' => 'Card',
            'Cash' => 'Cash',
        ];
        $paymentMethod = $paymentMethodMap[$request->method];

        // Create payment
        $payment = Payment::create([
            'booking_id' => $booking->id,
            'amount' => $totalPrice,
            'payment_method' => $paymentMethod,
            'reference_number' => $request->reference ?? ($paymentMethod === 'Cash' ? 'CASH-' . time() : null),
            'status' => $paymentMethod === 'Cash' ? 'Completed' : 'Pending',
        ]);

        if ($payment->status === 'Completed') {
            $booking->update(['status' => 'Confirmed']);
        }

        return redirect()->back()->with('success', 'Booking and payment processed successfully!');

    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error processing booking: ' . $e->getMessage())->withInput();
    }
}

}