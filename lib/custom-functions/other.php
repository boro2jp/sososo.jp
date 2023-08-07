<?php
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

function custom_author_archive( &$query ) {
	if ($query->is_author)
	$query->set( 'post_type', array( 'blog' ) );
}
add_action( 'pre_get_posts', 'custom_author_archive' );


function my_query_vars( $vars ) {
	$vars[] = 'staff';
	return $vars;
}

add_filter( 'query_vars', 'my_query_vars' );