<!-- ニュース -->
<?php
$args = [
    's' =>  $args['keyword'] ? $args['keyword'] : null,
    'post_status' => 'publish',
    'post_type' => 'news',
    'orderby'     => 'date',
    'order' => 'DESC',
    'posts_per_page' => 10,
    'paged' => '',
    'author' => ''
];
?>
<section
        style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/webp/news.webp'); background-size: cover; background-position: center"
        class="top-information"
>
    <div class="top-information--content">
        <div class="inner pc-none">
            <div class="section-header center">
                <span class="section-eg">NEWS</span>
                <h2 class="section-title">ニュース</h2>
            </div>
            <div class="top-concept--content section-text">
                <div class="top-news__content section-text">
                    <?php get_template_part( 'template-parts/news/news-list', null, $args); ?>
                    <div class="btn-area">
                        <a href="<?php echo home_url('/news'); ?>" class="btn primary-border center top-news__btn">MORE</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

