<?php
// /?author=1のリダイレクトを禁止
//   function disable_author_archive_query() {
// 	if( preg_match('/author=([0-9]*)/i', $_SERVER['QUERY_STRING']) ){
// 	 wp_redirect( home_url() );
// 	 exit;
// 	}
//    }
//    add_action('init', 'disable_author_archive_query');

// function custom_login_redirect() {
//     return '/wp-admin/edit.php?post_type=blog';
// }
    
// add_filter('login_redirect', 'custom_login_redirect');