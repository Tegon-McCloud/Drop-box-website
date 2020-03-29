
checkInvalid();

function checkInvalid() {
	let params = new URLSearchParams(location.search);
	if(params.get("invalid") === "true"){
		document.getElementById("invalid").style.display = "block";
	}
}