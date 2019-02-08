				<div class="tb">
					<h2 id="h1" style="text-align:center;">Hostel 1</h2>
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
									<tr>
										<td><?php echo $rooms['hostel_no'] ?></td>
										<td><?php echo $rooms['room_no'] ?></td>
										<td><?php if(!empty($rooms['sname1'])){echo $rooms['sname1'].'<a href = "#" class="stud_info"><i class="fa fa-eye"></i></a>';} ?></td>
										<td><?php if(!empty($rooms['sname2'])){echo $rooms['sname2'].'<a href = "#" class="stud_info"><i class="fa fa-eye"></i></a>';} ?></td>
										<td><?php if(!empty($rooms['sname3'])){echo $rooms['sname3'].'<a href = "#" class="stud_info"><i class="fa fa-eye"></i></a>';} ?></td>
										<td><?php if(!empty($rooms['sname4'])){echo $rooms['sname4'].'<a href = "#" class="stud_info"><i class="fa fa-eye"></i></a>';} ?></td>
										<td class="status">
											<?php
											if(!empty($rooms['sname1'])&&!empty($rooms['sname2'])&&!empty($rooms['sname3'])&&!empty($rooms['sname4'])){
												echo '<a href="#" class= btn_danger>Not Available</a>';
											}
											else{
												echo '<a href="student.php" class= btn_success>Available</a>';
											}
											?>
										</td>	
										<td>
											<form method="POST"><button class = "action" onclick="return confirm('Are you Sure?')">Request</button></form>
										</td>
									</tr>
								<?php
								}
							}?>
						</tbody>
					</table>	
				</div>