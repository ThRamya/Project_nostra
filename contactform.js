/*click toggle it display side navbar*/
document.querySelector(".navbar-menu-toggle").addEventListener("click",function(){
    let sidenavbar=document.querySelector(".side-navbar")
    sidenavbar.style.left="0";
    
})

/*close side navbar*/
document.querySelector(".x-navbar").addEventListener("click",function(){
   let sidenavbar=document.querySelector(".side-navbar")
    sidenavbar.style.left="-60%";
    
})

/*contact form*/
document.getElementById("fname").addEventListener("keyup",function(e){
    e.preventDefault();
    const Npattern= /^[a-zA-Z]+([ \-'][a-zA-Z]+)*$/;
    let f_name=document.getElementById("fname").value.trim();
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
document.getElementById("textarea").addEventListener("keyup",function(e)
{    
    e.preventDefault();
    let email=document.getElementById("textarea").value.trim();
    let Errortextarea=document.getElementById("msgError");
    if(email==="")
    {
        Errortextarea.textContent="Empty! enter name";
    }
    else{
        Errortextarea.textContent="";
    }
});

document.getElementById("contact-form").addEventListener("submit",function(e)
{
    e.preventDefault();

    let fullname=document.getElementById("fname").value.trim();
    let email=document.getElementById("email").value.trim();
    let msg=document.getElementById("textarea").value.trim();

    if(fullname==""||email==""||msg=="")
    {
        alert("Please fill all fields correctly!");
        return;
    }
    else{
    let form_data=new FormData();
    form_data.append("fname",fullname);
    form_data.append("email",email);
    form_data.append("textarea",msg);

    fetch("save_contact.php",{
        method:"POST",
        body:form_data
    })
    .then(response=>response.text())
    .then(data=>{
        data = data.trim();
        console.log("PHP response:", data); 
        if(data==="success")
        {
             window.location.href = "success.html"; 
        }
        else
        {
            alert("Error Saving your message! PHP response: " + data);
        }
    })
    .catch(error=>{
    console.error(error);
    alert("Network error!");
    });
   
}
});
    