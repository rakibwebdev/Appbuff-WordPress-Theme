<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * enqueue static files: javascript and css for backend
 */

//wp_enqueue_style('appbuff-admin', APPBUFFF_CSS . '/appbuff-admin.css', null, APPBUFFF_VERSION);
wp_enqueue_script('appbuff-admin', APPBUFFF_JS . '/appbuff-admin.js', array('jquery'), APPBUFFF_VERSION, true);