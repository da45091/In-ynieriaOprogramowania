<?php
	
	session_start();
	
	if(!isset($_SESSION['zalogowany']))
	{
		header("Location: index.php");
		exit();
	}
	
?>
<!DOCTYPE html>
<html lang="pl">
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="style/style.css"/>
		<title>JWW</title>
		<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	</head>
	<body>
		<div id="gora">
			<div id="logo">
				<a href="index.php"><img class="logo" src="foto/mma_1-logo.png" alt="logo mma"/></a>
			</div>
			<div id="wylog">
					<p class="tekst_4">Jesteś zalogowany jako: 
						<?php 
							echo $_SESSION['user'];
						?>
					</p> </br>
					<form action="logout.php" method="POST">
						<input class="button" type="submit" value="Wyloguj" />
					</form>
			</div>
		</div>
		<div id="tresc">
			<div id="lewo">
				<p class="tekst_3"><b>Menu</b></p>
				<div id="menu">
					<ul>
						<li><a class="menu_1" href="kup_bilet.php">Kup bilet</a></li>
						<li><a class="menu_1" href="moje_bilety.php">Moje bilety</a></li>
					</ul>
				</div>
			</div>
			<div id="prawo">
				<p class="tekst_3"><b>NAJBLIŻSZA GALA JUŻ 1 SIERPNIA</b></p>
				<div id="pasek">
					<div id="tekst_4">
						<p><b>Organizator:</b> JWW Federacja </br>
						<b>Miasto:</b> Szczecin  </br>
						<b>Miejsce:</b> NETTO Arena 
						</p>
					</div>
				</div>
				<div id="mapa">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d9502.307594616845!2d14.4939412!3d53.4581492!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2af61b3213f49ba3!2sNetto%20Arena!5e0!3m2!1spl!2spl!4v1592049067042!5m2!1spl!2spl" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				</div>
			</div>
		</div>
		<div id="stopka">
			<p id="tekst_2">Copyright &copy; Adam Doczekalski & Adam Gawlik</p>
		</div>
	</body>
</html>