@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Especialidades</h3>
        </div>
        <div class="col text-right">
          <a href="{{ url('/doctors') }}" class="btn btn-sm btn-default">
              Cancelar y regresar
          </a>
        </div>
      </div>
    </div>
    <div class="card-body">
        @if ($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
        <form action="{{ url('/doctors') }}" method="Post">
            @csrf
            <div class="form-group">
                <label for="name">Nombre del profecional</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="text" name="email" class="form-control" value="{{ old('email') }}" required>
            </div>
            <div class="form-group">
                <label for="dni">Documento de identidad</label>
                <input type="text" name="dni" class="form-control" value="{{ old('dni') }}" required>
            </div>
            <div class="form-group">
                <label for="address">Dirección</label>
                <input type="text" name="address" class="form-control" value="{{ old('address') }}">
            </div>
            <div class="form-group">
                <label for="phone">Telefono</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
        </form>
    </div>
  </div>
@endsection
