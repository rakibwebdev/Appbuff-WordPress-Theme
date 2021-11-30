<?php

function _filter_hostinza_fw_ext_backups_demos( $demos ) {
	$demo_content_installer	 = 'https://wp.xpeedstudio.com/demo-content/hostinza';
	$demos_array			 = array(
		'default'			 => array(
			'title'			 => esc_html__( 'Demo', 'hostinza' ),
			'screenshot'	 => esc_url( $demo_content_installer ) . '/default/screenshot.png',
			'preview_link'	 => esc_url( 'http://themeforest.net/user/xpeedstudio/portfolio' ),
		),
		
	);
	$download_url			 = esc_url( $demo_content_installer ) . '/manifest.php';
	foreach ( $demos_array as $id => $data ) {
		$demo						 = new FW_Ext_Backups_Demo( $id, 'piecemeal', array(
			'url'		 => $download_url,
			'file_id'	 => $id,
		) );
		$demo->set_title( $data[ 'title' ] );
		$demo->set_screenshot( $data[ 'screenshot' ] );
		$demo->set_preview_link( $data[ 'preview_link' ] );
		$demos[ $demo->get_id() ]	 = $demo;
		unset( $demo );
	}
	return $demos;
}


add_filter( 'fw:ext:backups-demo:demos', '_filter_hostinza_fw_ext_backups_demos' );