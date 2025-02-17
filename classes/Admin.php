<?php

class CMFAQ_Admin {

    private static $messages = array();

    public static function init() {

        add_action('admin_menu', array(__CLASS__, 'admin_menu'));
        if (isset($_GET['taxonomy']) && ($_GET['taxonomy'] == 'cmfaq_category' || $_GET['taxonomy'] == 'cmfaq_tag')) {
            add_filter('parent_file', array(__CLASS__, 'parent_file'));
        }


        // order important
        add_action('save_post', array(__CLASS__, 'init_post_meta'));
        add_action('save_post', array(__CLASS__, 'save_post_meta'));

        add_action('before_delete_post', array(__CLASS__, 'before_delete_post'));

        add_action('admin_enqueue_scripts', array(__CLASS__, 'admin_enqueue_scripts'));

        add_action('add_meta_boxes', array(__CLASS__, 'add_meta_boxes'));

        add_action('cmfaq_category_add_form_fields', array(__CLASS__, 'cmfaq_category_add_form_fields'));
        add_action('cmfaq_category_edit_form', array(__CLASS__, 'cmfaq_category_edit_form_fields'));

        add_action('create_cmfaq_category', array(__CLASS__, 'save_cmfaq_category_custom_meta'));
        add_action('edited_cmfaq_category', array(__CLASS__, 'save_cmfaq_category_custom_meta'));
        add_action('delete_cmfaq_category', array(__CLASS__, 'delete_cmfaq_category_custom_meta'));

        add_action('admin_notices', array(__CLASS__, 'admin_notices'));
        add_action( 'admin_print_styles', [ __CLASS__, 'printAdminStyles' ] );
    }

    public static function genereate_faq_page() {
        $page_id = get_option('cmfaq_page_id', FALSE);
        if ($page_id && get_post($page_id)) {
            return;
        }
        $id = wp_insert_post(array(
            'post_author' => get_current_user_id(),
            'post_status' => 'publish',
            'post_title' => 'FAQ',
            'post_type' => 'page',
            'post_content' => '[cm_faq]'
        ));

        if (is_numeric($id)) {
            update_option('cmfaq_page_id', $id);
        }
    }

    public static function admin_notices() {
        foreach (self::$messages as $item) {
            echo '<div class="' . $item['class'] . '"><p>' . $item['message'] . '</p></div>';
        }
    }

    public static function admin_enqueue_scripts() {
        if (is_admin() && get_current_screen()->taxonomy == 'cmfaq_category') {
            wp_enqueue_media();
            wp_enqueue_script('cmfaq-backend', CMFAQ_PLUGIN_DIR_URL . 'assets/backend/js/backend.js', array('jquery'));
        }
    }

    public static function add_meta_boxes($post_type) {
        if ($post_type == 'cmfaq_question') {
            add_meta_box('cmfaq_main_category_iddiv', 'Main FAQ category', array(__CLASS__, 'render_meta_box_post_main_category_id'), $post_type, 'side', 'low');
            add_meta_box('cmfaq_show_voting_div', 'Voting', array(__CLASS__, 'render_meta_box_post_show_voting'), $post_type, 'side', 'default');
            add_meta_box('cmfaq_disable_chat_gpt_div', 'Chat GPT', array(__CLASS__, 'render_meta_box_post_disable_chat_gpt'), $post_type, 'side', 'default');
            add_meta_box('cmfaq_tags_div', 'FAQ Tags', array(__CLASS__, 'render_meta_box_post_tags'), $post_type, 'side', 'default');
            add_meta_box('cmfaq_excerpt_div', 'Excerpt', array(__CLASS__, 'render_meta_box_post_excerpt'), $post_type, 'advanced', 'default');
        }
        add_meta_box('cmfaq_search_widget_status_div', 'FAQ Search Widget', array(__CLASS__, 'render_meta_box_post_search_widget_status'), $post_type, 'side', 'default');

    }

