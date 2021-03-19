@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Apstiprini savu e-pasta adresi') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Verifikācijas links tika nosūtīts uz jūsu e-pastu.') }}
                        </div>
                    @endif

                    {{ __('Lūdzu pārbaudi savu e-pastu, pirms turpini.') }}
                    {{ __('Ja nesaņēmi e-pastu') }}, <a href="{{ route('verification.resend') }}">{{ __('spied šeit') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
