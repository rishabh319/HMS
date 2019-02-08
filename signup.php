 <?php 
include 'db.php';
if($_POST){
date_default_timezone_set("INDIA/DELHI");
$sname = $_POST['sname'];
$rollno = $_POST['rollno'];
$email = $_POST['email'];
$dept = $_POST['dept'];
$psw = md5($_POST['psw']);
$cnf_psw = md5($_POST['cnf_psw']);

$sql = "INSERT INTO `user`(`username`, `email`, `password`) VALUES ('$sname', '$email', '$psw')";
$sql2 = "INSERT INTO `student`(`rollno`, `sname`, `dept`, `email`) VALUES ('$rollno', '$sname', '$dept', '$email')";


mysqli_query($connection, $sql) or die('error'.mysqli_error($connection));
mysqli_query($connection, $sql2) or die('error'.mysqli_error($connection));


header('Location:login.php');
}
 ?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="signup.css"/>
		<link rel="stylesheet" href="test.css"/>
		
	</head>
	<body>
		<div class="container">
		    <header class="header">
			<img src="img/Logo.png" alt="logo" class="logo"/>
			<h1 class="header1">HOSTEL MANAGEMENT SYSTEM</h1>
			</header>
			<form action="signup.php" method = "POST">
				<div class = "signup">
					<div class="header_form"><h1>Sign Up</h1></div>
					<p>Please fill in this form to create an account.</p>
					<hr>
					
					<label for="email"><b>Student Name</b></label><br>
					<input type="text" placeholder="Student Name" name="sname" required><br><br>
					
					<label for="email"><b>RollNo.</b></label><br>
					<input type="text" placeholder="RollNo." name="rollno" required><br><br>
					
					<label for="email"><b>Department</b></label><br>
					<input type="text" placeholder="Department" name="dept" required><br><br>
					
					<label for="email"><b>Email</b></label><br>
					<input type="text" placeholder="Email" name="email" required><br><br>
					
					<label for="email"><b>Password</b></label><br>
					<input type="password" placeholder="Password" name="psw" required ><br><br>
					
					<label for="email"><b>Confirm Password</b></label><br>
					<input type="password" placeholder="Confirm Password" name="cnf_psw" required><br><br>
					
					<label>
						<input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
					</label>
					<div class="clearfix">  
					  <button type="submit" class="signupbtn">Sign Up</button>
					</div>				
				</div>
			</form>
		</div>
	</body>
</html>



