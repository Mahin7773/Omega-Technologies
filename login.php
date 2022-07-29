<?php
include 'server.php';
if (isset($_POST["sign-up"])) {
	global $connection;
	$check = "admin";
	$check1 = "admin@admin.com";
	$errors = array();
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	if ($username != $check && $email != $check1 && $password != $check) {
		$query = "insert into user(id,username,email,password) 
			values('','$username','$email','$password')";
		$result = mysqli_query($connection, $query);
	} else {
		echo "<script>alert('admin signup prohibited')</script>";
		echo "<script>location.replace('login.php')</script>";
	}
}
if (isset($_POST["sign-in"])&&isset($_POST['check'])) {
	global $connection;
	//$username=$_POST['username'];
	$check2 = "admin@admin.com";
	$email = $_POST['email'];
	$password = $_POST['password'];
	if ($email != NULL && $password != NULL) {
		$query = "select * from user where email='$email' and password='$password'";
		$result = mysqli_query($connection, $query);
		$row = mysqli_fetch_array($result);
		if ($row['email'] == $email && $row['password'] == $password) {
			if ($email == $check2) {
				$_SESSION["admin"] = $row['username'];
				setcookie("admin",$_SESSION["admin"],time()+86400);
			} else {
				$_SESSION["username"] = $row['username'];
				$_SESSION["password"] = $row['password'];
				setcookie("user",$_SESSION["username"],time()+86400);
			}
		} else {
			echo "<script>alert('wrong username or password')</script>";
			echo "<script>location.replace('login.php')</script>";
		}
		if (isset($_SESSION["username"])) {
			header("location:home.php");
		}
		else if(isset($_SESSION["admin"])){
			header("location:admin.php");
		}
	}
}
else if(isset($_POST["sign-in"]))
{
	global $connection;
	//$username=$_POST['username'];
	$check2 = "admin@admin.com";
	$email = $_POST['email'];
	$password = $_POST['password'];
	if ($email != NULL && $password != NULL) {
		$query = "select * from user where email='$email' and password='$password'";
		$result = mysqli_query($connection, $query);
		$row = mysqli_fetch_array($result);
		if ($row['email'] == $email && $row['password'] == $password) {
			if ($email == $check2) {
				$_SESSION["admin"] = $row['username'];
			} else {
				$_SESSION["username"] = $row['username'];
				$_SESSION["password"] = $row['password'];
			}
		} else {
			echo "<script>alert('wrong username or password')</script>";
			echo "<script>location.replace('login.php')</script>";
		}
		if (isset($_SESSION["username"])) {
			header("location:home.php");
		}
		else if(isset($_SESSION["admin"])){
			header("location:admin.php");
		}
	}
}
?>
<!DOCTYPE html>
<link rel="stylesheet" href="css/login.css">
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Log In</title>
</head>

<body>
	<div class="container" id="container">
		<div class="form-container sign-up-container">
			<form action="#" method="post">
				<h1>Create Account</h1>
				<input type="text" placeholder="Name" name="username" required />
				<input type="email" placeholder="Email" name="email" required />
				<input type="password" placeholder="Password" name="password" required />
				<button type="submit" name="sign-up">Sign Up</button>
			</form>
		</div>
		<div class="form-container sign-in-container">
			<form action="#" method="post">
				<h1>Sign in</h1>
				<input type="email" placeholder="Email" name="email" required />
				<input type="password" placeholder="Password" name="password" required />
				<div class="group">
					<input id="check" type="checkbox" class="check" name="check" checked>
					<label for="check">
						<p>Remember Me</p>
					</label>
				</div>
				<button type="submit" name="sign-in">Sign In</button>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-left">
					<h1>Welcome Back!</h1>
					<p>Already have an account?</p>
					<button class="ghost" id="signIn">Sign In</button>
				</div>
				<div class="overlay-panel overlay-right">
					<h1>Hello There!</h1>
					<p>Enter your details and start your journey with us</p>
					<button class="ghost" id="signUp">Sign Up</button>
				</div>
			</div>
		</div>
	</div>
	<script src="js/login.js"></script>
</body>

</html>