<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V14</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="logintemp/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="logintemp/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="logintemp/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="logintemp/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="logintemp/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="logintemp/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="logintemp/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="logintemp/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="logintemp/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="logintemp/css/util.css">
	<link rel="stylesheet" type="text/css" href="logintemp/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form class="login100-form validate-form flex-sb flex-w">
					{{ csrf_field() }}
					<span class="login100-form-title p-b-32">
						Login
					</span>

					<span class="txt1 p-b-11">
						Username
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
						<input class="input100" type="text" name="username" id="username" />
						<span class="focus-input100"></span>
					</div>
					
					<span class="txt1 p-b-11">
						Password
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="password" id="password" />
						<span class="focus-input100"></span>
					</div>
					@if ($errors->has('username'))
						<p style="color:red">{{$errors->first('username')}}</p>
					@endif
					@if ($errors->has('password'))
						<p style="color:red">{{$errors->first('password')}}</p>
					@endif

					<div class="container-login100-form-btn">
						<input class="login100-form-btn" type="submit" value="Login" />
						{{-- <button class="login100-form-btn">
							Login
						</button> --}}
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="logintemp/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="logintemp/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="logintemp/vendor/bootstrap/js/popper.js"></script>
	<script src="logintemp/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="logintemp/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="logintemp/vendor/daterangepicker/moment.min.js"></script>
	<script src="logintemp/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="logintemp/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="logintemp/js/main.js"></script>

</body>
</html>