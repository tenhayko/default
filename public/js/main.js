jQuery(document).ready(function($) {
    $(document).mouseup(function(e) {
	var container = $("#searchUserResul");

	// if the target of the click isn't the container nor a descendant of the container
	if (!container.is(e.target) && container.has(e.target).length === 0) 
	{
	    container.removeClass('user-sidebar-open');
	}
    });
});
