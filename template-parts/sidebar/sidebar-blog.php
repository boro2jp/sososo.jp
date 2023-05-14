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
<!-- サイドバー -->
<section class="sidebar-list">
    <!-- キーワードから探す -->
    <section class="sidebar-list-item">
        <h2 class="sidebar-list-item__title">キーワードから探す</h2>
        <?php get_search_form(); ?>
    </section>
    <!-- カテゴリから探す -->
    <?php if(!empty($categories)): ?>
    <section class="sidebar-list-item">
        <h2 class="sidebar-list-item__title">カテゴリから探す</h2>
        <ul class="category-menu-list">
            <?php
            foreach ($categories as $category) {
                echo '<li class="category-menu-list-item"><a href="' . get_term_link($category->term_id, 'blog_category') . '">' . $category->name . '</a></li>';
            }
            ?>
        </ul>
    </section>
    <?php endif; ?>
    <!-- 人気記事から探す -->
    <section class="sidebar-list-item">
        <h2 class="sidebar-list-item__title">人気記事から探す</h2>
        <?php
        $args = array(
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
        ?>
        <?php get_template_part( 'template-parts/blog/blog-small-list', null, $args); ?>
    </section>
    <!-- タグから探す -->
    <?php if(!empty($tags)): ?>
    <section class="sidebar-list-item">
    <h2 class="sidebar-list-item__title">タグから探す</h2>
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
</section>