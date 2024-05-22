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
				
				<?php if(!isset($_SESSION['authenticated'])) :?>
					If you want to join in then register <a href="/register.php">here</a>!<br>
				<?php endif ?>
				
				<?php if(isset($_SESSION['authenticated'])) :?>
					Congrats! You are on the list!<br>
				<?php endif ?>
				
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
									echo "<td><b><a href='/users/$username/skin_$username.png'>$username</a></b></td>";
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