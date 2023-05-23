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
<div class="header-inner inner">
    <h1 class="header-menu__left">
        <a href="<?php echo home_url(); ?>" class="header-menu__logo inner" rel="nofollow">
            <img 
                loading="lazy"
                src="<?php echo get_template_directory_uri(); ?>/dist/images/logo/logo-white.webp"
                alt="<?php echo get_bloginfo('name'); ?>"
            >
        </a>
    </h1>
    <div class="header-menu__right">
        <nav class="" role="navigation">
            <ul class="header-menu__lists">
                <li class="header-menu__list-item"><a href="<?php echo home_url('about'); ?>">ソソソ.jpとは</a></li>
                <?php
                    foreach ($categories as $category) {
                        echo '<li class="header-menu__list-item"><a href="' . get_term_link($category->term_id, 'blog_category') . '">' . $category->name . '</a></li>';
                    }
                ?>
            </ul>
        </nav>
        <div class="header-menu__hamburger border-list hidden-pc" id="hamburger">
            <span class="border-list-item"></span>
            <span class="border-list-item"></span>
            <span class="border-list-item"></span>
        </div>
    </div>
</div>
<?php get_template_part( 'template-parts/sp-menu/sp-menu'); ?>
