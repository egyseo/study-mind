<?php

if (!defined('ABSPATH')){
    exit;
}

function wpc_get_site_data(){
	global $l, $wp_config, $error;
	
	$return = array();

	$type = wpc_optGET('type');

	$return['wordpress_current_version'] = wpc_version_wp();

	if($type == 'plugins'){
		$return['active_plugins'] = wpc_get_option('active_plugins');
		$all_plugins = wpc_get_plugins();

		foreach($all_plugins as $pk => $pv){
			$installed_version = $pv['Version'];
		}

		$outdated_plugins = wpc_get_outdated_plugins();

		$outdated_plugins_keys = array_keys($outdated_plugins);
		foreach($all_plugins as $allk => $allv){
			if(in_array($allk, $outdated_plugins_keys)){
				$all_plugins[$allk]['new_version'] = $outdated_plugins[$allk]->new_version;
			}
		}

		$return['all_plugins'] = $all_plugins;
		
	}elseif($type == 'themes'){
		
		$return['active_theme'] = array_keys(wpc_get_active_theme());
		$return['all_themes'] = wpc_get_installed_themes();
		
	}else{
		$return['error'] = $l['invalid_params'];
	}

	echo json_encode($return);

}
