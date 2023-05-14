<?php get_header(); ?>
<?php
$title = get_search_query() ? get_search_query() : null;
$query = [
	's' =>  $title,
	'post_status' => 'publish',
	'post_type' => 'blog',
	'posts_per_page' => 10,
	'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
	'orderby'     => 'date',
	'order' => 'DESC',
	'author' => $args['user_id'] ? $args['user_id'] : null,
	'tax_query' => $args['tax_query']
];
?>
<div class="header-padding"></div>
<?php get_template_part( 'template-parts/breadcrumbs/breadcrumbs', 'none' ); ?>
<div class="page top bottom">
    <?php get_template_part( 'template-parts/blog/blog-page', null, ['query' => $query, 'title' => $title ? '「' . $title . '」の検索結果' : '「-」の検索結果']); ?>
</div>
<?php get_footer();