@extends('layout.main')

@section('content')

@include('components.navbar', [ 'page' => "students" ])

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Agregar estudiante</h1>

            <form method="POST" action="{{ url('students') }}">
                @csrf
                <div class="row">
                    <div class="col-md-5">

                        <div class="mt-5 mb-3 row">
                            <label for="input1" class="col-sm-2 col-form-label">ID</label>
                            <div class="col-sm-10">
                                <input type="text" name="id" class="form-control" id="input1">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input2" class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="input2">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input3" class="col-sm-2 col-form-label">Apellido</label>
                            <div class="col-sm-10">
                                <input type="text" name="lastname" class="form-control" id="input3">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input4" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" name="email" class="form-control" id="input4">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input5" class="col-sm-2 col-form-label">Género</label>
                            <div class="col-sm-10">
                                <select name="gender" class="form-select" id="input5">
                                    <option value="m">Masculino</option>
                                    <option value="f">Femenino</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-5 row">
                            <label for="input6" class="col-sm-2 col-form-label">Carrera</label>
                            <div class="col-sm-10">
                                <select name="career_id" class="form-select" id="input6" required>
                                    <option selected>Selecciona una carrera</option>
                                    <option value="101">Sistemas Computacionales</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-12">
                            <button type="submit" class="btn btn-dark" style="width: 120px;">Guardar</button>
                            <a href="{{ url('students') }}" class="btn btn-secondary ms-2" style="width: 120px;">Regresar</a>
                            </div>
                        </div>


                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection