
@extends('layouts.app')

@section('content')
    <section class="edit-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h1>Administratora panelis</h1><br>
                    <div class="card">
                    <button class="btn btn-primary" data-toggle="collapse" href="#students" role="button" aria-expanded="false" aria-controls="collapseExample">Studenti ({{$students->count()}})</button>
                        <div class="card-body justify-content-center collapse" id="students">
                            @include('flash-message')
                            @foreach($students as $student)
                                <div class="card">
                                    <div class="card-header">
                                        <span>{{$student->name}} {{$student->last_name}} </span>
                                        <button type="button" class="btn btn-primary" data-toggle="collapse" href="#editStudent{{$student->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                            Rediģēt studentu
                                        </button>
                                    </div>

                                    <div class="collapse" id="editStudent{{$student->id}}">
                                        <div class="card-body">
                                            <form method="POST" action="{{ action('AdminController@updateStudent', $student->id) }}">
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
                                                    <div class="col-md-6 offset-md-3">
                                                        <button type="submit" class="btn btn-primary">
                                                            {{ __('Saglabāt') }}
                                                        </button>

                                                    </div>
                                                </div>
                                            </form>
                                            <br>
                                            <form method="GET" action="{{ action('AdminController@deleteStudent', $student->id) }}">
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

                    <div class="card">
                    <button class="btn btn-primary" data-toggle="collapse" href="#seeLecturers" role="button" aria-expanded="false" aria-controls="collapseExample">Lektori ({{$lecturers->count()}})</button>
                        <div class="card-body justify-content-center collapse" id="seeLecturers">
                            @include('flash-message')
                            @foreach($lecturers as $lecturer)
                                <div class="card">
                                    <div class="card-header">
                                        {{$lecturer->name}} {{$lecturer->last_name}}
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
                                                            {{ __('Saglabāt') }}
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

                    <div class="card">
                        <button class="btn btn-primary" data-toggle="collapse" href="#seeLectures" role="button" aria-expanded="false" aria-controls="collapseExample">Lekcijas ({{$lectures->count()}})</button>
                        <div class="card-body justify-content-center collapse" id="seeLectures">
                            @include('flash-message')
                            @foreach($lectures as $lecture)
                                <div class="card">
                                    <div class="card-header">
                                        {{$lecture->name}} (Ieplānoto lekciju skaits: {{$lecture->scheduled_lectures->count() }})
                                        <button class="btn btn-primary" data-toggle="collapse" href="#editLecture{{$lecture->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">Rediģēt lekciju</button>
                                    </div>
                                    <div class="collapse" id="editLecture{{$lecture->id}}">
                                        <div class="card-body">
                                            <form method="POST" action="{{ action('AdminController@updateLecture', $lecture->id) }}">
                                                {{ csrf_field() }}
                                                {{ method_field('patch') }}
                                                <div class="form-group row">
                                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nosaukums') }}</label>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" name="name" value="{{ $lecture->name }}" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-0">
                                                    <div class="col-md-6 offset-md-3">
                                                        <button type="submit" class="btn btn-primary">
                                                            {{ __('Saglabāt') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                            <br>
                                            <form method="GET" style="display: inline-block;" action="{{ action('AdminController@deleteLecture', $lecture->id) }}">
                                                {{ csrf_field() }}
                                                {{ method_field('get') }}
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Dzēst lekciju') }}
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="card">
                        <button class="btn btn-primary" data-toggle="collapse" href="#seeCourses" role="button" aria-expanded="false" aria-controls="collapseExample">Kursi ({{$courses->count()}})</button>
                        <div class="card-body justify-content-center collapse" id="seeCourses">
                            @include('flash-message')
                            @foreach($courses as $course)
                                <div class="card">
                                    <div class="card-header">
                                        {{$course->name}} (Studentu skaits: {{$course->students()->count() }})
                                        <button class="btn btn-primary" data-toggle="collapse" href="#editCourse{{$course->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">Rediģēt kursu</button>
                                    </div>
                                    <div class="collapse" id="editCourse{{$course->id}}">
                                        <div class="card-body">
                                            <form method="POST" action="{{ action('AdminController@updateCourse', $course->id) }}">
                                                {{ csrf_field() }}
                                                {{ method_field('patch') }}
                                                <div class="form-group row">
                                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Kursa kods') }}</label>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" name="name" value="{{ $course->name }}" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-0">
                                                    <div class="col-md-6 offset-md-3">
                                                        <button type="submit" class="btn btn-primary">
                                                            {{ __('Saglabāt') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                            <br>
                                            <form method="GET" action="{{ action('AdminController@deleteCourse', $course->id) }}">
                                                {{ csrf_field() }}
                                                {{ method_field('get') }}
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Dzēst kursu') }}
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
                        <button class="btn btn-primary" data-toggle="collapse" href="#addStudent" role="button" aria-expanded="false" aria-controls="collapseExample">Studentu pievienošana</button>
                        <div class="card-body justify-content-center collapse" id="addStudent">
                            @include('flash-message')
                            <div class="card-body">
                                <form method="POST" action="{{ action('AdminController@addStudent') }}">
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

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Kurss') }}</label>
                                        <div class="col-md-6">
                                            <select class="form-control" name="course_id" required>
                                                @foreach ($courses as $key => $value)
                                                    <option value="{{ $key }}">
                                                        {{ $value->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Pievienot studentu') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <button class="btn btn-primary" data-toggle="collapse" href="#addLecturer" role="button" aria-expanded="false" aria-controls="collapseExample">Lektoru pievienošana</button>
                        <div class="card-body justify-content-center collapse" id="addLecturer">
                            @include('flash-message')
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

                    <div class="card">
                    <button class="btn btn-primary" data-toggle="collapse" href="#addLecture" role="button" aria-expanded="false" aria-controls="collapseExample">Lekciju pievienošana</button>
                        <div class="card-body justify-content-center collapse" id="addLecture">
                            @include('flash-message')
                            <div class="card-body">
                                <form method="POST" action="{{ action('AdminController@addLecture') }}">
                                    {{ csrf_field() }}
                                    {{ method_field('post') }}
                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nosaukums') }}</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="name" required>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Pievienot lekciju') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>

                    <div class="card">
                    <button class="btn btn-primary" data-toggle="collapse" href="#addCourse" role="button" aria-expanded="false" aria-controls="collapseExample">Kursu pievienošana</button>
                    <div class="card-body justify-content-center collapse" id="addCourse">
                        @include('flash-message')
                        <div class="card-body">
                            <form method="POST" action="{{ action('AdminController@addCourse') }}">
                                {{ csrf_field() }}
                                {{ method_field('post') }}
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Kursa kods') }}</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Pievienot kursu') }}
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
