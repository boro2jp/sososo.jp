<li class="staff-list-item">
	<?php if (get_avatar($args['staff']->id)) : ?>
        <div
                class="staff-list-item__image"
                style="background: url(<?php echo get_avatar_url($args['staff']->id, 300) ?>); background-size: cover; background-position: center"
        >
        </div>
	<?php else: ?>
        <div
                class="staff-list-item__image"
                style="background: url('<?php echo get_template_directory_uri(); ?>/assets/webp/default/default.webp'); background-size: cover; background-position: center"
        >
        </div>
	<?php endif; ?>
    <div class="staff-list-item__detail">
        <div class="staff-list-item__text">
            <h3 class="staff-list-item__title">
                <?php $args['staff']->display_name ? print $args['staff']->display_name : '-' ?>
            </h3>
            <p class="staff-list-item__position">
                <?php $args['staff']->position ? print $args['staff']->position : '-' ?>
            </p>
            <p class="staff-list-item__description">
                <?php echo !empty($args['staff']->description) ? $args['staff']->description : '-' ?>
            </p>
        </div>
        <ul class="staff-list-item__link-list">
		    <?php if($args['staff']->twitter): ?>
                <li class="staff-list-item__link-list-item">
                    <object>
                        <a href="<?php echo $args['staff']->twitter ?>" target="_blank">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                    </object>
                </li>
		    <?php endif; ?>
		    <?php if($args['staff']->instagram): ?>
                <li class="staff-list-item__link-list-item">
                    <object>
                        <a href="<?php echo $args['staff']->instagram ?>" target="_blank">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    </object>
                </li>
		    <?php endif; ?>
		    <?php if($args['staff']->facebook): ?>
                <li class="staff-list-item__link-list-item">
                    <object>
                        <a href="<?php echo $args['staff']->facebook ?>" target="_blank">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                    </object>
                </li>
		    <?php endif; ?>
		    <?php if($args['staff']->youtube): ?>
                <li class="staff-list-item__link-list-item">
                    <object>
                        <a href="<?php echo $args['staff']->youtube ?>" target="_blank">
                            <i class="fa-brands fa-youtube"></i>
                        </a>
                    </object>
                </li>
		    <?php endif; ?>
        </ul>
        <?php if($args['btn']): ?>
            <a class="staff-list-item__btn btn black-border small" href="<?php echo get_bloginfo("url") . '/staff/' . $args['staff']->user_nicename; ?>">書いた記事を見る</a>
        <?php endif; ?>
    </div>
</li>
