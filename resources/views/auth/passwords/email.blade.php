@extends('layouts.layout')

@section('pageTitle','Reset Password')

@section('content')

<div class="fh5co-loader"></div>
    
    <div id="page">
        @include('layouts.nav', ['active' => 'forgot_pass'])
    <div id="fh5co-counter" class="fh5co-counters fh5co-bg-section">
        <div class="container">
            <div class="row">
                <div class="login-box">
                    <h3>Reset Password</h3>
                    
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" placeholder="E-Mail Address" autofocus name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12 btn-center">
                                <button type="submit" class="btn btn-login">Send Password Reset Link</button>
                            </div>
                        </div>
                    </form>
                </div>      
        </div>
    </div>

    </div>

@endsection
