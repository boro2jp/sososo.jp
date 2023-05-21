<article class="blog-horizontal-list-item <?php echo $args['size'] == 'small' ? $args['size'] : null?>">
    <a href="<?php the_permalink();?>">
        <?php if (has_post_thumbnail()) : ?>
            <div class="blog-horizontal-list-item__image">
                <img
                    loading="lazy"
                    src="<?php the_post_thumbnail_url(); ?>"
                    alt="<?php the_title() ?>"
                >
                <?php
                    $post_time = get_the_time('U');
                    $days = 7; //New!を表示させる日数
                    $last = time() - ($days * 24 * 60 * 60);
                    if ($post_time > $last) {
                        echo '<span class="label small red fix">NEW!</span>';
                    }
                ?>
            </div>
        <?php else: ?>
            <div class="blog-horizontal-list-item__image">
                <img
                    loading="lazy"
                    src="<?php echo get_template_directory_uri(); ?>/assets/webp/default/default.png"
                    alt="<?php the_title() ?>"
                >
                <?php
                    $post_time = get_the_time('U');
                    $days = 7; //New!を表示させる日数
                    $last = time() - ($days * 24 * 60 * 60);
                    if ($post_time > $last) {
                    echo '<span class="label small red fix">NEW!</span>';
                    }
                ?>
            </div>
        <?php endif; ?>
        <div class="blog-horizontal-list-item__text">
            <div class="blog-horizontal-list-item__detail">
                <ul class="category-list">
		            <?php
		            $categories = get_the_terms($post->ID, 'blog_category');
		            foreach ($categories as $category) {
			            echo '<li class="category-list-item small"><span>' . $category->name . '</span></li>&nbsp;';
		            }
		            ?>
                </ul>
                <span class="blog-horizontal-list-item__created-at">
                       <?php echo get_the_modified_date('Y.m.d'); ?>
                </span>
            </div>
            <p class="blog-horizontal-list-item__title">
                <?php the_title(); ?>
            </p>
    
        </div>
    </a>
</article>
