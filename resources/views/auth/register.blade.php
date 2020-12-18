@extends('layouts.form')

@section('title', 'Registro')

@section('subtitle', 'Ingrese sus datos para generar el registro')

@section('content')

    <div class="container mt--8 pb-5">
      <!-- Table -->
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="card bg-secondary shadow border-0">
          
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>Registre sus datos</small>
              </div>
              <form role="form" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Nombre" type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" type="email" id="email" value="{{ old('email') }}" name="email" required>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Contraseña" type="password" id="password" name="password" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Confirme su contraseña" type="password" id="password_confirmation" name="password_confirmation" required>
                  </div>
                </div>
      
                <div class="text-center">
                  <button type="submit" class="btn btn-primary mt-4">Crear cuenta</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
