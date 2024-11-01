jQuery(document).ready(function(){
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

	var totalItems = jQuery('#posts_per_page').val();
	var pluginpath = jQuery('#pluginpath').val();
 	var $owl = jQuery('.owl-carousel');
	$owl.children().each( function( index ) {
	  jQuery(this).attr( 'data-position', index ); // NB: .attr() instead of .data()
	});

	$owl.owlCarousel({
	  center: true,
	  loop: true,
	  items: totalItems,
	  nav: true,
  	  navText: ["<img src='"+pluginpath+"images/preicon.png'>","<img src='"+pluginpath+"images/nexticon.png'>"],
	  margin:0,
	});

	jQuery(document).on('click', '.owl-item>div', function() {
	  $owl.trigger('to.owl.carousel', jQuery(this).data( 'position' ) );
	});

});
