<?php
	include('includes/header.php');
	include('dbcon.php');
?>
<div id="page" style="z-index:4;">
	<div id="content">
		<div class="oneColeDiv">
			<div style="height:600px;">
				<br>
				<h2>All users who have registered!</h2>
				If you want to join in then register <a href="/register.php">here</a>!<br>
				<p>
					<br>
					<table style="margin: 0 auto;">
						<tbody>
							<tr>
								<th>Name</th>
								<th>Date joined</th>
							</tr>
							<?php 
								
								$result = mysqli_query($con, "SELECT * FROM users");

								while ($row = mysqli_fetch_assoc($result)) {
									echo "<tr>";
									$username = $row['username'];
									$timejoined = $row['created_at'];
									echo "<td><b>$username</b></td>";
									echo "<td>$timejoined</td>";
									echo "</tr>";
								}
							?>
						</tbody>
					</table>
				</p>
			</div>
		</div>
	</div>
	<br>
</div> <!-- page end-->
<?php
	include('includes/footer.php');
?>