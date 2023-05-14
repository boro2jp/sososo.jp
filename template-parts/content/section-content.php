<!-- コンテンツ -->
<section class="section top bottom border">
    <div class="inner small-sp">
        <div class="section-header">
            <span class="section-eg">CONTENT</span>
            <h2 class="section-title">コンテンツ</h2>
        </div>
        <?php get_template_part( 'template-parts/content-list', null, $args = ['type'=> ['blog', 'photo', 'menu']]); ?>
    </div>
</section>