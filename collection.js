document.addEventListener("DOMContentLoaded", function(){

//console.log("JS Loaded");
/*click toggle it display side navbar*/

let menuBtn=document.querySelector(".navbar-menu-toggle");
let sidenavbar=document.querySelector(".side-navbar");
if(menuBtn && sidenavbar){
      menuBtn.addEventListener("click",function(){
            sidenavbar.style.left="0";
               
 })
 }

/*close side navbar*/

let closeBtn=document.querySelector(".x-navbar");
  if(closeBtn && sidenavbar){
         closeBtn.addEventListener("click",function(){
                  sidenavbar.style.left="-60%";
           
  })

  }
               
/*Search*/
var productContainer=document.getElementById("product");

if(productContainer){

var productList=productContainer.getElementsByClassName("product-wrapper");

let searchInput = document.getElementById("search");
if(searchInput)
{
searchInput.addEventListener("keyup",function(e){
     console.log("Typing:", e.target.value);  
     var enteredVal=e.target.value.toUpperCase().trim();
    
     for(let i=0;i<productList.length;i++){
        //console.log(productList.length);
        var productname=productList[i].getElementsByTagName("h3")[0].textContent.trim();
        if(productname.toUpperCase().indexOf(enteredVal)<0)
        {
          productList[i].style.display="none";
        }
        else{
             productList[i].style.display="inline-block";
        }
     }

})
} } });