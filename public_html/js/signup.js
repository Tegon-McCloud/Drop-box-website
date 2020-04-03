
function asyncSendForm() {

	const SUCCESS = 0;
	const USERNAME_TAKEN = 1;
	const ERROR = 2;

	alert("creating account")

	let pw = $("#signup-form input[name=password]").val();
	let pwc = $("#signup-form input[name=passwordControl]").val();

	if(pw !== pwc){
		$("#message").text("Please make sure that passwords match.");
		return;
	}

	$.ajax({
		type: "POST",
		url: "php/create_account.php",
		data: $("#signup-form").serialize(),

		success: function(response) {
			switch(parseInt(response)) {
			case SUCCESS:
				window.location.replace("index.php");
				break;
			case USERNAME_TAKEN:
				$("#message").text("This username has already been taken.");
				break;
			case ERROR:
				$("#message").text("Serverside error occured. Please try again.");
				break;
			}
		}
	});
}
