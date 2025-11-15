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
    <div class="card-header d-flex justify-content-between align-items-center">
        <div class="header-title">
               <h2 class="mb-4">Checked-In Customers</h2>
        </div>
    </div>

    <div class="card-body">

    @if($bookings->isEmpty())
        <div class="alert alert-info">No customers are currently checked in.</div>
    @else
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Booking No</th>
                    <th>Customer</th>
                    <th>Unit / Suite</th>
                    <th>Check-In Date</th>
                    <th>Check-Out Date</th>
                    <th>Checked In At</th>
                    <th>Total Price</th>
                    <th>Payment Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->booking_no }}</td>
                        <td>{{ $booking->customer->fname ?? 'N/A' }} {{ $booking->customer->lname ?? '' }}</td>
                        <td>
                            @if ($booking->unit)
                                {{ $booking->unit->name }} (Unit)
                            @elseif ($booking->suite)
                                {{ $booking->suite->name }} (Suite)
                            @endif
                        </td>
                        <td>{{ \Carbon\Carbon::parse($booking->check_in_date)->format('d M Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->check_out_date)->format('d M Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->user_check_in_date)->format('d M Y H:i') }}</td>
                        <td>K{{ number_format($booking->total_price, 2) }}</td>
                        <td>
                            @if($booking->payments->isEmpty())
                                <span class="badge bg-warning">Unpaid</span>
                            @else
                                {{ $booking->payments->last()->status }}
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('bookings.showCheckedIn', $booking->id) }}" class="btn btn-primary btn-sm">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

      </div>
    </div>
  @include('dashboard.footer')