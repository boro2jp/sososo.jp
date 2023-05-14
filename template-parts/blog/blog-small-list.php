<?php get_header(); ?>
<div class="blog-list">
	<?php
	$the_query = new WP_Query( $args );
	if ( $the_query->have_posts() ) :
		$count=1; 
		while ( $the_query->have_posts() ) :
			$the_query->the_post();
			get_template_part( 'template-parts/blog/blog-small-list-item', null, ['count' => $count]);
			$count++; 
		endwhile;
		if ( $args['paged'] ) :
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


