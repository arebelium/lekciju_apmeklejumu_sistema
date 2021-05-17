@extends('layouts.app')

@section('content')
    <section class="edit-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h1>Mans profils</h1>
                    <div class="lectured">
                        <div class="lectured-header">
                           <strong><i class="fas fa-user"></i> Mana informācija</strong>
                        </div>
                        <div class="lectured-body justify-content-center">
                            @include('flash-message')

                            <p><strong>{{$student->name}} {{$student->last_name}}</strong></p>
                            <p>E-pasts: {{$student->email}}</p>
                            <p>Kurss: {{$student->course->name}}</p>
                        </div>

                    </div>
                    <br>
                    <a href="{{ action('StudentController@edit', Auth::user()) }}" class="btn btn-primary">Rediģēt informāciju</a>
                </div>
            </div>
        </div>
    </section>

@endsection
