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

