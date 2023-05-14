<li class="menu-list-item">
    <div href="<?php the_permalink();?>">
        <?php if (has_post_thumbnail()) : ?>
            <div
                    class="menu-list-item__image"
                    style="background: url(<?php the_post_thumbnail_url(); ?>); background-size: cover; background-position: center"
            >
                <?php if(get_post_meta( get_the_ID(), 'recommend', true )) : ?>
	                <span class="label fix small primary">おすすめ</span>
                <?php endif; ?>
            </div>
        <?php else: ?>
            <div
                    class="menu-list-item__image"
                    style="background: url('<?php echo get_template_directory_uri(); ?>/assets/webp/default/default.webp'); background-size: cover; background-position: center"
            >
                <?php if(get_post_meta( get_the_ID(), 'recommend', true )) : ?>
	                <span class="label fix small primary">おすすめ</span>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <div class="menu-list-item__text">
            <h3 class="menu-list-item__title"><?php the_title(); ?></h3>
            <span class="menu-list-item__price"><?php echo get_post_meta( get_the_ID(), 'price', true ); ?>円</span>
            <p class="menu-list-item__copy"><?php echo get_post_meta( get_the_ID(), 'copy', true ); ?></p>
        </div>
    </div>
</li>