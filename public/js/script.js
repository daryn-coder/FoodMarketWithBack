var total_price=0;
var itd=1;
var order=[];
function onClick(){
   document.location.reload();
}

function Message(){
   total_price=0;
   itd=1;

   document.getElementById("adhome").style.display="none";
   document.getElementById("basket").innerHTML=empty;
   
   document.querySelector(".order").disabled=true;
   removeAllChildNodes(document.getElementById("payment-content"));
}

function removeAllChildNodes(parent) {
   while (parent.firstChild) {
       parent.removeChild(parent.firstChild);
   }
}
function Added(arg){
   arg.innerHTML=added;
}
function mouseover(arg){
   arg.innerHTML=add;
}
function AddToBasket(arg1,arg2){
   var d=document.createElement("div");
   var e=document.createElement("img");
   
   d.id=itd+".z";
   e.src=url;
   d.innerHTML=arg1+txt+arg2+"";
   d.appendChild(e);
   d.style.fontSize="large";
   d.style.padding="10px";
   e.style.width="15px";
   e.style.height="15px";
   e.style.float="right";  
   d.style.maxWidth="100%";
   d.style.borderBottom="dotted";
   document.getElementById("payment-content").appendChild(d);
   document.getElementById("adhome").style.display="block";
   document.getElementById("basket").innerHTML=basket;

   document.querySelector(".order").disabled=false;
   
   var price=arg2.split(" ")[0];
   order[itd]=parseInt(price);
   
   itd++;
   total_price+=parseInt(price);

   e.setAttribute('onclick','removeOrder(this)');
   document.getElementById("totalMark").innerHTML=total_price+"tg";

}
function removeOrder(arg){
   var price=order[parseInt(arg.parentElement.id.split(".")[0])];
   total_price-=price;
   document.getElementById("totalMark").innerHTML=total_price+"tg";
   arg.parentElement.remove();
   if(!document.getElementById("payment-content").hasChildNodes()){ 
      document.querySelector(".order").disabled=true;
      document.getElementById("adhome").style.display="none";
      document.getElementById("basket").innerHTML=empty;
   }
}
function Menu(arg){
      switch(arg.textContent){
         case "Fast-Food":
            document.getElementById("top").style.display="none";
            document.getElementById("top").innerHTML=fastfood;
            $("#top").fadeIn("slow");
            $(".menubar").fadeOut("slow");
            $("#Fast-Food").fadeIn("slow");
         break;
         case "Meat":
            document.getElementById("top").style.display="none";
            document.getElementById("top").innerHTML=meat;
            $("#top").fadeIn("slow");
            $(".menubar").fadeOut("slow");
            $("#Meat").fadeIn("slow");  
         break;
         case "Fruits":
            document.getElementById("top").style.display="none";
            document.getElementById("top").innerHTML=fruit;
            $("#top").fadeIn("slow");
            $(".menubar").fadeOut("slow");
            $("#Fruits").fadeIn("slow");
         break;
         case "Drinks":
            document.getElementById("top").style.display="none";
            document.getElementById("top").innerHTML=drink;
            $("#top").fadeIn("slow");
            $(".menubar").fadeOut("slow");
            $("#Drinks").fadeIn("slow");
         break;
         case "Salad":
            document.getElementById("top").style.display="none";
            document.getElementById("top").innerHTML=salad;
            $("#top").fadeIn("slow");
            $(".menubar").fadeOut("slow");
            $("#Salad").fadeIn("slow");
         break;
         case "DairyFoods":
            document.getElementById("top").style.display="none";
            document.getElementById("top").innerHTML=dayrifood;
            $("#top").fadeIn("slow");
            $(".menubar").fadeOut("slow");
            $("#DairyFoods").fadeIn("slow");
         break;
         case "FishAndSeafood":
            document.getElementById("top").style.display="none";
            document.getElementById("top").innerHTML=fish;
            $("#top").fadeIn("slow");
            $(".menubar").fadeOut("slow");
            $("#FishAndSeafood").fadeIn("slow");
         break;
         default:
            document.getElementById("top").style.display="none";
            document.getElementById("top").innerHTML=pizza;
            $("#top").fadeIn("slow");
            $(".menubar").fadeOut("slow");
            $("#Pizza").fadeIn("slow");            
   }
}
function load(){
   $("body").animate({opacity: '1'},"slow");
}
function logIn(){
   document.querySelector(".form").style.display="flex";
   $(".form").animate({opacity:'1'},"slow");
   $(".main").fadeOut();
}
function Close(){
   document.querySelector(".letter").style.display="none";
   $(".form").fadeOut(); 
   $(".main").fadeIn();
}