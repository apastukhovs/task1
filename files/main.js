$(document).ready(function(){
    
   $(".count-item").spincrement({
       thousandSeparator: "",
       duration: 2000
   }); 
    
$('#about').on('click', function() {
$('.-home').fadeOut();
$('.-contact').fadeOut();
$('.-about').fadeIn();
       //$(".-about").show("slide", { direction: "left" }, 1500);

});
    
$('#contact').on('click', function() {
$('.-home').fadeOut();
$('.-contact').fadeIn();
$('.-about').fadeOut();
       //$(".-about").show("slide", { direction: "left" }, 1500);

});   
    
$('#home').on('click', function() {
$('.-home').fadeIn();
$('.-contact').fadeOut();
$('.-about').fadeOut();
       //$(".-about").show("slide", { direction: "left" }, 1500);

});   

});

