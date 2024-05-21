<?php
	session_start();
	if(!isset($_SESSION['authenticated'])) {
		header('Location: index.php');
	}
	include('includes/header.php');
?>
<div id="page" style="z-index:4;">
	<div id="content">
		<div class="oneColeDiv">
			<h1><?=$_SESSION['auth_user']['username']?> Settings</h1>
			<br>
			<?php 
				if(isset($_SESSION['status'])) {
					echo "<h4>".$_SESSION['status']."</h4>";
					unset($_SESSION['status']);
				}
			?>
			<form name="upload" action="/api.php" method="POST" enctype="multipart/form-data">
				<table>
					<tbody>
						<tr>
							<td>Skin (64x64):</td>
							<td><input type="file" name="skin" id="skin"></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" name="upload_btn" value="Upload skin"></td>
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