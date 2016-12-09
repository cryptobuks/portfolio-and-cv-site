var language = document.getElementsByTagName('html').lang;

if (language === "sv") {

}


window.onload = function() {
  window.addEventListener("scroll", navSlide);


  setTimeout(function() {
    $("#lanugage-flag").fadeOut(6000);}
    ,45000);
}

function navSlide() {
  var a = document.body.scrollTop;
  var b = document.body.scrollHeight - document.body.clientHeight;
  var c = (a / b);
  document.getElementById('main-fake-nav').style.transform = "translateX(" + ((c*100)-6) + "vw)";
}
