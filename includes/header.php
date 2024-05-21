<?php
	$pagename = str_replace(".php", "", basename($_SERVER['PHP_SELF']));
	
	if($pagename != "login" && $pagename != "register" && $pagename != "profile") {
		session_start();
	}	
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<head>
		<link rel="stylesheet" type="text/css" href="/css/style2.css">
		<link rel="shortcut icon" href="/img/favicon.png">
		<title>BlockBase</title>
		
		<?php 
			if($pagename == "users") {
				echo "<style>
				td, th {
	text-align:center;
}

td {
  padding: 10px;
}</style>";
			}
		?>
	</head>
	
	<body>
		<div id="centerpage">
			<div id="toppanel" style="z-index:3;">
				<div class="top_center" style="height:48px; width:100%;">
					<table style="height:48px; width:100%;">
						<tbody>
							<tr>
								<td style="width:270px; height: 48px; padding:0px; top:0px;">
									<div id="prepurchasesplash" style="height: 64px;">        
										<a href="/" border="0">
											<img src="/img/logo_pps.png" width="270" height="64" border="0">
										</a>
									</div>
								</td>
								<td>
									<div id="links">
										<?php 
											
											if($pagename == "index") {
												echo '<a href="/" class="menuItem" style="text-decoration: underline;">Home</a>&nbsp; &nbsp'; 
											} else {
												echo '<a href="/" class="menuItem" style="background: none;">Home</a>&nbsp; &nbsp'; 
											}
											if($pagename == "about") {
												echo '<a href="/about.php" class="menuItem" style="text-decoration: underline;">About</a>&nbsp; &nbsp'; 
											} else {
												echo '<a href="/about.php" class="menuItem" style="background: none;">About</a>&nbsp; &nbsp'; 
											}
											if($pagename == "community") {
												echo '<a href="/community.php" class="menuItem" style="text-decoration: underline;">Community</a>&nbsp; &nbsp'; 
											} else {
												echo '<a href="/community.php" class="menuItem" style="background: none;">Community</a>&nbsp; &nbsp'; 
											}
											if($pagename == "help") {
												echo '<a href="/help.php" class="menuItem" style="text-decoration: underline;">Help</a>&nbsp; &nbsp'; 
											} else {
												echo '<a href="/help.php" class="menuItem" style="background: none;">Help</a>&nbsp; &nbsp'; 
											}
										?>
									</div>
								</td>
								<td>
									<div id="loginpanel">
										<?php if(!isset($_SESSION['authenticated'])) :?>
											<a href="/login.php" class="loginpanel">Log in</a> | 
											<a href="/register.php" class="loginpanel">Register</a>  
										<?php endif ?>
										
										<?php if(isset($_SESSION['authenticated'])) : ?>
											<a href="/profile.php" class="loginpanel"><?= $_SESSION['auth_user']['username']; ?></a> | 
											<a href="/logout.php" class="loginpanel">Logout</a>
										<?php endif ?>
										
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div id="toppanel_bg" style="z-index:1;"></div>