<?php
/*
Template Name: contact
*/
get_header();
?>
<?php get_template_part( 'template-parts/key-visual/key-visual-page', null, ['title'=> get_the_title(), 'title-eg'=> 'CONTACT']); ?>
<?php get_template_part( 'template-parts/breadcrumbs/breadcrumbs', 'none' ); ?>
<main class="main top bottom">
    <section class="section bottom">
        <div class="inner">
            <?php if(wp_get_environment_type() == 'production') : ?>
                <?php echo do_shortcode('[mwform_formkey key="60"]') ?>
            <?php elseif(wp_get_environment_type() == 'development'): ?>
                <?php echo do_shortcode('[mwform_formkey key="60"]') ?>
            <?php endif; ?>
        </div>
    </section>
</main>
<?php
get_footer();
