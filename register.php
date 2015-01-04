<?php
session_start();						//session indítása
$isPageRequireLogin = false;
include("mysql/mysql_connect.php"); 	//mysql adatokat tároló file beolvasása
include("mysql/mysql_columns.php");		//mysql oszlopneveket tároló file beolvasása
include("php/cookie_login.php");		//Cookie bejelentkezés
include("php/reg_check.php");			//bejelentkezési adatokat feldolgozó php file
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
			<h1>Regisztráció</h1>
  	  	  <form id="registerForm" name="registerForm" method="post" action="register.php">
   			<input type="hidden" name="hiddenField" id="hiddenField" form="registerForm">
		  		<p>
		    		<input name="txtUsername" type="text" class="loginForm" form="registerForm" placeholder="Felhasználónév">
   	  	  	  </p>
                <p>
    			  <input name="txtEmail" type="email" class="loginForm" form="registerForm" placeholder="E-mail">
		   	  	</p>
			  	<p>
    		  	  <input name="txtPassword" type="password" class="loginForm" form="registerForm" placeholder="jelszó">
	  	    	</p>
                <p>
    		  	  <input name="txtRePassword" type="password" class="loginForm" orm="registerForm" placeholder="jelszó újra">
	  	    	</p>
			  	<p>
		    	  	<input type="button" name="btnSubmit" class="loginForm" value="Regisztráció" onClick="return registerFormCheck(this.form, this.form.txtUsername, this.form.txtEmail, this.form.txtPassword, this.form.txtRePassword);">
			  	</p>
                <p>
		    	  	<input type="button" name="btnBack" class="loginForm" value="Vissza" onClick="location.href='index.php'">
			  	</p>
	  	  </form>
		</div>
	</body>
</html>