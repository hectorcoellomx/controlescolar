@extends('layout.main')

@section('content')

    @include('components.navbar', [ 'page' => "students" ])

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Students create</h1>
            </div>
        </div>
    </div>

@endsection
