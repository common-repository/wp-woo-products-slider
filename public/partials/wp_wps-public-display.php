<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://www.isparkinfo.com/
 * @since      1.0.0
 *
 * @package    Wp_wps
 * @subpackage Wp_wps/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<?php 
	extract( shortcode_atts( array (
        'type' => 'post',
        'order' => 'date',
        'orderby' => 'title',
        'posts' => -1,
        'category' => '',
        

    ), $atts ) );

    if($category){   	
    	$args = array(
	        'post_type' => 'product',
	        'order' => $order,
	        'orderby' => $orderby,
	        'posts_per_page' => $posts,
	        'tax_query' => array(
		        array(
		          'taxonomy' => 'product_cat',
		          'field' => 'slug',
		          'terms' => $category
		        )
		    )
	    );
    }else{
    	$args = array(
	        'post_type' => 'product',
	        'order' => $order,
	        'orderby' => $orderby,
	        'posts_per_page' => $posts,
	    );
    }
    
	$products = new WP_Query($args);
	$html = '';
	if($products->have_posts()){
		$html .= '<input type="hidden" value="'.site_url().'/wp-content/plugins/wp_wps/public/" name="pluginpath" id="pluginpath">';
		// $html .= '<input type="hidden" value="'.site_url().'" name="pluginpath" id="pluginpath">';
		$html .= '<input type="hidden" value="'.$posts.'" name="posts_per_page" id="posts_per_page">';
		$html .= '<div class="owl-carousel wooproduct_slider owl-centered">';
		while ($products->have_posts()) {
			$products->the_post();
			$html .= '<div class="product_wrapper">';
			$feat_image_url = wp_get_attachment_url( get_post_thumbnail_id() );
			$html .= '<img src="'.$feat_image_url.'" alt=""></h3>';
			$html .= '<p class="producttitle">'.get_the_title().'</p>';
			$html .= '</div>';
			# code...
		}
		$html .= '</div>';
		wp_reset_query();
	}
?>