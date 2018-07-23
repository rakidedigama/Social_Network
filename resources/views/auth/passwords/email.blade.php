@extends('layouts.layout')

@section('pageTitle','Reset Password')

@section('content')

<div class="fh5co-loader"></div>
    
    <div id="page">
        @include('layouts.nav', ['some' => 'data'])
    <div id="fh5co-counter" class="fh5co-counters fh5co-bg-section" style="background-image: url({{ url('/images/BoysWithPhone.jpg') }});">
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
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>      
        </div>
    </div>

    </div>

@endsection