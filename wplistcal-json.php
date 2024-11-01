<?php
/*
Plugin Name: WPListCal-JSON
Plugin URI: http://www.pimhaarsma.nl/ontwikkeling/wordpress-plugin/wplistcal-json
Description: Plugin for JSON-API for JSON functionality with WPListCal plugin
Version: 1.1
Author: Pim Haarsma
Author URI: http://www.pimhaarsma.nl/
*/

function add_listcal_controller($controllers) {
	$controllers[] = 'listcal';
	return $controllers;
}
add_filter('json_api_controllers', 'add_listcal_controller');

function set_listcal_controller_path() {
	return dirname(__FILE__).'/wplistcal-json-controller.php';
}
add_filter('json_api_listcal_controller_path', 'set_listcal_controller_path');