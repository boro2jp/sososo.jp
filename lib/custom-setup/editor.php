<?php
// セットアップ
function setup_editor() {
	# ブロックスタイル機能の有効化
	add_theme_support( 'wp-block-styles' );

	# テーマカスタマイザーでウィジェットを設置した際に自動でリフレッシュ
	# add_theme_support( 'customize-selective-refresh-widgets' );
	# add_theme_support( 'admin-bar', array( 'callback' => '__return_false' ) );
	
	# 編集画面に「幅広」及び「全幅」ボタンを追加
	add_theme_support( 'align-wide' );
	
	# 埋め込み要素をレスポンシブ対応
	add_theme_support( 'responsive-embeds' );

	# エディターでカラーパレットの編集
	# add_theme_support( 'editor-color-palette');

	# エディターで独自のカラーパレットの設定を不可
	add_theme_support( 'disable-custom-colors' ); 
	
	# ブロックエディターで指定できる文字サイズをカスタマイズ
	add_theme_support( 'editor-font-sizes', [
		['name' => __( 'S', 'textdomain' ), 'size' => 12, 'slug' => 'small'],
		['name' => __( 'M', 'textdomain' ), 'size' => 14, 'slug' => 'normal'],
		['name' => __( 'L', 'textdomain' ), 'size' => 18, 'slug' => 'lerge']
	]);

	# 文字サイズの変更を不可
	add_theme_support('disable-custom-font-sizes');

	# 単位をカスタマイズ
	add_theme_support( 'custom-units', 'rem');

	# 行の高さをカスタマイズ
	add_theme_support( 'custom-line-height' );

	# パディングのカスタマイズ
	add_theme_support( 'experimental-custom-spacing' );

	# リンクカラーの有効化
	add_theme_support( 'experimental-link-color' );

	# エディター用スタイル機能の有効化
	add_theme_support( 'editor-styles' );

	# エディター用スタイル機能の有効化
	add_editor_style( array( 'style-editor.min.css') );

	# アイキャッチの自動出力
	add_theme_support( 'post-thumbnails');

	# 投稿フォーマットの設定
	add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );
}

add_action( 'after_setup_theme', 'setup_editor' );


