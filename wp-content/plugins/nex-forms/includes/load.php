<?php
if ( ! defined( 'ABSPATH' ) ) exit;


ini_set('display_errors', '0');
error_reporting(0);
	
	
include_once( 'classes/class.install.php');
include_once( 'classes/class.db.php');
include_once( 'classes/class.functions.php');
include_once( 'classes/class.export.php');
include_once( 'classes/class.icons.php');
include_once( 'classes/class.googlefonts.php');
include_once( 'classes/class.dashboard.php');
include_once( 'classes/class.builder.php');
include_once( 'classes/class.preferences.php');


function enqueue_nf_admin_scripts($hook) {
   
   $js_version = '.23';
   
	wp_enqueue_script('jquery');
	wp_enqueue_style('jquery-ui');
	wp_enqueue_script('nf-tinymce',includes_url( '/js/tinymce/tinymce.min.js'));
	wp_enqueue_style('nf-admin-color-adapt',  plugins_url( '/nf-admin/css/color_adapt/'.get_user_option( 'admin_color' ).'.css',dirname(__FILE__)));
	wp_enqueue_script('jquery-ui-core');
	wp_enqueue_script('jquery-ui-widget');
	wp_enqueue_script('jquery-ui-mouse');
	wp_enqueue_script('jquery-ui-sortable');
	wp_enqueue_script('jquery-ui-draggable');
	wp_enqueue_script('jquery-ui-droppable');
	wp_enqueue_script('jquery-ui-resizable');
	wp_enqueue_script('jquery-ui-slider');
	wp_enqueue_script('jquery-ui-autocomplete');
	wp_enqueue_script('jquery-form');
	
	wp_enqueue_script('jquery-form',plugins_url( '/nf-admin/css/jquery-ui-base.css',dirname(__FILE__)));

	/* Custom Includes */
	if($hook=='toplevel_page_nex-forms-dashboard')
		{
		wp_enqueue_script('nex-forms-charts',plugins_url( '/nf-admin/js/chart.min.js?v7.5.4'.$js_version,dirname(__FILE__)));
		wp_enqueue_script('nex_forms-materialize.min',plugins_url('/nf-admin/js/materialize.js?v7.5.4'.$js_version,dirname(__FILE__)));
		wp_enqueue_script('formilise-js-init',plugins_url('/nf-admin/js/dashboard.js?v7.5.4'.$js_version,dirname(__FILE__)));
		wp_enqueue_script('nex-forms-global-settings',plugins_url('/nf-admin/js/global-settings.js?v7.5.4'.$js_version,dirname(__FILE__)));
		wp_enqueue_script('nex-forms-pref',plugins_url('/nf-admin/js/preferences.js?v7.5.4'.$js_version,dirname(__FILE__)));
		wp_enqueue_script('nex-forms-admin-functions',plugins_url('/nf-admin/js/admin-functions.js?v7.5.4'.$js_version,dirname(__FILE__)));
		wp_enqueue_script('nex-forms-gcharts','https://www.gstatic.com/charts/loader.js?v7.5.4'.$js_version);
		}
		
	if($hook=='nex-forms_page_nex-forms-builder')
		{
		wp_enqueue_script('nex-forms-builder',plugins_url('/nf-admin/js/builder.js?v7.5.4'.$js_version,dirname(__FILE__)));		
		wp_enqueue_script('nex_forms-materialize.min',plugins_url('/nf-admin/js/materialize.js?v7.5.4'.$js_version,dirname(__FILE__)));
		wp_enqueue_script('nex-forms-bootstrap.min',plugins_url('/nf-admin/js/bootstrap-admin.js?v7.5.4'.$js_version,dirname(__FILE__)));
		wp_enqueue_script('nex-forms-bootstrap-tour.min',plugins_url('/nf-admin/js/bootstrap-tour.min.js?v7.5.4'.$js_version,dirname(__FILE__)));
		wp_enqueue_script('nex-forms-drag-and-drop',plugins_url('/nf-admin/js/drag-and-drop.js?v7.5.4'.$js_version,dirname(__FILE__)));
		wp_enqueue_script('nex-forms-field-settings',plugins_url('/nf-admin/js/field-settings.js?v7.5.4'.$js_version,dirname(__FILE__)));
		wp_enqueue_script('nex-forms-admin-functions',plugins_url('/nf-admin/js/admin-functions.js?v7.5.4'.$js_version,dirname(__FILE__)));
		wp_enqueue_script('nex-forms-bootstrap.colorpickersliders',plugins_url('/nf-admin/js/bootstrap.colorpickersliders.js?v7.5.4'.$js_version,dirname(__FILE__)));
		wp_enqueue_script('nex-forms-tinycolor-min',plugins_url('/nf-admin/js/tinycolor-min.js?v7.5.4'.$js_version,dirname(__FILE__)));
		wp_enqueue_script('nex-forms-conditional-logic',plugins_url('/nf-admin/js/conditional_logic.js?v7.5.4'.$js_version,dirname(__FILE__)));
		wp_enqueue_script('nex-forms-wow',plugins_url('/nf-admin/js/wow.min.js?v7.5.4'.$js_version,dirname(__FILE__)));
		wp_enqueue_script('nex-forms-admin-tour',plugins_url('/nf-admin/js/tour.js?v7.5.4'.$js_version,dirname(__FILE__)));
		//FRONT+BACK
		
		/* BS DATETIME */
		wp_enqueue_script('nex-forms-moment.min', plugins_url('/js/moment.min.js?v7.5.4'.$js_version,dirname(__FILE__)));
		wp_enqueue_script('nex-forms-locales.min',plugins_url('/js/locales.js?v7.5.4'.$js_version,dirname(__FILE__)));
		wp_enqueue_script('nex-forms-date-time',plugins_url('/js/bootstrap-datetimepicker.js?v7.5.4'.$js_version,dirname(__FILE__)));
		
		
		wp_enqueue_script('nex-forms-raty',plugins_url('/js/jquery.raty-fa.js?v7.5.4'.$js_version,dirname(__FILE__)));
		wp_enqueue_script('nex-forms-fields',plugins_url('/js/fields.js?v7.5.4'.$js_version,dirname(__FILE__)));
		wp_enqueue_script('bootstrap-material-datetimepicker', plugins_url( '/js/bootstrap-material-datetimepicker.js?v7.5.4'.$js_version,dirname(__FILE__)));
		
		wp_enqueue_script('jqui-timepicker', plugins_url( '/js/jqui-timepicker.js?v7.5.4'.$js_version,dirname(__FILE__)));
		
		wp_enqueue_script('nex-forms-bootstrap.touchspin', plugins_url( '/js/jquery.bootstrap-touchspin.js?v7.5.4'.$js_version,dirname(__FILE__)));
		}
}

