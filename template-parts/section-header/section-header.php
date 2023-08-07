<div class="section-header <?php echo $args['color'] ?> bottom">
    <div class="section-header__left">
        <h2 class="section-header__title"><?php echo $args['title'] ?></h2>
    </div>
    <div class="section-header__right">
        <?php if(!empty($args['link'])): ?>
            <a href="<?php echo $args['link'] ?>" class="text-btn">もっと見る</a>
        <?php endif; ?>
    </div>
</div>  