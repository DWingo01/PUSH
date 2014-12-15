$(document).ready(function(){
    
    //dynamically load content from content.html
    // into .main section
    //$('.dynamic').load('content/content.html'); 
    
    // add eventhandler to more link
    $('.more').click(function(e){
      e.preventDefault();
      $('.dynamic').load('prices.html');
      $(this).remove();
    });
});