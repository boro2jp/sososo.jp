<article class="blog-list-item">
    <a href="<?php the_permalink();?>">
        <?php if (has_post_thumbnail()) : ?>
        <div
            class="blog-list-item__image"
            style="background: url(<?php the_post_thumbnail_url(); ?>); background-size: cover; background-position: center"
        >
        </div>
        <?php else: ?>
        <div
            class="blog-list-item__image"
            style="background: url('<?php echo get_template_directory_uri(); ?>/dist/images/default/default.webp'); background-size: cover; background-position: center"
        >
        </div>
        <?php endif; ?>
        <div class="blog-list-item__text">
            <h3 class="blog-list-item__title">
                <?php the_title(); ?>
            </h3>
            <div class="blog-list-item__detail">
                <ul class="tag-list">
		            <?php
		            $categories = get_the_terms($post->ID, 'blog_category');
		            foreach ($categories as $category) {
			            echo '<li class="tag-list-item small white-border"><span>' . $category->name . '</span></li>&nbsp;';
		            }
		            ?>
                </ul>
                <span class="blog-list-item__created-at">
                       <?php echo get_the_modified_date('Y.m.d'); ?>
                </span>
            </div>
            <span class="blog-list-item__author">
                <div
                    class="blog-list-item__author-image"
                    style="background: url(<?php echo get_avatar_url($post->post_author, 300) ?>); background-size: cover; background-position: center"
                >
                </div>
                <span class="blog-list-item__author-name"><?php the_author(); ?></span>
            </span>
        </div>
    </a>
</article>
