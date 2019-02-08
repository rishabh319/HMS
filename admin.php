<?php
	include "db.php";
	session_start();
	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>HMS</title>
		<link rel="stylesheet" href="test.css"/>
		<link rel="stylesheet" href="style.css"/>
		<link rel="stylesheet" href="admin.css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<style>
		table {
			font-family: arial, sans-serif;
			border-collapse: collapse;
			width: 100%;
			padding:50px;
		}

		td, th {
			border: 2px solid #dddddd;
			text-align: center;
			padding: 8px;
		}

		tr:nth-child(even) {
			background-color: #dddddd;
		}
	</style>
	</head>
	<body>
		<div class="container1">
			<header class="header">
			<img src="img/Logo.png" alt="logo" class="logo">
			<h1 class="header1">HOSTEL MANAGEMENT SYSTEM</h1>
			</header>
			
			<div class="navbar">
				<a class="active" href="index.php"><i class="fa fa-fw fa-home"></i>Home</a>  
				
				<div style="float:right; padding-right:20px">
					<a href="logout.php"><i class="fa fa-fw fa-power-off"></i>Logout</a>
					<a href=""><i class = "fa fa-fw fa-user"></i><?php echo $_SESSION['username'];?></a>
			    </div>
			</div>
			
			<div style="text-align:center;padding:20px;color:#d32d41"> <h1> Admin's Table </h1> </div>
			<div class="table">
				<table>
					<thead>
						<tr>
							<th>Student Name</th>
							<th>Email</th>
							<th>Hostel No</th>
							<th>Room No</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sql = "SELECT * FROM `request` ";
							$result = mysqli_query($connection, $sql);
							if(mysqli_num_rows($result) > 0)
								while($req = mysqli_fetch_assoc($result)){?>
									<tr>
										<td><?php echo $req['sname']; ?></td>
										<td><?php echo $req['email']; ?></td>
										<td><?php echo $req['hostelno']; ?></td>
										<td><?php echo $req['roomno']; ?></td>
										<form action="admin.php" method="POST">
										<input type="hidden" name="name" value="<?php echo $req['sname'];?>">
										<input type="hidden" name="hostel_no" value="<?php echo $req['hostelno'];?>">
										<input type="hidden" name="room_no" value="<?php echo $req['roomno'];?>">
										
										<td><button type="submit" class="check" onclick="check1()" name="check"><i class = "fa fa-fw fa-check"></i></button>
											<button type="submit" class="close" onclick="close1()" name="close"><i class = "fa fa-fw fa-close"></i></button>
										</td>
										</form>
									<tr> 
								<?php	
								}?>
					</tbody>
				</table>
			</div>
		</div>
		<script>
			function check1(){
			alert('Room is alloted.');
			}
			function close1() {
			alert('Request is cancelled.');
			}
		</script>
	</body>
</html>
<?php

if(isset($_POST['check'])){
	$hostel = $_POST['hostel_no'];
	$room = $_POST['room_no'];
	$name = $_POST['name'];
	$sql = "SELECT * FROM `room`";
	$r1 = mysqli_query($connection, $sql);
	if(mysqli_num_rows($r1) > 0){
		
		while($room1 = mysqli_fetch_assoc($r1)){
			if($room1['hostel_no']==$hostel && $room1['room_no']==$room){
				if(empty($room1['sname1']))
				{	$q1 = "UPDATE `room` SET `sname1`='$name' where `hostel_no`='$hostel' and `room_no`='$room'";
					$q3 = "UPDATE `student` SET `hostelno` = '$hostel', `roomno` = '$room' WHERE `student`.`sname` = '$name';";
					mysqli_query($connection, $q3);
					mysqli_query($connection, $q1);
					$q2 = "DELETE FROM `request` WHERE `sname`='$name'";
					mysqli_query($connection, $q2);
				}
				else if(empty($room1['sname2']))
				{	$q1 = "UPDATE `room` SET `sname2`='$name' where `hostel_no`='$hostel' and `room_no`='$room'";
					$q3 = "UPDATE `student` SET `hostelno` = '$hostel', `roomno` = '$room' WHERE `student`.`sname` = '$name';";
					mysqli_query($connection, $q3);				
					mysqli_query($connection, $q1);
					$q2 = "DELETE FROM `request` WHERE `sname`='$name'";
					mysqli_query($connection, $q2);
				}
				else if(empty($room1['sname3']))
				{	$q1 = "UPDATE `room` SET `sname3`='$name' where `hostel_no`='$hostel' and `room_no`='$room'";
					mysqli_query($connection, $q1);
					$q3 = "UPDATE `student` SET `hostelno` = '$hostel', `roomno` = '$room' WHERE `student`.`sname` = '$name';";
					mysqli_query($connection, $q3);
					$q2 = "DELETE FROM `request` WHERE `sname`='$name'";
					mysqli_query($connection, $q2);
				}
				else if(empty($room1['sname4']))
				{	$q1 = "UPDATE `room` SET `sname4`='$name' where `hostel_no`='$hostel' and `room_no`='$room'";
					mysqli_query($connection, $q1);
					$q3 = "UPDATE `student` SET `hostelno` = '$hostel', `roomno` = '$room' WHERE `student`.`sname` = '$name';";
					mysqli_query($connection, $q3);
					$q2 = "DELETE FROM `request` WHERE `sname`='$name'";
					mysqli_query($connection, $q2);
				}
			}
		}
	}
}
else if(isset($_POST['close'])){
	$name = $_POST['name'];
	echo "<script>alert('Request is cancelled.')</script>";
	$q2 = "DELETE FROM `request` WHERE `sname`='$name'";
	mysqli_query($connection, $q2);
}

?>