@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Medicos</h3>
        </div>
        <div class="col text-right">
          <a href="{{ route('doctors.create') }}" class="btn btn-sm btn-primary">
              Nuevo Medico
          </a>
        </div>
      </div>
    </div>
    <div class="card-body">
        @if (session('notification'))
        <div class="alert alert-success" role="alert">
            <strong>{{session('notification')}}</strong> 
        </div>
        @endif
    </div>
    <div class="table-responsive">
      <!-- Projects table -->
      <table class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">E-mail</th>
            <th scope="col">DNI</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($doctors as $doctor)
            <tr>
                <th scope="row">
                    {{$doctor->name}}
                </th>
                <td>
                    {{$doctor->email}}
                </td>
                <td>
                    {{$doctor->dni}}
                </td>
            
                <td width="10px">
                    <form action="{{ url('/doctors/'.$doctor->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ url('/doctors/'.$doctor->id.'/edit') }}" class="btn btn-sm btn-success">Editar</a>    
                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="pagination justify-content-center mt-4">
        {{$doctors->links()}}
      </div>
    </div>
  </div>
@endsection
