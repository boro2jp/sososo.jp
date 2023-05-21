<!-- 私達について -->
<?php
get_header();
$category = get_queried_object(); // 現在のカテゴリを取得
$category_name = single_tag_title(null, false);
$title = $category_name;
$query = [
    's' =>  $args['keyword'] ? $args['keyword'] : null,
    'post_status' => 'publish',
    'post_type' => 'blog',
    'orderby'     => 'date',
    'order' => 'DESC',
    'posts_per_page' => 4,
    'paged' => '',
    'author' => $args['user_id'] ? $args['user_id'] : null,
    'meta_key' => '',
    'meta_value' => true,
    'tax_query' => [
        [
            'taxonomy' => 'blog_category',
            'field' => 'slug',
            'terms' => 'introduction',
            'include_children' => true
        ]
    ]
];
?>
<section class="section bottom section-top-blog-category-list">
    <div class="inner">
        <?php get_template_part( 'template-parts/section-header/section-header', null, ['title' => $args['category_name'], 'link' => home_url() . '/blog/category/introduction']); ?>
        <?php get_template_part( 'template-parts/blog/blog-list-harf', null, ['query' => $query, 'id' => 'blog-category-introduction-list']); ?>
    </div>
</section>