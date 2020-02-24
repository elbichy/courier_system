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
				<h6 class="" style="font-size:16px;">Courier management system</h6>
				<p class=""></p>
			</div>
			<form method="POST" action="{{ route('register_submit') }}">
                @csrf
                <div class="row">
                    <div class="input-field col s8">
                        <input id="name" type="text" class="validate" name="name" value="{{ old('name') }}" required>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="name">{{ __('Fullname') }}</label>
                    </div>
                    <div class="col s4">
                        <label>Select Gender</label>
                        <select class="browser-default" name="gender">
                            <option value="" disabled selected>Choose</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                        @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-field col s12 m6 l6">
                        <input id="username" type="text" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="username">{{ __('Username') }}</label>
                    </div>
                    <div class="input-field col s12 m6 l6">
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="email">{{ __('E-Mail Address') }}</label>
                    </div>
                    <div class="input-field col s12 m6 l6">
                        <input id="password" type="password" name="password" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="password">{{ __('Password') }}</label>
                    </div>
                    <div class="input-field col s12 m6 l6">
                        <input id="password-confirm" type="password" name="password_confirmation" required>
                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
                    </div>
                    <button type="submit" class="btn btn-primary col s12">
                        {{ __('Register') }}
                    </button>
                    <div class="col s12 input-field center">
                        <p>Already have an account? <a href="/">Sign in Here!</a></p>
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