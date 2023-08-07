<?php $the_query = new WP_Query( $args['blog_args'] ); ?>
<?php if ( $the_query->have_posts() ) : ?>
<div class="blog-pickup-list" id="blog-pickup-list">
	<?php
		while ( $the_query->have_posts() ) :
			$the_query->the_post();
			get_template_part( 'template-parts/blog/blog-horizontal-list-item', null);
		endwhile;
		if(!empty($args['paged'])):
			$GLOBALS['wp_query']->max_num_pages = $the_query->max_num_pages;
			the_posts_pagination([
				'mid_size' => 4,
				'prev_text' => '前へ',
				'next_text' => '次へ',
				'screen_reader_text' => ' '
			]);
		endif;
	else :
		get_template_part( 'template-parts/empty/empty', null , ['title' =>"記事がありません", "body" => "申し訳ありません。他の条件で検索をお試しください。"]);
	endif;
	wp_reset_query();
	?>
</div>


