/*name validation*/
document.getElementById("uname").addEventListener("keyup",function(e){
    e.preventDefault();
    const Npattern= /^[a-zA-Z]+([ \-'][a-zA-Z]+)*$/;
    let f_name=document.getElementById("uname").value.trim();
    let Errorname=document.getElementById("nameError")
    if(f_name==="")
    {
        Errorname.textContent="It is empty and enter your name"
    }
    else if(!Npattern.test(f_name)){
        Errorname.textContent="Enter alphabet value only"
    }
    else if(f_name.length<3){
        Errorname.textContent="Enter atleast 3 letter"
    }
    else{
        Errorname.textContent="";
    }

});


/*email validation */
document.getElementById("email").addEventListener("keyup",function(e)
{    
    e.preventDefault();
    const Epattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    let email=document.getElementById("email").value.trim();
    let Erroremail=document.getElementById("emailError");
    if(email==="")
    {
        Erroremail.textContent="Empty! enter name";
    }
    else if(!Epattern.test(email))
    {
        Erroremail.textContent="enter a valid email [for example: dbcourse@gmail.com]";
    }
    else{
        Erroremail.textContent="";
    }
});

 /*Mobile Number Validation*/
document.getElementById("mobile_no").addEventListener("input", function (e) {
let num = document.getElementById("mobile_no").value.trim();
let Error5=document.getElementById("phoneError")
if(num===""){
         Error5.textContent="Fill number"
}
if ((num.length<10)||(num.length>10)) {
         Error5.textContent="Enter only 10 number";
 }
else {
         Error5.textContent="";
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
