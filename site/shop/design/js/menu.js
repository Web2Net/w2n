var $log = $( "#log" );
$log.append( "2nd loaded jQuery version ($): " + $.fn.jquery + "<br>" );
/*
(подгружаем новую версию)
*/
jq123 = jQuery.noConflict(true);

$log.append( "<h3>After $.noConflict(true)</h3>" );
$log.append( "1st loaded jQuery version ($): " + $.fn.jquery + "<br>" );
$log.append( "2nd loaded jQuery version (jq123): " + jq123.fn.jquery + "<br>" );


jq123(document).ready(function(){ 
	var touch 	= jq123('#touch-menu');
	var menu 	= jq123('.menu');

	jq123(touch).on('click', function(e) {
		e.preventDefault();
		menu.slideToggle();
	});
	
	jq123(window).resize(function(){
		var w = jq123(window).width();
		if(w > 767 && menu.is(':hidden')) {
			menu.removeAttr('style');
		}
	});
	
});
