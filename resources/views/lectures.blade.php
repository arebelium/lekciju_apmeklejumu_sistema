@extends('layouts.app')

@section('content')

    <section class="edit-page">
        <div class="container my-auto">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h1 class="text-uppercase">
                        <strong>
                            Ieplānotās lekcijas
                        </strong>
                    </h1>
                    <hr>
                    @foreach($lectures as $lecture)
                        <div class="card" style="padding:0;">
                            <div class="card-body">
                                {{$lecture->lecture->name}} ({{ $lecture->course->name }}) :  {{$lecture->date_time}}
                                @if (Auth::guard('lecturer')->check() || Auth::guard('admin')->check())
                                    <form method="GET" style="display:inline-block;" action="{{ action('LecturesController@deleteLecture', $lecture->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('get') }}
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Dzēst') }}
                                        </button>
                                    </form>
                                @endif
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


@endsection
