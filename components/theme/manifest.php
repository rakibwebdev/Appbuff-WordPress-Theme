<?php if (!defined('ABSPATH')) die('Direct access forbidden.');

$manifest = array();

$manifest[ 'name' ]			 = esc_html__( 'appbuff', 'appbuff' );
$manifest[ 'uri' ]			 = esc_url( 'http://themeforest.com/user/XpeedStudio' );
$manifest[ 'description' ]	 = esc_html__( APPBUFFF_THEME, 'appbuff' );
$manifest[ 'version' ]		 = APPBUFFF_VERSION;
$manifest[ 'author' ]			 = 'XpeedStuio';
$manifest[ 'author_uri' ]		 = esc_url( 'http://themeforest.com/user/XpeedStudio' );
$manifest[ 'requirements' ]	 = array(
	'wordpress' => array(
		'min_version' => APPBUFFF_MINWP_VERSION,
	),
);

$manifest[ 'id' ] = 'scratch';

$manifest[ 'supported_extensions' ] = array(
	'backups'		 => array(),
);


?>
