<?php
	include('includes/header.php');
?>
<div id="page" style="z-index:4;">
	<div id="content">
		<div class="oneColeDiv">
			<h2>Downloading the game</h2>
			<p>(ps: alot of this is just copy and paste with a little bit more formatting)</p>
			<h2>Windows:</h2>
				Download <a href="/download/BlockBase-windows.jar">BlockBase-windows.jar</a>, place it anywhere you want, then run it.<br>
			<h2>Multiplayer server software</h2>
				<p>Multiplayer support is currently under heavy development, and is riddled with bugs. You can help test it, though. It will get better soon, I promise!</p>
				If you're running on windows and just want to set up a server easily, download <a href="/download/BlockBase-Server.jar">BlockBase-Server.jar</a>, place it anywhere you want, then run it.
			<br>
				If you want to run the server on any other OS, (we don't have a headless versions yet) it's a bit more involved.<br>
				First, make sure you can use java from the command line. On linux and mac, this should automatically work, but on windows you might want to <a href="https://web.archive.org/web/20101228174457/http://www.java.com/en/download/help/path.xml"></a>set up a PATH system variable.<br>
				Then download <a href="/download/BlockBase-Server.jar">BlockBase-Server.jar</a> to anywhere, then launch it as:<br>
			<code>java -Xmx1024M -Xms1024M -jar BlockBase-Server.jar</code>
			<h1>ALSO MAKE SURE TO MAKE MANUAL BACKUPS!!!!</h1>
		</div>
	</div>
	<br>
</div> <!-- page end-->
<?php
	include('includes/footer.php');
?>