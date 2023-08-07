<?php get_header(); ?>
<?php
$news_recommend_args = [
    'post_status' => 'publish',
    'post_type' => 'news',
    'posts_per_page' => 6, //表示させたい記事数
    'post__not_in' => [$post->ID], //現在の記事は含めない
    'orderby' => 'rand', //ランダムで取得
    'paged' => '',
    'order' => 'DESC',
    'tax_query' => [[
            'taxonomy' => 'news_category',
            'terms' => get_the_terms($post->ID, 'news_category')[0]
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
    <!-- 類似お知らせから探す -->
    <section class="section bottom">
        <div class="inner">
            <?php get_template_part( 'template-parts/section-header/section-header', null, ['title' =>  '類似お知らせ']); ?>
            <?php get_template_part( 'template-parts/news/news-list', null, ['news_args' => $news_recommend_args]); ?>
        </div>
    </section>
    <!-- おすすめ記事 -->
    <?php get_template_part( 'template-parts/recommend/recommend'); ?>
</main>
<?php
get_footer();
