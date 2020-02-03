<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Courier Management System</title>
	<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('js/axios.min.js')}}"></script>
	<style>
		:root {
			--primary-bg-dark: #164f6b; 
			--primary-bg-mid: #0e75a7; 
			--primary-bg-light: #039be5;  
			
			--primary-trans-bg-dark: #164f6b;
			--primary-trans-bg-light: #039be5;
			
			--secondary-bg-dark: #8d1003; 
			--secondary-bg-light: #c91e0b; 
			
			--switch-dark: #164f6b; 
			--switch-light: #039be5; 

			--button-dark: #164f6b; 
			--button-light: #039be5;
			--button-secondary: #8d1003;
		}
	</style>
	<link rel="stylesheet" href="{{asset('css/material-icons.css')}}">
	{!! MaterializeCSS::include_js() !!}
    {!! MaterializeCSS::include_css() !!}
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
	<div class="app" style="display:flex; flex-direction:column; justify-content:center; align-items:center;">
		<div class="card form_wrap" style="width: 35%; padding-top:25px;">
			<div class="heading">
				<img src="{{ asset('storage/logo.jpg') }}" alt="logo" width="100px" height="100px">
				<h6 class="">Company Name</h6>
				<p class="">Courier management system</p>
			</div>
			<form method="POST" action="{{ route('register_submit') }}">
                @csrf
                <div class="row">
                    <div class="form-group col s12">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Fullname') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="validate" name="name" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col s12 m6 l6">
                        <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>
                        <div class="col-md-6">
                            <input id="username" type="text" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group col s12 m6 l6">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                        <div class="col-md-6">
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col s12 m6 l6">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                        <div class="col-md-6">
                            <input id="password" type="password" name="password" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col s12 m6 l6">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                        <div class="col-md-6">
                            <input id="password-confirm" type="password" name="password_confirmation" required>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary col s12">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
		</div>
	</div>
	<script>
		$(function() {
			$('#login_form').submit(function (e) { 
				$('.login_btn').prop('disabled', true).html('SIGNING IN...');
			});
		});
	</script>
</body>
</html>