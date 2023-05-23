<a
        href="<?php echo home_url($args['type']); ?>"
        style="background-image: url('<?php echo get_template_directory_uri(); ?>/dist/images/<?php echo $args['type'] ?>.webp'); background-size: cover; background-position: center"
        class="content-list-item <?php echo $args['type'] ?>"
>
    <div class="content-list-item__content">
        <span class="content-list-item__content-title"><?php echo $args['title'] ?></span>
        <h3 class="content-list-item__content-body"><?php echo $args['body'] ?></h3>
    </div>
</a>
