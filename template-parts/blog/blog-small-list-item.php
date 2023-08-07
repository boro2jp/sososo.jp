<article class="blog-small-list-item">
    <a href="<?php the_permalink();?>">
        <?php if (has_post_thumbnail()) : ?>
        <div class="blog-small-list-item__image">
            <img
                loading="lazy"
                src="<?php the_post_thumbnail_url(); ?>"
                alt="<?php the_title() ?>"
            >
            <span class="blog-small-list-item__count">
                <?php echo $args['count']; ?>   
            </span>
        </div>
        <?php else: ?>
        <div class="blog-small-list-item__image">
             <img
                loading="lazy"
                src="<?php echo get_template_directory_uri(); ?>/assets/images/default.png"
                alt="<?php the_title() ?>"
            >
            <span class="blog-small-list-item__count">
                <?php echo $args['count']; ?>   
            </span>
        </div>
        <?php endif; ?>
        <div class="blog-small-list-item__text">
            <p class="blog-small-list-item__title">
                <?php the_title(); ?>
            </p>
            <div class="blog-small-list-item__detail">
                <span class="blog-small-list-item__created-at">
                       <?php echo get_the_modified_date('Y.m.d'); ?>
                </span>
            </div>
        </div>
    </a>
</article>
