<?php
    session_start();

    $dane_do_zwrotu["error"] = 0;
    $dane_do_zwrotu["connect_error"] = 0;
    $dane_do_zwrotu["login_error"] = 0;
    $dane_do_zwrotu["haslo_error"] = 0;

    if ($_POST["log"])
    {

        
        if ($_POST["login"] && $_POST["haslo"])
        {
            require_once "connect.php";

            $db = new mysqli($host, $db_user, $db_password, $db_name);

            if ($db->connect_errno!=0)
            {
                $dane_do_zwrotu["error"] = 1;
                $dane_do_zwrotu["connect_error"] = 1;
            }
            else
            {
                $login = $_POST['login'];
                $haslo = $_POST['haslo'];

                $login = htmlentities($login, ENT_QUOTES, "UTF-8");
                $haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");

                if ($wynik = $db->query(sprintf("SELECT * FROM users WHERE login='%s'", $db->real_escape_string($login))))
                {
                    $ilu_userow = $wynik -> num_rows;
                    if($ilu_userow==1)
                    {
                        $wiersz = $wynik -> fetch_assoc();

                        if($wiersz["haslo"] == $db->real_escape_string($haslo))
                        {
                            $_SESSION['zalogowany']=true;
                            $_SESSION['id']=$wiersz['id'];
                            $_SESSION['user'] = $wiersz['login'];
                            $wynik -> close();
                        }
                        else
                        {
                            $dane_do_zwrotu["error"] = 1;
                            $dane_do_zwrotu["haslo_error"] = 1;
                        }
                    }
                    else
                    {
                        $dane_do_zwrotu["error"] = 1;
                        $dane_do_zwrotu["login_error"] = 1;
                    }
                }
                else
                {
                    $dane_do_zwrotu["error"] = 1;
                    $dane_do_zwrotu["connect_error"] = 1;
                }
                $db -> close();
            }

        }
        else
        {
            $dane_do_zwrotu["error"] = 1;

            if (!$_POST["login"]) $dane_do_zwrotu["login_error"] = 1;
            if (!$_POST["haslo"]) $dane_do_zwrotu["haslo_error"] = 1;
        }
    }
    else
    {
        $dane_do_zwrotu["error"] = 1;
        $dane_do_zwrotu["connect_error"] = 1;
    }

    echo json_encode($dane_do_zwrotu);