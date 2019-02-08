<?php
include_once("header.inc.php");
include 'db.php';

$q = "SELECT * FROM room";	
$result = mysqli_query($connection, $q);
if (mysqli_num_rows($result) > 0) {
	$flag = 0;
	while ($row = mysqli_fetch_assoc($result)){
		if($row['sname1'] == $_SESSION['username'] || $row['sname2'] == $_SESSION['username'] || $row['sname3'] == $_SESSION['username'] ||
		$row['sname4'] == $_SESSION['username']){
			$flag = 1;
		}
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" href="hostel.css">
	</head>
	<body>
		<!-------------------------------------------------About------------------------------------------------------->
		<div class="About">
			<h1 style="text-align:center; color:black; padding:10px;">ABOUT</h1>
			
			<p style="padding:10px 50px; text-align:left;">National Institute of Technology Sikkim is is functioning successfully since 2010 as an autonomous constituent 
			institute of NIT Sikkim in the line of NITs.It has well furnished and equipped hostels for its students. There are
			2 hostels for Gents and 1 hostel for Ladies.The hostel is administered by a Warden appointed by the Director and 
			he/she is assisted by an Asst. Warden in all matters relating to the hostel.</p>
			
			<p style="padding:10px 50px; text-align:left;">Every student who has been admitted to the institute is required to pay the prescribed hostel seat rent and 
			establishment charges along with a refundable hostel mess caution deposit. These charges are subject to revision
			from time to time. Allotment of rooms to the residents takes place at the end of each academic year when the final 
			year UG and PG students vacate their rooms after completion of their programmes of study. The rooms vacated by the 
			outgoing students are made available by the Warden for other senior residents in the hostel to change their rooms, 
			on request. The change in rooms is effected in accordance with the policy followed by individual hostels and with 
			the Warden's approval. Each room is provided with a cot, a table, a chair, a bookshelf, and a ceiling fan (with regulator)
			. Residents cannot move the furniture or fittings from one room to another. Private cooking in the rooms and owning 
			pets is prohibited.<strong> Smoking, consumption of alcoholic drinks and use of narcotic drugs is strictly prohibited.</strong>
			<p>
			<p style="padding:10px 50px; text-align:left;">The following faclities are provied to every single student : 
				<ul style="padding:10px 60px; list-sytle-type=circle;">
					<li>-Hygienic Kitchen & Dining Hall</li>
					<li>-24/7 full security</li>
					<li>-Good quality food and pure mineral water</li>
					<li>-Round the clock Internet Facility</li>
					<li>-Facility for all types of indoor and outdoor games</li>
					<li>-Hygienic restrooms</li>
					<li>-Flooring with marble tiles</li>
				</ul>
			</p>
		</div>
		<hr>
		<!--------------------------------------View------------------------------------------>
		<div>
		<div class="div1">
			<img src = "img/hostel1.jpg" class="img">
			<div class="view">
				<h2>Hostel 1</h2>
				<a href="#h1"> <button>View</button> </a> 
			</div>		
		</div>
		
		<div class="div2">
			<img src = "img/hostel2.jpg" class="img">
			<div class="view"> 
				<h2>Hostel 2</h2>
				<a href="#h2"> <button>View</button> </a> 
			</div>
		</div>
			
		<div class="div3">
			<img src = "img/hostel3.jpg" class="img">
			<div class="view"> 
				<h2>Hostel 3</h2>
				<a href="#h3"> <button>View</button> </a> 
			</div>
		</div>
		<div style="clear:both;"></div>
		</div>
		<!---------------------------------------Table Hostel1-------------------------------------------->	

					<div class="tb">
					<h2 id="h1" style="text-align:center;">Hostel 1</h2><br><hr><br>
					<table class="table1" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>Hostel No</th>
								<th>Room No</th>
								<th>Student Name1</th>
								<th>Student Name2</th>
								<th>Student Name3</th>
								<th>Student Name4</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$room_query = "SELECT * FROM room";	
							$rooms_result = mysqli_query($connection, $room_query);
							if (mysqli_num_rows($rooms_result) > 0) {
								while ($rooms = mysqli_fetch_assoc($rooms_result)){?>
									<?php
									if($rooms['hostel_no'] == "h-01"){?>
									<tr>
										<td><?php echo $rooms['hostel_no'] ?></td>
										<td><?php echo $rooms['room_no'] ?></td>
										
										<td>									
											<form action="student.php" method="POST">
											<input type="hidden" name = "name" value = "<?php echo $rooms['sname1'];?>">
											<input type="hidden" name = "hostel" value = "<?php echo $rooms['hostel_no'];?>">
											<input type="hidden" name = "room" value = "<?php echo $rooms['room_no'];?>">
											<?php 
												if(!empty($rooms['sname1'])){
													echo $rooms['sname1']?>
														<button class="stud_info" type = "submit"><i class="fa fa-eye"></i></button>
												<?php } ?>
											</form>
												<?phpelse{echo '-';}?>
										</td>
										<td>									
											<form action="student.php" method="POST">
											<input type="hidden" name = "name" value = "<?php echo $rooms['sname2'];?>">
											<input type="hidden" name = "hostel" value = "<?php echo $rooms['hostel_no'];?>">
											<input type="hidden" name = "room" value = "<?php echo $rooms['room_no'];?>">
											<?php 
												if(!empty($rooms['sname2'])){
													echo $rooms['sname2']?>
														<button class="stud_info" type = "submit"><i class="fa fa-eye"></i></button>
												<?php } ?>
											</form>
												<?phpelse{echo '-';}?>
										</td>
										<td>									
											<form action="student.php" method="POST">
											<input type="hidden" name = "name" value = "<?php echo $rooms['sname3'];?>">
											<input type="hidden" name = "hostel" value = "<?php echo $rooms['hostel_no'];?>">
											<input type="hidden" name = "room" value = "<?php echo $rooms['room_no'];?>">
											<?php 
												if(!empty($rooms['sname3'])){
													echo $rooms['sname3']?>
														<button class="stud_info" type = "submit"><i class="fa fa-eye"></i></button>
												<?php } ?>
											</form>
												<?phpelse{echo '-';}?>
										</td>
										<td>									
											<form action="student.php" method="POST">
											<input type="hidden" name = "name" value = "<?php echo $rooms['sname4'];?>">
											<input type="hidden" name = "hostel" value = "<?php echo $rooms['hostel_no'];?>">
											<input type="hidden" name = "room" value = "<?php echo $rooms['room_no'];?>">
											<?php 
												if(!empty($rooms['sname4'])){
													echo $rooms['sname4']?>
														<button class="stud_info" type = "submit"><i class="fa fa-eye"></i></button>
												<?php } ?>
											</form>
												<?phpelse{echo '-';}?>
										</td>
										
										
										<td class="status">
											<?php
											if(!empty($rooms['sname1'])&&!empty($rooms['sname2'])&&!empty($rooms['sname3'])&&!empty($rooms['sname4'])){
												echo '<div class= btn_danger>Not Available</div>';
											}
											else{
												echo '<div class= btn_success>Available</div>';
											}
											?>
										</td>	
																		<td>
									<form method="POST">
									<input type="hidden" name="hostel_no" value="<?php echo $rooms['hostel_no'];?>">
									<input type="hidden" name="room_no" value="<?php echo $rooms['room_no'];?>">
                                       <?php
										if(!empty($rooms['sname1'])&&!empty($rooms['sname2'])&&!empty($rooms['sname3'])&&!empty($rooms['sname4'])){?>
										<button class = "action"  onclick="check1()" >Request</button>	
										<?php }										
										else if($flag == 0){
										?>
											<button class = "action" type="submit" onclick="return confirm('Are you Sure?')" name="req" <?php if(!empty($rooms['sname1'])&&
											!empty($rooms['sname2'])&&!empty($rooms['sname3'])&&!empty($rooms['sname4'])){echo 'disabled';} ?>>Request</button>		
										<?php 
										} 
										else {?>
											<button class = "action"  onclick="check2()" >Request</button>
										<?php
										}?>
									</form>
								</td>
									</tr>
								<?php
									}
								}
							}?>
						</tbody>
					</table>	
				    </div>
					
		<!-----------------------------------------------------------Table Hostel 2 ------------------------------------------------------------------->
		
		<div class="tb">
			<h2 id="h2" style="text-align:center;">Hostel 2</h2><br><hr><br>
			<table class="table1" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Hostel No</th>
						<th>Room No</th>
						<th>Student Name1</th>
						<th>Student Name2</th>
						<th>Student Name3</th>
						<th>Student Name4</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$room_query = "SELECT * FROM room";	
					$rooms_result = mysqli_query($connection, $room_query);
					if (mysqli_num_rows($rooms_result) > 0) {
						while ($rooms = mysqli_fetch_assoc($rooms_result)){ ?>
							<?php
							if($rooms['hostel_no'] == "h-02"){?>
							<tr>
								<td><?php echo $rooms['hostel_no'] ?></td>
								<td><?php echo $rooms['room_no'] ?></td>
								
								
								<td>									
									<form action="student.php" method="POST">
									<input type="hidden" name = "name" value = "<?php echo $rooms['sname1'];?>">
									<input type="hidden" name = "hostel" value = "<?php echo $rooms['hostel_no'];?>">
									<input type="hidden" name = "room" value = "<?php echo $rooms['room_no'];?>">
									<?php 
										if(!empty($rooms['sname1'])){
											echo $rooms['sname1']?>
												<button class="stud_info" type = "submit"><i class="fa fa-eye"></i></button>
										<?php } ?>
									</form>
										<?phpelse{echo '-';}?>
								</td>
								<td>									
									<form action="student.php" method="POST">
									<input type="hidden" name = "name" value = "<?php echo $rooms['sname2'];?>">
									<input type="hidden" name = "hostel" value = "<?php echo $rooms['hostel_no'];?>">
									<input type="hidden" name = "room" value = "<?php echo $rooms['room_no'];?>">
									<?php 
										if(!empty($rooms['sname2'])){
											echo $rooms['sname2']?>
												<button class="stud_info" type = "submit"><i class="fa fa-eye"></i></button>
										<?php } ?>
									</form>
										<?phpelse{echo '-';}?>
								</td>
								<td>									
									<form action="student.php" method="POST">
									<input type="hidden" name = "name" value = "<?php echo $rooms['sname3'];?>">
									<input type="hidden" name = "hostel" value = "<?php echo $rooms['hostel_no'];?>">
									<input type="hidden" name = "room" value = "<?php echo $rooms['room_no'];?>">
									<?php 
										if(!empty($rooms['sname3'])){
											echo $rooms['sname3']?>
												<button class="stud_info" type = "submit"><i class="fa fa-eye"></i></button>
										<?php } ?>
									</form>
										<?phpelse{echo '-';}?>
								</td>
								<td>									
									<form action="student.php" method="POST">
									<input type="hidden" name = "name" value = "<?php echo $rooms['sname4'];?>">
									<input type="hidden" name = "hostel" value = "<?php echo $rooms['hostel_no'];?>">
									<input type="hidden" name = "room" value = "<?php echo $rooms['room_no'];?>">
									<?php 
										if(!empty($rooms['sname4'])){
											echo $rooms['sname4']?>
												<button class="stud_info" type = "submit"><i class="fa fa-eye"></i></button>
										<?php } ?>
									</form>
										<?phpelse{echo '-';}?>
								</td>
								
								
								<td class="status">
									<?php
										if(!empty($rooms['sname1'])&&!empty($rooms['sname2'])&&!empty($rooms['sname3'])&&!empty($rooms['sname4'])){
											echo '<div class= btn_danger>Not Available</div>';
										}
										else{
											echo '<div class= btn_success>Available</div>';
										}
									?>
								</td>	
								<td>
									<form method="POST">
									<input type="hidden" name="hostel_no" value="<?php echo $rooms['hostel_no'];?>">
									<input type="hidden" name="room_no" value="<?php echo $rooms['room_no'];?>">
                                       <?php
										if(!empty($rooms['sname1'])&&!empty($rooms['sname2'])&&!empty($rooms['sname3'])&&!empty($rooms['sname4'])){?>
										<button class = "action"  onclick="check1()">Request</button>	
										<?php }
										else if($flag == 0){
										?>
											<button class = "action" type="submit" onclick="return confirm('Are you Sure?')" name="req" <?php if(!empty($rooms['sname1'])&&
											!empty($rooms['sname2'])&&!empty($rooms['sname3'])&&!empty($rooms['sname4'])){echo 'disabled';} ?>>Request</button>		
										<?php 
										} 
										else {?>
											<button class = "action"  onclick="check2()" >Request</button>
										<?php
										}?>
									</form>
								</td>
							</tr>
					<?php	}
						}
					}?>
				</tbody>
			</table>			
		</div>
	<!--------------------------------------------------------------------Table Hostel 3----------------------------------------------------------------------->
	<div class="tb">
			<h2 id="h3" style="text-align:center;">Hostel 3</h2><br><hr><br>
			<table class="table1" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Hostel No</th>
						<th>Room No</th>
						<th>Student Name1</th>
						<th>Student Name2</th>
						<th>Student Name3</th>
						<th>Student Name4</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$room_query = "SELECT * FROM room";	
					$rooms_result = mysqli_query($connection, $room_query);
					if (mysqli_num_rows($rooms_result) > 0) {
						while ($rooms = mysqli_fetch_assoc($rooms_result)){
							if($rooms['hostel_no'] == "h-03"){?>
							<tr>
								<td><?php echo $rooms['hostel_no'] ;?></td>
								<td><?php echo $rooms['room_no'] ;?></td>
								
								<td>
									<form action="student.php" method="POST">
									<input type="hidden" name = "name" value = "<?php echo $rooms['sname1'];?>">
									<input type="hidden" name = "hostel" value = "<?php echo $rooms['hostel_no'];?>">
									<input type="hidden" name = "room" value = "<?php echo $rooms['room_no'];?>">
									<?php 
										if(!empty($rooms['sname1'])){
											echo $rooms['sname1']?>
												<button class="stud_info" type = "submit"><i class="fa fa-eye"></i></button>
										<?php } ?>
									</form>
										<?phpelse{echo '-';}?>
								</td>
								<td>
									<form action="student.php" method="POST">
									<input type="hidden" name = "name" value = "<?php echo $rooms['sname2'];?>">
									<input type="hidden" name = "hostel" value = "<?php echo $rooms['hostel_no'];?>">
									<input type="hidden" name = "room" value = "<?php echo $rooms['room_no'];?>">
									<?php 
										if(!empty($rooms['sname2'])){
											echo $rooms['sname2']?>
												<button class="stud_info" type = "submit"><i class="fa fa-eye"></i></button>
										<?php } ?>
									</form>
										<?phpelse{echo '-';}?>
								</td>
								<td>
									<form action="student.php" method="POST">
									<input type="hidden" name = "name" value = "<?php echo $rooms['sname3'];?>">
									<input type="hidden" name = "hostel" value = "<?php echo $rooms['hostel_no'];?>">
									<input type="hidden" name = "room" value = "<?php echo $rooms['room_no'];?>">
									<?php 
										if(!empty($rooms['sname3'])){
											echo $rooms['sname3']?>
												<button class="stud_info" type = "submit"><i class="fa fa-eye"></i></button>
										<?php } ?>
									</form>
										<?phpelse{echo '-';}?>
								</td>
								<td>									
									<form action="student.php" method="POST">
									<input type="hidden" name = "name" value = "<?php echo $rooms['sname4'];?>">
									<input type="hidden" name = "hostel" value = "<?php echo $rooms['hostel_no'];?>">
									<input type="hidden" name = "room" value = "<?php echo $rooms['room_no'];?>">
									<?php 
										if(!empty($rooms['sname4'])){
											echo $rooms['sname4']?>
												<button class="stud_info" type = "submit"><i class="fa fa-eye"></i></button>
										<?php } ?>
									</form>
										<?phpelse{echo '-';}?>
								</td>
								
								<td class="status">
									<?php
										if(!empty($rooms['sname1'])&&!empty($rooms['sname2'])&&!empty($rooms['sname3'])&&!empty($rooms['sname4'])){
											echo '<div class= btn_danger>Not Available</div>';
										}
										else{
											echo '<div class= btn_success>Available</div>';
										}
									?>
								</td>
								
								<td>
									<form method="POST">
									<input type="hidden" name="hostel_no" value="<?php echo $rooms['hostel_no'];?>">
									<input type="hidden" name="room_no" value="<?php echo $rooms['room_no'];?>">
                                       <?php
										if(!empty($rooms['sname1'])&&!empty($rooms['sname2'])&&!empty($rooms['sname3'])&&!empty($rooms['sname4'])){?>
										<button class = "action"  onclick="check1()" >Request</button>	
										<?php }										
										else if($flag == 0){
										?>
											<button class = "action" type="submit" onclick="return confirm('Are you Sure?')" name="req" <?php if(!empty($rooms['sname1'])&&
											!empty($rooms['sname2'])&&!empty($rooms['sname3'])&&!empty($rooms['sname4'])){echo 'disabled';} ?>>Request</button>		
										<?php 
										} 
										else {?>
											<button class = "action"  onclick="check2()" >Request</button>
										<?php
										}?>
									</form>
								</td>
							</tr>
					<?php	}
						}
					}?>
				</tbody>
			</table>			
		</div>
	
		<footer style="height:100px;">
			
		</footer>
		<script>
		function check1(){
		alert('This room is not available.');
		}
		function check2(){
		alert('Room is already alloted to you.');
		}
		</script>
	</body>
</html>

<?php 
if(isset($_POST['req'])){
	$hostel = $_POST['hostel_no'];
	$room = $_POST['room_no'];
	$name = $_SESSION['username'];
	$email = $_SESSION['email'];	
	//INSERT INTO `request`(`id`, `sname`, `email`, `hostelno`, `roomno`, `request_status`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6])
	$sql = "INSERT INTO `request`( `sname`, `email`, `hostelno`, `roomno`) VALUES ('$name','$email','$hostel','$room')";	
	if(mysqli_query($connection,$sql)) 	
	echo "<script>alert('Your request has been submitted. Please wait for confirmation.')</script>";	
	else
	echo "<script>alert('You have already submitted a request.Please wait for the confirmation.')</script>";	
}											
?>	