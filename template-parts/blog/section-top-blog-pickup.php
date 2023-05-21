<?php
$category = get_queried_object(); // 現在のカテゴリを取得
$category_name = single_tag_title(null, false);
$title = $category_name;
$query = [
    's' =>  $args['keyword'] ? $args['keyword'] : null,
    'post_status' => 'publish',
    'post_type' => 'blog',
    'meta_key' => 'post_views_count',
    'orderby'     => 'date',
    'order' => 'DESC',
    'posts_per_page' => 3,
    'paged' => '',
    'author' => $args['user_id'] ? $args['user_id'] : null,
    'meta_value' => true
];
?>
<section class="section top bottom section-top-ranking">
    <div class="inner">
        <?php get_template_part( 'template-parts/section-header/section-header', null, ['title' => '人気記事', 'color' => 'white']); ?>
        <?php get_template_part( 'template-parts/blog/blog-horizontal-list', null, ['query' => $query]); ?>
    </div>
</section>