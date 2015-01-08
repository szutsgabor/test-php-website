<?php

// Bejelentkezési form elküldöttségének ellenőrzése
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(loginCheck())
	{
		$loginEmail = mysql_real_escape_string($_POST['txtEmail']);
		
		$loginPwd = mysql_real_escape_string($_POST['txtPassword']);
		$loginPwd = md5($loginPwd);
	
		$sqlLoginResult = mysql_query("SELECT * FROM users WHERE useremail='$loginEmail' AND userpwd='$loginPwd'");
		$loginData = mysql_fetch_assoc($sqlLoginResult);
		$isLoginDataValid = mysql_num_rows($sqlLoginResult);
	
		if($isLoginDataValid == 1)
		{ 
			$_SESSION['sessionLoginName'] = $loginData['username'];
		
			$randomLoginId = md5(createRandomId());
		
			setcookie("loginName", $loginData['username'], time()+600000);
			setcookie("loginId", $randomLoginId, time()+600000);
			
			mysql_query("UPDATE users SET sessionID = '$randomLoginId' WHERE username = '$loginData[username]'");
		
			header("location:posts.php");
		}
		else
		{
			showJsAlertbox('Hibás E-mail címet vagy jelszót adtál meg');
			header("location:index.php");
		}
	}
	else
	{
		header("location:index.php");
	}
}

// Elküldött form ellenőrzése
function loginCheck()
{
	if($_POST['txtEmail'] == "" || $_POST['txtPassword'] == "")
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

// Random karakterlánc generálása
function createRandomId() {

    $usabeleChars = "abcdefghijkmnopqrstuvwxyz0123456789"; 
    srand((double)microtime()*1000000); 
    $i = 0; 
    $pass = ''; 

    while ($i <= 12) 
	{ 
        $num = rand() % 33; 
        $tmp = substr($usableChars, $num, 1); 
        $pass = $pass . $tmp; 
        $i++; 
    } 

    return $pass; 
} 

?>