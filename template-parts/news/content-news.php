<?php
$news_categories = get_terms('news_category'); // 全カテゴリを取得
$category = get_queried_object(); // 現在のカテゴリを取得
?>
<div class="inner">
	<div class="column">
		<main class="main column-100">
			<nav class="top-navigation">
				<ul class="category-list">
					<?php
						if($wp_query->query['news_category']){
							echo '<li class="category-list-item margin"><a href="' . home_url('news') . '">全て</a></li>';
						} else {
							echo '<li class="category-list-item primary black margin"><a href="' . home_url('news') . '">全て</a></li>';
						}
					?>
					<?php
						if ($news_categories) {
							foreach($news_categories as $news_category) {
								if($wp_query->query['news_category'] === $news_category->slug){
									echo '<li class="category-list-item primary margin"><a href="'. get_tag_link($news_category->term_id) .'">' . $news_category->name . ' ('. $news_category->count .')</a></li>';
								} else {
									echo '<li class="category-list-item margin"><a href="'. get_tag_link($news_category->term_id) .'">' . $news_category->name . ' ('. $news_category->count .')</a></li>';
								}
							}
						}
					?>
				</ul>
			</nav>
			<?php get_template_part( 'template-parts/news/news-list', null, $args['args']); ?>
		</main>
	</div>
</div>
