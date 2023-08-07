<?php
/*
Template Name: policy
*/
get_header();
?>
<div class="header-padding"></div>
<!-- パンくず -->
<?php get_template_part( 'template-parts/breadcrumbs/breadcrumbs', 'none' ); ?>
<main class="page top bottom">
    <!-- ページタイトル -->
    <?php get_template_part( 'template-parts/key-visual/key-visual-page', null, ['title'=> get_the_title(), 'title-eg'=> 'Policy']); ?>
    <section class="section bottom">
        <div class="inner box">
            <?php get_template_part( 'template-parts/policy/privacy-policy-content', 'none' ); ?>
        </div>
    </section>
    <!-- おすすめ記事 -->
    <?php get_template_part( 'template-parts/recommend/recommend'); ?>
</main>
<?php
get_footer();
