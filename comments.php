<?php
session_start();						//session indítása
$isPageRequireLogin = true;
include("mysql/mysql_connect.php"); 	//mysql adatokat tároló file beolvasása
include("php/cookie_login.php");		//Cookie bejelentkezés
include("php/comments_script.php");		//Kommenteket feldolgozó php file
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
			<div class="PostBoxTitles"> 
				<a href="logout.php">
					kijelentkezés
				</a> 
			</div>
		</div>
		<div id="postContainer">
			<div id="postBox">
				<div class="PostBoxTitles"> 
					<?php echo $postData['postdate']; ?> 
				</div>
				<div class="PostBoxTitles"> 
					<?php echo $postData['username']; ?> 
				</div>
				<div class="PostBoxTitles"> 
					<a href="posts.php">
						Vissza
					</a> 
				</div>
				<div class="lineDecorationBlack"> 
				</div>
				<div id="postBoxContent">
					<p> 
						<?php echo $postData['content']; ?> 
					</p>
				</div>
			</div>
			<form id="commentForm" action="comments.php?postID=<?php echo"$postID"; ?>" name="commentForm" method="post">
				<p>
					<textarea name="txtContent" id="txtContent" wrap="physical" class="postForm" placeholder="Megkommentelem jól"></textarea>
				</p>
				<p>
					<input type="button" name="btnPost" class="loginForm" form="commentForm" value="Küldés" onClick="return 		postFormCheck(this.form, this.form.txtContent);">
				</p>
			</form>
			<p class="lineDecoration"> 
			</p>
			<?php include("php/comments_print.php"); ?>
		</div>
	</body>
</html>