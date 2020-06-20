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

	if ($_POST["dodaj"])
    {
        if ($_POST["pesel"]&&$_POST["blok"]&&$_POST["sektor"]&&$_POST["miejsce"])
        {
            $pesel      = $_POST["pesel"];    
            $blok  		= $_POST["blok"];
            $sektor    	= $_POST["sektor"];
            $miejsce     	= $_POST["miejsce"];


            if($db = database())
            {
                $test = $db->query("SELECT * FROM `bilet` WHERE `blok`='$blok' AND `sektor`='$sektor' AND `miejsce`='$miejsce'");
                if (!$test->num_rows)
                {
                    $pesel = $db->real_escape_string(trim(htmlspecialchars($pesel)));
                    $blok = $db->real_escape_string(trim(htmlspecialchars($blok)));
                    $sektor = $db->real_escape_string(trim(htmlspecialchars($sektor)));
                    $miejsce = $db->real_escape_string(trim(htmlspecialchars($miejsce)));

                    $dodaj = $db->query("INSERT INTO `bilet` VALUES('','$pesel','$blok','$sektor','$miejsce')");
                    if ($dodaj)
                    {
                        $komunikat = "Bilet został zamówiony.";
                    }
                    else
                    {
                        $komunikat = "Wpis nie został dokonany z powodu błędu, spróbuj późniejj.";
                    }
                }
                else
                {
                    $komunikat = "To miejsce jest już zajęte.";
                }
            }
            else
            {
                $komunikat = "Wpis nie został dokonany z powodu błędu, spróbuj później.";
            }
        }
        else
        {
            $komunikat = "Wypełnij wszystkie pola.";
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
				<div id="dod_oss">
					<p class="tekst_3"><b>Kup bilet</b></p> </br>
                    <div id="pasek_1">
	                   <img class="sektory" src="foto/sektory.jpg" alt="zdjęcie sektorów"/>   
					</div>
					<form method="POST" action="kup_bilet.php">
					<div id="dod_oss_1">
						<div id="form_dod_oss">
                                <p>PESEL</p> 
                                <input type="number" name="pesel"/> </br> 
								<p>Blok</p> 
                                <select name="blok">
								    <option>A</option>
								</select> </br> 
								<p>Sektor</p> 
								<select name="sektor">
	                               <option>A1</option>
                                   <option>A2</option>
                                   <option>A3</option>
                                   <option>A4</option>
                                   <option>A5</option>
                                   <option>A6</option>
                                   <option>A7</option>
                                   <option>A8</option>   
								</select> </br> 
								<p>Miejsce</p> 
								<select name="miejsce">
									<?php	
                                        for($x=1;$x<=2175;$x++)
                                        {
                                       	    echo "<option>";
				                            echo $x;
				                            echo "</option>";
                                        }								
									?>
								</select> </br> 
                                <input class="button" type="submit" name="dodaj" value="Kup"/>
								<? if ($komunikat) echo "<p>".$komunikat."</p>" ?>
						</div>	
					</div>
					</form>	
				</div>
			</div>
		</div>
		<div id="stopka">
			<p id="tekst_2">Copyright &copy; Adam Doczekalski & Adam Gawlik</p>
		</div>
	</body>
</html>