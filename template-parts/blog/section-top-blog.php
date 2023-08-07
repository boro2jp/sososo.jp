<?php
$args = array(
    'number'        => '20', 
    'orderby'       => 'name', 
    'order'         => 'ASC',
    'hide_empty'    => true
); 
$categories = get_terms('blog_category', $args);
$tags = get_terms('blog_tag', $args); 
?>
<?php foreach($categories as $category): setup_postdata($category); ?>
<?php
$args = [
    'tax_query' =>  [
        [
            'taxonomy' => 'blog_category',
            'field' => 'slug',
            'terms' => $category->slug,
            'include_children' => true
        ]
    ],
    's' =>  $args['keyword'] ? $args['keyword'] : null,
    'post_status' => 'publish',
    'post_type' => 'blog',
    'orderby'     => 'date',
    'order' => 'DESC',
    'posts_per_page' => 6,
    'paged' => '',
    'author' => $args['user_id'] ? $args['user_id'] : null
];
?>
    <section class="section bottom section-top-blog <?php echo 'section-top-blog__' . $category->slug ?>">
        <div class="inner">
            <div class="section-header bottom">
                <span class="section-eg"><?php echo $category->slug ?></span>
                <h2 class="section-title">
                <?php echo $category->name ?>
                </h2>
            </div>
            <div class="section-content">
                <?php
                    get_template_part( 'template-parts/blog/blog-horizontal-list', null, ['blogs' => $args]);
                ?>
            </div>
            <div class="btn-area center">
                <a href="<?php echo get_term_link($category, 'blog_category') ?>" class="btn black top-news__btn">MORE</a>
            </div>
        </div>
    </section>
<?php endforeach; ?>