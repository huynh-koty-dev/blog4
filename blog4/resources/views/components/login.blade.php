@extends('index')
@section('content')
    <div class="container">
        <div class="custom-formLogin">
            <h3 style="text-align: center">Login</h3>
        <form action="login" method="POST">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" name="email" id="exampleInputEmail1"  placeholder="Enter email">
              @if($errorEmail ?? null)
              <div class="alert alert-danger">{{ $errorEmail }}</div>
              @endif
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
              @if($errorPass ?? null)
              <div class="alert alert-danger">{{ $errorPass }}</div>
              @endif
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
            @if($error ?? null)
            <div class="alert alert-danger">{{ $error }}</div>
            @endif
            
          </form>
        </div>
    </div>
    
@endsection