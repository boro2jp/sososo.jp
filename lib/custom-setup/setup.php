<?php
// セットアップ
function setup() {
	# カスタム系
	# add_theme_support( 'custom-background' ); // カスタム背景機能の有効化
	# add_theme_support( 'custom-header' ); // カスタムヘッダー機能の有効化
	# add_theme_support( 'custom-logo' ); // カスタムロゴ機能の有効化

	# 出力系
	add_theme_support( 'title-tag' ); // タイトルタグの自動出力
	add_theme_support( 'html5', array( 'search-form', 'caption', 'style', 'script' ) ); # HTML5に準拠した形で出力
	add_theme_support( 'automatic-feed-links' ); // RSSの自動出力
}

add_action( 'after_setup_theme', 'setup' );