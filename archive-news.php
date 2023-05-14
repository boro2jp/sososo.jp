<?php get_header(); ?>
<div class="header-padding"></div>
<?php get_template_part( 'template-parts/breadcrumbs/breadcrumbs', 'none' ); ?>
<div class="page top bottom">
    <?php get_template_part( 'template-parts/key-visual/key-visual-page', null, ['title'=> 'ニュース', 'title-eg'=> 'NEWS']); ?>
    <?php
    $args = [
        's' =>  $args['keyword'] ? $args['keyword'] : null,
        'post_status' => 'publish',
        'post_type' => 'news',
        'orderby'     => 'date',
        'order' => 'DESC',
        'posts_per_page' => 10,
        'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
        'author' => $args['user_id'] ? $args['user_id'] : null
    ];
    $terms = $wp_query->query['news_category'] ? $wp_query->query['news_category'] : '';
    if ( $terms ) {
        $args['tax_query'] = [
            [
                'taxonomy' => 'news_category',
                'field' => 'slug',
                'terms' => $terms,
                'include_children' => true
            ]
        ];
    }
    get_template_part( 'template-parts/news/content-news', null, ['args' => $args, 'title' => single_cat_title( '', false )]);
    ?>
</div>
<?php get_footer();?>
