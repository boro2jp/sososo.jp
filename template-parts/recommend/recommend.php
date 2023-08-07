<?php
$blog_popular_args = array(
    's' =>  $args['keyword'] ? $args['keyword'] : null,
    'post_status' => 'publish',
    'post_type' => 'blog',
    'meta_key' => 'post_views_count',
    'orderby' => 'meta_value_num',
    'posts_per_page' => 5,
    'paged' => '',
    'order' => 'DESC',
    'author' => $args['user_id'] ? $args['user_id'] : null,
    'tax_query' => $args['tax_query']
);
$categories = get_terms('blog_category', ['number' => '20', 'orderby' => 'name',  'order' => 'ASC', 'hide_empty' => true]);
$tags = get_terms('blog_tag', ['number' => '20', 'orderby' => 'name',  'order' => 'ASC', 'hide_empty' => true]); 
?>
<!-- サイドバー -->
<section class="section bottom">
    <div class="inner">
        <!-- 人気記事から探す -->
        <section class="section bottom">
            <?php get_template_part( 'template-parts/section-header/section-header', null, ['title' =>  '人気記事から探す']); ?>
            <?php get_template_part( 'template-parts/blog/blog-small-list', null, ['blog_args' => $blog_popular_args]); ?>
        </section>
        <!-- カテゴリから探す -->
        <?php if(!empty($categories)): ?>
            <section class="section bottom">
                <?php get_template_part( 'template-parts/section-header/section-header', null, ['title' =>  'カテゴリから探す']); ?>
                <?php get_template_part( 'template-parts/category/category-list'); ?>
            </section>
        <?php endif; ?>
        <!-- タグから探す -->
        <?php if(!empty($tags)): ?>
            <section class="section bottom">
                <?php get_template_part( 'template-parts/section-header/section-header', null, ['title' =>  'タグから探す']); ?>
                <ul class="tag-list">
                    <li class="tag-list-item primary-border margin hover"><a href="<?php echo home_url('blog'); ?>">全て</a></li>
                    <?php
                    if ($tags) {
                        foreach($tags as $tag) {
                            echo '<li class="tag-list-item primary-border margin hover"><a href="'. get_tag_link($tag->term_id) .'">' . $tag->name . '</a></li>';
                        }
                    }
                    ?>
                </ul>
            </section>
        <?php endif; ?>
    </div>
</section>