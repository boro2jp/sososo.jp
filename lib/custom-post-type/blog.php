<?php
//★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆
//カスタム投稿タイプ「ブログ」
//★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆
add_action('init', 'create_post_type_blog' );
function create_post_type_blog() {
	// 投稿タイプの追加
	register_post_type(
		'blog',
		array(
			'labels' => array(
				'name' => 'ブログ',
				'singular_name' => 'ブログ',
				'all_items' => 'ブログ一覧',
				'add_new' => 'ブログ追加',
				'add_new_item' => 'ブログの追加',
				'edit_item' => 'ブログの編集',
				'new_item' => 'ブログ追加',
				'view_item' => 'ブログを表示',
				'search_items' => 'ブログを検索',
				'not_found' =>  'ブログが見つかりません',
				'not_found_in_trash' => 'ゴミ箱内に製品が見つかりませんでした。',
				'parent_item_colon' => ''
			),
			'public' => true,
			'menu_position' =>5,
			'has_archive' => true,
			"show_in_rest" => true,
			'exclude_from_search' => true,
			'supports' => array(
				'title', // タイトル
				'thumbnail', // サムネイル
				'custom-fields',// カスタムフィールド
				'editor', // エディタ
				//'excerpt', //抜粋
				'author', //作成者
				//'trackbacks', //トラックバック送信
				//'comments', //ディスカッション
				//'page-attributes' //hierarchicalをtrueにした場合はコチラも必須
			),
		)
	);
	// カテゴリ追加
	register_taxonomy(
		'blog_category',
		'blog',
		array(
			'hierarchical' => true, // 階層構造の有無（カテゴリorタグ）
			'labels' => array(
				'name' => 'カテゴリ',
				'singular_name' => 'カテゴリ',
				'search_items' =>  'カテゴリを検索',
				'all_items' => 'すべてのカテゴリ',
				'parent_item' => '親分類',
				'parent_item_colon' => '親分類：',
				'edit_item' => '編集',
				'update_item' => '更新',
				'add_new_item' => 'カテゴリを追加',
				'new_item_name' => '名前',
			),
			'public' => true, //投稿タイプをパブリックにするか (true/false)
			'show_in_rest' => true, //新エディタ Gutenberg を有効化
			'show_admin_column'=> true, //管理画面の記事一覧に項目を作るか (true/false)
			'show_ui' => true,
			'rewrite' => array(
				'slug' => 'category',
				'with_front' => true,
				'hierarchical' => true
			)
		));

	register_taxonomy(
		'blog_tag',
		'blog',
		array(
			'label' => 'タグ', // 管理画面に表示するラベル名
			'hierarchical' => false, // 階層構造の有無（カテゴリorタグ）
			'show_tagcloud' => true, // タグ編集UIを一覧にを表示する（hierarchicalがfalseの時のみ）
			'labels' => array(
				'name' => 'タグ',
				'singular_name' => 'タグ',
				'search_items' =>  'タグを検索',
				'all_items' => 'すべてのタグ',
				'parent_item' => '親分類',
				'parent_item_colon' => '親分類：',
				'edit_item' => '編集',
				'update_item' => '更新',
				'add_new_item' => 'タグを追加',
				'new_item_name' => '名前',
			),
			'public' => true, //投稿タイプをダッシュボードに表示するか (true/false)
			'show_in_rest' => true, //新エディタ Gutenberg を有効化
			'show_admin_column'=> true, //管理画面の記事一覧に項目を作るか (true/false)
			'show_ui' => true, // ダッシュボードに表示する
			'rewrite' => array(
				'slug' => 'tag',
				'with_front' => true,
				'hierarchical' => true
			)
		)

	);
}