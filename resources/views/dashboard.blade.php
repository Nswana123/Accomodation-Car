@php
    $user = Auth::user();
    $user_group = $user->user_group;
@endphp

@if($user_group && in_array($user_group->group_name, ['admin', 'user']))
@include('dashboard.layout')
<body class="bg-gray-100">

  @include('dashboard.sidebar')
    @include('dashboard.header')
   

  <!-- Page Content -->
<div class="p-4 pt-16 pb-24 md:pt-24" style="margin-top: 100px;margin-bottom: 100px;">
  <!-- your content -->
 <div class="container mt-4">
    <!-- your content -->
  
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card info-card customers-card">
        <div class="card-body">
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


</div>
</div>
</div>

     @include('dashboard.footer')

@else
     <!DOCTYPE html>
<html lang="en">
  @include('userdashboard.layout')
 
<body>
    
  @include('userdashboard.header')

  
    <!-- Mobile Bottom Nav -->
   
      @include('userdashboard.nav')
    </main>
            @include('userdashboard.footer') 
    @endif