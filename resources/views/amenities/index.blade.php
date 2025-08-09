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
             <h4>Amenities</h4>
        </div>
   
    <a href="{{ route('amenities.create') }}" class="btn btn-primary mb-3">Add Amenity</a>

    </div>

    <div class="card-body">
           <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($amenities as $amenity)
                <tr>
                    <td>{{ $amenity->id }}</td>
                    <td>{{ $amenity->name }}</td>
                    <td>
                        <a href="{{ route('amenities.edit', $amenity->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('amenities.destroy', $amenity->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this amenity?')">Delete</button>
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