    public static function init_post_meta($post_id) {
        $post = get_post($post_id);
        if ($post && $post->post_type == 'cmfaq_question') {
            add_post_meta($post->ID, 'cmfaq_rating', 0, TRUE);
            add_post_meta($post->ID, 'cmfaq_main_category_id', FALSE, TRUE);
        }
    }

    public static function before_delete_post($post_id) {
        $post = get_post($post_id);
        if ($post && $post->post_type == 'cmfaq_question') {
            delete_post_meta($post->ID, 'cmfaq_main_category_id');
        }
    }

    public static function save_post_meta($post_id) {
        $post = get_post($post_id);
        if (!$post || $post->post_type != 'cmfaq_question') {
            return $post_id;
        }
        if (!wp_verify_nonce(filter_input(INPUT_POST, 'cmfaq_main_category_id_nonce'), 'cmfaq_main_category_id')) {
            return $post_id;
        }
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return $post_id;
        }
        update_post_meta($post->ID, 'cmfaq_main_category_id', sanitize_text_field($_POST['cmfaq_main_category_id']));
    }

    public static function save_cmfaq_category_custom_meta($term_id) {
        if (isset($_POST['term_meta'])) {
            $t_id = $term_id;
            $term_meta = get_option("taxonomy_$t_id");
            $cat_keys = array_keys($_POST['term_meta']);
            foreach ($cat_keys as $key) {
                if (isset($_POST['term_meta'][$key])) {
                    $term_meta[$key] = $_POST['term_meta'][$key];
                }
            }
            update_option("taxonomy_$t_id", $term_meta);
        }
    }

    public static function delete_cmfaq_category_custom_meta($term_id) {
        delete_option("taxonomy_{$term_id}");
    }

    public static function admin_menu() {
        add_menu_page(CMFAQ_NAME, CMFAQ_NAME, 'level_1', CMFAQ_SLUG_NAME, 'edit.php?post_type=cmfaq_question', CMFAQ_PLUGIN_DIR_URL . 'assets/backend/img/icon-16x16.png');
        add_submenu_page(CMFAQ_SLUG_NAME, 'Add New Question', 'Add New Question', 'level_1', 'post-new.php?post_type=cmfaq_question');
        add_submenu_page(CMFAQ_SLUG_NAME, 'Categories', 'Categories', 'level_1', 'edit-tags.php?taxonomy=cmfaq_category');
        add_submenu_page(CMFAQ_SLUG_NAME, 'Lists', 'Lists', 'level_1', 'cmfaq_list',[__CLASS__,'renderProAdminPage'],3);
        add_submenu_page(CMFAQ_SLUG_NAME, 'Statistics', 'Statistics', 'level_1', 'cmfaq_statistics',[__CLASS__,'renderProAdminPage'],7);
        add_submenu_page( CMFAQ_SLUG_NAME, 'Import/Export', 'Import/Export', 'level_1', 'cmfaq_import-export',[__CLASS__,'renderProAdminPage'],5 );
    }

    public static function renderProAdminPage(){
        $pageId = filter_input(INPUT_GET, 'page');
        switch ($pageId) {
            case 'cmfaq_statistics': {
                include_once CMFAQ_PLUGIN_DIR_PATH . 'views/backend/statistics.phtml';
                break;
            }
            case 'cmfaq_list': {
                include_once CMFAQ_PLUGIN_DIR_PATH . 'views/backend/lists.phtml';
                break;
            }
            case 'cmfaq_import-export': {
                include_once CMFAQ_PLUGIN_DIR_PATH . 'views/backend/import-export.phtml';
                break;
            }
        }
    }

    public static function parent_file() {
        return CMFAQ_SLUG_NAME;
    }

    public static function nav() {
        global $self, $parent_file, $submenu_file, $plugin_page, $typenow, $submenu;
        ob_start();
        $submenus = array();

        $menuItem = CMFAQ_SLUG_NAME;

        if (isset($submenu[$menuItem])) {
            $thisMenu = $submenu[$menuItem];

            foreach ($thisMenu as $sub_item) {
                $slug = $sub_item[2];

                // Handle current for post_type=post|page|foo pages, which won't match $self.
                $self_type = !empty($typenow) ? $self . '?post_type=' . $typenow : 'nothing';

                $isCurrent = FALSE;
                $subpageUrl = get_admin_url('', 'admin.php?page=' . $slug);

                if ((!isset($plugin_page) && $self == $slug) || (isset($plugin_page) && $plugin_page == $slug && ($menuItem == $self_type || $menuItem == $self || file_exists($menuItem) === false))) {
                    $isCurrent = TRUE;
                }

                $url = (strpos($slug, '.php') !== false || strpos($slug, 'http') !== false) ? $slug : $subpageUrl;
                $isExternalPage = strpos($slug, 'http') !== FALSE;
                $submenus[] = array(
                    'link' => $url,
                    'title' => $sub_item[0],
                    'current' => $isCurrent,
                    'target' => $isExternalPage ? '_blank' : ''
                );
            }
            include CMFAQ_PLUGIN_DIR_PATH . 'views/backend/nav.php';
        }
        $nav = ob_get_clean();
        return $nav;
    }

    public static function display_page($content) {
        $nav = self::nav();
        include CMFAQ_PLUGIN_DIR_PATH . 'views/backend/template.php';
    }

    public static function page() {
        ob_start();
        switch ($_GET['page']) {
            case CMFAQ_SLUG_NAME . '-about' : {
                    include CMFAQ_PLUGIN_DIR_PATH . 'views/backend/about.php';
                    break;
                }
            case CMFAQ_SLUG_NAME . '-user-guide' : {
                    include CMFAQ_PLUGIN_DIR_PATH . 'views/backend/user_guide.php';
                    break;
                }
        }
        self::display_page(ob_get_clean());
    }

    public static function cmfaq_category_add_form_fields() {
        include self::get_template_path('parts/admin_category_add_form_fields.php');
    }

    public static function cmfaq_category_edit_form_fields($term) {
        include self::get_template_path('parts/admin_category_add_form_fields.php');
    }

    public static function render_meta_box_post_main_category_id($post) {
        echo '<div class="cmfaq-pro-only-label">Available in pro version</div>';
        echo '<div class="cmfaq-pro-only"><label for="cmfaq_main_category_id">';
        echo 'Main FAQ category';
        echo '</label><br />';
        echo '<select id="cmfaq_main_category_id" name="cmfaq_main_category_id" disabled style="width:150px">';
        echo '<option value=""></option>';
        echo '</select></div>';
    }

    public static function render_meta_box_post_show_voting($post) {
        echo '<div class="cmfaq-pro-only-label">Available in pro version</div>';
        echo '<div class="cmfaq-pro-only">';
        echo '<input type="checkbox" name="cmfaq_show_voting" id="cmfaq_show_voting" checked value="" disabled/> ';
        echo '<label for="cmfaq_show_voting">';
        echo 'Show voting for this question';
        echo '</label>';

        echo '<p class="howto">To enable/disable voting in entire plugin change options at &quot;<span class="disabled-link">Voting</span>&quot; tab.</p>';
        echo '<p class="howto">Now global plugin voting is <strong>disabled</strong>.</p>';
        echo '</div>';
    }

    public static function render_meta_box_post_disable_chat_gpt($post){
        echo '<div class="cmfaq-pro-only-label">Available in pro version</div>';
        echo '<div class="cmfaq-pro-only">';
        echo '<input type="checkbox" name="cmfaq_disable_chat_gpt" id="cmfaq_disable_chat_gpt" value="" disabled/> ';
        echo '<label for="cmfaq_disable_chat_gpt">';
        echo 'Disable auto-answering by Chat GPT for this question';
        echo '</label>';
        echo '</div>';
    }

    public static function render_meta_box_post_tags($post){
        echo '<div class="cmfaq-pro-only-label">Available in pro version</div>';
        echo '<div class="cmfaq-pro-only">';
        echo '<div style="display:inline-flex"><input type="text" name="cmfaq_tags" id="cmfaq_tags" value="" disabled/> ';
        echo '<button disabled class="button">Add</button></div>';
        echo '<p>Separate tags with commas</p>';
        echo '<span class="disabled-link">Choose from the most used tags</span>';
        echo '</div>';
    }

    public static function render_meta_box_post_excerpt($post){
        echo '<div class="cmfaq-pro-only-label">Available in pro version</div>';
        echo '<div class="cmfaq-pro-only">';
        echo '<textarea rows="2" name="cmfaq_excerpt" id="cmfaq_excerpt" style="resize:none; width:100%" disabled></textarea> ';
        echo '<p>Excerpts are optional hand-crafted summaries of your content that can be used in your theme. ';
        echo '<span class="disabled-link">Learn more about manual excerpts</span>.</p>';
        echo '</div>';
    }

    public static function render_meta_box_post_search_widget_status($post) {
        echo '<div class="cmfaq-pro-only-label">Available in pro version</div>';
        echo '<div class="cmfaq-pro-only">';
        echo '<p class="howto">Now Search Widget is <strong>disabled</strong> in plugin options (<span class="disabled-link">change</span>).</p>';
        echo '<label for="cmfaq_search_widget_status">';
        echo 'Search Widget status for this entry:';
        echo '</label><br />';
        echo '<select name="cmfaq_search_widget_status" id="cmfaq_search_widget_status" disabled>';
        echo '<option selected="selected" value="0">Use plugin options</option>';
        echo '</select>';
        echo '</div>';
    }

    public static function printAdminStyles(){
        wp_register_style('cmfaq-pro-only-css', false); // Replace 'false' with the actual stylesheet URL if needed
        wp_enqueue_style('cmfaq-pro-only-css');
        wp_add_inline_style('cmfaq-pro-only-css', self::getProOnlyStyles() );
    }
    public static function getProOnlyStyles(){
        return ".cmfaq-pro-only{
                border: 3px solid purple;
                padding: 5px 10px;
            }
        
        .cmfaq-pro-only *:not(p,label){
            opacity: 0.9 !important;
        }
        
        .cmfaq-pro-only p, .cmfaq-pro-only label{
            opacity: 0.7;
        }
        
        .cmfaq-pro-only #cmfaq_tags{
            max-width: 150px;
        }
        
        .cmfaq-pro-only-label{
            color: purple;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
        }
        
        .cmfaq-pro-only .disabled-link{
            text-decoration: underline;
            color:gray;
            cursor:pointer;
        }";
    }

    private static function get_template_path($filename) {
        return CMFAQ_PLUGIN_DIR_PATH . 'views/backend/' . $filename;
    }

    public static function getFontSizes(){
        return [
            ''      => '-Default-',
            '8px'    => '8 px',
            '10px'   => '10 px',
            '12px'   => '12 px',
            '14px'   => '14 px',
            '16px'   => '16 px',
            '18px'   => '18 px',
            '20px'   => '20 px',
            '22px'   => '22 px',
            '24px'   => '24 px',
            '26px'   => '26 px',
            '28px'   => '28 px',
            '30px'   => '30 px',
            '32px'   => '32 px',
            '0.5em'  => '0.5 em',
            '0.75em' => '0.75 em',
            '0.85em' => '0.85 em',
            '1em'    => '1 em',
            '1.15em' => '1.15 em',
            '1.25em' => '1.25 em',
            '1.5em'  => '1.5 em',
            '1.75em' => '1.75 em',
            '2em'    => '2 em'
        ];
    }

    public static function renderFontSizeSelectOptions($selected){
        $output = '';
        $sizes = self::getFontSizes();
        foreach($sizes as $key => $val){
            $output .= sprintf('<option value="%s" %s>%s</option>',$key,selected( $key, $selected ),$val);
        }
        return $output;
    }

}
