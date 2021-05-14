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
                            @include('flash-message')
                            <div class="card-body">
                                <form method="POST" action="{{ action('LecturerController@scheduleLecture') }}">
                                    {{ csrf_field() }}
                                    {{ method_field('post') }}
                                    <div class="form-group row">
                                        <label for="lecture_id" class="col-md-4 col-form-label text-md-right">{{ __('Lekcija') }}</label>
                                        <div class="col-md-6">
                                            <select class="form-control" name="lecture_id" required>
                                                @foreach ($lectures as $key => $value)
                                                    <option value="{{ $key }}">
                                                        {{ $value }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="course_id" class="col-md-4 col-form-label text-md-right">{{ __('Kurss') }}</label>
                                        <div class="col-md-6">
                                            <select class="form-control" name="course_id" required>
                                                @foreach ($courses as $key => $value)
                                                    <option value="{{ $key }}">
                                                        {{ $value }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="date_time" class="col-md-4 col-form-label text-md-right">{{ __('Datums un laiks') }}</label>
                                        <div class="col-md-6">
                                            <input type="datetime-local" class="form-control" name="date_time" required>
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
                </div>
            </div>
        </div>
    </section>

@endsection
