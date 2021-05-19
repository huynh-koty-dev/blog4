@extends('index')
@section('content')
    <div class="container">
        <div class="custom-formLogin">
            <h3 style="text-align: center">Register</h3>
        <form action="register" method="POST">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" name="email" id="exampleInputEmail1"  placeholder="Enter email">
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">UserName</label>
                <input type="text" class="form-control" name="username"   placeholder="Enter username">
              @error('username')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
              </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
            @error('password')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Confirm Password</label>
                <input type="password" class="form-control" name="repassword"  placeholder="Confirm Password">
              @error('repassword')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
              </div>
            <button type="submit" class="btn btn-primary">Register</button>
            @if($error ?? null)
            <div class="alert alert-danger">{{ $error }}</div>
            @endif
            
          </form>
        </div>
    </div>
    
@endsection