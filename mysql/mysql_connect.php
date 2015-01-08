<?php
$host = "localhost";		//mysql szerver címe
$username = "testdatabase";	//mysql felhasználónév
$password = "password";		//mysql jelszó
$dbName = "testdatabase";	//mysql adatbázis neve

mysql_connect("$host", "$username", "$password")or die("mysql csatlakozás sikertelen");		//mysql csatlakozás
mysql_select_db("$dbName")or die("adatbázishoz való csatlakozás sikertelen");			//mysql adatbázis választása
?>