<?php
/*
Template Name: staff
*/
get_header();
?>
<?php
$query = array(
	'orderby'=> 'ID',
	'order'=> 'ASC',
	'search'       => '', //検索キーワード
	'fields'       => 'all', //配列に含めるフィールド
	'who'          => '' //指定したユーザー権限よりも上位の権限を抽出
);
$staff = get_users($query);
?>
<div class="header-padding"></div>
<?php get_template_part( 'template-parts/breadcrumbs/breadcrumbs', 'none' ); ?>
<div class="page top bottom">
	<?php get_template_part( 'template-parts/key-visual/key-visual-page', null, ['title'=> get_the_title(), 'title-eg'=> 'STAFF']); ?>
	<main class="main">
		<section class="section">
			<div class="inner">
				<?php get_template_part( 'template-parts/staff/staff-large-list', null, ['staff' => $staff]); ?>
			</div>
		</section>
	</main>
</div>
<?php
get_footer();
