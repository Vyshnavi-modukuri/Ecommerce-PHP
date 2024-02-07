/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/JSP_Servlet/JavaScript.js to edit this template
 */
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 1000); // Change image every 2 seconds
}
function change_seemore_color1(){
  document.getElementById("see_more_anchor1").style.color='red';
  
}
function change_seemore_color2(){
  document.getElementById("see_more_anchor1").style.color='#007185';

}
function change_seemore_color3(){
  document.getElementById("see_more_anchor2").style.color='red';
  
}
function change_seemore_color4(){
  document.getElementById("see_more_anchor2").style.color='#007185';

}
function change_seemore_color5(){
  document.getElementById("see_more_anchor3").style.color='red';
  
}
function change_seemore_color6(){
  document.getElementById("see_more_anchor3").style.color='#007185';

}
function change_seemore_color7(){
  document.getElementById("see_more_anchor4").style.color='red';
  
}
function change_seemore_color8(){
  document.getElementById("see_more_anchor4").style.color='#007185';

}
function change_seemore_color9(){
  document.getElementById("see_more_anchor5").style.color='red';
  
}
function change_seemore_color10(){
  document.getElementById("see_more_anchor5").style.color='#007185';

}
function change_seemore_color11(){
  document.getElementById("see_more_anchor6").style.color='red';
  
}
function change_seemore_color12(){
  document.getElementById("see_more_anchor6").style.color='#007185';

}
function change_seemore_color13(){
  document.getElementById("see_more_anchor7").style.color='red';
  
}
function change_seemore_color14(){
  document.getElementById("see_more_anchor7").style.color='#007185';

}
function change_seemore_color15(){
  document.getElementById("see_more_anchor8").style.color='red';
  
}
function change_seemore_color16(){
  document.getElementById("see_more_anchor8").style.color='#007185';

}
function change_seemore_color17(){
  document.getElementById("see_more_anchor9").style.color='red';
  
}
function change_seemore_color18(){
  document.getElementById("see_more_anchor9").style.color='#007185';

}
function change_seemore_color19(){
  document.getElementById("see_more_anchor10").style.color='red';
  
}
function change_seemore_color20(){
  document.getElementById("see_more_anchor10").style.color='#007185';

}
function change_seemore_color21(){
  document.getElementById("see_more_anchor11").style.color='red';
  
}
function change_seemore_color22(){
  document.getElementById("see_more_anchor11").style.color='#007185';}
function change_seemore_color23(){
  document.getElementById("see_more_anchor12").style.color='red'; 
}
function change_seemore_color24(){
  document.getElementById("see_more_anchor12").style.color='#007185';
}

document.getElementById("women").addEventListener("click", function() {
  window.location.href = "women.html"; // Replace with the desired URL
});


