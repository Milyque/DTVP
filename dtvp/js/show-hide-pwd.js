
const allbtn = document.querySelectorAll(".showHide-pwd");

allbtn.forEach((button) => {
	const forElement = document.getElementById(button.dataset.for);

	if (forElement && forElement instanceof HTMLInputElement) {
		["mousedown", "touchstart"].forEach((eventName) => {
			button.addEventListener(eventName, () => {
				forElement.setAttribute("type", "text");
			});
		});

		["mouseup", "mouseleave", "touchend", "touchcancel"].forEach((eventName)=>{
			button.addEventListener(eventName, (e) => {
				e.preventDefault();
				forElement.setAttribute("type", "password");
			})
		})
	}

});

