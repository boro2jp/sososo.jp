<?php
get_header();
?>
<?php get_template_part( 'template-parts/blog/section-top-key-visual', null, ['args' => $args]); ?>
<div class="page top bottom">
    <main class="main">   
        <section>
            <?php
                $query = [
                    's' =>  $args['keyword'] ? $args['keyword'] : null,
                    'post_status' => 'publish',
                    'post_type' => 'blog',
                    'orderby'     => 'date',
                    'order' => 'DESC',
                    'posts_per_page' => 10,
                    'paged' => '',
                    'author' => $args['user_id'] ? $args['user_id'] : null
                ];
                get_template_part( 'template-parts/blog/blog-page', null, ['query' => $query, 'title' => single_cat_title( '', false ), 'btn' => true]);
            ?>
        </section>
        <?php get_template_part( 'template-parts/blog/section-top-blog-category', null); ?>
    </main>
</div>
<?php
get_footer();
