@extends('master')
@section('content')


<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col-12 col-lg-9 col-xl-7">
          <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
            <div class="card-body p-4 p-md-5">
              <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
              <form action="{{ url('/register') }}" method="POST">

                @if (Session::get('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                @endif
                @if (Session::get('fail'))
                    <div class="alert alert-danger">
                        {{Session::get('fail')}}
                    </div>
                @endif

                @csrf
                <div class="row">
                  <div class="col-md-6 mb-4">
  
                    <div class="form-outline">
                      <input type="text" name="firstName" class="form-control form-control-lg" />
                      <label class="form-label" for="firstName">First Name</label>
                    </div>
                    <span class="text-danger">
                      @error('firstName')
                      {{$message}}
                      @enderror
                    </span>
  
                  </div>
                  <div class="col-md-6 mb-4">
  
                    <div class="form-outline">
                      <input type="text" name="lastName" class="form-control form-control-lg" />
                      <label class="form-label" for="lastName">Last Name</label>
                    </div>
                    <span class="text-danger">
                      @error('lastName')
                        {{ $message }}
                      @enderror
                    </span>
  
                  </div>
                </div>
  
                <div class="row">
                  <div class="col-md-6 mb-4 d-flex align-items-center">
  
                    <div class="form-outline datepicker w-100">
                      <input
                        type="text"
                        class="form-control form-control-lg"
                        name="birthdayDate"
                        placeholder="YY-MM-DD"
                      />
                      <label for="birthdayDate" class="form-label">Birthday Date</label>
                    </div>
                    <br>
                    <span class="text-danger">
                      @error('birthdayDate')
                        {{$message}}
                      @enderror
                    </span>
  
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" name="gender" class="form-control form-control-lg"/>
                      <label class="form-label" for="gender">Gender</label>
                    </div>
  
                </div>
  
                <div class="col-md-6 mb-4">
  
                  <div class="form-outline">
                    <input type="text" name="email" class="form-control form-control-lg" />
                    <label class="form-label" for="emailID">Email</label>
                  </div>
                  <span class="text-danger">
                    @error('emailID')
                      {{ $message }}
                    @enderror
                  </span>
  
                </div>

  
                <div class="col-md-6 mb-4">
  
                  <div class="form-outline">
                    <input type="password" name="password" class="form-control form-control-lg" />
                    <label class="form-label" for="password">Password</label>
                  </div>
                  <span class="text-danger">
                    @error('password')
                      {{ $message }}
                    @enderror
                  </span>
                </div>
  
                <div class="col-md-6 mb-4">
  
                  <div class="form-outline">
                    <input type="password" name="confirmPassword" class="form-control form-control-lg" />
                    <label class="form-label" for="confirmPassword">Confirm Password</label>
                  </div>
                  <span class="text-danger">
                    @error('confirmPassword')
                      {{ $message }}
                    @enderror
                  </span>
  
                </div>
  
                <div class="mt-4 pt-2">
                  <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                </div>
                <p class="text-center text-muted mt-5 mb-0">Have an account already? <a href="/login" class="fw-bold text-body"><u>Login here</u></a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


@endsection