/*responsive menu*/
jQuery( document ).ready(function() {
	/*
	var empty = true;
	$('#nextstep').each(function(){
	   if($(this).val()!=""){
	      empty = false;
	      return false;
	    }
	});
    
	if empty = false {*/
	    jQuery('#nextstep').click(function() { console.log('coucou !');
		  jQuery('.acf-field-5ed77561450e9').toggle('slow', function() {
		    // Animation complete.
		  });
		});/*
    }
    else {
    	alert('nope');
    }*/




});




(function () {
  var count = 0;

  $('table').click(function () {
    count += 1;

    if (count == 2) {
      // come code
    }
  });
})();