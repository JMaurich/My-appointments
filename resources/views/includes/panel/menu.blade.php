<h6 class="navbar-heading text-muted">Gestionar datos</h6>
<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link" href="/home">
      <i class="ni ni-tv-2 text-danger"></i> Dashboard
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('specialties.index') }}">
      <i class="ni ni-planet text-blue"></i> Especialidades
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ url('/doctors') }}">
      <i class="ni ni-single-02 text-orange"></i> Medicos
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/">
      <i class="ni ni-satisfied text-info"></i> Pacientes
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/">
      <i class="ni ni-bullet-list-67 text-red"></i> Tables
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
      <i class="ni ni-circle-08"></i> Crerrar sesíon
    </a>
    <form action="{{ route('logout') }}" method="POST" style="display: none;" id="formLogout">
    	@csrf
    </form>
  </li>
</ul>
<!-- Divider -->
<hr class="my-3">
<!-- Heading -->
<h6 class="navbar-heading text-muted">Reportes</h6>
<!-- Navigation -->
<ul class="navbar-nav mb-md-3">
  <li class="nav-item">
    <a class="nav-link" href="#">
      <i class="ni ni-sound-wave text-yellow"></i> Frecuencias de citas
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">
      <i class="ni ni-spaceship text-orange"></i> Medicos mas activos
    </a>
  </li>

</ul>