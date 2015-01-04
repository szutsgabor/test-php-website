<?php
$host = "localhost";		//mysql szerver címe
$username = "ermahgerd";		//mysql felhasználónév
$password = "DEpr3z9137";		//mysql jelszó
$dbName = "ermahgerd";		//mysql adatbázis neve

$tblName1 = "users";			//mysql táblák deklarálása változókba
$tblName2 = "posts";	
$tblName3 = "comments";

mysql_connect("$host", "$username", "$password")or die("mysql csatlakozás sikertelen");		//mysql csatlakozás
mysql_select_db("$dbName")or die("adatbázishoz való csatlakozás sikertelen");				//mysql adatbázis választása
?>