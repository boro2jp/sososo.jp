<form method="get" id="searchform" class="searchform" action="<?php bloginfo('url'); ?>/blog">
    <input type="text" name="s" id="s" placeholder="キーワードを入力" value="<?php echo get_search_query() ?>" />
    <!-- <button type="submit">検索する</button> -->
</form>
