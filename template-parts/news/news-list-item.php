<?php $link = get_post_meta( get_the_ID(), 'url', true ); ?>
<article class="news-list-item">
    <a href="<?php echo $link ? $link : the_permalink();?>" <?php echo $link ? 'target="blank"' : null; ?> class="news-list-item__inner">
        <div class="news-list-item__text">
            <div class="news-list-item__detail">
	            <ul class="category-list">
		            <?php
		            $categories = get_the_terms($post->ID, 'news_category');
		            foreach ($categories as $category) {
			            echo '<li class="category-list-item small"><span>' . $category->name . '</span></li>&nbsp;';
		            }
		            ?>
                </ul>
                <span class="news-list-item__created-at">
                    <?php echo get_the_modified_date('Y.m.d'); ?>
                </span>
            </div>
            <h3 class="news-list-item__title">
                <?php the_title(); ?>
            </h3>
        </div>
    </a>
</article>