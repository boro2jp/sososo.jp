<?php
// 記事のカテゴリー情報を取得する
$cat = get_the_category();
// 取得した配列から必要な情報を変数に入れる
$cat_name = $cat[0]->cat_name; // カテゴリー名
$cat_slug  = $cat[0]->category_nicename; // カテゴリースラッグ
$author = get_userdata($post->post_author);
?>
<section class="section">
        <article class="article-content">
            <div class="article-content__detail-top">
                <span class="article-content__published_at">
                    <?php echo get_the_modified_date('Y.m.d'); ?>
                </span>
            </div>
            <h1 class="article-content__title">
                <?php the_title(); ?>
            </h1>
            <div class="article-content__detail">
                <div class="article-content__detail-bottom">
                    <ul class="category-list">
                        <?php
                            $categories = get_the_terms($post->ID, get_post_type() . '_category');
                            if($categories){
                                foreach ($categories as $category) {
                                    echo '<li class="category-list-item hover margin"><a href="' . get_tag_link( $category->term_id ) . '">'. $category->name . '</a></li>';
                                    // echo '<li class="tag-list-item small white-border"><span>' . $category->name . '</span></li>&nbsp;';
                                }
                            }
                        ?>
                    </ul>
               </div>
            </div>
            <?php if (has_post_thumbnail()) : ?>
                <img
                    class="article-content__image"
                    loading="lazy"
                    src="<?php the_post_thumbnail_url(); ?>" 
                    alt="<?php the_title(); ?>"
                >
            <?php endif; ?>
            <div class="article-content__content markdown">
                <?php
                the_content(
                    sprintf(
                        wp_kses(
                            __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'restaurant_01' ),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        wp_kses_post( get_the_title() )
                    )
                );
                ?>
            </div>
            <div class="article-content__tag">
                <ul class="tag-list">
                    <?php
                        $tags = get_the_terms($post->ID, get_post_type() . '_tag');
                        foreach ($tags as $tag) {
                            echo '<li class="tag-list-item margin"><a href="' . get_tag_link( $tag->term_id ) . '">' . $tag->name . '</a></li>';
                            // echo '<li class="tag-list-item small white-border"><span>' . $category->name . '</span></li>&nbsp;';
                        }
                    ?>
                </ul>
            </div>
            <div class="article-content__share share-list">
                <a class="share-list-item twitter" href="https://twitter.com/share?url=<?php echo get_the_permalink();?>&text=<?php echo get_the_title();?>" target="_blank" rel="nofollow noopener">
                    <i class="fa-brands fa-twitter"></i>
                </a>
                <a class="share-list-item facebook" href="http://www.facebook.com/share.php?u=<?php echo get_the_permalink(); ?>" target="_blank" rel="nofollow noopener">
                    <i class="fa-brands fa-facebook"></i>
                </a>
                <a class="share-list-item pocket" href="http://getpocket.com/edit?url=<?php echo get_the_permalink();?>&title=<?php echo get_the_title(); ?>" target="_blank" rel="nofollow noopener">
                    <i class="fa-brands fa-get-pocket"></i>
                </a>
                <a class="share-list-item line" href="https://social-plugins.line.me/lineit/share?url=<?php echo get_the_permalink(); ?>" target="_blank" rel="nofollow noopener">
                    <i class="fa-brands fa-line"></i>
                </a>
            </div>
        </article>
</section>
