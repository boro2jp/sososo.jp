<?php get_header(); ?>
<?php
    $blog_args = [
        's' =>  $args['keyword'] ? $args['keyword'] : null,
        'post_status' => 'publish',
        'post_type' => 'blog',
        'orderby'     => 'date',
        'order' => 'DESC',
        'posts_per_page' => 10,
        'paged' => '',
        'author' => $args['user_id'] ? $args['user_id'] : null
    ];
?>
<?php get_template_part( 'template-parts/blog/section-top-key-visual', null, ['args' => $args]); ?>
<main class="page top bottom">
    <!-- 新着記事一覧 -->
    <section class="section bottom">
        <div class="inner">
            <?php get_template_part( 'template-parts/section-header/section-header', null, ['title' =>  '新着記事一覧']); ?>
            <?php get_template_part( 'template-parts/blog/blog-horizontal-list', null, ['blog_args' => $blog_args, 'btn' => true]); ?>     
        </div>
    </section>
    <!-- おすすめ記事 -->
    <?php get_template_part( 'template-parts/recommend/recommend', null); ?>
    <!-- カテゴリ一覧 -->
    <?php get_template_part( 'template-parts/blog/section-top-blog-category-list', null); ?>
</main>
<?php
get_footer();
