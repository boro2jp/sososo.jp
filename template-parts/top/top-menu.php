<!-- トップページのメニュー -->
<?php
// クエリ指定
$args = [
    's' =>  $args['keyword'] ? $args['keyword'] : null,
    'post_status' => 'publish',
    'post_type' => 'menu',
    'orderby'     => 'date',
    'order' => 'DESC',
    'posts_per_page' => 10,
    'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
    'tax_query' => [
        [
            'taxonomy' => 'menu_category',
            'field' => 'slug',
            'terms' => 'food',
            'include_children' => true
        ]
    ]
]
?>
<section class="section top bottom top-menu-pick-up">
    <div class="inner sp-none">
        <div class="section-header center">
            <span class="section-eg">MENU</span>
            <h2 class="section-title">メニュー</h2>
        </div>
        <div class="section-text">
            <?php
                get_template_part( 'template-parts/menu/menu-list', null, $args);
            ?>
        </div>
    </div>
    <div class="inner">
        <div class="btn-area">
            <a href="<?php echo home_url('/menu'); ?>/category/food/" class="btn primary-border center top-news__btn">MORE</a>
        </div>
    </div>
</section>
