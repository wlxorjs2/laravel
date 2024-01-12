<!DOCTYPE html>
<html lang="en">
<head>
	<title>회원정보</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{asset('my/login_template/images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('my/login_template/vendor/bootstrap/css/bootstrap.min.css')}}">
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
</style>
</head>
<body>
<form name="member_create_form" method="post" action="{{route('login.update', session()->get('id'))}}">
@csrf
@method("PATCH")
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-26">
						회원정보
					</span>
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="uid" value="{{$row->uid}}" readonly>
						<span class="focus-input100" data-placeholder="아이디"></span>
					</div>
					@error('uid'){{$message}} @enderror

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="pwd" value="{{$row->pwd}}">
						<span class="focus-input100" data-placeholder="비밀번호"></span>
					</div>
					@error('pwd'){{$message}} @enderror

				
                    <div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="pwd2" value="{{$row->pwd}}">
						<span class="focus-input100" data-placeholder="비밀번호 재입력"></span>
					</div>
				

                    <div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="name" value="{{$row->name}}">
						<span class="focus-input100" data-placeholder="이름"></span>
					</div>
					@error('name'){{$message}} @enderror

                    <div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="text" name="email" value="{{$row->email}}">
						<span class="focus-input100" data-placeholder="이메일"></span>
					</div>
					@error('email'){{$message}} @enderror

                    <div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="tel" value="{{$row->tel}}">
						<span class="focus-input100" data-placeholder="전화번호 예시 : 01012345678"></span>
					</div>
					@error('tel'){{$message}} @enderror

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" class="login100-form-btn">
								수정하기
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</form>

	
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="{{asset('login_template/js/main.js')}}"></script>
	<script src="{{asset('my/login_template/js/placeholder.js')}}"></script>

</body>
</html>