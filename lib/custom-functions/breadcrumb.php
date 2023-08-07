<?php
// パンくずリスト
function breadcrumb() {
    $home = '<li><a href="'.get_bloginfo('url').'" >トップページ</a></li>';
  
    // トップページの場合
    if ( !is_front_page() || !is_home(  ) ) {
        echo '<ul class="breadcrumbs-list">';

        if ( is_category() ) {
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
        else if ( is_tax() ) {
            // 月別アーカイブ・タグページの場合
            echo $home;
            $cat_list = array();
            array_unshift( $cat_list, '<li><a href="'.get_bloginfo('url') . '/' . get_post_type() . '">'.get_post_type_object(get_post_type())->label.'</a></li>');
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
            $cat_list = array();
            array_unshift( $cat_list, '<li><a href="'.get_bloginfo('url') . '/' . get_post_type() . '">'.get_post_type_object(get_post_type())->label.'</a></li>');
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
}
?>