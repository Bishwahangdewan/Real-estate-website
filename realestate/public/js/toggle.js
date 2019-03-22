const toggler = document.querySelector(".icon");
const ul =document.querySelectorAll("#navbar>ul")
console.log(ul);

toggler.addEventListener('click', function(){

	ul.forEach(function(uli){
	if(uli.style.display == 'block'){
		uli.style.display = 'none';
	}else{
		uli.style.display = 'block';
	}
})
})
