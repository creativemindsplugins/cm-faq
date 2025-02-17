<div class="cmfaq-search">
    <form method="get" action="<?php echo home_url('/') ?>" autocomplete="off">
        <input type="hidden" name="post_type" value="cmfaq_question" />
        <?php CMFAQ_Base::swap_wp_query(CMFAQ_Base::$wp_query_taxonomy); ?>
        <input type="text" name="s" class="cmfaq-search-input cmfaq-clearable" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php echo esc_attr(\CM\CMFAQ_Settings::get('cmfaq_label_as_placeholder','Search ...')); ?>" />
        <?php CMFAQ_Base::swap_wp_query(CMFAQ_Base::$wp_query_page); ?>
        <input type="submit" style="display: none" />
        <div class="cmfaq-search-suggestion-wrapper"></div>
    </form>
</div>