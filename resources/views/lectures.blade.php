@extends('layouts.app')

@section('content')

    <section class="edit-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <h1 class="text-uppercase">
                        <strong>
                            Ieplānotās lekcijas
                            @include('flash-message')
                        </strong>
                    </h1>
                    <hr>

                    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.min.js"></script>

                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.css"/>


                    {!! $calendar->calendar() !!}
                    {!! $calendar->script() !!}

                    @if (Auth::guard('web')->check())
                        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" style="color: black;">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <h4>Atzīmēt apmeklējumu</h4>
                                        <div class="alert alert-warning alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>Apmeklējumu var atzīmēt tikai lekcijas laikā!</strong>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <form method="post" action="{{ route('lectures.check_attendance') }}">
                                            @csrf
                                            <input type="hidden" name="lecture_id" id="lecture_id" value="" />
                                            <input type="hidden" name="user_id" value=" {{ Auth::user()->id }}" />
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Esmu ieradies') }}
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>


@endsection
