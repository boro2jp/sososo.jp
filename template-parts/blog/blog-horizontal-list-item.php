<article class="blog-horizontal-list-item <?php echo $args['size'] == 'small' ? $args['size'] : null?>">
    <a href="<?php the_permalink();?>">
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
        <div class="blog-horizontal-list-item__text">
            <div class="blog-horizontal-list-item__detail">
                <ul class="category-list">
		            <?php
		            $categories = get_the_terms($post->ID, 'blog_category');
                    if($categories){
                        foreach ($categories as $category) {
                            echo '<li class="tag-list-item small"><span>' . $category->name . '</span></li>&nbsp;';
                        }
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
