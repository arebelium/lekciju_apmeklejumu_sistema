@extends('layouts.app')

@section('content')
    <section class="edit-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h1>Lektoru panelis</h1></br></br>

                    <div class="card">
                        <div class="card-header">
                            Šodienas lekciju apmeklējumi
                        </div>
                        <div class="card-body justify-content-center">
                            @include('flash-message')
                            <ul class="list-group" style="color:black;">
                            @foreach ($today_attendance as $attendance)
                                <li class="list-group-item">
                                    {{ $attendance->sc_lecture()->lecture->name }} ({{ date("H:i", strtotime($attendance->sc_lecture()->start_at)) }})
                                    -> {{ $attendance->student()->name }} {{ $attendance->student()->last_name }} ({{ $attendance->student()->course->name }})
                                </li>
                            @endforeach
                            </ul>
                        </div>
                    </div>

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
                                        <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Datums') }}</label>
                                        <div class="col-md-6">
                                            <input type="date" class="form-control" name="date" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="start_at" class="col-md-4 col-form-label text-md-right">{{ __('Sākums') }}</label>
                                        <div class="col-md-6">
                                            <input type="time" class="form-control" name="start_at" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="end_at" class="col-md-4 col-form-label text-md-right">{{ __('Beigas') }}</label>
                                        <div class="col-md-6">
                                            <input type="time" class="form-control" name="end_at" required>
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
