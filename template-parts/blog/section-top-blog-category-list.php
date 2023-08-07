<?php
$args = array(
    'number'        => '4', 
    'orderby'       => 'name', 
    'order'         => 'ASC',
    'hide_empty'    => true
); 
$categories = get_terms('blog_category', $args);
$tags = get_terms('blog_tag', $args); 
?>
<section class="section-top-category-blog section">
    <?php
        foreach ($categories as $category) {
            echo get_template_part( 'template-parts/blog/section-top-blog-category-list-item', null, ["category" => $category]);
        }
    ?>
</section>