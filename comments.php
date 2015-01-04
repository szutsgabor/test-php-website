<?php
session_start();						//session indítása
$isPageRequireLogin = true;
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
        
		<div id="postContainer">
        	<form id="postForm" action="posts.php" name="postForm" method="post">
            	<p>
                	<textarea name="txtContent" class="postForm" form="PostForm" rows="5" placeholder="Mond el mi jár a fejedben?"></textarea>
                </p>
                <p>
               	  <input type="button" name="btnPost" class="loginForm" form="postForm" value="Küldés" >
                </p>
            </form>
            <p class="lineDecoration">
        	</p>
            <div id="postBox">
              <div class="PostBoxTitles">15.01.03 </div>
            	<div class="PostBoxTitles">
                	szutsgabor
            	</div>
                <div class="PostBoxTitles">
                	0 hozzászólás
           	  </div>
                <div class="lineDecorationBlack" style="left: 174px; top: 476px;">
                </div>
              <div id="postBoxContent">
                	<p>
                    	lolxcyc
                        xcxc
                        cxxc
                    </p>
                <p>
                    	lolxcycxcxc
                        xcxcxc
                    </p>
                    <p>
                    	lolxcyc                </p>
              </div>
            </div>
		</div>
	</body>
</html>