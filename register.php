<?php
	session_start();
	if(isset($_SESSION['authenticated'])) {
		header('Location: index.php');
	}
	include('includes/header.php');
?>
<div id="page" style="z-index:4;">
	<div id="content">
	
		<div class="oneColeDiv">
			<form name="input" action="/api.php" method="POST">
				
				<h1>Register a new account</h1><br>
				<?php 
					if(isset($_SESSION['status'])) {
						echo "<h4 style='margin-top:-16px;'>".$_SESSION['status']."</h4>";
						unset($_SESSION['status']);
					}
				?>
				<table>
					<tbody>
						<tr>
							<td>Username:</td>
							<td><input type="text" name="username" value=""></td>
						</tr>
						<tr>
							<td>Password:</td>
							<td><input type="password" name="password1"></td>
						</tr>
						<tr>
							<td>Password again:</td>
							<td><input type="password" name="password2"></td>
						</tr>
						<tr>
							<td>Email:</td>
							<td><input type="text" name="email" value=""></td>
						</tr>
						<tr>
							<td colspan="2"><p>And finally click here: <input type="submit" name="register_btn" value="Register"> (This could take a while, the server is slow)</p></td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
	</div>
	<br>
</div> <!-- page end-->
<?php
	include('includes/footer.php');
?>