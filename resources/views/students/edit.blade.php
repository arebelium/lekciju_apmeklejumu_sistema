@extends('layouts.app')

@section('content')
    <section class="edit-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h2>Mans profils</h2>
                    <h3>Profila labošana</h3>
                    <div class="card">
                        <div class="card-body">
                            @include('flash-message')
                            <form method="post" action="{{action('StudentController@update', $student)}}">
                                {{ csrf_field() }}
                                {{ method_field('patch') }}

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Vārds') }}</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="name" value="{{ $student->name }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Uzvārds') }}</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="last_name" value="{{ $student->last_name }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-pasts') }}</label>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" name="email" value="{{ $student->email }}" required>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Saglabāt') }}
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
