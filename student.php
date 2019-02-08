<?php
	include("header.inc.php");
	include("db.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<link href="student.css" rel="stylesheet">
		<style>
			table {
				font-family: arial, sans-serif;
				border-collapse: collapse;
				width: 60%;
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
	<?php
		if(isset($_POST['name'])){
			
			$sname = $_POST['name'];
			$hostel = $_POST['hostel'];
			$room = $_POST['room'];
			$q11 = "SELECT * from `student` where `sname` = '$sname' and hostelno = '$hostel' and roomno = '$room' ";
			$pq = mysqli_query($connection, $q11);
			if(mysqli_num_rows($pq) == 1){
				$inf = mysqli_fetch_assoc($pq)?>
				<div style="text-align:center;padding:20px;color:#d32d41;"> <h1><?php echo $inf['sname'];?></h1> </div>
					<div class="table">
						<table>
							<tr>
								<td>Roll No</td>
								<td><?php echo $inf['rollno'];?><td>
							</tr>
							<tr>
								<td>Department</td>
								<td><?php echo $inf['dept'];?><td>
							</tr>
							<tr>
								<td>Email</td>
								<td><?php echo $inf['email'];?><td>
							</tr>
							<tr>
								<td>Hostel No</td>
								<td><?php echo $inf['hostelno'];?><td>
							</tr>
							<tr>
								<td>Room No</td>
								<td><?php echo $inf['roomno'];?><td>
							</tr>
						</table>
					</div>
				</div>
			<?php	
			}
							
		}
		else{
			$user = $_SESSION['username'];
			$email = $_SESSION['username'];
			$q1 = "SELECT * FROM `student` WHERE `sname` = '$user' OR `email` = '$email'";
			$res = mysqli_query($connection, $q1);
			if(mysqli_num_rows($res) > 0){
				while($info = mysqli_fetch_assoc($res)){?>
					<div style="text-align:center;padding:20px;color:#d32d41;"> <h1><?php echo strtoupper($info['sname']);?></h1> </div>
						<div class="table">
							<table>
								<tr>
									<td>Roll No</td>
									<td><?php echo $info['rollno'];?><td>
								</tr>
								<tr>
									<td>Department</td>
									<td><?php echo $info['dept'];?><td>
								</tr>
								<tr>
									<td>Email</td>
									<td><?php echo $info['email'];?><td>
								</tr>
								<tr>
									<td>Hostel No</td>
									<td><?php echo $info['hostelno'];?><td>
								</tr>
								<tr>
									<td>Room No</td>
									<td><?php echo $info['roomno'];?><td>
								</tr>
							</table>
						</div>
					</div>	
				<?php
				}
			}
		}?>
</body>
</html>