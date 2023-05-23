<?php
/*
Template Name: maintenance
*/
get_header();
?>
<?php get_template_part( 'template-parts/key-visual/key-visual-page', null, ['title'=> get_the_title(), 'title-eg'=> 'CONTACT']); ?>
<?php get_template_part( 'template-parts/breadcrumbs/breadcrumbs', 'none' ); ?>
<main class="main top bottom">
    <div class="inner">
        <div class="column">
            <main class="column-100 main">
                <?php get_template_part( 'template-parts/empty/empty', "メンテナンス中です", "申し訳ありません。現在メンテナンス中でございます。" ); ?>
            </main>
        </div>
    </div>
</main>
<?php
get_footer();
