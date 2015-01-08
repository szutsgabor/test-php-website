<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(forgotCheck())
	{
		$forgotEmail = mysql_real_escape_string($_POST['txtEmail']);
		
		$sqlEmailCheckResult = mysql_query("SELECT * FROM users WHERE useremail='$forgotEmail'");
		$isEmailValid = mysql_num_rows($sqlEmailCheckResult);
		if($isEmailValid == 1)
		{
			$newPassword = createRandomPassword();
			$newHashedPassword = md5($newPassword);
			
			if(!mysql_query("UPDATE username SET userpwd = '$newHashedPassword' WHERE useremail = '$forgotEmail'"))
			{
				showJsAlertbox('Új jelszó generálása sikertelen! próbáld újra');
				header("location:forgot.php");
			}
			else
			{
				$emailSubject="Új jelszó"; //email küldése a felhasználónak
				$emailHeader="$forgotEmail"; 
				$emailMessages.="új jelszo: $newPassword \r\n";
				$emailMessages.="email: $forgotemail \r\n";
				mail($forgotEmail,$emailSubject,$emailMessages,$emailHeader);
				
				showJsAlertbox('Új jelszó elküldve a megadott E-mail címre');
				header("location:index.php");
			}
		}
		else
		{
			showJsAlertbox('Nincs regisztrált felhasználó ezzel az E-mail címmel!');
			header("location:forgot.php");
		}
	}
	else
	{
		header("location:forgot.php");	
	}
}


// Elküldött form ellenőrzése
function forgotCheck()
{
	if($_POST['txtEmail'] == "" )
	{
		showJsAlertbox('Nem adtál meg E-mail címet');
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

//Random jelszó generálás
function createRandomPassword() 
{ 
    $usableChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz0123456789"; 
    srand((double)microtime()*1000000); 
    $i = 0; 
    $pass = '' ; 

    while ($i <= 7) { 
        $num = rand() % 33; 
        $tmp = substr($usableChars, $num, 1); 
        $pass = $pass . $tmp; 
        $i++; 
    } 

    return $pass; 
} 
?>