<?php

/*
	Plugin Name: Simple Ads Manager
	Plugin URI: https://github.com/ProThoughts/q2a-simple-ads-manager
	Plugin Description: Manage HTML ads
	Plugin Version: 1.0
	Plugin Date: 2014-07-25
	Plugin Author: ProThoughts
	Plugin Author URI: http://www.ProThoughts.com/
	Plugin License: GPLv2
	Plugin Minimum Question2Answer Version: 1.6
	Plugin Update Check URI: https://raw.githubusercontent.com/ProThoughts/q2a-simple-ads-manager/master/qa-plugin.php
*/

	if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
		header('Location: ../../');
		exit;
	}

qa_register_plugin_layer('qa-admanager-layer.php', 'Simple Ads Manager');
qa_register_plugin_module('module', 'qa-admanager-options.php', 'pt_qa_simple_admanager', 'Simple Ads Manager Options');
	
?>