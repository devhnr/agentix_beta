const header = document.querySelector('.header');

window.onscroll = function(){
	var top = window.scrollY;
	console.log(top);
	if (top >= 30){
		header.classList.add('headactive');
	}else{
	header.classList.remove('headactive');
	}
}
