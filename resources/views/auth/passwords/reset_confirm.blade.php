@extends('layouts.app')

<?php
    $retVal = Session::get('retVal');
    if($retVal == null)
        $retVal = false;
    else
        $retVal = $retVal;
?>
@section('contents')
    <section class="pw-reset-pw">

        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-3">
                    <h2 class="text-center">{{ trans('passwords.page_title') }}</h2>
                    <div class="alert alert-success" role="alert">
                        {{ trans('passwords.reset') }}
                    </div>
                    <div class="text-center">
                        <a href="{{ route('login') }}" class="btn btn-primary">{{ trans('buttons.login') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
