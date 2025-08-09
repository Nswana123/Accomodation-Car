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
              <h2>Units</h2>
        </div>
   
       <a href="{{ route('units.create') }}" class="btn btn-primary mb-2">Add Unit</a>

    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Unit Name</th>
                    <th>Type</th>
                    <th>Provider</th>
                    <th>Capacity</th>
                    <th>Price</th>
                    <th>Images</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($units as $index => $unit)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $unit->name }}</td>
                        <td>{{ $unit->unitType->name ?? 'N/A' }}</td>
                        <td>{{ $unit->unitType->provider->name ?? 'N/A' }}</td>
                        <td>{{ Str::limit($unit->capacity, 50) }}</td>
                        <td>K{{ number_format($unit->price_per_day, 2) }}</td>
                        <td>
                            @if($unit->images->count())
                                <div class="d-flex flex-wrap gap-1">
                                    @foreach($unit->images->take(3) as $img)
                                        <div class="text-center me-1">
                                            <img src="{{ asset('storage/' . $img->image_path) }}" alt="{{ $img->title }}" width="60" height="60" class="img-thumbnail">
                                            <small class="d-block">{{ $img->title }}</small>
                                        </div>
                                    @endforeach
                                    @if($unit->images->count() > 3)
                                        <span class="badge bg-info">+{{ $unit->images->count() - 3 }} more</span>
                                    @endif
                                </div>
                            @else
                                <span class="text-muted">No Images</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('units.edit', $unit) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('units.destroy', $unit) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this unit?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">No units found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

      </div>
    </div>
  @include('dashboard.footer')