<!-- 私達について -->
<?php
get_header();
$category = get_queried_object(); // 現在のカテゴリを取得
$category_name = single_tag_title(null, false);
$title = $category_name;
$query = [
    's' =>  $args['keyword'] ? $args['keyword'] : null,
    'post_status' => 'publish',
    'post_type' => 'blog',
    'orderby'     => 'date',
    'order' => 'DESC',
    'posts_per_page' => 5,
    'paged' => '',
    'author' => $args['user_id'] ? $args['user_id'] : null,
    'meta_key' => 'pr',
    'meta_value' => true
];
?>
<section class="section-top-key-visual section">
    <div class="inner">
        <div class="section-top-key-visual__content">
            <div class="section-top-key-visual__text">
                <p class="section-top-key-visual__title">
                    漫画制作<br>
                    情報を<br>
                    全てここに。
                </p>
                <p class="section-top-key-visual__body">
                    ソロだからこその魅力がそこにある。
                    「SOLOCAM（ソロキャン）」では日常生活の心の癒しを目指し、
                    手軽にキャンプを楽しむための
                    情報をお届けします！
                </p>
            </div>
            <div class="section-top-key-visual__slider-wrapper">
                <div class="section-top-key-visual__slider">
                    <?php
                        get_template_part( 'template-parts/blog/blog-pickup-slider-list', null, ['query' => $query]);
                    ?>
                </div>
                <div class="section-top-key-visual__bottom" id="section-top-key-visual__bottom">
                    <div class="section-top-key-visual__dots" id="section-top-key-visual__dots">
                    </div>    
                    <div class="section-top-key-visual__navigation">
                        <div class="section-top-key-visual__arrow" id="section-top-key-visual__arrow">
                        </div> 
                    </div>
                </div> 
            </div>
        </div>
    </div>
</section>
