<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package restaurant_01
 */

get_header();
?>
<?php query_posts('post_type=post'); ?>
<?php get_template_part( 'template-parts/content-single'); ?>
<main class="padding header-padding">
    <section class="section top bottom inner small">
        <section class="article-content">
        <?php
            the_post();
            get_template_part( 'template-parts/content', get_post_type() );
        ?>
        </section>
    </section>
    <section class="section top bottom border">
        <div class="inner">
            <div>
                <?php if ('post' === get_post_type() ) : ?>
                <!-- 関連記事 -->
                <?php if(has_category() ) {
                    $catlist =get_the_category();
                    $category = array();
                    foreach($catlist as $cat){
                        $category[] = $cat->term_id;
                    }}
                ?>
                <?php $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => '8', //表示させたい記事数
                    'post__not_in' =>array( $post->ID ), //現在の記事は含めない
                    'category__in' => $category, //先ほど取得したカテゴリー内の記事
                    'orderby' => 'rand' //ランダムで取得
                );
                $related_query = new WP_Query( $args );?>
                <aside class="related_post">
                    <div class="section-header">
                        <h3 class="section-title">RECCOMEND</h3>
                        <h3 class="section-read-text">おすすめ記事</h3>
                    </div>
                    <ul class="related_post_container">
                        <?php while ( $related_query->have_posts() ) : $related_query->the_post(); ?>
                            <?php get_template_part( 'template-parts/article-list-item'); ?>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); //最後に記事のリセット?>
                    </ul>
                </aside>
            </div>
        </div>
    </section>
    <?php endif; ?>
</main>
<?php
get_footer();
