/*email validation */
document.getElementById("user_input").addEventListener("keyup",function(e)
{    
    
    const Epattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    const mobilePattern = /^[0-9]{10}$/;

    let userinput=document.getElementById("user_input").value.trim();
    let Erroremail=document.getElementById("emailError");

    if(userinput==="")
    {
        Erroremail.textContent="Empty! enter name";
    }
    else if(!Epattern.test(userinput)&&!mobilePattern.test(userinput))
    {
        Erroremail.textContent="enter a valid email [for example: dbcourse@gmail.com] or 10-digit mobile number";
    }
    else{
        Erroremail.textContent="";
    }
});

/*Password validation*/
 document.getElementById("password").addEventListener("input",function(){
        let Ppattern=/[!@#$%^&*(),.?":{}|<>]/;
        let password=document.getElementById("password").value.trim();
        let Error3=document.getElementById("passError");
        if(password===""){
                Error3.textContent="It is empty!! please enter your password";
            } 
        else if(!Ppattern.test(password)){
                Error3.textContent="Enter pattern like Ramya@11";
         }  
        else if(password.length<8){
                Error3.textContent="password limit not reached";
        }
        else{
             Error3.textContent="";
        }            
    })

