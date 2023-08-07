<div class="content-list">
 <?php get_template_part( 'template-parts/content/content-list-item', null, $args = ['type' => 'blog', 'title' => 'BLOG', 'body' => '商品をご紹介いたします']); ?>
 <?php get_template_part( 'template-parts/content/content-list-item', null, $args = ['type' => 'menu', 'title' => 'MENU', 'body' => 'ノウハウやお役立ち情報を発信しています。']); ?>
 <?php get_template_part( 'template-parts/content/content-list-item', null, $args = ['type' => 'news', 'title' => 'NEWS', 'body' => 'お店に関する新着情報をお届けしております']); ?>
</div>
