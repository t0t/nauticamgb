/*
	jQuery for All-AJAX theme
	Original JavaScript by Chris Coyier
	Updated October 2010 by Stewart Heckenberg & Chris Coyier
	Updated May 2011 by Chris Coyier
	Updated Sep 2012 by Jeff Starr
*/

// Self-Executing Anonymous Function to avoid more globals
(function(){

	// home link isn't dynamic, so default set class name to it to match how dynamic classes work in WordPress
	$(".home li.home").removeClass("home").addClass("current_page_item");

	// add spinner via JS, cuz would never need it otherwise
	$('body').append("<img src='"+ base +"/wp-content/themes/nauticamgb-ajax/assets/img/loading.gif' id='ajax-loader' />");

	// set variables
	var 
	$mainContent     = $("#main-content"),
	$ajaxSpinner     = $("#ajax-loader"),
	$searchInput     = $("#s"),
	$allLinks        = $("a"),
	$el;

	// auto-clear search field
	$searchInput.focus(function(){
		if ($(this).val() === "Search..."){
			$(this).val("");
		}
	});

	// query search results
	$('#searchform').submit(function(){
		var s = $searchInput.val().replace(/ /g, '+');
		if (s){
			var query = '/?s=' + s;
			$.address.value(query);
		}
		return false;
	});

	// If odd number of categories, add a fake one
	if ($(".widget_categories li").length%2 !== 0){
		$(".widget_categories ul").append("<li><a>&nbsp;</a></li>");
	}

	// If odd number of tags, add a fake one
	if ($(".widget_tag_cloud a").length%2 !== 0){
		$(".widget_tag_cloud").append("<a>&nbsp;</a>");
	}

	// URL internal is via plugin http://benalman.com/projects/jquery-urlinternal-plugin/
	$('a:urlInternal').live('click', function(e){ 

		$el = $(this); // Caching

		if ((!$el.hasClass("comment-reply-link")) && ($el.attr("id") !== 'cancel-comment-reply-link')){	
			var path = $(this).attr('href').replace(base, '');
			$.address.value(path);
			$(".current_page_item").removeClass("current_page_item");
			$allLinks.removeClass("current_link");
			$el.addClass("current_link").parent().addClass("current_page_item");
			return false;
		}
		// Default action (go to link) prevented for comment-related links (which use onclick attributes)
		e.preventDefault();
	});

	// Fancy ALL AJAX Stuff
	$.address.change(function(event){  
		if (event.value){
			$ajaxSpinner.fadeIn();
			$mainContent.empty().load(base + event.value + ' #inside', function(){
				$ajaxSpinner.fadeOut('fast');
				$mainContent.fadeIn('fast');
			});
		}
		var current = location.protocol + '//' + location.hostname + location.pathname;
		if (base + '/' !== current) {
			var diff = current.replace(base, '');
			location = base + '/#' + diff;
		}
	});

})(); // End SEAF