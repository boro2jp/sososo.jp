<?php get_header(); ?>
<div class="article-pickup-list" id="about-images">
	<?php
	$the_query = new WP_Query( $args );
	if ( $the_query->have_posts() ) :
		while ( $the_query->have_posts() ) :
			$the_query->the_post();
			get_template_part( 'template-parts/molecules/article-pickup-list-item');
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
		get_template_part( 'template-parts/organisms/empty', null , ['title' =>"記事がありません", "body" => "申し訳ありません。他の条件で検索をお試しください。"]);
	endif;
	wp_reset_query();
	?>
</div>