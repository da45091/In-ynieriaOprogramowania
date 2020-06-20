<?php
	
	session_start();
	
	if((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header("Location: glowny.php");
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
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<script type="text/javascript" src="script.js"></script>
	</head>
	<body>
		<div id="gora">
			<div id="logo">
				<a href="index.php"><img class="logo" src="foto/mma_1-logo.png" alt="logo mma"/></a>
			</div>
		</div>
		<div id="tresc_logowania">
			<div id="logowanie">
				<p class="tekst_3"><b>Logowanie</b></p>
					<div id="form_logowania">
						<form action="javascript:funkcja()" method="POST">
							<p>Login</p> 
							<input type="text" name="login"/> </br> 
							<p>Hasło</p> 
							<input type="password" name="haslo"/> </br> 
							<input class="button" type="submit" value="Zaloguj"/>
						</form>		
					</div>
			</div>
		</div>
		<div id="stopka">
			<p id="tekst_2">Copyright &copy; Adam Doczekalski & Adam Gawlik</p>
		</div>
	</body>
</html>