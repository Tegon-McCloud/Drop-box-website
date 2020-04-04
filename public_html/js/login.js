
function asyncSendForm() {

	const SUCCESS = 0;
	const INVALID = 1;
	const ERROR = 2;

	$.ajax({
		type: "POST",
		url: "php/authenticate.php",
		data: $("#login-form").serialize(),

		success: function(response) {
			switch(parseInt(response)){
			case SUCCESS:
				window.location.replace("index.php");
				break;
			case INVALID:
				$("#message").text("Invalid username or password.");
				break;
			case ERROR:
				$("#message").text("Serverside error occured. Please try again.");
				break;
			}
		}
	});
}

