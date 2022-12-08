<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">Control Escolar <?php echo isset($id) ? $id : ''; ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link <?php echo ($page == 'home') ? 'active' : ''; ?>" aria-current="page" href="{{ url('home') }}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($page == 'careers') ? 'active' : ''; ?>" href="{{ url('careers') }}">Carreras</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($page == 'students') ? 'active' : ''; ?>" href="{{ url('students') }}">Estudiantes</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ url('logout') }}">Cerrar sesión</a></li>
            </ul>
            
        </div>
    </div>
</nav>