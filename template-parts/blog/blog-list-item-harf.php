<article class="blog-list-item-harf">
    <a href="<?php the_permalink();?>">
        <?php if (has_post_thumbnail()) : ?>
        <div
            class="blog-list-item-harf__image"
            style="background: url(<?php the_post_thumbnail_url(); ?>); background-size: cover; background-position: center"
        >
        </div>
        <?php else: ?>
        <div
            class="blog-list-item-harf__image"
            style="background: url('<?php echo get_template_directory_uri(); ?>/dist/images/default/default.webp'); background-size: cover; background-position: center"
        >
        </div>
        <?php endif; ?>
        <div class="blog-list-item-harf__text">
            <p class="blog-list-item-harf__title">
                <?php the_title(); ?>
            </p>
            <div class="blog-list-item-harf__detail">
                <ul class="category-list">
		            <?php
		            $categories = get_the_terms($post->ID, 'blog_category');
		            foreach ($categories as $category) {
			            echo '<li class="category-list-item small border"><span>' . $category->name . '</span></li>&nbsp;';
		            }
		            ?>
                </ul>
                <span class="blog-list-item-harf__created-at">
                       <?php echo get_the_modified_date('Y.m.d'); ?>
                </span>
            </div>
        </div>
    </a>
</article>
