
function validate(form) {
	let pw = form.password.value;
	let pwc = form.passwordControl.value;
	
	if(pw !== pwc){
		form.passwordControl.focus();
		document.getElementById("no-match").style.display = "block";
		return false;
	}

	return true;
}