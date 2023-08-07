<?php
/*
Template Name: about
*/
get_header();
?>
<div class="header-padding"></div>
<!-- パンくず -->
<?php get_template_part( 'template-parts/breadcrumbs/breadcrumbs', 'none' ); ?>
<!-- 本文 -->
<main class="page top bottom">
	<!-- 本文 -->
    <section class="section bottom">
		<?php get_template_part( 'template-parts/key-visual/key-visual-page', null, ['title'=> get_the_title(), 'title-eg'=> 'ABOUT']); ?>
		<div class="inner box">
		</div>
	</section>
	<!-- おすすめ記事 -->
	<?php get_template_part( 'template-parts/recommend/recommend'); ?>
</main>
<?php
get_footer();
