<?php

$sessionLoginName = $_SESSION["sessionLoginName"];

$sqlPostsSelectResult = mysql_query("SELECT * FROM $tblName2");
$postsData = mysql_fetch_assoc($sqlPostsSelectResult);

// Form elküldöttségének ellenőrzése
if(isset($_POST["hiddenField"]))
{
	if(postsCheck())
	{
		$postContentUnstripped = mysql_real_escape_string($_POST['txtContent']);
		$postContent = strip_tags($postContentUnstripped);
		
		if(!mysql_query("INSERT INTO $tblName2 ($tbl2B, $tbl2C) VALUES ('$sessionLoginName', '$postContent')"))
			{
				showJsAlertbox('Hiba történt az adatok feldolgozása közben, próbáld újra!');
				header("location:posts.php");
			}
			else
			{
				header("location:posts.php");
			}
	}
	else
	{
		header("location:posts.php");
	}
}

function postsCheck()
{
	if($_POST['txtContent'] == "")
	{
		showJsAlertbox('Nem töltöttél ki minden mezőt!');
		return false;
	}
	return true;
}

// Javascript allertbox függvény
function showJsAlertbox($alertMessage)
{
	?>
	<script type="text/javascript">
	alert("<? echo$alertMessage; ?>"); 
	</script>
    <?
}
?>