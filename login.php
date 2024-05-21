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
			<h1>Login</h1>
			<br>
			<?php 
				if(isset($_SESSION['status'])) {
					echo "<h4>".$_SESSION['status']."</h4>";
					unset($_SESSION['status']);
				}
			?>
			<form name="input" action="/api.php" method="POST">
				<table>
					<tbody>
						<tr>
							<td>Username:</td>
							<td><input type="text" name="username"></td>
						</tr>
						<tr>
							<td>Password:</td>
							<td><input type="password" name="password"></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" name="login_now_btn" value="Log in!"></td>
						</tr>
					</tbody>
				</table>
				<br>
				<a href="/register.php">Register an account</a><br>
				<a href="/forgotpass.php">Forgot password?</a>
			</form>
		</div>
	</div>
	<br>
</div> <!-- page end-->
<?php
	include('includes/footer.php');
?>