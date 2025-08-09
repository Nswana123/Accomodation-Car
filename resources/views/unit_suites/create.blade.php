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
       <h3>{{ isset($unit_suite) ? 'Edit' : 'Create' }} Unit Suite</h3>
        </div>
    </div>

    <div class="card-body">
<form action="{{ isset($unit_suite) ? route('unit_suites.update', $unit_suite->id) : route('unit_suites.store') }}" method="POST">
        @csrf
        @if(isset($unit_suite)) @method('PUT') @endif

        <div class="mb-3">
            <label>Suite Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $unit_suite->name ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label>Provider</label>
            <select name="provider_id" class="form-select" required>
                @foreach($providers as $provider)
                    <option value="{{ $provider->id }}" {{ (old('provider_id', $unit_suite->provider_id ?? '') == $provider->id) ? 'selected' : '' }}>
                        {{ $provider->name }}
                    </option>
                @endforeach
            </select>
        </div>

<div class="mb-3">
    <label class="form-label">Units</label>
    <div class="row">
        @foreach($units as $unit)
            <div class="col-12">
                <div class="form-check">
                    <input 
                        class="form-check-input" 
                        type="checkbox" 
                        name="unit_ids[]" 
                        value="{{ $unit->id }}"
                        id="unit_{{ $unit->id }}"
                        {{ isset($selected_units) && in_array($unit->id, $selected_units) ? 'checked' : '' }}
                    >
                    <label class="form-check-label" for="unit_{{ $unit->id }}">
                        {{ $unit->name }}
                    </label>
                </div>
            </div>
        @endforeach
    </div>
</div>



        <div class="mb-3">
            <label>Price Per Day</label>
            <input type="number" step="0.01" name="total_price_per_day" class="form-control" value="{{ old('total_price_per_day', $unit_suite->total_price_per_day ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label>Description (Optional)</label>
            <textarea name="description" class="form-control">{{ old('description', $unit_suite->description ?? '') }}</textarea>
        </div>

        <button class="btn btn-success">Save</button>
        <a href="{{ route('unit_suites.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
    </div>
</div>

      </div>
    </div>
  @include('dashboard.footer')