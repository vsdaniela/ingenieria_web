@extends('layout.master-mini')
@section('content')

<div class="content-wrapper d-flex align-items-center justify-content-center auth theme-one" style="background-image: url({{ url('assets/images/auth/login_1.jpg') }}); background-size: cover;">
  <div class="row w-100">
    <div class="col-lg-4 mx-auto">
      <div class="auto-form-wrapper">
        <form method="post" action="{{ route('login') }} ">
          {{ csrf_field() }}
          <div class="form-group">
            <label class="label">Correo</label>
            <div class="input-group">
              <input type="text" id="email" name="email" class="form-control" placeholder="correo@example.com">
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="label">Contraseña</label>
            <div class="input-group">
              <input type="password" id="password" name="password" class="form-control" placeholder="*********">
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group d-flex justify-content-between">
            <div class="form-check form-check-flat mt-0">
            <div class="text-block text-center my-3">
              <a href="{{ url('/register') }}" class="text-black text-small">Create new account</a>
            </div>
            <div class="form-group">
              <button class="btn btn-primary submit-btn btn-block">Ingresar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection