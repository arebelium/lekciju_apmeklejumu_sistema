@extends('layouts.app')

@section('content')
    <section class="edit-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h2>Administratora panelis</h2>
                    <div class="card">
                        <div class="card-header">Studenti</div>
                        <div class="card-body justify-content-center">
                            @if(Session::has('message-user-updated'))
                                <p class="alert alert-info">{{ Session::get('message-user-updated') }}</p>
                            @endif
                                @if(Session::has('message-user-deleted'))
                                    <p class="alert alert-info">{{ Session::get('message-user-deleted') }}</p>
                                @endif
                            @foreach($users as $user)
                                <div class="card">
                                    <div class="card-header">
                                        <span>{{$user->name}} {{$user->last_name}} (ID: {{$user->id}})</span>
                                        <button type="button" class="btn btn-primary" data-toggle="collapse" href="#editUser{{$user->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                            Rediģēt lietotāju
                                        </button>


                                    </div>

                                    <div class="collapse" id="editUser{{$user->id}}">
                                        <div class="card-body">
                                            <form method="POST" action="{{ action('AdminController@updateUser', $user->id) }}">
                                                {{ csrf_field() }}
                                                {{ method_field('patch') }}

                                                <div class="form-group row">
                                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Vārds') }}</label>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Uzvārds') }}</label>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-pasts') }}</label>
                                                    <div class="col-md-6">
                                                        <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-0">
                                                    <div class="col-md-6 offset-md-3">
                                                        <button type="submit" class="btn btn-primary">
                                                            {{ __('Labot studentu') }}
                                                        </button>

                                                    </div>
                                                </div>

                                            </form>
                                            <br>
                                            <form method="GET" action="{{ action('AdminController@deleteUser', $user->id) }}">
                                                {{ csrf_field() }}
                                                {{ method_field('get') }}
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Dzēst studentu') }}
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>
                    <hr>
                    <div class="card">
                            <div class="card-header">
                                Lektoru informācija
                            </div>
                            <div class="card-body justify-content-center">
                                @if(Session::has('message-lecturer-edited'))
                                    <p class="alert alert-info">{{ Session::get('message-lecturer-edited') }}</p>
                                @endif
                                    @if(Session::has('message-lecturer-deleted'))
                                        <p class="alert alert-info">{{ Session::get('message-lecturer-deleted') }}</p>
                                    @endif
                                @foreach($lecturers as $lecturer)
                                    <div class="card">
                                        <div class="card-header">
                                            {{$lecturer->name}} {{$lecturer->last_name}} (ID: {{$lecturer->id}})
                                            <button class="btn btn-primary" data-toggle="collapse" href="#editLecturer{{$lecturer->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">Rediģēt lektoru</button>
                                        </div>
                                        <div class="collapse" id="editLecturer{{$lecturer->id}}">
                                            <div class="card-body">
                                                <form method="POST" action="{{ action('AdminController@updateLecturer', $lecturer->id) }}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('patch') }}
                                                    <div class="form-group row">
                                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Vārds') }}</label>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control" name="name" value="{{ $lecturer->name }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Uzvārds') }}</label>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control" name="last_name" value="{{ $lecturer->last_name }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-pasts') }}</label>
                                                        <div class="col-md-6">
                                                            <input type="email" class="form-control" name="email" value="{{ $lecturer->email }}" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mb-0">
                                                        <div class="col-md-6 offset-md-3">
                                                            <button type="submit" class="btn btn-primary">
                                                                {{ __('Labot lektoru') }}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <br>
                                                <form method="GET" action="{{ action('AdminController@deleteLecturer', $lecturer->id) }}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('get') }}
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Dzēst lektoru') }}
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                    </div>
                        <hr>
                            <div class="card">
                                <div class="card-header">
                                    Lektoru pievienošana
                                </div>
                                <div class="card-body justify-content-center">
                                    @if(Session::has('message-lecturer-added'))
                                        <p class="alert alert-info">{{ Session::get('message-lecturer-added') }}</p>
                                    @endif
                                            <div class="card-body">

                                                    <form method="POST" action="{{ action('AdminController@addLecturer') }}">
                                                        {{ csrf_field() }}
                                                        {{ method_field('post') }}
                                                        <div class="form-group row">
                                                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Vārds') }}</label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="name" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Uzvārds') }}</label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="last_name" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-pasts') }}</label>
                                                            <div class="col-md-6">
                                                                <input type="email" class="form-control" name="email" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Parole') }}</label>
                                                            <div class="col-md-6">
                                                                <input type="password" class="form-control" name="password" required>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row mb-0">
                                                            <div class="col-md-6 offset-md-4">
                                                                <button type="submit" class="btn btn-primary">
                                                                    {{ __('Pievienot lektoru') }}
                                                                </button>
                                                            </div>
                                                        </div>

                                                    </form>

                                            </div>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
