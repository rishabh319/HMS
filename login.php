<?php
include_once 'db.php';
session_start();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!$email && !$password) {
        header('Location:login.php?empty');
    } else {
        $password = md5($password);
        $query = "SELECT * FROM `user` WHERE username = '$email' OR email='$email' AND password='$password'";
        $query1 = "SELECT * FROM `admin` WHERE username = '$email' AND password='$password'";
		$result1 = mysqli_query($connection, $query1);
		$result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_id'] = $user['id'];
			$_SESSION['email'] = $email;
            header('Location:hostel.php');
        } else if (mysqli_num_rows($result1) == 1) {
            $user = mysqli_fetch_assoc($result1);
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_id'] = $user['id'];
			
            header('Location:admin.php');
        }
        else {
			header('Location:login.php');
		}
    }
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>HMS</title>
		<link rel="stylesheet" href="test.css"/>
		<link rel="stylesheet" href="style.css"/>

	</head>
	<body>
		<div class="container">
			<header class="header">
			<img src="img/Logo.png" alt="logo" class="logo"/>
			<h1 class="header1">HOSTEL MANAGEMENT SYSTEM</h1>
			</header>
				
			<section>
				<div class = 'login-box' >
					<img src="img/avatar.png" class="avatar">
					<h1>Login Here</h1>
					<form action = 'login.php' method = "POST">
					<p>User Id</p>
					<input type="text" name="email" placeholder="Enter username or Email" data-error="Enter Usernamer or Email">
					<p>Password</p>
					<input type="password" name="password" placeholder="Enter Password" data-error="Enter correct password">
					<input type="submit" name="login" value="Login">
					<a href="#">Forget Password?</a><a href='http://localhost/project/signup.php' style='float:right; padding-right:20px'>Sign Up</a>
					</form>   
				</div>
			</section>
			
			<aside>
				
			</aside>
			
			<footer>
			</footer>
		</div>
	</body>
</html>


