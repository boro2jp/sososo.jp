<div class="section-header bottom">
    <div class="section-header__left">
        <i class="section-header__icon fa-sharp fa-solid fa-hand-point-up"></i>
        <h2 class="section-header__title"><?php echo $args['title'] ?></h2>
    </div>
    <div class="section-header__right">
        <?php if(!empty($args['link'])): ?>
            <a href="<?php echo $args['link'] ?>" class="section-header__more">もっと見る</a>
        <?php endif; ?>
    </div>
</div>  