function enqueue_nf_admin_styles($hook) {
	/* CSS */
	
	$css_version = '.23';
	
	if($hook=='toplevel_page_nex-forms-dashboard')
		{
		wp_enqueue_style('nex_forms-materialize.min',plugins_url('/nf-admin/css/materialize-dashboard.css?v7.5.4'.$css_version,dirname(__FILE__)));
		wp_enqueue_style('nex_forms-bootstrap.min',plugins_url('/nf-admin/css/bootstrap.min.css?v7.5.4'.$css_version,dirname(__FILE__)));
		wp_enqueue_style('nex_forms-dashboard',plugins_url('/nf-admin/css/dashboard.css?v7.5.4'.$css_version,dirname(__FILE__)));
		//FRONT+BACK
		wp_enqueue_style('nex_forms-font-awesome-5',plugins_url('/css/fa5/css/all.min.css?v7.5.4'.$css_version,dirname(__FILE__)));
		wp_enqueue_style('nex_forms-font-awesome-4-shims',plugins_url('/css/fa5/css/v4-shims.min.css?v7.5.4'.$css_version,dirname(__FILE__)));
		wp_enqueue_style('nex_forms-animations',plugins_url('/css/animate.css?v7.5.4'.$css_version,dirname(__FILE__)));
		}
	if($hook=='nex-forms_page_nex-forms-builder')
		{
		wp_enqueue_style('nex_forms-builder',plugins_url('/nf-admin/css/builder.css?v7.5.4'.$css_version,dirname(__FILE__)));
		wp_enqueue_style('nex_forms-bootstrap.min',plugins_url('/nf-admin/css/bootstrap.min.css?v7.5.4'.$css_version,dirname(__FILE__)));
		wp_enqueue_style('nex-forms-bootstrap-tour.min',plugins_url('/nf-admin/css/bootstrap-tour.min.css?v7.5.4'.$css_version,dirname(__FILE__)));
		
		wp_enqueue_style('nex-forms-admin-bootstrap.colorpickersliders',plugins_url('/nf-admin/css/bootstrap.colorpickersliders.css?v7.5.4',dirname(__FILE__)));
		//FRONT+BACK
		wp_enqueue_style('nex-forms-jq-ui',plugins_url('/css/jquery-ui.min?v7.5.4'.$css_version,dirname(__FILE__)));
		wp_enqueue_style('nex-forms-animate',plugins_url('/css/animate.css?v7.5.4'.$css_version,dirname(__FILE__)));
		wp_enqueue_style('nex-forms-fields',plugins_url('/css/fields.css?v7.5.4'.$css_version,dirname(__FILE__)));
		wp_enqueue_style('nex-forms-ui',plugins_url('/css/ui.css?v7.5.4'.$css_version,dirname(__FILE__)));
		
		wp_enqueue_style('nex_forms-font-awesome-5',plugins_url('/css/fa5/css/all.min.css?v7.5.4'.$css_version,dirname(__FILE__)));
		wp_enqueue_style('nex_forms-font-awesome-4-shims',plugins_url('/css/fa5/css/v4-shims.min.css?v7.5.4'.$css_version,dirname(__FILE__)));
		
		wp_enqueue_style('nex_forms-materialize.min',plugins_url('/css/materialize-ui.css?v7.5.4'.$css_version,dirname(__FILE__)));
		wp_enqueue_style('nf-md-checkbox-radio',plugins_url('/css/material-checkboxradio.css?v7.5.4'.$css_version,dirname(__FILE__)));
		
		wp_enqueue_style('nf-nouislider',plugins_url('/css/nouislider.css?v7.5.4'.$css_version,dirname(__FILE__)));
		wp_enqueue_style('bootstrap-material-datetimepicker', plugins_url( '/css/bootstrap-material-datetimepicker.css?v7.5.4'.$css_version,dirname(__FILE__)));
		
		wp_enqueue_style('jqui-timepicker', plugins_url( '/css/jqui-timepicker.css?v7.5.4'.$css_version,dirname(__FILE__)));
		}
}
add_action( 'admin_enqueue_scripts', 'enqueue_nf_admin_scripts' );
add_action( 'admin_enqueue_scripts', 'enqueue_nf_admin_styles' );

?>