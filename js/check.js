//Bejelentkezési form mezőinek ellenőrzése
function loginFormCheck(form, loginEmail, loginPwd)
{
	//Mezők kitöltöttségének ellenőrzése
	if(loginEmail.value == '' || loginPwd.value == '')
	{
		alert('Nem töltöttél ki minden mezőt!');
		return false;
	}
	
	//E-mail cím formátumának ellenőrzése
	var minta=new RegExp("^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$");
	if(minta.test(loginEmail.value) == false)
	{
		alert('A bejelentkezéshez add meg az E-mail címed!');
		form.loginEmail.focus();
		form.loginEmail.select();
		return false;	
	}
		
	//Form elküldése
	form.submit();
	return true;
}

//Regisztrációs form mezőinek ellenőrzése
function registerFormCheck(form, registerUser, registerEmail, registerPwd, registerRePwd)
{
	//Mezők kitöltöttségének ellenőrzése
	if(registerUser.value == '' || registerEmail.value == '' || registerPwd.value == '' || registerRePwd.value == '')
	{
		alert('Nem töltöttél ki minden mezőt!');
		return false;	
	}
	
	//Felhasználónév hosszának ellenőrzése
	if(registerUser.value.length < 4 || registerUser.value.length > 16)
	{
		alert('A felhasználónév hossza 4 és 16 karakter között kell legyen!');
		form.registerUser.focus();
		form.registerUser.select();
		return false;	
	}
	
	//Felhasználónév karaktereinek ellenőrzése
	var sampleChars = /^\w+$/;
	if(!sampleChars.test(registerUser.value))
	{
		alert('A felhasználónév csak betűket, számokat, és aláhúzásjelet tartalmazhat!');
		form.registerUser.focus();
		form.registerUser.select();
		return false;
	}
	
	//Email cím formátumának ellenőrzése
	sampleChars = new RegExp("^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$");
	if(!sampleChars.test(registerEmail.value))
	{
		alert('A megadott E-mail cím nem megfelelő formátumú!');
		form.registerEmail.focus();
		form.registerEmail.select();
		return false;
	}
	
	//Jelszó hosszának ellenőrzése
	if(registerPwd.value.length < 6)
	{
		alert('A jelszónak minimum 6 karakter hosszúnak kell lennie!');
		form.registerPwd.focus();
		form.registerPwd.select();
		return false;
	}
	
	//Jelszó karaktereinek ellenőrzése
	sampleChars = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
	if(!sampleChars.test(registerPwd.value))
	{
		alert('A jelszónak tartalmaznia kell legalább egy nagybetűt, kisbetűt és egy számot!');
		form.registerPwd.focus();
		form.registerPwd.select();
		return false;	
	}
	
	//A két jelszó egyezésének ellenőrzése
	if(registerPwd.value != registerRePwd.value)
	{
		alert('A két beírt jelszó nem egyezik meg!');
		form.registerRePwd.focus();
		form.registerRePwd.select();
		return false;	
	}
		
	//Form elküldése
	form.submit();
	return true;
}

function forgotFormCheck(form, forgotEmail)
{
	if(forgotEmail.value == '')
	{
		alert('Nem írtad be az E-mail címed');
		form.forgotEmail.focus();
		form.forgotEmail.select();
		return false;
	}
	
	sampleChars = new RegExp("^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$");
	if(!sampleChars.test(forgotEmail.value))
	{
		alert('A megadott E-mail cím nem megfelelő formátumú!');
		form.forgotEmail.focus();
		form.forgotEmail.select();
		return false;
	}
	
	//Form elküldése
	form.submit();
	return true;
}