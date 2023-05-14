<?php
get_header();
$user_id = get_the_author_meta( "ID", $author );
$display_name = get_the_author_meta( "display_name", $author );
$title = $display_name ? $display_name : null;
$query = [
	's' =>  get_search_query() ? get_search_query() : null,
	'post_status' => 'publish',
	'post_type' => 'blog',
	'posts_per_page' => 10,
	'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
	'orderby'     => 'date',
	'order' => 'DESC',
	'author' => $user_id,
	'tax_query' => ''
];
?>
<div class="header-padding"></div>
<?php get_template_part( 'template-parts/breadcrumbs/breadcrumbs', 'none' ); ?>
<div class="page top bottom">
	<div class="inner">
		<div class="column">
			<main class="column-30">
                <!-- この記事を書いた人 -->
                <section class="section bottom">
                    <ul class="staff-list">
                        <?php get_template_part( 'template-parts/staff/staff-large-list-item', null, ['staff' => get_userdata($post->post_author), 'btn' => false, 'size' => 'block']); ?>
                    </ul>
                </section>
			</main>
			<aside class="column-70 main">
				<section class="section bottom content">
					<?php get_template_part( 'template-parts/section-header/section-header', null, ['title' =>  '記事一覧']); ?>
					<?php get_template_part( 'template-parts/blog/blog-horizontal-list', null, ['query' => $query, 'size' => 'small']); ?>
				</section>
			</aside>
		</div>
	</div>
</div>
<?php get_footer();