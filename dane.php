<!DOCTYPE html>
<html lang=\"pl-PL\">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"> 
    <title>Wyswietlanie z bazy</title>
</head>
    
<body>
<input type="button" value="Refresh Page" onClick="window.location.reload()"></br>
<br/>
<!-- <a href="index.php">Powrót</a> -->
<input type="button" value="Powrót" onClick="location.href='index.html';"></br>
    <br/>    
<div>
    <table width="1000" align="center" border="1" bordercolor="#d5d5d5"  cellpadding="0" cellspacing="0">
        <tr>
        <?php
            // header('refresh: 2;');
            ini_set("display_errors", 0);
            require_once "dbconnect.php";
            $polaczenie = mysqli_connect($host, $user, $password);
            mysqli_query($polaczenie, "SET CHARSET utf8");
            mysqli_query($polaczenie, "SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");
            mysqli_select_db($polaczenie, $database);
            
            $zapytanietxt = "SELECT * FROM uzytkownicy";
            
            $rezultat = mysqli_query($polaczenie, $zapytanietxt);
            $ile = mysqli_num_rows($rezultat);


           
                echo "znaleziono: ".$ile;
                if ($ile>=1) 
                {
                    echo<<<END
                    <td width="20" align="center" bgcolor="e5e5e5">id</td>
                    <td width="100" align="center" bgcolor="e5e5e5">user</td>
                    <td width="100" align="center" bgcolor="e5e5e5">pass</td>
                    <td width="100" align="center" bgcolor="e5e5e5">email</td>
                    </tr><tr>
                    END;
                }

                for ($i = 1; $i <= $ile; $i++) 
                {
                
                $row = mysqli_fetch_assoc($rezultat);
                $a1 = $row['id'];
                $a2 = $row['user'];
                $a3 = $row['pass'];
                $a4 = $row['email'];
                        
                
                echo<<<END
                <td width="20" align="center">$a1</td>
                <td width="100" align="center">$a2</td>
                <td width="100" align="center">$a3</td>
                <td width="100" align="center">$a4</td>
                </tr><tr>
                END;        
                }
            
            echo"</br>";
                    
        ?>
    </tr>
    </table>
</div>
cos tam

</body>
</html>

