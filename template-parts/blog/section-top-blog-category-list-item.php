<!-- 私達について -->
<?php
get_header();
$blog_args = [
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
            'terms' => [$args['category']->slug],
            'include_children' => true
        ]
    ]
];
?>
<section class="section bottom section-top-blog-category-list">
    <div class="inner">
        <?php get_template_part( 'template-parts/section-header/section-header', null, ['title' => $args['category']->name, 'link' => home_url() . '/blog/category/'.$args['category']->slug]); ?>
        <?php get_template_part( 'template-parts/blog/blog-list-harf', null, ['blog_args' => $blog_args, 'id' => 'blog-category-introduction-list']); ?>
    </div>
</section>