<?php
	include('includes/header.php');
	include('dbcon.php');
	$stmt = $con->prepare('SELECT * FROM users');
	$stmt -> execute();
	$stmt_result = $stmt->get_result();
	$amount_of_users = 0;
	$amount_of_users = $stmt_result->num_rows;
?>
<div id="page" style="z-index:4;">
	<div id="content">
		<div style="margin-left:0px;">
			<table style="width:900px;">
				<tbody>
					<tr>
						<td style="width:600px;">
							<br><br><br>
							<div class="videoEmbed">
								<iframe width="640" height="385" src="https://www.youtube.com/embed/m_yqOoUMHPg" title="This Is Minecraft" frameborder="0"></iframe>
								<p style="font-size:13px;">
									BlockBase is a game about placing blocks to build anything your nasty little brain can think of!
									It also has music by <a href="https://web.archive.org/web/20101228175514/http://c418.org/" target="_blank">C418</a>! 
									So far <?=$amount_of_users ?> people have registered! 
									<a href="/stats.php">More stats here</a>. You can also find some servers <a href="/servers.php">here</a> and all people registered <a href="/users.php">here</a>!
								</p>
							</div>
						</td>
						<td style="width:300px; text-align:center; vertical-align:text-top;">
							<div style="width: 300px; height:400px; margin-left: 50px; margin-top: -10px; text-align:center;"> 
								<div style="width: 250px; height:230px; margin-left: 0px; margin-top: 70px; text-align:center;">
									<img src="./img/animals.png" alt="Animals" width="300" height="202">
								</div>
								<div style="width: 200px; height:50px; margin-left: 50px; margin-top: 10px; text-align:center;">
									<a class="download-now__button button button--orange" href="/download.php">Download now!</a>
								</div>
								<br><br>
							</div>
						</td>          
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div><!-- page end-->
<br>
		
<?php
	include('includes/footer.php');
?>