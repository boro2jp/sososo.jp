<?php
/*
Template Name: about
*/
get_header();
?>
<div class="header-padding"></div>
<?php get_template_part( 'template-parts/breadcrumbs/breadcrumbs', 'none' ); ?>
<div class="page top bottom">
	<?php get_template_part( 'template-parts/key-visual/key-visual-page', null, ['title'=> get_the_title(), 'title-eg'=> 'ABOUT']); ?>
	<main class="main">
		<section class="section">
			<div class="inner">
				
			</div>
		</section>
	</main>
</div>
<?php
get_footer();
