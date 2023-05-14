<?php get_header(); ?>
<?php
$title = get_search_query() ? get_search_query() : null;
$query = [
    's' =>  $title,
    'post_status' => 'publish',
    'post_type' => 'blog',
    'orderby'     => 'date',
    'order' => 'DESC',
    'posts_per_page' => 10,
    'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
    'author' => $wp_query->query['staff'] ? $wp_query->query['staff'] : null
];
if($wp_query->query['blog_category']){
	$query['tax_query'] = [
        [
            'taxonomy' => 'blog_category',
            'field' => 'slug',
            'terms' => $wp_query->query['blog_category'],
            'include_children' => true
        ]
    ];
} elseif ($wp_query->query['blog_tag']){
	$query['tax_query'] = [
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
<?php get_template_part( 'template-parts/breadcrumbs/breadcrumbs', 'none' ); ?>
<div class="page top bottom">
    <?php get_template_part( 'template-parts/blog/blog-page', null, ['query' => $query, 'title' => single_cat_title( '', false ), 'btn' => false]); ?>
</div>
<?php
get_footer();