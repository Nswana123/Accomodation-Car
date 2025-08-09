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
                        <h4 class="card-title">New User Information</h4>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="new-user-info">
                <form action="{{route('create-user')}}" method="POST">
                @csrf

              
    <div class="row">
        <div class="col">
            <label>First Name</label>
            <input type="text" class="form-control  @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" required autocomplete="off">
            @error('fname')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col">
        <label>Last Name</label>
            <input type="text" class="form-control  @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" required autocomplete="off">
            @error('lname')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div> 
    </div>
    <div class="row mt-3">
    <div class="col">
        <label>Mobile Number</label>
            <input type="text" class="form-control  @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="off">
            @error('mobile')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
       
        <div class="col">
        <label>Email</label>
        <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="row mt-3">
       <div class="col-md-6">
                <label>Provider</label>
                <select name="provider_id" class="form-control" required>
                    @foreach($providers as $provider)
                        <option value="{{ $provider->id }}" {{ (isset($unit) && $unit->provider_id == $provider->id) ? 'selected' : '' }}>
                            {{ $provider->name }} ({{ $provider->type }})
                        </option>
                    @endforeach
                </select>
            </div>
        <div class="col">
        <label>User Group</label>
        <select class="form-select form-control @error('group_name') is-invalid @enderror" name="group_id" required autocomplete="off">
                    <option>Select Group</option>
                    @foreach($groups as $group)
                        <option value="{{ $group->id }}" {{ old('group_name') == $group->id ? 'selected' : '' }}>
                            {{ $group->group_name }}
                        </option>
                    @endforeach
                </select>
            @error('group_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col">
        <label>Password</label>
            <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="off">
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    

    <div class="row mt-2">
        <div class="col">
            <button type="submit" class="btn btn-primary float-end">Submit</button>
        </div>
    </div>
    </form>
            </div>
        </div>
    </div>
</div> 
     </div>
          </div>
        </div>
      </div>
    </div>
  @include('dashboard.footer')