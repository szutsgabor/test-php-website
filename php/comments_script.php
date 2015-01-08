<?php
$sessionLoginName = $_SESSION['sessionLoginName'];
$postID = $_GET['postID'];

$sqlPostResult = mysql_query("SELECT * FROM posts WHERE postID = '$postID'");
$postData = mysql_fetch_assoc($sqlPostResult);

// Form elküldöttségének ellenőrzése
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(commentsCheck())
	{
		$commentContentUnstripped = mysql_real_escape_string($_POST['txtContent']);
		$commentContent = strip_tags($commentContentUnstripped);
		if(!mysql_query("INSERT INTO comments (postID, username, comment) VALUES ('$postID', '$sessionLoginName', '$commentContent')"))
			{
				showJsAlertbox('Hiba történt az adatok feldolgozása közben, próbáld újra!');
				header("location:comments.php?postID=$postID");
			}
			else
			{
				header("location:comments.php?postID=$postID");
			}
	}
	else
	{
		header("location:comments.php?postID=$postID");
	}
}

//mezők kitöltöttségének ellenőrzése
function commentsCheck()
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
	alert("<?php echo$alertMessage; ?>"); 
	</script>
    <?php
}
?>