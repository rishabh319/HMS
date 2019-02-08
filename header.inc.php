<?php
include_once "db.php";
session_start();

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>HMS</title>

		<link rel="stylesheet" href="test.css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	</head>
	<body>
		<div class="container">
			<header class="header">
			<img src="img/Logo.png" alt="logo" class="logo"/>
			<h1 class="header1">HOSTEL MANAGEMENT SYSTEM</h1>
			</header>
			
			<div class="navbar">
				<a class="active" href="hostel.php"><i class="fa fa-fw fa-home"></i> Home</a> 
				<a href="hostel.php"><i class="fa fa-fw fa-building"></i>Hostel</a> 
				<a href="student.php"><i class="fa fa-fw fa-group"></i>Student</a> 
				
				<div style="float:right; padding-right:20px">
					<a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Logout</a>
					<a href="#"><i class = "fa fa-fw fa-user"></i><?php echo $_SESSION['username'];?></a>
			    </div>

				<section>
				</section>
				
				<aside>
				</aside>
				
				
			</div>
		</div>
	</body>
</html>