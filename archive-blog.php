<?php get_header(); ?>
<?php
$title = get_search_query() ? get_search_query() : null;
$blog_args = [
    's' => $title ? $title: null,
    'post_status' => 'publish',
    'post_type' => 'blog',
    'orderby'     => 'date',
    'order' => 'DESC',
    'posts_per_page' => 10,
    'paged' => get_query_var('paged') ? get_query_var('paged') : 1
];
if($wp_query->query['blog_category']){
	$blog_args['tax_query'] = [
        [
            'taxonomy' => 'blog_category',
            'field' => 'slug',
            'terms' => $wp_query->query['blog_category'],
            'include_children' => true
        ]
    ];
} elseif ($wp_query->query['blog_tag']){
	$blog_args['tax_query'] = [
        [
            'taxonomy' => 'blog_tag',
            'field' => 'slug',
            'terms' =>  $wp_query->query['blog_tag'],
            'include_children' => true
        ]
    ];
} 
?>
<div class="header-padding"></div>
<!-- パンくず -->
<?php get_template_part( 'template-parts/breadcrumbs/breadcrumbs', 'none' ); ?>
<!-- 本文 -->
<main class="page top bottom">
    <!-- 記事一覧 -->
    <section class="section bottom">
        <div class="inner">
            <!-- ページタイトル -->
            <?php get_template_part( 'template-parts/section-header/section-header', null, ['title' =>  single_cat_title( '', false ) ? single_cat_title( '', false ) : "新着記事一覧"]); ?>
            <?php get_template_part( 'template-parts/blog/blog-horizontal-list', null, ['blog_args' => $blog_args, 'btn' => $args['btn']]); ?>     
        </div>
    </section>
    <!-- おすすめ記事 -->
    <?php get_template_part( 'template-parts/recommend/recommend'); ?>
</main>
<?php
get_footer();