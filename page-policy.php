<?php
/*
Template Name: policy
*/
get_header();
?>
<div class="header-padding"></div>
<?php get_template_part( 'template-parts/breadcrumbs/breadcrumbs', 'none' ); ?>
<div class="page top bottom">
    <?php get_template_part( 'template-parts/key-visual/key-visual-page', null, ['title'=> get_the_title(), 'title-eg'=> 'Policy']); ?>
    <main>
        <section class="section bottom">
            <div class="inner">
                <?php get_template_part( 'template-parts/policy/policy-content', 'none' ); ?>
                <?php the_content() ?>
            </div>
        </section>
    </main>
</div>
<?php
get_footer();
