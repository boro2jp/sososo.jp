<div class="inner">
    <div class="column">
        <main class="main column-70">
            <section class="section bottom content">
                <?php get_template_part( 'template-parts/section-header/section-header', null, ['title' =>  $args['title'] ? $args['title'] : '全て' . 'の記事一覧']); ?>
                <?php get_template_part( 'template-parts/blog/blog-horizontal-list', null, ['query' => $args['query'], 'size' => 'small', 'btn' => $args['btn']]); ?>
            </section>
        </main>
        <aside class="section column-30">
            <section>
                <?php get_template_part( 'template-parts/sidebar/sidebar-blog'); ?>
            </section>
        </aside>
    </div>
</div>