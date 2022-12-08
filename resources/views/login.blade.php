@extends('layout.main')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4 mt-5">
                <h1 class="mb-3">Acceso</h1>

                <form method="POST" action="{{ url('login') }}">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Correo electrónico</label>
                      <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      <div id="emailHelp" class="form-text">Nunca compartiremos su correo electrónico con nadie más.</div>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                      <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            Debe ingresar email y contraseña.
                        </div>
                    @endif
                    @if (session('noaccess'))
                        <div class="alert alert-danger">
                            {{ session('noaccess') }}
                        </div>
                    @endif
                    <button type="submit" class="btn btn-dark mt-2">Iniciar sesión</button>
                </form>

            </div>
        </div>
    </div>

@endsection

