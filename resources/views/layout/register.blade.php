<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Login Page</title>
		<link rel="icon" type="image/x-icon" href="{{ asset('assets/icon/globe2.svg') }}">


		<link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
		<link
			href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
			rel="stylesheet">

	</head>

	<body>
		<form class="login-form">
			<h1><i class="bi bi-globe2"></i>Langify</h1>


			<div class="input-group">
				<label for="">Username</label>
				<div class="input-text-icon">
					<i class="bi bi-person"></i>
					<input type="text" name="" id="" placeholder="Username">
				</div>
			</div>

			<div class="input-group">
				<label for="">Password</label>
				<div class="input-text-icon">
					<i class="bi bi-shield-lock"></i>
					<input type="password" name="" id="" placeholder="Password">
				</div>
			</div>

			<div class="input-group">
				<label for="">Confirm Password</label>
				<div class="input-text-icon">
					<i class="bi bi-shield-check"></i>
					<input type="password" name="" id="" placeholder="Confirm Password">
				</div>
			</div>

			<button>Register</button>
            <a href="{{ url("login") }}">Dont have account? Login here</a>
		</form>


	</body>
</html>
