<?php
$sessionLoginName = $_SESSION['sessionLoginName'];

// Form elküldöttségének ellenőrzése
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(postsCheck())
	{
		echo"loler";
		$postContentUnstripped = mysql_real_escape_string($_POST['txtContent']);
		$postContent = strip_tags($postContentUnstripped);
		echo"$postContent";
		if(!mysql_query("INSERT INTO posts (username, content) VALUES ('$sessionLoginName', '$postContent')"))
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

//mezők kitöltöttségének ellenőrzése
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
	alert("<?php echo$alertMessage; ?>"); 
	</script>
    <?php
}
?>