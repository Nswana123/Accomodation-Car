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
        <h4>{{ isset($amenity) ? 'Edit Amenity' : 'Add Amenity' }}</h4>
        </div>
    </div>

    <div class="card-body">
  <form method="POST" action="{{ isset($amenity) ? route('amenities.update', $amenity->id) : route('amenities.store') }}">
        @csrf
        @if(isset($amenity))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label class="form-label">Amenity Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $amenity->name ?? '') }}" required>
        </div>

        <button type="submit" class="btn btn-success">
            {{ isset($amenity) ? 'Update' : 'Create' }}
        </button>
    </form>
    </div>
</div>

      </div>
    </div>
  @include('dashboard.footer')