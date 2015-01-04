<?php
session_start();						//session indítása
$isPageRequireLogin = true;
include("mysql/mysql_connect.php"); 	//mysql adatokat tároló file beolvasása
include("mysql/mysql_columns.php");		//mysql oszlopneveket tároló file beolvasása
include("php/cookie_login.php");		//Cookie bejelentkezés
include("php/posts_script.php");		//Postokat feldolgozó php file
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
        
		<div id="postContainer">
        	<form id="postForm" action="posts.php" name="postForm" method="post">
            		<input type="hidden" name="hiddenField" id="hiddenField" form="postForm">
            	<p>
                	<textarea name="txtContent" class="postForm" form="PostForm" rows="5" placeholder="Mond el mi jár a fejedben?"></textarea>
                </p>
                <p>
               	  	<input type="submit" name="btnPost" class="loginForm" form="postForm" value="Küldés">
                </p>
            </form>
            <p class="lineDecoration">
        	</p>
			<? include("php/posts_print.php"); ?>
		</div>
	</body>
</html>