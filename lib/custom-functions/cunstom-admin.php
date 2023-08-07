<?php
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
	$profile_items['position'] = '役職や部署';
	return $profile_items;
}

add_action( 'user_new_form', 'user_new_profile_custom' );

//★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆
// ユーザー新規作成に項目を追加する。
//★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆
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
// メディアのメニュー表示順を変更
//★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆
function customize_menus(){
	global $menu;
	$menu[29] = $menu[10];  //メディアの移動
	unset($menu[10]);
}
add_action( 'admin_menu', 'customize_menus' );