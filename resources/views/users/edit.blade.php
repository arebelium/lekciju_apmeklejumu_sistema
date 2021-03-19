@extends('layouts.app')

@section('content')
    <section class="edit-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h2>Mans profils</h2>
                    <h3>Profila labošana</h3>
                    <a href="/profile">Atgriezties</a>
                    <div class="card">
                        <div class="card-body">
                            @if(Session::has('message-profile-edited'))
                                <p class="alert alert-info">{{ Session::get('message-profile-edited') }}</p>
                            @endif
                            <form method="post" action="{{action('UserController@update', $user)}}">
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
                            <!--  <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Parole') }}</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Parole vēlreiz') }}</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password_confirmation">
                                </div>
                            </div> -->

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Labot') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
