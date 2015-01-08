<?php
// Form elküldöttségének ellenőrzése
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(registerCheck())
	{
		$registerUsername = mysql_real_escape_string($_POST['txtUsername']);
		$registerEmail = mysql_real_escape_string($_POST['txtEmail']);
		$registerPassword = mysql_real_escape_string($_POST['txtPassword']);
		
		$registerPassword = md5($registerPassword);

		$sqlNameCheckResult = mysql_query("SELECT * FROM users WHERE username='$registerUsername' OR useremail='$registerEmail'");
		$isUsernameTaken = mysql_num_rows($sqlNameCheckResult);
		if($isUsernameTaken == 1)
		{
			showJsAlertbox('Ezzel a felhasználónévvel vagy E-mail címmel már korábban regisztráltak');
			header("location:register.php");
		}
		else
		{
			if(!mysql_query("INSERT INTO users (username, userpwd, useremail) VALUES ('$registerUsername', '$registerPassword', '$registerEmail')"))
			{
				showJsAlertbox('Sikertelen regisztráció, próbáld újra!');
				header("location:register.php");
			}
			else
			{
				showJsAlertbox('Sikeres regisztráció!');
				header("location:index.php");
			}
			
		}
	}
	else
	{
		header("location:register.php");
	}
}

// Elküldött form ellenőrzése
function registerCheck()
{
	if($_POST['txtUsername'] == "" || $_POST['txtEmail'] == "" || $_POST['txtPassword'] == "" || $_POST['txtRePassword'] == "")
	{
		showJsAlertbox('Nem töltöttél ki minden mezőt!');
		return false;
	}
	
	if($_POST['txtPassword'] != $_POST['txtRePassword'])
	{
		showJsAlertbox('A két beírt jelszó nem egyezik!');
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