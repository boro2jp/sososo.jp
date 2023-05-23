<?php
/*
Template Name: maintenance
*/
get_header();
?>
<div class="header-padding"></div>
<?php get_template_part( 'template-parts/breadcrumbs/breadcrumbs', 'none' ); ?>
<main class="main top bottom">
    <div class="inner">
        <div class="column">
            <main class="column-100 main">
                <?php get_template_part( 'template-parts/empty/empty', null, ['title' => 'メンテナンス中です', 'body' => '申し訳ありません。現在メンテナンス中でございます。'] ); ?>
            </main>
        </div>
    </div>
</main>
<?php
get_footer();
