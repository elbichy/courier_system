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
	<div class="app" style="padding: 40px 0; display:flex; flex-direction:column; justify-content:center; align-items:center;">
		<img src="{{asset('storage/pricelist.jpeg')}}">
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