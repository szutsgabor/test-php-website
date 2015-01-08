<?php
session_start();						//session indítása
$isPageRequireLogin = false;
include("mysql/mysql_connect.php"); 	//mysql adatokat tároló file beolvasása
include("php/cookie_login.php");		//Cookie bejelentkezés
include("php/forgot_post.php");			//jelsző visszaállítási adatokat feldolgozó php file
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Test website</title>
		<link href="css/style.css" rel="stylesheet" type="text/css">
	</head>
	<script language="javascript" src="js/check.js"></script>

	<body>
		<div id="header">
			<div class="headerTitle"> 
				Test website 
			</div>
		</div>
		<div id="loginContainer">
			<h1>
				Elfelejtett jelszó
			</h1>
			<form id="forgotForm" name="forgotForm" method="post" action="forgot.php">
				<p>
					<input name="txtEmail" type="email" class="loginForm" form="forgotForm" placeholder="E-mail" autocomplete="off">
				</p>
				<p>
					<input type="button" name="btnSubmit" class="loginForm" value="Elküld" onClick="return 		forgotFormCheck(this.form, this.form.txtEmail);">
				</p>
				<p>
					<input type="button" name="btnBack" value="Vissza" class="loginForm" onClick="location.href='index.php'">
				</p>
			</form>
		</div>
	</body>
</html>