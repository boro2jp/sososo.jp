<div class="inner">
    <div class="column">
        <main class="column-70 main">
            <section class="section content">
                <!-- 本文 -->
                <section class="section bottom">
                    <?php get_template_part( 'template-parts/article/article-content', get_post_type()); ?>
                </section>
                <!-- この記事を書いた人 -->
                <!-- <section class="section bottom">
                    <?php get_template_part( 'template-parts/section-header/section-header', null, ['title' =>  'この記事を書いた人']); ?>
                    <ul class="staff-list">
                        <?php get_template_part( 'template-parts/staff/staff-list-item', null, ['staff' => get_userdata($post->post_author), 'btn' => true]); ?>
                    </ul>
                </section> -->
                <!-- おすすめ記事 -->
                <section class="section bottom">
                    <?php if ('blog' === get_post_type() ) : ?>
                        <?php $query = [
                            'post_status' => 'publish',
                            'post_type' => 'blog',
                            'posts_per_page' => 6, //表示させたい記事数
                            'post__not_in' => [$post->ID], //現在の記事は含めない
                            'orderby' => 'rand', //ランダムで取得
                            'paged' => '',
                            'order' => 'DESC',
                            'tax_query' => [[
                                    'taxonomy' => 'blog_category',
                                    'terms' => get_the_terms($post->ID, 'blog_category')[0]
                                ]]
                        ];
                        ?>
                        <section class="related_post">
                            <?php get_template_part( 'template-parts/section-header/section-header', null, ['title' =>  'おすすめ記事']); ?>
                            <ul class="related_post_container">
                            <?php get_template_part( 'template-parts/blog/blog-horizontal-list', null, ['query' => $query, 'size' => 'small']); ?>
                            </ul>
                        </section>
                    <?php endif; ?>
                </section>
            </section>
        </main>
        <aside class="column-30 section sidebar">
            <section>
                <?php get_template_part( 'template-parts/sidebar/sidebar-blog'); ?>
            </section>
        </aside>
    </div>
</div>