
function onDrop(event) {
	event.preventDefault();



	const files = event.dataTransfer.files;
	if(files.length == 0) {
		return;
	}

	if(event.dataTransfer.items.length != files.length) { // this would suggest a directory.
		return; 
	}

	document.forms["files-form"]["files[]"].files = files;
	document.forms["files-form"].submit();
}

function onDragOver(event) {
	event.preventDefault();
}

