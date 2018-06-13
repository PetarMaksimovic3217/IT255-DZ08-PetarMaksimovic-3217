$(function () {
  $(document).scroll(function () {
    var $nav = $(".navbar-fixed-top");
      var $drugiSection=$(".container");
     var $dropdown=$(".dropdown-menu")
	  
    $nav.toggleClass('scrolled', $(this).scrollTop() > $drugiSection.height());
	$dropdown.toggleClass('skrolovan', $(this).scrollTop() > $drugiSection.height());
     
	  
  });
  
});