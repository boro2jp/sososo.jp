<?php get_header(); ?>
<div class="header-padding"></div>
<?php get_template_part( 'template-parts/breadcrumbs/breadcrumbs', 'none' ); ?>
<div class="page top bottom">
    <?php get_template_part( 'template-parts/blog/blog-single'); ?>
</div>
<?php
        // 記事のビュー数を更新(ログイン中・クローラーは除外)
        if (!is_user_logged_in() && !is_robots()) {
            setPostViews(get_the_ID());
        }
    ?>
<?php
get_footer();
