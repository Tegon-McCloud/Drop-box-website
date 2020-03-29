
checkTaken();

function checkTaken() {
	let params = new URLSearchParams(location.search);
	if(params.get("taken") === "true"){
		document.getElementById("taken").style.display = "block";
	}
}

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