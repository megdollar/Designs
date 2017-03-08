 var listItem = document.getElementsByClassName("listItem");

 for(i = 0; i < listItem.length; i++){
 	listItem[i].style.display = "list-item";
 };

var $iW = $(window).innerWidth();

    if ($iW <= 767) {
        $('.navAbout').insertBefore('.navMenu');
    } 
    

  $(window).resize(function(){
	if ($(window).width() <= 767){	
		$('.navAbout').insertBefore('.navMenu');
	}	else {
		$('.navAbout').insertAfter('.main');
	}
});