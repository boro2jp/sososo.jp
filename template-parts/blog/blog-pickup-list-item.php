<article class="blog-pickup-list-item">
    <a href="<?php the_permalink();?>">
        <div
            class="blog-pickup-list-item__image"
            style="background: linear-gradient( 180deg, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.3)), url('<?php echo has_post_thumbnail() ? the_post_thumbnail_url() : get_template_directory_uri() . '/dist/images/default/default.webp' ?>'); background-size: cover; background-position: center"
        >
            <div class="blog-pickup-list-item__text">
                <p class="blog-pickup-list-item__title">
                    <?php the_title(); ?>
                </p>
                <div class="blog-pickup-list-item__detail">
                    <ul class="tag-list">
                        <?php
                        $categories = get_the_terms($post->ID, 'blog_category');
                        foreach ($categories as $category) {
                            echo '<li class="tag-list-item small white-border"><span>' . $category->name . '</span></li>&nbsp;';
                        }
                        ?>
                    </ul>
                    <span class="blog-pickup-list-item__created-at">
                        <?php echo get_the_modified_date('Y.m.d'); ?>
                    </span>
                </div>
            </div>
        </div>
    </a>
</article>
