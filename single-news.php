<?php get_header(); ?>
<div class="header-padding"></div>
<?php get_template_part( 'template-parts/breadcrumbs/breadcrumbs', 'none' ); ?>
<div class="page top bottom">
    <div class="inner small">
        <div class="column">
            <main class="column-100 main">
            <?php get_template_part( 'template-parts/article/article-content'); ?>
            </main>
        </div>
    </div>
</div>
<?php
get_footer();
