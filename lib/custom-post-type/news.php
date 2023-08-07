<?php
//★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆
//カスタム投稿タイプ「お知らせ」
//★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆
add_action('init', 'create_post_type_news' );
function create_post_type_news() {
    // 投稿タイプの追加
    register_post_type(
        'news',
        array(
            'labels' => array(
                'name' => 'お知らせ',
                'singular_name' => 'お知らせ',
                'all_items' => 'お知らせ一覧',
                'add_new' => 'お知らせ追加',
                'add_new_item' => 'お知らせの追加',
                'edit_item' => 'お知らせの編集',
                'new_item' => 'お知らせ追加',
                'view_item' => 'お知らせを表示',
                'search_items' => 'お知らせを検索',
                'not_found' =>  'お知らせが見つかりません',
                'not_found_in_trash' => 'ゴミ箱内に製品が見つかりませんでした。',
                'parent_item_colon' => ''
            ),
			'public' => true,
            'show_ui' => true,
            'menu_position' =>5,
            'has_archive' => true,
            "show_in_rest" => true,
            'exclude_from_search' => true,
			'publicly_queryable' => true,
            'supports' => array(
                'title', // タイトル
                // 'thumbnail', // サムネイル
                'custom-fields',// カスタムフィールド
                'editor', // エディタ
                //'excerpt', //抜粋
                //'author', //作成者
                //'trackbacks', //トラックバック送信
                //'comments', //ディスカッション
                //'page-attributes' //hierarchicalをtrueにした場合はコチラも必須
            ),
			
        )
    );
    // カテゴリ追加
    register_taxonomy(
        'news_category',
        'news',
        array(
        'hierarchical' => true,
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
}