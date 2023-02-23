<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- ===== Iconscout CSS ===== -->
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

	<!-- ===== CSS ===== -->
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div class="container active">
		<div class="forms">
			<!-- Registration Form -->
			<div class="form signup">
				<span class="title">Registration</span>
				<form action="register.php" method="post" onsubmit="return isEmail()">
					<div class="input-field">
						<input type="text" placeholder="Enter your name" required name="name">
						<i class="uil uil-user"></i>
					</div>
					<div class="input-field">
						<input type="text" name="email" id="email" placeholder="Enter your email" required>
						<i class="uil uil-envelope icon"></i>
						<i class="uil uil-exclamation-triangle" id="warning" style="display:none;"></i>
					</div>
					<div class="input-field">
						<input type="password" name="password" class="password"
							placeholder="Create a password" required>
						<i class="uil uil-lock icon"></i>
					</div>
					<div class="input-field">
						<input type="password" name="password2" class="password"
							placeholder="Confirm a password" required>
						<i class="uil uil-lock icon"></i>
						<i class="uil uil-eye-slash showHidePw"></i>
						<span>Between 8 and 12 charteres.</span>
					</div>
					<div class="input-field button">
						<input type="submit" value="Register Now">
					</div>
				</form>
				<div class="login-signup">
					<span class="text">Already have an account
						<a href="login_page.html" class="text login-link">Sigin now</a>
					</span>
				</div>
			</div>
		</div>
	</div>

	<script src="js/main.js"></script>
</body>

</html>