<!DOCTYPE html>
<html lang="en">
<head>
	<title>미술관 로그인</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{asset('my/login_template/images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('my/login_template/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('my/login_template/vendor/bootstrap/css/bootstrap.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('my/login_template/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('my/login_template/fonts/iconic/css/material-design-iconic-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('my/login_template/vendor/animate/animate.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('my/login_template/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('my/login_template/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('my/login_template/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('my/login_template/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('my/login_template/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('my/login_template/css/main.css')}}">
<!--===============================================================================================-->

<style>
	.container-login100{
		background-image: "my/login_template/images/Login_Background.jpg" !important
	}

	.title {
        font-size: 50px;
        color: white;
        font-family: 'Rationale', sans-serif;
        text-decoration: none;
    }
</style>

</head>
<body>
@extends('nav_bar')

	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" name="login_form" method="post" action="{{url('login/check')}}">
					@csrf
					<span class="login100-form-title p-b-26">
						<a class="title">ArtWindow</a>
					</span>
					
					
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="uid" value="{{ old('uid') }}">
						<span class="focus-input100" data-placeholder="아이디"></span>
					</div>
					@error('uid')<div class="error-message">{{$message}}</div>@enderror
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="pwd" value="{{ old('pwd') }}">
						<span class="focus-input100" data-placeholder="비밀번호"></span>
					</div>
					@error('pwd')<div class="error-message">{{$message}}</div>@enderror
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								로그인
							</button>
						</div>
					</div>

					<div class="text-center p-t-115">
						<span class="txt1">
							계정이 없으신가요?
						</span>

						<a class="txt2" href="{{route('login.create')}}">
							회원가입
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	@if (session('fail'))
        <script>
            alert('{{ session('fail') }}');
        </script>
    @endif

	
	
<!--===============================================================================================-->
	<script src="{{asset('login_template/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('login_template/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('login_template/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('login_template/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('login_template/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('login_template/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('login_template/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('login_template/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('login_template/js/main.js')}}"></script>
	<script src="{{asset('my/login_template/js/placeholder.js')}}"></script>
</body>
</html>