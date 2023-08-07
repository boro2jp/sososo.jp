<div class="blog-horizontal-list">
    <?php
    $the_query = new WP_Query( $args['blog_args'] );
    ?>
    <?php
    if ( $the_query->have_posts() ) :
        while ( $the_query->have_posts() ) :
	        $the_query->the_post();
			get_template_part( 'template-parts/blog/blog-horizontal-list-item', null, ['size' => $args['size'], 'pickup' => $args['pickup']]);
        endwhile;
    ?>
    </div>
        <?php if($args['btn'] ) : ?>
            <div class="btn-area">
                <a href="<?php echo home_url('blog'); ?>/page/2" class="btn primary-border">もっと見る</a>
            </div>
        <?php endif ?>
        <?php
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