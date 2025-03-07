<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.isparkinfo.com/
 * @since      1.0.0
 *
 * @package    Wp_wps
 * @subpackage Wp_wps/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wp_wps
 * @subpackage Wp_wps/public
 * @author     Isparkinfo <contact@isparkinfo.com>
 */
class Wp_wps_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		add_shortcode( 'wp_woo_products_slider', array($this, 'wp_woo_products_slider') );
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_wps_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_wps_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp_wps-public.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'owl_css', plugin_dir_url( __FILE__ ) . 'css/owl.carousel.min.css', array(), $this->version, false );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_wps_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_wps_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_script( 'owl', plugin_dir_url( __FILE__ ) . 'js/owl.carousel.min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp_wps-public.js', array( 'jquery' ), $this->version, false );

	}

	public function wp_woo_products_slider($atts){
		include plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/wp_wps-public-display.php';
	//	$html = 'testtt';
	    return $html;
	}

}
