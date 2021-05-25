var ins = document.getElementById("ins");
var close = document.getElementById("close");
var modalbg = document.querySelector(".modal-bg");;
var ver = document.getElementById("ver");
var from = document.querySelector(".modal");
ins.addEventListener("click",function(){
		modalbg.classList.add("bg-active");
	});
close.addEventListener("click",function(){
		modalbg.classList.remove("bg-active");
	});


