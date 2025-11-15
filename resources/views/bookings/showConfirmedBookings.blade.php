  @include('dashboard.layout')
  <body class="">
    <!-- loader Start -->
    <div id="loading">
      <div class="loader simple-loader">
          <div class="loader-body">
          </div>
      </div>    
    </div>
    <!-- loader END -->
    @include('dashboard.sidebar')
    @include('dashboard.header')
   

<div class="conatiner-fluid content-inner mt-n5 py-0">
@if ($errors->any())
    <div class="alert alert-warning fade-in-up">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success fade-in-up">
        {{ session('success') }}
    </div>
@endif 
      <div>
         <div class="row">
            <div class="col-xl-12 col-lg-12">
            <div class="card">

    <div class="card-body">
 <div class="container">
    <div class="card shadow-lg">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="mb-0">Booking Details - {{ $booking->booking_no }}</h3>
            <span class="badge 
                @if($booking->status == 'Pending') bg-warning 
                @elseif($booking->status == 'Confirmed') bg-success 
                @elseif($booking->status == 'Cancelled') bg-danger 
                @endif">
                {{ $booking->status }}
            </span>
        </div>

        <div class="card-body">
            {{-- Flash messages --}}
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- Customer Details --}}
            <h4 class="mt-3">👤 Customer Information</h4>
            <ul class="list-group mb-3">
                <li class="list-group-item"><strong>Name:</strong> {{ $booking->customer->fname ?? 'N/A' }} {{ $booking->customer->lname ?? '' }}</li>
                <li class="list-group-item"><strong>Email:</strong> {{ $booking->customer->email ?? 'N/A' }}</li>
                <li class="list-group-item"><strong>Phone:</strong> {{ $booking->customer->mobile ?? 'N/A' }}</li>
            </ul>

            {{-- Unit / Suite Details --}}
            <h4>🏨 Unit / Suite</h4>
            <ul class="list-group mb-3">
                @if ($booking->unit)
                    <li class="list-group-item"><strong>Type:</strong> Unit</li>
                    <li class="list-group-item"><strong>Name:</strong> {{ $booking->unit->name }}</li>
                    <li class="list-group-item"><strong>Car Type:</strong> {{ $booking->unit->car_type ?? 'N/A' }}</li>
                    <li class="list-group-item"><strong>Capacity:</strong> {{ $booking->unit->capacity ?? 'N/A' }}</li>
                    <li class="list-group-item"><strong>Price per Day:</strong> K{{ number_format($booking->unit->price_per_day, 2) }}</li>
                @elseif($booking->suite)
                    <li class="list-group-item"><strong>Type:</strong> Suite</li>
                    <li class="list-group-item"><strong>Name:</strong> {{ $booking->suite->name }}</li>
                    <li class="list-group-item"><strong>Description:</strong> {{ $booking->suite->description }}</li>
                    <li class="list-group-item"><strong>Total Price per Day:</strong> K{{ number_format($booking->suite->total_price_per_day, 2) }}</li>
                @endif
            </ul>

            {{-- Booking Info --}}
            <h4>📅 Booking Info</h4>
            <ul class="list-group mb-3">
                <li class="list-group-item"><strong>Check In:</strong> {{ \Carbon\Carbon::parse($booking->check_in_date)->format('d M Y') }}</li>
                <li class="list-group-item"><strong>Check Out:</strong> {{ \Carbon\Carbon::parse($booking->check_out_date)->format('d M Y') }}</li>
                <li class="list-group-item"><strong>Guests:</strong> {{ $booking->guests }}</li>
                <li class="list-group-item"><strong>Total Price:</strong> K{{ number_format($booking->total_price, 2) }}</li>
            </ul>

            {{-- Payments --}}
            <h4>💳 Payments</h4>
            @if($booking->payments->isEmpty())
                <p><span class="badge bg-warning">No Payments Found</span></p>
            @else
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>Amount</th>
                            <th>Method</th>
                            <th>Date</th>
                            <th>Reference</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($booking->payments as $payment)
                            <tr>
                                <td>K{{ number_format($payment->amount, 2) }}</td>
                                <td>{{ $payment->payment_method }}</td>
                                <td>{{ \Carbon\Carbon::parse($payment->payment_date)->format('d M Y') }}</td>
                                <td>{{ $payment->reference_number }}</td>
                                <td>{{ $payment->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

            {{-- Actions --}}
            <div class="mt-4 d-flex gap-2">
             <div class="mt-4">
    <a href="{{ route('bookings.pending') }}" class="btn btn-secondary">⬅ Back</a>

    @if($booking->status == 'Confirmed')
        <form action="{{ route('bookings.checkin', $booking->id) }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-success">Check In</button>
        </form>
    @endif
</div>

            </div>
        </div>
    </div>
</div>

      </div>
    </div>
  @include('dashboard.footer')