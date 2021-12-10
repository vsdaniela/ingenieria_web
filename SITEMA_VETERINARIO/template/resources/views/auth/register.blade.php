@extends('layout.master-mini')

@section('content')
<div class="content-wrapper d-flex align-items-center justify-content-center auth theme-one" style="background-image: url({{ url('assets/images/auth/register.jpg') }}); background-size: cover;">
  <div class="row w-100">
    <div class="col-lg-4 mx-auto">
      <h2 class="text-center mb-4">Register</h2>
      <div class="auto-form-wrapper">
        <form method="post" action="{{route('register')}}">
          {{ csrf_field()}}
          <div class="form-group">
            <div class="input-group">
              <input type="text" id = "name" id = "name" class="form-control" placeholder="nombres">
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <input type="email" id = "email"  name = "email"class="form-control" placeholder="correo">
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña">
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline"></i>
                </span>
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <button class="btn btn-primary submit-btn btn-block">Register</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection