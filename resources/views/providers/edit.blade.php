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
            <h2>Edit Accommodation Provider</h2>
        </div>
    </div>

    <div class="card-body">
<form action="{{ route('providers.update', $provider->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="card shadow-sm p-4">
        <h4 class="mb-4">Update Provider Details</h4>

        <div class="row">
            <!-- Provider Name -->
            <div class="col-md-6 mb-3">
                <label for="name" class="form-label">Provider Name</label>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    class="form-control" 
                    value="{{ $provider->name }}" 
                    required
                >
            </div>

            <!-- Provider Type -->
            <div class="col-md-6 mb-3">
                <label for="type" class="form-label">Provider Type</label>
                <select name="type" id="type" class="form-select" required>
                    <option value="">-- Select Type --</option>
                    @foreach(['Hotel', 'Apartment', 'Boarding House', 'Car Hire'] as $type)
                        <option value="{{ $type }}" {{ $provider->type == $type ? 'selected' : '' }}>{{ $type }}</option>
                    @endforeach
                </select>
            </div>
        </div>


        <div class="row">
            <!-- Location -->
            <div class="col-md-6 mb-3">
                <label for="location" class="form-label">Location</label>
                <input 
                    type="text" 
                    name="location" 
                    id="location" 
                    class="form-control" 
                    value="{{ $provider->location }}"
                >
            </div>

            <!-- Description -->
            <div class="col-md-6 mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea 
                    name="description" 
                    id="description" 
                    class="form-control" 
                    rows="3"
                >{{ $provider->description }}</textarea>
            </div>
        </div>
 <div class="row">
        <div class="col-lg">
            <div class="mb-4">
    <label class="form-label">Amenities</label>
    <div class="row">
        <div class="col-md-12">
            @foreach($amenities as $amenity)
                <div class="form-check mb-2">
                    <input 
                        type="checkbox" 
                        name="amenities[]" 
                        value="{{ $amenity->id }}" 
                        id="amenity_{{ $amenity->id }}"
                        class="form-check-input"
                        {{ isset($selectedAmenities) && in_array($amenity->id, $selectedAmenities) ? 'checked' : '' }}
                    >
                    <label class="form-check-label" for="amenity_{{ $amenity->id }}">{{ $amenity->name }}</label>
                </div>
            @endforeach
        </div>
    </div>
</div>
        </div>
        <div class="col-lg">
            <div class="mb-3">
    <label for="images" class="form-label">Upload Images</label>
    <input type="file" name="images[]" multiple class="form-control">
</div>

@if(isset($provider))
    <div class="mb-3 d-flex flex-wrap gap-2">
        @foreach($provider->images as $img)
            <div>
                <img src="{{ asset('storage/'.$img->image) }}" width="100" class="img-thumbnail">
                <!-- Optional: delete button -->
                <form method="POST" action="{{ route('provider-images.destroy', $img->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger mt-1">Delete</button>
                </form>
            </div>
        @endforeach
    </div>
@endif
        </div>
    </div>
        <!-- Buttons -->
        <div class="d-flex justify-content-end mt-4">
            <a href="{{ route('providers.index') }}" class="btn btn-secondary me-2">Cancel</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</form>
</div>
    </div>
</div>

      </div>
    </div>
  @include('dashboard.footer')