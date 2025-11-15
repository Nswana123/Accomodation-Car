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
              <h2>✅ Confirmed Bookings</h2>
        </div>
    </div>

    <div class="card-body">
   @if($bookings->isEmpty())
        <p><span class="badge bg-warning">No confirmed bookings found.</span></p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Booking No</th>
                    <th>Customer</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Check-In</th>
                    <th>Check-Out</th>
                    <th>Total Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->booking_no }}</td>
                        <td>{{ $booking->customer->fname ?? 'N/A' }} {{ $booking->customer->lname ?? '' }}</td>
                        <td>{{ $booking->customer->email ?? 'N/A' }}</td>
                        <td>{{ $booking->customer->mobile ?? 'N/A' }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->check_in_date)->format('d M Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->check_out_date)->format('d M Y') }}</td>
                        <td>K{{ number_format($booking->total_price, 2) }}</td>
                        <td>
                            <a href="{{ route('bookings.showConfirmedBookings', $booking->id) }}" class="btn btn-primary btn-sm">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('bookings.pending') }}" class="btn btn-secondary mt-3">⬅ Back to Pending Bookings</a>
</div>
</div>

      </div>
    </div>
  @include('dashboard.footer')