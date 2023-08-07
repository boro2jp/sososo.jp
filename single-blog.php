<?php get_header(); ?>
<?php
$blog_recommend_args = [
    'post_status' => 'publish',
    'post_type' => 'blog',
    'posts_per_page' => 6, //表示させたい記事数
    'post__not_in' => [$post->ID], //現在の記事は含めない
    'orderby' => 'rand', //ランダムで取得
    'paged' => '',
    'order' => 'DESC',
    'tax_query' => [[
            'taxonomy' => 'blog_category',
            'terms' => get_the_terms($post->ID, 'blog_category')[0]
        ]]
    ];
?>
<div class="header-padding"></div>
<!-- パンくず -->
<?php get_template_part( 'template-parts/breadcrumbs/breadcrumbs', 'none' ); ?>
<main class="page top bottom">
    <!-- 本文 -->
    <section class="section bottom">
        <div class="inner small">
            <?php get_template_part( 'template-parts/article/article-content', get_post_type()); ?>
        </div>
    </section>
    <!-- おすすめ記事から探す -->
    <section class="section bottom">
        <div class="inner">
            <?php get_template_part( 'template-parts/section-header/section-header', null, ['title' =>  'おすすめ記事']); ?>
            <?php get_template_part( 'template-parts/blog/blog-small-list', null, ['blog_args' => $blog_recommend_args]); ?>
        </div>
    </section>
    <!-- おすすめ記事 -->
    <?php get_template_part( 'template-parts/recommend/recommend'); ?>
</main>
<?php
    // 記事のビュー数を更新(ログイン中・クローラーは除外)
    if (!is_user_logged_in() && !is_robots()) {
        setPostViews(get_the_ID());
    }
?>
<?php
get_footer();
