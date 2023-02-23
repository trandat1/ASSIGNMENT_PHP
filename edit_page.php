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


<?php
require("database.php");
$sconn = new Database();
if (isset($_GET['id'])) {
	$memberid = $_GET['id'];
	$row = $sconn->get_member($memberid);
}

$check = $sconn->edit($memberid);
if (isset($_POST['edit'])) {
	if ($check == true) {
		header('Location:body.php');
	} else {
		echo 'window.alert("' . $check . '");';
	}
}
?>

<body>
	<div class="container active">
		<div class="forms">
			<!-- Registration Form -->
			<div class="form signup">
				<span class="title">Edit User</span>
				<form action="" method="post">
					<div class="input-field">
						<input type="text" required name="name" placeholder="Name" value="<?php echo $row[0]; ?>">
						<i class="uil uil-user"></i>
					</div>
					<div class="input-field">
						<input type="text" required name="email" placeholder="Name" value="<?php echo $row[1]; ?>">
						<i class="uil uil-user"></i>
					</div>
					<div class="input-field">
						<input type="password" name="checkpassword" class="password" placeholder="Old password" required>
						<i class="uil uil-lock icon"></i>
					</div>
					<div class="input-field">
						<input type="password" name="password" class="password" placeholder="Create a password" required>
						<i class="uil uil-lock icon"></i>
					</div>
					<div class="input-field">
						<input type="password" name="password2" class="password" placeholder="Confirm a password" required>
						<i class="uil uil-lock icon"></i>
						<i class="uil uil-eye-slash showHidePw"></i>
						<span>Between 8 and 12 charteres.</span>
					</div>
					<div class="input-field button">
						<input type="submit" value="Edit Now" name="edit">
					</div>
				</form>

			</div>
		</div>
	</div>

	<script src="js/main.js"></script>


</body>

</html>