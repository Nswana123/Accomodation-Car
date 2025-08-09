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
            <h2>Accommodation Providers</h2>
        </div>
   
    <a href="{{ route('providers.create') }}" class="btn btn-primary mb-3">Add Provider</a>

    </div>

    <div class="card-body table-responsive">
         <table class="table table-responsive table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                 <th>View Images</th>
                <th>Type</th>
                <th>Location</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($providers as $provider)
                <tr>
                    <td>{{ $provider->name }}</td>
                    <td>
        @foreach($provider->images as $img)
            <img src="{{ asset('storage/'.$img->image) }}" width="50" class="img-thumbnail me-1 mb-1">
        @endforeach
    </td>
                    <td>{{ $provider->type }}</td>
                    <td>{{ $provider->location }}</td>
                    <td>{{ $provider->description }}</td>
                    <td>
                        <a href="{{ route('providers.edit', $provider->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('providers.destroy', $provider->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
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