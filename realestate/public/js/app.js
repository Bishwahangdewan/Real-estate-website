

//sticky class add
let navbar = document.querySelector("#navbar");
window.onscroll = function(){
    if(pageYOffset > 50){
        navbar.classList.add('bg-change');
    }else{
        navbar.classList.remove('bg-change');
    }
}


