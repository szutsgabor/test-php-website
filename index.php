<?php
session_start();						//session indítása
$isPageRequireLogin = false;
include("mysql/mysql_connect.php"); 	//mysql adatokat tároló file beolvasása
include("mysql/mysql_columns.php");		//mysql oszlopneveket tároló file beolvasása
include("php/cookie_login.php");		//Cookie bejelentkezés
include("php/login_check.php");			//bejelentkezési adatokat feldolgozó php file 
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
	  	  	<h1>Bejelentkezés</h1>
		  <form id="loginForm" name="loginForm" method="post" action="index.php">
       		<input type="hidden" name="hiddenField" value="1" form="loginForm">
		  	<p>
		  		<input name="txtEmail" type="email" class="loginForm" form="loginForm" placeholder="E-mail" autocomplete="off">
		  	</p>
			<p>
	    	  <input name="txtPassword" type="password" class="loginForm" form="loginForm" placeholder="Jelszó">
	  	    </p>
			<p>
	    	  <input type="button" name="btnSubmit" class="loginForm" value="bejelentkezés" onClick="return 		loginFormCheck(this.form, this.form.txtEmail, this.form.txtPassword);">
			</p>
            <p>
				<input type="button" name="btnRegister" value="Regisztráció" class="loginForm" onClick="location.href='register.php'">
			</p>
            <p>
		    	<input type="button" name="btnForgot" value="Elfelejtett jelszó" class="loginForm" onClick="location.href='forgot.php'">
			</p>
		  	</form>
	</div>
	</body>
</html>