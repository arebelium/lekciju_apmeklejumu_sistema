@extends('layouts.app')

@section('content')
    <section class="edit-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h1>Lektoru panelis</h1></br></br>
                    <div class="card">
                    <div class="card-header">
                                Ieplānot lekciju
                            </div>    
                                <div class="card-body justify-content-center">
                                    @if(Session::has('message-lecture-scheduled'))
                                        <p class="alert alert-info">{{ Session::get('message-lecture-scheduled') }}</p>
                                    @endif
                                            <div class="card-body">

                                                    <form method="POST" action="{{ action('LecturerController@scheduleLecture') }}">
                                                        {{ csrf_field() }}
                                                        {{ method_field('post') }}
                                                        <div class="form-group row">
                                                            <label for="lecture_id" class="col-md-4 col-form-label text-md-right">{{ __('Lekcijas ID') }}</label>
                                                            <div class="col-md-6">
                                                                <input type="number" class="form-control" name="lecture_id" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="lecturer_id" class="col-md-4 col-form-label text-md-right">{{ __('Lektora ID') }}</label>
                                                            <div class="col-md-6">
                                                                <input type="number" class="form-control" name="lecturer_id" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Datums') }}</label>
                                                            <div class="col-md-6">
                                                                <input type="date" class="form-control" name="date" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="time" class="col-md-4 col-form-label text-md-right">{{ __('Laiks') }}</label>
                                                            <div class="col-md-6">
                                                                <input type="time" class="form-control" name="time" required>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row mb-0">
                                                            <div class="col-md-6 offset-md-4">
                                                                <button type="submit" class="btn btn-primary">
                                                                    {{ __('Ieplānot lekciju') }}
                                                                </button>
                                                            </div>
                                                        </div>

                                                    </form>

                                            </div>
                                </div>
                               
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </section>

@endsection
