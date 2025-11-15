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
              <h2 class="mb-4">Pending Bookings</h2>
        </div>
    </div>

    <div class="card-body">
 @if($bookings->isEmpty())
        <div class="alert alert-info">No pending bookings found.</div>
    @else
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Booking No</th>
                    <th>Customer</th>
                    <th>Unit/Suite</th>
                    <th>Check-In</th>
                    <th>Check-Out</th>
                    <th>Total Price</th>
                    <th>Payment Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td>
                             <a href="{{ route('bookings.show', $booking->id) }}">{{ $booking->booking_no }}</a>
                        </td>
                        <td>{{ $booking->customer->fname ?? 'N/A' }}</td>
                        <td>
                           @if (is_null($booking->unit_id))
                                {{ $booking->suite->name }} (Suite)
                            @else
                                {{ $booking->unit->name }} (Unit)
                            @endif
                        </td>
                        <td>{{ \Carbon\Carbon::parse($booking->check_in_date)->format('d M Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->check_out_date)->format('d M Y') }}</td>
                        <td>K{{ number_format($booking->total_price, 2) }}</td>
                        <td>
                            @if($booking->payments->isEmpty())
                                <span class="badge bg-warning">Unpaid</span>
                            @else
                                {{ $booking->payments->last()->status }}
                            @endif
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