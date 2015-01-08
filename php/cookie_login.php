<?php

// Bejelentkezési Cookie létezésének ellenőrzése
if(isset($_COOKIE['loginName']) && isset($_COOKIE['loginId']))
{
	$cookieLoginName = $_COOKIE['loginName'];
	$cookieLoginId = $_COOKIE['loginId'];
	
	$isSetCookie = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username='$cookieLoginName' AND sessionID='$cookieLoginId'"));
	
	if($isSetCookie==1)
	{
		$_SESSION['sessionLoginName'] = $cookieLoginName;
	}		
}

// Bejelentkezési Session létezésének ellenőrzése
if (isset($_SESSION['sessionLoginName']))
{
	if($isPageRequireLogin == false)
	{
		header("location:posts.php");
	}
}
else
{
	if($isPageRequireLogin == true)
	{
		header("location:index.php");
	}
}
?>