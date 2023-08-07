<?php
// 関連ファイル
wp_register_script('jquery_script', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js', null, null);
wp_register_script('fontawesome', 'https://kit.fontawesome.com/1412b0d71c.js', null, null);

// セットアップ（CSS/JS）
function setup_assets() {
	wp_enqueue_style( 'style', get_template_directory_uri().'/dist/css/style.min.css', array(), '0.0' );
	wp_enqueue_script( 'script', get_template_directory_uri().'/dist/js/script.min.js', array('jquery_script', 'fontawesome'), '0.0', true);
}

// セットアップ
add_action( 'wp_enqueue_scripts', 'setup_assets');
