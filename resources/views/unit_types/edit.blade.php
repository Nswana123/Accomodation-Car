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
         <h2>Edit Unit Type</h2>
        </div>
    </div>

    <div class="card-body">
<form action="{{ route('unit_types.update', $unitType->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="card shadow-sm p-4">
 <div class="row">
           <div class="col-md-6">
    <label>Provider</label>
    <select name="provider_id" class="form-control" required>
        <option value="">-- Select Provider --</option>
        @foreach($providers as $provider)
            <option value="{{ $provider->id }}"
                {{ old('provider_id', $unitType->provider_id ?? '') == $provider->id ? 'selected' : '' }}>
                {{ $provider->name }} ({{ $provider->type }})
            </option>
        @endforeach
    </select>
</div>

        <!-- Name -->
        <div class="col-md-6">
            <label for="name">Unit Type Name</label>
            <input 
                type="text" 
                name="name" 
                id="name" 
                class="form-control" 
                value="{{ $unitType->name }}" 
                required
            >
        </div>
</div>

        <!-- Description -->
        <div class="mb-4">
            <label for="description" class="form-label">Description</label>
            <textarea 
                name="description" 
                id="description" 
                class="form-control" 
                rows="3"
            >{{ $unitType->description }}</textarea>
        </div>

        <!-- Amenities -->
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
                                {{ in_array($amenity->id, $selectedAmenities) ? 'checked' : '' }}
                            >
                            <label class="form-check-label" for="amenity_{{ $amenity->id }}">
                                {{ $amenity->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Existing Images -->
        <div class="mb-4">
            <label class="form-label">Existing Images</label>
            <div class="d-flex flex-wrap gap-3">
                @foreach($unitType->images as $img)
                    <img src="{{ asset('storage/'.$img->image) }}" width="100" class="img-thumbnail">
                @endforeach
            </div>
        </div>

        <!-- Image Upload -->
        <div class="mb-4">
            <label for="images" class="form-label">Upload More Images</label>
            <input 
                type="file" 
                name="images[]" 
                id="images" 
                class="form-control" 
                multiple
            >
        </div>

        <!-- Buttons -->
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</form>

    </div>
</div>

      </div>
    </div>
  @include('dashboard.footer')