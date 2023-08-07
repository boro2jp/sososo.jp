<?php
get_header();
$category = get_queried_object(); // 現在のカテゴリを取得
$category_name = single_tag_title(null, false);
$title = $category_name;
$blog_args = [
    's' =>  $args['keyword'] ? $args['keyword'] : null,
    'post_status' => 'publish',
    'post_type' => 'blog',
    'orderby'     => 'date',
    'order' => 'DESC',
    'posts_per_page' => 5,
    'paged' => '',
    'author' => $args['user_id'] ? $args['user_id'] : null,
    'tax_query' => [
        [
            'taxonomy' => 'blog_tag',
            'field' => 'slug',
            'terms' => ['pr'],
            'include_children' => true
        ]
    ],
    'meta_value' => true
];
?>
<section class="section-top-key-visual section">
    <div class="inner">
        <div class="section-top-key-visual__content">
            <div class="section-top-key-visual__text">
                <h2 class="section-top-key-visual__title">
                    漫画制作に<br class="hidden-pc">役立つ情報集めます。
                </h2>
                <p class="section-top-key-visual__body">
                    想像、創造、妄想を形に。<br class="hidden-pc">ソソソは、漫画制作に役立つ情報をお届けします！
                </p>
            </div>
            <div class="section-top-key-visual__slider-wrapper">
                <div class="section-top-key-visual__slider">
                    <?php
                        get_template_part( 'template-parts/blog/blog-pickup-slider-list', null, ['blog_args' => $blog_args]);
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
