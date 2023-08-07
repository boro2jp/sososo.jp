<?php
/**
 * The template for displaying the footer
 */
?>
<!-- パンくず -->
<?php get_template_part( 'template-parts/breadcrumbs/breadcrumbs', 'none' ); ?>
<!-- フッター -->
<footer class="footer">
    <div class="inner">
        <div class="footer__top">
            <!-- <div class="footer__sns sns-list">
                <a class="sns-list-item" target="_blank" href="https://twitter.com/">
                    <i class="fa-brands fa-twitter"></i>
                </a>
            </div> -->
            <nav class="footer__menu-lists" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
                <li class="footer__menu-list-item"><a href="<?php echo home_url('blog'); ?>">記事一覧</a></li>
                <li class="footer__menu-list-item"><a href="<?php echo home_url('news'); ?>">お知らせ</a></li>
                <li class="footer__menu-list-item"><a href="<?php echo home_url('policy'); ?>">利用規約</a></li>
                <li class="footer__menu-list-item"><a href="<?php echo home_url('privacy-policy'); ?>">プライバシーポリシー</a></li>
            </nav>
        </div>
    </div>
    <div class="footer__copyright inner">Copyright 2022(C) <?php echo bloginfo('name'); ?> All Rights Reserved.</div>
</footer>
<!-- トップへ -->
<?php get_template_part( 'template-parts/go-top/go-top'); ?>
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
