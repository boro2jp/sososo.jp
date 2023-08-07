<div class="blog-list">
    <?php
    $the_query = new WP_Query( $args['blog_args'] ); ?>
    <?php
    if ( $the_query->have_posts() ) :
        while ( $the_query->have_posts() ) :
	        $the_query->the_post();
            get_template_part( 'template-parts/blog/blog-list-item', null, ['size' => 'harf']);
        endwhile;
		if ( $args['query']['paged'] ) :
			$GLOBALS['wp_query']->max_num_pages = $the_query->max_num_pages;
			the_posts_pagination([
				'mid_size' => 3,
				'prev_text' => '前へ',
				'next_text' => '次へ',
				'screen_reader_text' => ' '
			]);
		endif;
    else :
        get_template_part( 'template-parts/empty/empty' ,null, ['title' =>"記事がありません", "body" => "申し訳ありません。ただいま準備中でございます。"]);
    endif;
    wp_reset_query();
    ?>
</div>