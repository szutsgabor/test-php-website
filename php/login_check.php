<?php

// Bejelentkezési form elküldöttségének ellenőrzése
if(isset($_POST["hiddenField"]))
{

	if(loginCheck())
	{
		$loginEmail = mysql_real_escape_string($_POST['txtEmail']);
		
		$loginPwd = mysql_real_escape_string($_POST['txtPassword']);
		$loginPwd = md5($loginPwd);
	
		$sqlLoginResult = mysql_query("SELECT * FROM $tblName1 Where $tbl1D='$loginEmail' AND $tbl1C='$loginPwd'");
		$loginData = mysql_fetch_assoc($sqlLoginResult);
		$isLoginDataValid = mysql_num_rows($sqlLoginResult);
	
		if($isLoginDataValid == 1)
		{ 
			$_SESSION["sessionLoginName"] = $loginData[$tbl1B];
		
			$randomLoginId = md5(createRandomId());
		
			setcookie("loginName", $loginData[$tbl1B], time()+600000);
			setcookie("loginId", $randomLoginId, time()+600000);
			
			mysql_query("UPDATE $tblName1 SET $tbl1E = '$randomLoginId' WHERE $tbl1B = '$loginData[$tbl1B]'");
		
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
	alert("<? echo$alertMessage; ?>"); 
	</script>
    <?
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