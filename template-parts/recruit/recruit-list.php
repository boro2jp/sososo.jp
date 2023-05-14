<div class="recruit-list">
    <?php
    $args = array(
	    'post_status' => 'publish',
	    'post_type' => 'recruits',
	    'posts_per_page' => 1,
	    'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
	    'orderby'     => 'date',
	    'order' => 'DESC'
    );
    $the_query = new WP_Query( $args ); ?>
    <?php
    if ( $the_query->have_posts() ) :
        while ( $the_query->have_posts() ) :
	        $the_query->the_post();
            get_template_part( 'template-parts/recruit-list-item');
        endwhile;
        if ( !is_home() || !is_front_page() ) :
            $GLOBALS['wp_query']->max_num_pages = $the_query->max_num_pages;
            the_posts_pagination(array(
                'mid_size' => 2,
                'prev_text' => '前へ',
                'next_text' => '次へ',
                'screen_reader_text' => ' '
            ));
        endif;
    else :
        get_template_part( 'template-parts/empty' ,null, ['title' =>"採用情報がありません", "body" => "申し訳ありません。ただいま準備中でございます。"]);
    endif;
    ?>
    	<pre style="color:#FFF;">
	$wp_query->max_num_pages:<?php print_r($wp_query->max_num_pages); ?>
	SSSSSSSSSSSSSSSSSSSS
	<pre>$my_query->max_num_pages:<?php print_r($the_query->max_num_pages); ?></pre>
	</pre>
	S
	■リセット前
	<pre style="color:#FFF;">
		???<br>
		<?php var_dump($wp_query->max_num_pages); ?>
	</pre>
	<pre style="color:#FFF;">
	■リセット後<br>
	<?php var_dump($wp_query->query_vars); ?>
    <?php
	wp_reset_query();
    ?>
    
</div>
