<?php
/*
Template Name: policy
*/
get_header();
?>
<section class="page-key-visual">
    <div class="inner">
        <div class="section-header">
            <span class="section-eg">POLICY</span>
            <h2 class="section-title">
                利用規約
            </h2>
        </div>
    </div>
</section>
<main>
    <section class="section bottom">
        <div class="inner">
            <?php get_template_part( 'template-parts/organisms/policy-content', 'none' ); ?>
            <?php the_content() ?>
        </div>
    </section>
</main>
<?php
get_footer();