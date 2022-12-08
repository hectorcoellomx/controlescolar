@extends('layout.main')

@section('content')

@include('components.navbar', [ 'page' => "careers" ])

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Carreras</h1>

            <table class="table mt-4">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col">Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    foreach ($careers as $career) {
                        echo '<tr>
                                    <th scope="row" class="text-center">' . $count . '</th>
                                    <td>' . $career->id . ' ' . $career->description . '</td>
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