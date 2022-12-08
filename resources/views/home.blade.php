@extends('layout.main')

@section('content')

    @include('components.navbar', [ 'page' => "home" ])

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Inicio</h1>
            </div>
        </div>
    </div>
    
@endsection

