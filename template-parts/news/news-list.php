<div class="news-list">
    <?php
    $the_query = new WP_Query( $args["news_args"] ); ?>
    <?php
    if ( $the_query->have_posts() ) :
        while ( $the_query->have_posts() ) :
	        $the_query->the_post();
            get_template_part( 'template-parts/news/news-list-item');
        endwhile;
        if ( !is_home() || !is_front_page() ) :
            $GLOBALS['wp_query']->max_num_pages = $the_query->max_num_pages;
            the_posts_pagination(array(
                'mid_size' => 4,
                'prev_text' => '前へ',
                'next_text' => '次へ',
                'screen_reader_text' => ' '
            ));
        endif;
    else :
        get_template_part( 'template-parts/empty/empty' ,null, ['title' =>"ニュースがありません", "body" => "申し訳ありません。ただいま準備中でございます。"]);
    endif;
    wp_reset_query();
    ?>
</div>