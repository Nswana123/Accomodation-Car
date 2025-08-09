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
          <h4>Unit Types</h4>
        </div>
          <a href="{{ route('unit_types.create') }}" class="btn btn-primary">Add Unit Type</a>
    </div>

    <div class="card-body">
 @if($unitTypes->count() > 0)
        <div class="row">
            @foreach($unitTypes as $unit)
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        @if($unit->images->count())
                            <div id="carousel-{{ $unit->id }}" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                  @foreach($unit->images as $key => $image)
    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
        <img src="{{ asset('storage/' . $image->image) }}" class="d-block w-100" style="max-height: 250px; object-fit: cover;" alt="Image">
    </div>
@endforeach

                                </div>
                                @if($unit->images->count() > 1)
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel-{{ $unit->id }}" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon"></span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carousel-{{ $unit->id }}" data-bs-slide="next">
                                        <span class="carousel-control-next-icon"></span>
                                    </button>
                                @endif
                            </div>
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{ $unit->name }}</h5>
                            <p class="card-text">{{ $unit->description }}</p>
                            
                            <h6>Provider:</h6>
                             <p class="card-text">{{ $unit->provider->name }}</p>
                            <h6>Amenities:</h6>
                            @if($unit->amenities->count())
                                <ul>
                                    @foreach($unit->amenities as $amenity)
                                        <li>{{ $amenity->name }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-muted">No amenities added.</p>
                            @endif

                            <div class="d-flex justify-content-end mt-3">
                                <a href="{{ route('unit_types.edit', $unit->id) }}" class="btn btn-sm btn-warning me-2">Edit</a>
                                <form action="{{ route('unit_types.destroy', $unit->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>No unit types found.</p>
    @endif
    </div>
</div>

      </div>
    </div>
  @include('dashboard.footer')