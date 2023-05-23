<?php
$args = array(
    'number'        => '10', 
    'orderby'       => 'name', 
    'order'         => 'ASC',
    'hide_empty'    => true
); 
$categories = get_terms('blog_category', $args);
$tags = get_terms('blog_tag', $args); 
?>
<section
    class="sp-menu"
    id="sp-menu"
>
    <div class="sp-menu__inner">
        <div class="sp-menu__header">
            <a href="<?php echo home_url(); ?>" class="sp-menu__logo" rel="nofollow">
                <img 
                    loading="lazy"
                    src="<?php echo get_template_directory_uri(); ?>/dist/images/logo/logo-white.webp"
                    alt="<?php echo get_bloginfo('name'); ?>"
                >  
            </a>
            <div
                class="sp-menu-close"
                id="sp-menu-close"
            >
                    <div class="sp-menu-close__btn">
                    </div>
            </div>
        </div>
        <section class="sp-menu-section-list">
            <!-- キーワードから探す -->
            <section class="sp-menu-section-list-item">
                <p class="sp-menu-section-list__title">キーワードから探す</p>
                <?php get_search_form(); ?>
            </section>
            <!-- カテゴリから探す -->
            <section class="sp-menu-section-list-item">
                <p class="sp-menu-section-list__title">カテゴリから探す</p>
                <ul class="sp-menu-list">
                    <?php
                    foreach ($categories as $category) {
                        echo '<li class="sp-menu-list-item"><a href="' . get_term_link($category->term_id, 'blog_category') . '">' . $category->name . '</a></li>';
                    }
                    ?>
                </ul>
            </section>
            <!-- タグから探す -->
            <section class="sp-menu-section-list-item">
                <?php if(!empty($tags)): ?>
                <p class="sp-menu-section-list__title">タグから探す</p>
                <ul class="tag-list">
                    <li class="tag-list-item white-border small margin"><a href="<?php echo home_url('blog'); ?>">全て</a></li>
                    <?php
                    if ($tags) {
                        foreach($tags as $tag) {
                            echo '<li class="tag-list-item small white-border margin"><a href="'. get_tag_link($tag->term_id) .'">' . $tag->name . '</a></li>';
                        }
                    }
                    ?>
                </ul>
                <?php endif; ?>
            </section>
        </section>
    </div>
</section>
<!-- <div class="grayscale" id="grayscale">
</div> -->