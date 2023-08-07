<?php get_header(); ?>
<?php
$news_args = [
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
    $news_args['tax_query'] = [
        [
            'taxonomy' => 'news_category',
            'field' => 'slug',
            'terms' => $terms,
            'include_children' => true
        ]
    ];
}
$news_categories = get_terms('news_category'); // 全カテゴリを取得
$category = get_queried_object(); // 現在のカテゴリを取得
?>
<div class="header-padding"></div>
<!-- パンくず -->
<?php get_template_part( 'template-parts/breadcrumbs/breadcrumbs', 'none' ); ?>
<!-- 本文 -->
<main class="page top bottom">
    <!-- お知らせ一覧 -->
    <section class="section bottom">
        <div class="inner">
            <?php get_template_part( 'template-parts/section-header/section-header', null, ['title' =>  single_cat_title( '', false ) ? single_cat_title( '', false ) : "新着記事一覧"]); ?>
            <nav class="top-navigation">
				<ul class="category-list">
					<?php
						if($wp_query->query['news_category']){
							echo '<li class="category-list-item margin"><a href="' . home_url('news') . '">全て</a></li>';
						} else {
							echo '<li class="category-list-item primary black margin"><a href="' . home_url('news') . '">全て</a></li>';
						}
					?>
					<?php
						if ($news_categories) {
							foreach($news_categories as $news_category) {
								if($wp_query->query['news_category'] === $news_category->slug){
									echo '<li class="category-list-item primary margin"><a href="'. get_tag_link($news_category->term_id) .'">' . $news_category->name . ' ('. $news_category->count .')</a></li>';
								} else {
									echo '<li class="category-list-item margin"><a href="'. get_tag_link($news_category->term_id) .'">' . $news_category->name . ' ('. $news_category->count .')</a></li>';
								}
							}
						}
					?>
				</ul>
			</nav>
            <?php get_template_part( 'template-parts/news/news-list', null, ['news_args' => $news_args, 'size' => 'small', 'btn' => true]); ?>     
        </div>
    </section>
    <!-- おすすめ記事 -->
    <?php get_template_part( 'template-parts/recommend/recommend'); ?>
</main>
<?php
get_footer();