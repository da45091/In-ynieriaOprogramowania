<?php
	session_start();
	
	if(!isset($_SESSION['zalogowany']))
	{
		header("Location: index.php");
		exit();
	}
	
	
	function database()
	{
		$db = new mysqli('127.0.0.1','mcja','zaq1@WSX','mcja');
		if($db -> connect_errno) return 0;
		else
		{
			$db -> query('set names utf8');
			return $db;
		}
	}

	if($_POST["usun"])
    {
		if($_POST["id_bilet"])
		{
			$id_bilet = $_POST["id_bilet"];
		
			if($db = database())
			{
				$usun = $db->query("DELETE FROM bilet WHERE id_bilet='$id_bilet'");
				if($usun)
				{
					$komunikat = "Bilet został usunięty.";
				}
				else
				{
					$komunikat = "Wpis nie został dokonany z powodu błędu, spróbuj później.";
				}
			}
		}
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
				<p class="tekst_3"><b>Usuwanie biletu</b></p>
				<div id="tabela">
					<?php
						if($s=database())
						{
							$zapytanie = "select * from bilet";
						
							$wynik = $s -> query($zapytanie);
							echo "<table class='trzy'>";
							echo "<tr>";
                            echo "<td>"."Identyfikator"."</td>";
							echo "<td>"."Pesel"."</td>";
							echo "<td>"."Blok"."</td>";
							echo "<td>"."Sektor"."</td>";
							echo "<td>"."Miejsce"."</td>";
							echo "</tr>";
							while($y = $wynik -> fetch_object())
							{
								echo "<tr>";
								echo "<td>".$y-> id_bilet."</td>"."<td>".$y-> pesel."</td>"."<td>".$y-> blok."</td>"."<td>".$y-> sektor."</td>"."<td>".$y-> miejsce."</td>";
								echo "</tr>";
							}
							echo "</table>";
						}
						else
						{
							echo "Połączenie nie zakończyło się sukcesem";
						}
					?>
				</div>
				<div id="przycisk">
						<form name="form" method="POST" action="usun_bilet.php">
							<p>Identyfikator biletu</p>
							<select name="id_bilet">
								<?php
									if($s=database())
									{
										$zapytanie = "select id_bilet from bilet";
									
										$wynik = $s -> query($zapytanie);
										while($y = $wynik -> fetch_object())
										{
											echo "<option>";
											echo $y->id_bilet;
											echo "</option>";
										}
									}
									else
									{
										echo "Połączenie nie zakończyło się sukcesem";
									}									
								?>
							</select> </br> 
							<input class="button_1" type="submit" name="usun" value="Usuń bilet"/>
							 <? if ($komunikat) echo "<p>".$komunikat."</p>" ?>
						</form>
				</div>
			</div>
			</div>
		</div>
		<div id="stopka">
			<p id="tekst_2">Copyright &copy; Adam Doczekalski & Adam Gawlik</p>
		</div>
	</body>
</html>