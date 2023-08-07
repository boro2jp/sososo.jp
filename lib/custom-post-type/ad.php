<?php
//★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆
//カスタム投稿タイプ「広告」
//★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆
add_action('init', 'create_post_type_ad' );
function create_post_type_ad() {
	// 投稿タイプの追加
	register_post_type(
		'ad',
		array(
			'labels' => array(
				'name' => '広告',
				'singular_name' => '広告',
				'all_items' => '広告一覧',
				'add_new' => '広告追加',
				'add_new_item' => '広告の追加',
				'edit_item' => '広告の編集',
				'new_item' => '広告追加',
				'view_item' => '広告を表示',
				'search_items' => '広告を検索',
				'not_found' =>  '広告が見つかりません',
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
				//'custom-fields',// カスタムフィールド
				//'editor', // エディタ
				//'excerpt', //抜粋
				//'author', //作成者
				//'trackbacks', //トラックバック送信
				//'comments', //ディスカッション
				//'page-attributes' //hierarchicalをtrueにした場合はコチラも必須
			),
		)
	);
}