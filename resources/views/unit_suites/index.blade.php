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
            <h2>Unit Suites</h2>
        </div>
   
   <a href="{{ route('unit_suites.create') }}" class="btn btn-primary float-end">Add Suite</a>

    </div>

    <div class="card-body">
          <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Provider</th>
                <th>Units</th>
                <th>Price/Day</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suites as $suite)
                <tr>
                    <td>{{ $suite->name }}</td>
                    <td>{{ $suite->provider->name }}</td>
                    <td>
                        @foreach($suite->units as $unit)
                            <span class="badge bg-info">{{ $unit->name }}</span>
                        @endforeach
                    </td>
                    <td>K{{ number_format($suite->total_price_per_day, 2) }}</td>
                    <td>
                        <a href="{{ route('unit_suites.edit', $suite->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('unit_suites.destroy', $suite->id) }}" method="POST" style="display:inline-block;">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Delete this suite?')" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>

      </div>
    </div>
  @include('dashboard.footer')