@extends('layout.main')

@section('content')

@include('components.navbar', [ 'page' => "students" ])

<div class="container">
    <div class="row">
        <div class="col-md-12">
            
            <a href="{{ url('students/create') }}" class="btn btn-dark float-end mt-1">Agregar</a>
            <h1>Estudiantes</h1>

            <table class="table mt-4">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Email</th>
                        <th scope="col">Carrera</th>
                        <th scope="col">Opción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    foreach ($students as $student) {
                        echo '<tr>
                                    <th scope="row" class="text-center">' . $count . '</th>
                                    <td>' . $student->id . '</td>
                                    <td>' . $student->name . ' ' . $student->lastname . '</td>
                                    <td>' . $student->email . '</td>
                                    <td>' . $student->description . '</td>
                                    <td>';
                                    ?>        

                                    <form method="POST" action="{{ url('students') }}">
                                        @csrf
                                        @method('delete')
                                        <input class="form-control" value="<?php echo $student->id; ?>" name="id" type="hidden">
                                        <button class="btn btn-dark"type="submit">Eliminar</button>
                                    </form>

                                    <?php
                            echo   '</td>
                                </tr>';
                        $count++;
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection