<ul class="category-box-list">
    <?php
        $categories = get_terms('blog_category', $args);
        foreach ($categories as $category) {
            get_template_part( 'template-parts/category/category-list-item', null, ['category' => $category]);
        }
    ?>
</ul>