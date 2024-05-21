<?php
	include('includes/header.php');
?>
<div id="page" style="z-index:4;">
	<div id="content">
		<div class="oneColeDiv">
			<h2>Forgot password</h2>
			<p>If you forgot your password or your username, enter your username or email address here, and we will send an email to you with further instructions.<br>
			If you're still having trouble accessing your account, please dont hesitate to <a href="mailto:realoikmo@gmail.com">send me an email</a>.</p>
			<form name="input" action="/forgotpass.php" method="post">
				<table>
					<tbody>
						<tr>
							<td>Username:</td>
							<td><input type="text" name="username"></td>
						</tr>
						<tr>
							<td><i>or</i> Email:</td>
							<td><input type="text" name="email"></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" value="Send email!"></td>
						</tr>
					</tbody>
				</table>
				<br>
			</form>
		</div>
	</div>
	<br>
</div> <!-- page end-->
<?php
	include('includes/footer.php');
?>