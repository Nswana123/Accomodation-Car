@include('dashboard.layout')
  <body class="  ">
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
    <div class="alert alert-warning">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif 
      <div>
         <div class="row">
            <div class="col-xl-12 col-lg-12">
            <div class="card">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title">Edit User Role</h4>
                     </div>
                  </div>
                  <div class="card-body">
                  <form action="{{ route('settings.updateRole', $user_role->id) }}" method="POST">
    @csrf
    @method('PUT') <!-- Important for updating a record -->

    <div class="row">
        <div class="col">
            <label>Permission Name</label>
            <input type="text" 
                   class="form-control @error('name') is-invalid @enderror" 
                   name="name" 
                   value="{{ old('name', $user_role->name) }}"  required autocomplete="off"> <!-- Use old() with fallback -->
                 
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col">
            <label>Permission Description</label>
            <input type="text" 
                   class="form-control @error('description') is-invalid @enderror" 
                   name="description" 
                   value="{{ old('description', $user_role->description) }}"  required autocomplete="off"> <!-- Use old() with fallback -->
                  
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    <div class="row mt-2">
        <div class="col">
            <button type="submit" class="btn btn-primary float-end">Update</button>
        </div>
    </div>
</form>
          </div>
        </div>
      </div>
    </div>

      @include('dashboard.footer')