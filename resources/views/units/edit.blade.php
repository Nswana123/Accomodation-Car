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
             
    <h2>{{ isset($unit) ? 'Edit Unit' : 'Add Unit' }}</h2>
        </div>

    </div>

   <div class="card-body">
   <form action="{{ isset($unit) ? route('units.update', $unit->id) : route('units.store') }}" 
      method="POST" 
      enctype="multipart/form-data">

    @csrf
    @if(isset($unit)) @method('PUT') @endif

    <div class="row">
        <!-- Unit Name -->
        <div class="mb-3 col-md-6">
            <label class="form-label">Unit Name</label>
            <input type="text" 
                   name="name" 
                   value="{{ $unit->name ?? old('name') }}" 
                   class="form-control" 
                   placeholder="Unit Name" 
                   required>
        </div>

        <!-- Unit Type -->
        <div class="mb-3 col-md-6">
            <label class="form-label">Unit Type</label>
            <select name="unit_type_id" class="form-control" required>
                <option value="">-- Select Type --</option>
                @foreach($unitTypes as $type)
                    <option value="{{ $type->id }}" 
                        {{ (isset($unit) && $unit->unit_type_id == $type->id) ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Capacity -->
        <div class="mb-3 col-md-6">
            <label class="form-label">Capacity</label>
            <input name="capacity" 
                   type="number" 
                   class="form-control" 
                   value="{{ $unit->capacity ?? old('capacity') }}" 
                   required>
        </div>

        <!-- Price -->
        <div class="mb-3 col-md-6">
            <label class="form-label">Price per Day</label>
            <input name="price_per_day" 
                   type="number" 
                   step="0.01" 
                   class="form-control" 
                   value="{{ $unit->price_per_day ?? old('price_per_day') }}" 
                   required>
        </div>

        <!-- Status -->
        <div class="mb-3 col-md-6">
            <label class="form-label">Status</label>
            <select name="status" class="form-control">
                @foreach(['Available', 'Booked', 'Maintenance'] as $status)
                    <option value="{{ $status }}" 
                        {{ (isset($unit) && $unit->status == $status) ? 'selected' : '' }}>
                        {{ $status }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Description -->
        <div class="mb-3 col-12">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control">{{ $unit->description ?? '' }}</textarea>
        </div>

        <!-- Amenities -->
        <div class="mb-3 col-12">
            <label class="form-label">Amenities</label>
            <div class="row">
                <div class="col-md-12">
                    @foreach($amenities as $amenity)
                        <div class="form-check mb-2">
                            <input type="checkbox" 
                                   name="amenities[]" 
                                   value="{{ $amenity->id }}" 
                                   id="amenity_{{ $amenity->id }}" 
                                   class="form-check-input"
                                   {{ (isset($unit) && $unit->amenities->contains($amenity->id)) ? 'checked' : '' }}>
                            <label class="form-check-label" for="amenity_{{ $amenity->id }}">
                                {{ $amenity->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Images Upload -->
        <div class="mb-3 col-12">
            <label class="form-label">Images (with titles)</label>
            <div id="image-wrapper">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <input type="text" name="image_titles[]" class="form-control" placeholder="Title">
                    </div>
                    <div class="col-md-6">
                        <input type="file" name="images[]" class="form-control">
                    </div>
                </div>
            </div>
            <button type="button" onclick="addImageField()" class="btn btn-sm btn-secondary mt-2">
                Add Another
            </button>
        </div>

        <!-- Existing Images -->
        @if(isset($unit) && $unit->images->count())
            <div class="col-12 mt-4">
                <h5>Existing Images</h5>
                <div class="row">
                    @foreach($unit->images as $img)
                        <div class="col-md-3 mb-4 text-center">
                            <div class="card h-100">
                                <img src="{{ asset('storage/'.$img->image_path) }}" 
                                     class="card-img-top img-fluid rounded" 
                                     style="max-height: 180px; object-fit: cover;" 
                                     alt="{{ $img->title }}">
                                <div class="card-body p-2">
                                    <p class="mb-2"><strong>{{ $img->title }}</strong></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

    <!-- Submit -->
    <div class="mt-3">
        <button class="btn btn-success">
            {{ isset($unit) ? 'Update' : 'Create' }}
        </button>
    </div>
</form>

</div>


</div>

      </div>
    </div>
<script>
function addImageField() {
    document.getElementById('image-wrapper').innerHTML += `
        <div class="row mb-2">
            <div class="col-md-6"><input type="text" name="image_titles[]" class="form-control" placeholder="Title"></div>
            <div class="col-md-6"><input type="file" name="images[]" class="form-control"></div>
        </div>`;
}
</script>

  @include('dashboard.footer')