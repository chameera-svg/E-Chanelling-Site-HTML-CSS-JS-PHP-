
let indicator = document.querySelector(".indicator");
let input = document.querySelector(".input");
let weak = document.querySelector(".weak");
let medium = document.querySelector(".medium");
let strong = document.querySelector(".strong");
let text = document.querySelector(".text");
let hideShowBtn = document.querySelector(".hideShowBtn");

let regExpWeak = /[a-z]/;
let regExpmedium = /\d+/;
let regExpstronge = /.[!,@,#,$,%,^,&,*,(,)]/;
var level;



function vallpass(){
	var a = document.getElementById("input").value;
	var b = document.getElementById("copass").value;
 

	if (a=="") {
		document.getElementById("message").innerHTML="** Please Fill password";
		return false;
	}
	if (a.length < 8) {
		document.getElementById("message").innerHTML="** Password Length Must Be Greater Than 8 character";
		return false;
	}
	if (a!=b) {
		document.getElementById("messages").innerHTML="** Password Are Not Same";
		return false;
	}
}	


function trigger() {
	          var bbb = document.getElementById("input").value;             

			if (bbb.value !=""){

				indicator.style.display = "block";
				indicator.style.display = "flex";

				

				if 
					(bbb.length <=3) {
					level=1;
					
				}
				
				else if (bbb.length <=6 ){
					level=2;
			    }
				else  {
					level=3;
				}
				
				
				if(level==1){
					weak.classList.add("active");
					document.getElementById("t").style.display="block";
                    
					text.textContent = "Your password is too weak";
					text.classList.add("weak");
					
			    } 
				   else{
					weak.classList.remove("active");
					text.classList.remove("weak");
				}

				if(level==2){
					weak.classList.add("active");
					medium.classList.add("active");
					document.getElementById("t").style.display="block";
					text.textContent = "Your password is too medium";
					text.classList.add("medium");
				}
				 else{
					medium.classList.remove('active');
					text.classList.remove("medium");
				}

				if(level==3){
					weak.classList.add("active");
					medium.classList.add("active");
					strong.classList.add("active");
					document.getElementById("t").style.display="block";
					text.textContent = "Your password is strong";
					text.classList.add("strong");
				} else {
					strong.classList.remove("active");
					text.classList.remove("strong");
				}

				hideShowBtn.style.display="block";
				hideShowBtn.onclick = function(){
					if (document.getElementById("input").type=="password") {
						document.getElementById("input").type = "text";
						hideShowBtn.textContent="HIDE";
					} else{
						document.getElementById("input").type="password";
						hideShowBtn.textContent="SHOW";
					}
				}	

             

             }
            else{
             	weak.classList.remove("active");
				text.classList.remove("weak");
             	indicator.style.display = "none";
             	text.style.display = "none";
             	hideShowBtn.style.display="none";
             	

             }

}		    