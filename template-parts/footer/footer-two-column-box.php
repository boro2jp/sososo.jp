<section class="footer-two-column-box">
    <div
        class="footer-two-column-box__left"
        style="background: linear-gradient( 180deg, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('<?php echo get_template_directory_uri(); ?>/dist/images/download@2x.webp'); background-size: cover; background-position: center"
    >
        <div class="section-header white center small">
            <h2 class="section-title">
                <img 
                    src="<?php echo get_custom_logo_url(); ?>"
                    alt="<?php echo get_bloginfo('name'); ?>"
                >
            </h2>
        </div>
    </div>
    <div
        class="footer-two-column-box__right"
    >
        <div class="section-header white center small">
            <span class="section-eg">MAIL MAGAZINE</span>
            <h2 class="section-title">
            メールマガジン
            </h2>
            <p class="section-body">
                お得な情報や厳選した記事を<br>
                週1回を目安にお届けします
            </p>
            <?php echo do_shortcode('[subscribe2]'); ?>
        </div>
    </div>
</section>