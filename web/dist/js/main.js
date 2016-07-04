$(document).ready(function() {

	$(document).scroll(function() {
	  if ($(document).scrollTop() >= 150) {
	    $('#topcontrol').show();
	  } else {
	    $('#topcontrol').hide();
	  }
	});

    $("#topcontrol").click(function (){
        $('html, body').animate({
            scrollTop: $('html, body').offset().top
        }, 1000);
        return false;
    });
    //expand-contract side filters
    $('.menu-left-heading').on('click', '#expandContractFilter', function(event) {
    	event.preventDefault();
    	/* Act on the event */
    	var $content = $('#filterByMore');
    	$content.slideToggle(500, function () {
	        return $content.is(":visible") ? $('#expandContractFilter').css('background-image', "url(dist/img/contract-filter.png)") : $('#expandContractFilter').css('background-image', "url(dist/img/expand-filters.png)");
	    });
    });

    //nationnality
    //expand-contract side filters
    $('.menu-left-heading').on('click', '#expandNationnality', function(event) {
        event.preventDefault();
        /* Act on the event */
        var $content = $('#filterByNationnality');
        $content.slideToggle(500, function () {
            return $content.is(":visible") ? $('#expandNationnality').css('background-image', "url(dist/img/contract-filter.png)") : $('#expandNationnality').css('background-image', "url(dist/img/expand-filters.png)");
        });
    });

	$(document).ready(function() {
        $(".fancybox").fancybox();
    });

   

});