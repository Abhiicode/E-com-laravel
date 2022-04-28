@extends('master')
@section('content')


<div class="container" >
    <div class="row m-5" style="display: flex; justify-content:center; align-items:center">
        <div class="col-sm-4" style="display: flex; justify-content:center; align-items:center">
          {{-- {!! Form::open() !!}

          {!! Form::close() !!} --}}
          <form action="/login" method="POST" >
            {{ csrf_field() }}
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email address</label>
                  <input  type="email" name="email"  class="form-control" id="email" aria-describedby="emailHelp"/>
                  <span class="text-danger">{{$err['email'][0] ?? " " }}</span>
                  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1"/>
                  <span class="text-danger"> 
                    {{$err['password'][0] ?? " "}}
                  </span>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
                <br>
                <p> I don't have an account? <a href="/register" class="fw-bold text-body"><u>Signup here</u></a></p>

              </form>
        </div>
    </div>
  </div>
  @endsection