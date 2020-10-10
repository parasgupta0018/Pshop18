var carousel = document.getElementsByClassName('carousel1');
var slider = document.getElementsByClassName('slider2');

var direction;
var i=0;
var j;

var dot=document.getElementsByClassName('dot1');
var dots=document.getElementsByClassName('dots');

dots[0].style.color='orange';

var prevbtn=document.getElementsByClassName('prev-button');
var nextbtn=document.getElementsByClassName('next-button');

function forward() {

  direction = -1;
  carousel[0].style.justifyContent = 'flex-start';
  slider[0].style.transform = 'translate(-20%)';  
    
    var images=document.getElementsByClassName('shop-item-images2');
   
    if((window.innerWidth) > 900){
        
        for(k=0;k<5;k++){
            
            if(k==3){
                images[k].style.height='500px';
                images[k].style.marginTop='-30px';
            }
            else {
                images[k].style.height='430px';
                images[k].style.marginTop='0px';
            }
        }
    }
    else{
        
        for(k=0;k<5;k++){
            
            if(k==3){
                images[k].style.height='60vw';
                images[k].style.marginTop='-30px';
            }
            else {
                images[k].style.height='50vw';
                images[k].style.marginTop='0px';
            }
        }
    }   
        
    if(i==4){
        i=0;
       dot[i].style.color='orange';
        for(j=0;j<5;j++){
            if(j!=i){
            dot[j].style.color='black';
            }
        }
        
    }
    else{
        i++;
        dot[i].style.color='orange';
        for(j=0;j<5;j++){
            if(j!=i){
            dot[j].style.color='black';
            }
        }
        
    }
    
    
}
setInterval(forward(), 3000);
//$(window).resize(function(){
  //  setTimeout(forward(),500);
//})
function backward() {
 
    direction = 1;
      
  slider[0].style.transform = 'translate(20%)';  
    
    var images=document.getElementsByClassName('shop-item-images2');
    if((window.innerWidth)> 900){
        for(k=0;k<5;k++){
            
            if(k==3){
                images[k].style.height='500px';
                images[k].style.marginTop='-30px';
            }
            else {
                images[k].style.height='430px';
                images[k].style.marginTop='0px';
            }
        }
    }
    else{
        for(k=0;k<5;k++){
            
            if(k==3){
                images[k].style.height='60vh';
                images[k].style.marginTop='-30px';
            }
            else {
                images[k].style.height='50vh';
                images[k].style.marginTop='0px';
            }
        }
    }   
    
    if(i==0){
        i=4;
       dot[i].style.color='orange';
        for(j=0;j<5;j++){
            if(j!=i){
            dot[j].style.color='black';
            }
        }
        
    }
    else{
        i--;
        dot[i].style.color='orange';
        for(j=0;j<5;j++){
            if(j!=i){
            dot[j].style.color='black';
            }
        }
        
    }
 
}



slider[0].addEventListener('transitionend', function(){
    
    if(direction==1){
        slider[0].prepend(slider[0].lastElementChild);
    }
    else{
        slider[0].appendChild(slider[0].firstElementChild);
    }
    
    slider[0].style.transition='none';
    slider[0].style.transform='translate(0)';
    setTimeout(repeat,5);
    
    function repeat(){
        slider[0].style.transition='all 0.5s';
    }
}
);

setInterval(forward,6000);



























