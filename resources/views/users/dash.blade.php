@extends('layouts.app')

@section('content')
    <section class="edit-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h2>Mans profils</h2>
                    <div class="lectured">
                        <div class="lectured-header">
                           <strong><i class="fas fa-user"></i> Mana informācija</strong>
                        </div>
                        <div class="lectured-body justify-content-center">
                            @if(Session::has('message-profile-edited'))
                                <p class="alert alert-info">{{ Session::get('message-profile-edited') }}</p>
                            @endif

                            <p><strong>{{$user->name}} {{$user->last_name}}</strong></p>
                            <p>E-pasts: {{$user->email}}</p>
                        </div>

                    </div>
                    <br>
                    <a href="{{ action('UserController@edit', Auth::user()) }}" class="btn btn-primary">Rediģēt informāciju</a>
                    <hr>
                    <h2>Lekcijas</h2>
                    @foreach($lectures as $lecture)
                        <div class="lecture">
                            <div class="lecture-header">
                                <strong> <i class="fas fa-lecture"></i>{{$lecture->name}} ({{$lecture->date}}) ({{$lecture->lecturer}}) </strong> <br> <br>
                            </div>
                        </div>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection
