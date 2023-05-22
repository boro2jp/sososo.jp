<?php
/**
 * restaurant_01 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package restaurant_01
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

function restaurant_01_setup() {
	load_theme_textdomain( 'restaurant_01', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
}

/**
 * Enqueue scripts and styles.
 */
function restaurant_01_scripts() {
	wp_enqueue_style( '', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( '', 'rtl', 'replace' );
}
add_action( 'wp_enqueue_scripts', 'restaurant_01_scripts' );

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


//★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆
//管理画面項目管理
//★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆
function remove_dashboard_widget() {
	// remove_meta_box( 'dashboard_site_health', 'dashboard', 'normal' ); //サイトヘルスステータス
	remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' ); //概要
	// remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' ); //アクティビティ
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' ); //クイックドラフト
	remove_meta_box( 'dashboard_primary', 'dashboard', 'side' ); //WordPressニュース
	remove_action( 'welcome_panel', 'wp_welcome_panel' ); //ようこそ
  }
  add_action('wp_dashboard_setup', 'remove_dashboard_widget' );

function remove_menus() {
   remove_menu_page( 'index.php' ); //ダッシュボード
   remove_menu_page( 'edit.php' ); //投稿メニュー
//    remove_menu_page( 'edit.php?post_type=memo' ); //カスタム投稿タイプmemo
//    remove_menu_page( 'upload.php' ); // メディア
//    remove_menu_page( 'edit.php?post_type=page' ); //固定ページ
   remove_menu_page( 'edit-comments.php' ); //コメント
//    remove_menu_page( 'themes.php' ); //外観
//    remove_submenu_page( 'themes.php', 'theme-editor.php' ); // 外観 / テーマエディタ.
//    remove_menu_page( 'plugins.php' ); //プラグイン
//    remove_menu_page( 'users.php' ); //ユーザー
//    remove_menu_page( 'tools.php' ); //ツールメニュー 
//    remove_menu_page( 'options-general.php' ); //設定 
//    remove_submenu_page( 'options-general.php', 'options-discussion.php' ); // 設定 / ディスカッション.
   remove_submenu_page( 'options-general.php', 'options-media.php' ); // 設定 / メディア.
   //	remove_submenu_page( 'options-general.php', 'options-permalink.php' ); // 設定 / メディア.
}
add_action( 'admin_menu', 'remove_menus', 999 );


//★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆
//管理画面項目の追加
//★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆
add_filter( 'user_contactmethods', 'user_contactmethods_custom' );

// 項目の登録
function user_contactmethods_custom( $profile_items ) {
	$profile_items['twitter']   = 'Twitter';
	$profile_items['instagram'] = 'Instagram';
	$profile_items['youtube'] = 'Youtube';
	$profile_items['occupation'] = '職業';
	return $profile_items;
}

add_action( 'user_new_form', 'user_new_profile_custom' );

// ユーザー新規作成に項目を追加する。
function user_new_profile_custom() {
	$twitter   = $_POST['twitter'];
	$instagram   = $_POST['instagram'];
	$youtube   = $_POST['youtube'];
	?>
	<table class='form-table'>
		<tr class='form-field'>
			<th><label for='phone'>Twitter URL</label></th>
			<td><input type='text' name='phone' value='<?php echo esc_attr( $twitter ) ?>'/></td>
		</tr>
		<tr class='form-field'>
			<th><label for='address'>Instagram URL</label></th>
			<td><input type='text' name='address' value='<?php echo esc_attr( $instagram ) ?>'/></td>
		</tr>
		<tr class='form-field'>
			<th><label for='address'>Youtube URL</label></th>
			<td><input type='text' name='address' value='<?php echo esc_attr( $youtube ) ?>'/></td>
		</tr>
	</table>

	<?php
}


//★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆
//お問合せフォームのバリデーション
//★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆
function form_validation_rule($Validation)
{
	$Validation->set_rule('ご要件', 'required', array('message' => 'ご要件を選択してください'));
	$Validation->set_rule('お名前', 'noEmpty', array('message' => 'お名前を入力してください'));
	$Validation->set_rule('ふりがな', 'noEmpty', array('message' => 'ふりがなを入力してください'));
	$Validation->set_rule('電話番号', 'noEmpty', array('message' => '電話番号を入力してください'));
	$Validation->set_rule('メールアドレス', 'noEmpty', array('message' => 'メールアドレスを入力してください'));
	$Validation->set_rule('本文', 'noEmpty', array('message' => '本文を入力してください'));
	$Validation->set_rule('個人情報の取り扱い', 'required', array('message' => '同意をしてください'));

	return $Validation;
}


if (wp_get_environment_type() == 'production'){
	add_filter('mwform_validation_mw-wp-form-60', 'form_validation_rule', 10, 3);
} else {
	add_filter('mwform_validation_mw-wp-form-60', 'form_validation_rule', 10, 3);
}


//★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆
//記事のPVを取得
//★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆
function getPostViews($post_id) {
	$key = 'post_views_count';
	$count = get_post_meta($post_id, $key, true);
	if ($count=='') {
	  delete_post_meta($post_id, $key);
	  add_post_meta($post_id, $key, 0);
	  return 0;
	}
	return $count;
  }
  

// 記事のPVをカウントする
function setPostViews($post_id) {
	$key = 'post_views_count';
	$count = get_post_meta($post_id, $key, true);
	if ($count=='') {
	  $count = 0;
	  delete_post_meta($post_id, $key);
	  add_post_meta($post_id, $key, 0);
	} else {
	  $count++;
	  update_post_meta($post_id, $key, $count);
	}
  }


// /?author=1のリダイレクトを禁止
  function disable_author_archive_query() {
	if( preg_match('/author=([0-9]*)/i', $_SERVER['QUERY_STRING']) ){
	 wp_redirect( home_url() );
	 exit;
	}
   }
   add_action('init', 'disable_author_archive_query');



// APIの封鎖
function my_filter_rest_endpoints( $endpoints ) {
    if ( isset( $endpoints['/wp/v2/users'] ) ) {
        unset( $endpoints['/wp/v2/users'] );
    }
    if ( isset( $endpoints['/wp/v2/users/(?P[\d]+)'] ) ) {
        unset( $endpoints['/wp/v2/users/(?P[\d]+)'] );
    }
    return $endpoints;
}
add_filter( 'rest_endpoints', 'my_filter_rest_endpoints', 10, 1 );


// パンくずリスト
function breadcrumb() {
    $home = '<li><a href="'.get_bloginfo('url').'" >HOME</a></li>';
  
    echo '<ul class="breadcrumbs-list">';
    if ( is_front_page() ) {
        // トップページの場合
    }
    else if ( is_category() ) {
        // カテゴリページの場合
        $cat = get_queried_object();
        $cat_id = $cat->parent;
        $cat_list = array();
        while ($cat_id != 0){
            $cat = get_category( $cat_id );
            $cat_link = get_category_link( $cat_id );
            array_unshift( $cat_list, '<li><a href="'.$cat_link.'">'.$cat->name.'</a></li>' );
            $cat_id = $cat->parent;
        }
        echo $home;
        foreach($cat_list as $value){
            echo $value;
        }
        the_archive_title('<li>', '</li>');
    }
    else if ( is_archive() ) {
		// 月別アーカイブ・タグページの場合
		echo $home;
		the_archive_title('<li>', '</li>');
    }
    else if ( is_single() ) {
    // 投稿ページの場合
	echo $home;
    $cat = get_the_category();
        if( isset($cat[0]->cat_ID) ) $cat_id = $cat[0]->cat_ID;
        $cat_list = array();
        while ($cat_id != 0){
            $cat = get_category( $cat_id );
            $cat_link = get_category_link( $cat_id );
            array_unshift( $cat_list, '<li><a href="'.$cat_link.'">'.$cat->name.'</a></li>' );
            $cat_id = $cat->parent;
        }
        foreach($cat_list as $value){
            echo $value;
        }
        the_title('<li>', '</li>');
    }
    else if( is_page() ) {
    // 固定ページの場合
    echo $home;
    the_title('<li>', '</li>');
    }
    else if( is_search() ) {
    // 検索ページの場合
    echo $home;
    echo '<li>「'.get_search_query().'」の検索結果</li>';
    }
    else if( is_404() ) {
    // 404ページの場合
    echo $home;
    echo '<li>ページが見つかりません</li>';
    }
    echo "</ul>";
}
 
// アーカイブの余計なタイトルを削除
add_filter( 'get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('',false);
    } elseif (is_author()) {
        $title = get_the_author_meta( "display_name", $author );
	} elseif (is_tag()) {
        $title = single_tag_title('',false);
	} elseif (is_tax()) {
	    $title = single_term_title('',false);
	} elseif (is_post_type_archive() ){
		$title = post_type_archive_title('',false);
	} elseif (is_date()) {
	    $title = get_the_time('Y年n月');
	} elseif (is_search()) {
	    $title = '検索結果：'.esc_html( get_search_query(false) );
	} elseif (is_404()) {
	    $title = '「404」ページが見つかりません';
	} else {

	}
    return $title;
});


function cpt_pre_get_posts($query) {
	if(is_admin() || !$query->is_main_query()) {
	  return;
	}
	if($query->is_author()) {
	  $query->set('post_type', array('blog'));
	}
  }
  add_action('pre_get_posts', 'cpt_pre_get_posts');


//   function kaiza_filter_rest_endpoints( $endpoints ) {
//     /* REST APIで投稿一覧取得を無効にする */
//     if ( isset( $endpoints['/wp/v2/posts'] ) ) {
//         unset( $endpoints['/wp/v2/posts'] );
//     }
//     /* REST APIで投稿記事取得（単記事）を無効にする */
//     if ( isset( $endpoints['/wp/v2/posts/(?P<id>[\d]+)'] ) ) {
//         unset( $endpoints['/wp/v2/posts/(?P<id>[\d]+)'] );
//     }
//     /* REST APIでページ一覧取得を無効にする */
//     if (isset($endpoints['/wp/v2/pages'])) {
//       unset($endpoints['/wp/v2/pages']);
//     }
//     /* REST APIでページ取得（単記事）を無効にする */
//     if (isset($endpoints['/wp/v2/pages/(?P<id>[\d]+)'])) {
//       unset($endpoints['/wp/v2/pages/(?P<id>[\d]+)']);
//     }
//     /* REST APIでユーザー情報取得を無効にする */
//     if ( isset( $endpoints['/wp/v2/users'] ) ) {
//         unset( $endpoints['/wp/v2/users'] );
//     }
//     if ( isset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] ) ) {
//         unset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] );
//     }
//     return $endpoints;
// }
// add_filter( 'rest_endpoints', 'kaiza_filter_rest_endpoints', 10, 1 );