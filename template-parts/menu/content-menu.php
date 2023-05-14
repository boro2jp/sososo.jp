<?php
$menu_categories = get_terms('menu_category'); // 全カテゴリを取得
$category = get_queried_object(); // 現在のカテゴリを取得
?>
	<main class="main top bottom">
		<section>
			<div class="inner">
				<div class="section-header">
					<h2 class="section-title"><span class="strong"><?php echo $args['title'] ? $args['title']  : '全て' ?></span>のニュース一覧</h2>
				</div>
				<ul class="tag-list top-navigation">
					<?php
						if($wp_query->query['menu_category']){
							echo '<li class="tag-list-item white-border margin"><a href="' . home_url('menu') . '">フード</a></li>';
						} else {
							echo '<li class="tag-list-item primary margin"><a href="' . home_url('menu') . '">フード</a></li>';
						}
					?>
					<?php
						if ($menu_categories) {
							foreach($menu_categories as $menu_category) {
								if($menu_category->slug !== 'food'){
									if($wp_query->query['menu_category'] === $menu_category->slug){
										echo '<li class="tag-list-item primary margin"><a href="'. get_tag_link($menu_category->term_id) .'">' . $menu_category->name .'</a></li>';
									} else {
										echo '<li class="tag-list-item white-border margin"><a href="'. get_tag_link($menu_category->term_id) .'">' . $menu_category->name .'</a></li>';
									}
								}
							}
						}
					?>
				</ul>
			</div>
			<div class="inner sp-none">
				<?php
					get_template_part( 'template-parts/menu/menu-list', null, $args['args']);
				?>
			</div>
		</section>
	</main>
<?php
get_footer();
