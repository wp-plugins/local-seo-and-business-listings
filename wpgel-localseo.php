<?php/*Plugin Name: Local SEO and Business ListingsPlugin URI: http://www.localadworks.comDescription: Optimize your website with a Step By Step Actionable Local SEO Guide, a host of Local SEO Tools, and identify missing or incorrect business listings.Version: 3.0Author: Rob GelhausenAuthor URI: http://www.wpgel.com/rob-gelhausenLicense: GPL2*//* * Assign Global Variable*/$wpgel_plugin_url = plugin_dir_url( __FILE__ );$options = array();/* * Adds a link to the Admin Menu for the Plugin settings. * This link is located at 'Settings > Local SEO' */function wpgel_localseo_menu() {	global $wpgel_localseo_settings_page;	$wpgel_localseo_settings_page = add_menu_page(		'Local SEO Dashboard',				/* Page Name */		'Local SEO',						/* Menu Link */		'manage_options',					/* Required User Role */		'wpgel-localseo',					/* Menu Slug */		'wpgel_localseo_options_page'		/* Function Name */	);		}add_action( 'admin_menu', 'wpgel_localseo_menu' );/* * Menu Page Content*/function wpgel_localseo_options_page() {		if( !current_user_can( 'manage_options' ) ) {		wp_die( 'You do not have sufficient permissions to access this page.' );	}		global $wpgel_plugin_url;	global $options;		if( isset( $_POST['wpgel_localseo_form_submitted'] ) ) {		$hidden_field = esc_html( $_POST['wpgel_localseo_form_submitted'] );		if( $hidden_field == 'Y' ) {			$wpgel_localseo_name 			= esc_html( $_POST['wpgel_localseo_name'] );			$wpgel_localseo_address 		= esc_html( $_POST['wpgel_localseo_address'] );			$wpgel_localseo_city 			= esc_html( $_POST['wpgel_localseo_city'] );			$wpgel_localseo_state 			= esc_html( $_POST['wpgel_localseo_state'] );			$wpgel_localseo_zip 			= esc_html( $_POST['wpgel_localseo_zip'] );			$wpgel_localseo_phone 			= esc_html( $_POST['wpgel_localseo_phone'] );			$wpgel_localseo_website 		= esc_html( $_POST['wpgel_localseo_website'] );			$wpgel_localseo_googleplus 		= esc_html( $_POST['wpgel_localseo_googleplus'] );			$wpgel_localseo_youtube 		= esc_html( $_POST['wpgel_localseo_youtube'] );						$options['wpgel_localseo_name']			= $wpgel_localseo_name;			$options['wpgel_localseo_address']		= $wpgel_localseo_address;			$options['wpgel_localseo_city']			= $wpgel_localseo_city;			$options['wpgel_localseo_state']		= $wpgel_localseo_state;			$options['wpgel_localseo_zip']			= $wpgel_localseo_zip;			$options['wpgel_localseo_phone']		= $wpgel_localseo_phone;			$options['wpgel_localseo_website']		= $wpgel_localseo_website;			$options['wpgel_localseo_googleplus']	= $wpgel_localseo_googleplus;			$options['wpgel_localseo_youtube']		= $wpgel_localseo_youtube;			$options['last_updated']				= time();						update_option( 'wpgel_localseo_options', $options );					}	}		$options = get_option( 'wpgel_localseo_options' );	if( $options != '' ) {				$wpgel_localseo_name = $options['wpgel_localseo_name'];		$wpgel_localseo_address = $options['wpgel_localseo_address'];		$wpgel_localseo_city = $options['wpgel_localseo_city'];		$wpgel_localseo_state = $options['wpgel_localseo_state'];		$wpgel_localseo_zip = $options['wpgel_localseo_zip'];		$wpgel_localseo_phone = $options['wpgel_localseo_phone'];		$wpgel_localseo_website = $options['wpgel_localseo_website'];		$wpgel_localseo_googleplus = $options['wpgel_localseo_googleplus'];		$wpgel_localseo_youtube = $options['wpgel_localseo_youtube'];	}		require( 'inc/options-page-wrapper.php' );	}function wpgel_localseo_styles() {	$wpgel_plugin_url = plugin_dir_url( __FILE__ );	wp_enqueue_style( 'wpgel_localseo_styles', $wpgel_plugin_url . 'css/wpgel-localseo.css' );	}add_action( 'admin_head', 'wpgel_localseo_styles' );function wpgel_localseo_bootstrap_styles($hook) {	global $wpgel_localseo_settings_page;	$wpgel_plugin_url = plugin_dir_url( __FILE__ );      if   ( $hook == $wpgel_localseo_settings_page ) {           wp_enqueue_style( 'wpgel_localseo_bootstrap_styles', $wpgel_plugin_url . 'css/bootstrap.min.css');		  wp_enqueue_script( 'wpgel_localseo_bootstrap_script', $wpgel_plugin_url . 'js/bootstrap.min.js');      }}add_action('admin_enqueue_scripts', 'wpgel_localseo_bootstrap_styles');?>