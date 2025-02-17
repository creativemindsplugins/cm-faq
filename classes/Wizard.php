<?php

class CMFAQ_SetupWizard{

    //Common functions

    public static $steps = [
        1 => ['title' => 'Initial Setup',
            'options' => [
                0 => [
                    'name' => 'cmfaq_question_slug',
                    'title' => 'Define the questions slug',
                    'type' => 'string',
                    'value'   => CMFAQ_SLUG_NAME."-question",
                    'hint' => 'Customize the URL structure for FAQ question links (Example: /cm-faq-question/what-are-prime-numbers/)'
                ],
                1 => [
                    'name' => 'cmfaq_category_slug',
                    'title' => 'Define the categories slug',
                    'type' => 'string',
                    'value'   => CMFAQ_SLUG_NAME."-category",
                    'hint' => 'Customize the URL structure for FAQ category links (Example: /cm-faq-category/general-questions/)'
                ],
                2 => [
                    'name' => 'cmfaq_front_num_questions',
                    'title' => 'FAQ front page questions limit',
                    'type' => 'int',
                    'value'   => 5,
                    'min'   => 1,
                    'max'   => 25,
                    'hint' => 'Set the maximum number of questions displayed under each category on the FAQ front page.'
                ],
                3 => [
                    'name' => 'cmfaq_num_words',
                    'title' => 'Answer word limit',
                    'type' => 'int',
                    'value'   => 200,
                    'min'   => 5,
                    'max'   => 1000,
                    'hint' => 'Set the maximum number of words shown in answer previews on category pages.'
                ],
                4 => [
                    'name' => 'cmfaq_show_search_bar',
                    'title' => 'Show search bar',
                    'type' => 'bool',
                    'value'   => 1,
                    'hint' => 'Enable this option to display a search bar in the FAQ section.'
                ],
            ],
        ],
        2 => ['title' =>'Appearance Settings',
            'options' => [
                0 => [
                    'name' => 'cmfaq_css_color_tile_title',
                    'title' => 'Tiles titles color',
                    'type' => 'color',
                    'value' => '',
                    'hint' => 'Choose the color of FAQ category titles on the FAQ front page.'
                ],
                1 => [
                    'name' => 'cmfaq_css_size_tile_title',
                    'title' => 'Tiles titles font size',
                    'type' => 'select',
                    'value' => '',
                    'options' => ['CMFAQ_Admin','getFontSizes'],
                    'hint' => 'Set the font size of FAQ category titles on the FAQ front page.'
                ],
                2 => [
                    'name' => 'cmfaq_css_color_tile_link',
                    'title' => 'Tiles links color',
                    'type' => 'color',
                    'value' => '',
                    'hint' => 'Choose the color of FAQ question links on the FAQ front page.'
                ],
                3 => [
                    'name' => 'cmfaq_css_size_tile_link',
                    'title' => 'Tiles links font size',
                    'type' => 'select',
                    'value' => '',
                    'options' => ['CMFAQ_Admin','getFontSizes'],
                    'hint' => 'Set the font size of FAQ question links on the FAQ front page.'
                ],
                4 => [
                    'name' => 'cmfaq_css_color_tile_more',
                    'title' => 'Tiles links more color',
                    'type' => 'color',
                    'value' => '',
                    'hint' => 'Choose the color of the "Show more" link under categories on the FAQ front page.'
                ],
                5 => [
                    'name' => 'cmfaq_css_size_tile_more',
                    'title' => 'Tiles links more font size',
                    'type' => 'select',
                    'value' => '',
                    'options' => ['CMFAQ_Admin','getFontSizes'],
                    'hint' => 'Set the font size of the "Show more" link under categories on the FAQ front page.'
                ],
            ],
            'content'   => "<div class='form-group cmfaq_links_preview_box'>
                                <label class='label'>Preview</label>
                                <div class='links_preview'>
                                    <h4>FAQ Category Example</h4>
                                    <ul class='cmfaq_links_list'>
                                        <li>Question 1</li>
                                        <li>Question 2</li>
                                        <li>Question 3</li>
                                    </ul>
                                    <span class='cmfaq-show-more-link'>Show more >></span>
                                </div>
                            </div>",
        ],
        3 => ['title' =>'Labels Settings',
            'description' => '<p>Optionally, you can edit the plugin labels or translate them to another<br/> language for use in the FAQ section on the front-end.</p>',
            'options' => [
                0 => [
                    'name' => 'cmfaq_label_side_categories',
                    'title' => 'Categories',
                    'type' => 'string',
                    'value' => 'Categories',
                    'hint' => 'Customize the title for the category list on the FAQ index page.'
                ],
                1 => [
                    'name' => 'cmfaq_label_tiles_show_more',
                    'title' => 'Show more',
                    'type' => 'string',
                    'value' => 'Show more >>',
                    'hint' => 'Customize the label for the "Show more" link under categories on the FAQ index page.'
                ],
                2 => [
                    'name' => 'cmfaq_label_breadcrumb_home',
                    'title' => 'Breadcrumb - home',
                    'type' => 'string',
                    'value' => 'Home',
                    'hint' => 'Customize the label for the backlink to the FAQ index page from category or question pages.'
                ],
                3 => [
                    'name' => 'cmfaq_label_as_placeholder',
                    'title' => 'Search input placeholder',
                    'type' => 'string',
                    'value' => 'Search ...',
                    'hint' => 'Customize the placeholder text displayed inside the search bar.'
                ],
                4 => [
                    'name' => 'cmfaq_label_search_results',
                    'title' => 'Search results',
                    'type' => 'string',
                    'value' => 'Search results',
                    'hint' => 'Customize the title displayed for search results.'
                ],
                5 => [
                    'name' => 'cmfaq_label_search_no_results',
                    'title' => 'Search - no results',
                    'type' => 'string',
                    'value' => 'Sorry, but nothing found.',
                    'hint' => 'Customize the label for the message displayed when no results are found.'
                ],
            ],
        ],
        4 => ['title' =>'Creating FAQ Categories',
            'content' => "<p>The plugin allows you to categorize FAQ questions. Go to the <a href='/wp-admin/edit-tags.php?taxonomy=cmfaq_category' target='_blank'>\"Categories\"</a> page to create some. This page consists of 2 parts:</p>
            <ul style='list-style:pointer; margin: 0 15px; line-height: 1.5rem;'>
                <li>Form for creating a new category - Add a title and description for the category, and specify whether it should be a parent or child category.</li>
                <li>Table for managing existing categories - Edit or delete categories, and view the number of questions assigned to each category.</li>
            </ul><br/>
            <div class='cm_wizard_image_holder'>
                <a href='" . CMFAQ_PLUGIN_DIR_URL . "assets/backend/img/cm-faq-categories.png' target='_blank'>
                    <img src='" . CMFAQ_PLUGIN_DIR_URL . "assets/backend/img/cm-faq-categories.png' width='750px'/>
                </a>
            </div>"
        ],
        5 => ['title' =>'Creating FAQ Questions',
            'content' => "<p>To create your first FAQ question, head to <a href='/wp-admin/post-new.php?post_type=cmfaq_question' target='_blank'>\"Add New Question\"</a>. Here you need to do the following:</p>
            <ul style='list-style:pointer; padding: 0 15px; margin: 0; line-height: 1.5rem;'>
                <li>Add a question.</li>
                <li>Add an answer.</li>
                <li>Choose a relevant FAQ category.</li>
                <li>Click \"Publish\".</li>
            </ul><br/>
            <div class='cm_wizard_image_holder'>
                <a href='" . CMFAQ_PLUGIN_DIR_URL . "assets/backend/img/cm-faq-add-question.png' target='_blank'>
                    <img src='" . CMFAQ_PLUGIN_DIR_URL . "assets/backend/img/cm-faq-add-question.png' width='750px'/>
                </a>
            </div>",
        ],
        6 => ['title' =>'FAQ Index Page',
            'content' => "<p>You can always find a link to the FAQ index page from the plugin settings, or change it:</p>
            <ul style='list-style:pointer; padding: 0 15px; margin: 0; line-height: 1.5rem;'>
                <li>Head to <a href='/wp-admin/admin.php?page=". CMFAQ_SLUG_NAME . "-options' target='_blank'>\"Options\"</a>.</li>
                <li>The actual link to the index page is always displayed above the settings under the \"Plugin Options\" tab.</li>
                <li>You can always create another FAQ page and choose it as the index. It is just enough to place the shortcode <code>[cm_faq]</code> on the needed page.</li>
            </ul><br/>
            <div class='cm_wizard_image_holder'>
                <a href='" . CMFAQ_PLUGIN_DIR_URL . "assets/backend/img/cm-faq-index-page.png' target='_blank'>
                    <img src='" . CMFAQ_PLUGIN_DIR_URL . "assets/backend/img/cm-faq-index-page.png' width='750px'/>
                </a>
            </div>",
        ],
    ];

    public static $slug = 'cmfaq';

    public static function init() {
        add_action('admin_menu', array(__CLASS__, 'add_submenu_page'),30);
        add_action('wp_ajax_cmfaq_save_wizard_options',[__CLASS__,'saveOptions']);
        add_action( 'admin_enqueue_scripts', [ __CLASS__, 'enqueueAdminScripts' ] );
    }

    public static function add_submenu_page(){
        if(\CM\CMFAQ_Settings::get('cmfaq_add_wizard_menu', 1)){
            add_submenu_page( CMFAQ_SLUG_NAME, 'Setup Wizard', 'Setup Wizard', 'manage_options', self::$slug . '_setup_wizard',[__CLASS__,'renderWizard'],20 );
        }
    }

    public static function enqueueAdminScripts(){
        $screen = get_current_screen();

        if ($screen && $screen->id === 'cm-faq_page_cmfaq_setup_wizard') {
            wp_enqueue_style('wizard-css', CMFAQ_PLUGIN_DIR_URL . 'assets/backend/css/wizard.css', [], '1.0.1');
            wp_enqueue_script('wizard-js', CMFAQ_PLUGIN_DIR_URL . 'assets/backend/js/wizard.js', ['jquery'], '1.0.1');
            wp_localize_script('wizard-js', 'wizard_data', ['ajaxurl' => admin_url('admin-ajax.php')]);
            wp_enqueue_script('wp-color-picker');
            wp_enqueue_style('wp-color-picker');
            CMFAQ_Base::enqueue_style();
        }
    }

    public static function renderWizard(){
        require CMFAQ_PLUGIN_DIR_PATH . 'views/backend/wizard.php';
    }

    public static function renderSteps(){
        $output = '';
        $steps = self::$steps;
        foreach($steps as $num => $step){
            $output .= "<div class='cm-wizard-step step-{$num}' style='display:none;'>";
            $output .= "<h1>" . self::getStepTitle($num) . "</h1>";
            $output .= "<div class='step-container'>
                            <div class='cm-wizard-menu-container'>" . self::renderWizardMenu($num)." </div>";
            $output .= "<div class='cm-wizard-content-container'>";
            if(isset($step['description'])){
                $output .= "<div class='step-description'>{$step['description']}</div><br/>";
            }
            if(isset($step['options'])){
                $output .= "<form>";
                $output .= wp_nonce_field('wizard-form');
                foreach($step['options'] as $option){
                    $output .=  self::renderOption($option);
                }
                $output .= "</form>";
            }
            if (isset($step['content'])){
                $output .= $step['content'];
            }
            $output .= '</div></div>';
            $output .= self::renderStepsNavigation($num);
            $output .= '</div>';
        }
        return $output;
    }

    public static function renderStepsNavigation($num){
        $settings_url = admin_url( 'admin.php?page='. CMFAQ_SLUG_NAME . '-options' );
        $output = "<div class='step-navigation-container'>
            <button class='prev-step' data-step='{$num}'>Previous</button>";
        if($num == count(self::$steps)){
            $output .= "<button class='finish' onclick='window.location.href = \"$settings_url\" '>Finish</button>";
        } else {
         $output .= "<button class='next-step' data-step='{$num}'>Next</button>";
        }
        $output .= "<p><a href='$settings_url'>Skip the setup wizard</a></p></div>";
        return $output;
    }

    public static function renderOption($option){
        switch($option['type']) {
            case 'bool':
                return self::renderBool($option);
            case 'int':
                return self::renderInt($option);
            case 'string':
                return self::renderString($option);
            case 'radio':
                return self::renderRadioSelect($option);
            case 'select':
                return self::renderSelect($option);
            case 'color':
                return self::renderColor($option);
            case 'multicheckbox':
                return self::renderMulticheckbox($option);
        }
    }

    public static function renderBool($option){
        $checked = checked(1,\CM\CMFAQ_Settings::get( $option['name'],$option['value'] ),false);
         $output = "<div class='form-group'>
                <label for='{$option['name']}' class='label'>{$option['title']}<div class='cm_field_help' data-title='{$option['hint']}'></div></label>";
        if($option['value'] == 1 || $option['value'] == 0 ){
            $oposite_val = intval(!$option['value']);
            $output .= "<input type='hidden' name='{$option['name']}' value='{$oposite_val}'>";
        }
        $output .= "<input type='checkbox' id='{$option['name']}' name='{$option['name']}' class='toggle-input' value='{$option['value']}' {$checked}>
                <label for='{$option['name']}' class='toggle-switch'></label>
            </div>";
        return $output;
    }

    public static function renderInt($option){
        $min = isset($option['min']) ? "min='{$option['min']}'" : '';
        $max = isset($option['max']) ? "max='{$option['max']}'" : '';
        $step = isset($option['step']) ? "step='{$option['step']}'" : '';
        $value = \CM\CMFAQ_Settings::get( $option['name'], $option['value']);
        return "<div class='form-group'>
                <label for='{$option['name']}' class='label'>{$option['title']}<div class='cm_field_help' data-title='{$option['hint']}'></div></label>
                <input type='number' id='{$option['name']}' name='{$option['name']}' value='{$value}' {$min} {$max} {$step}/>
            </div>";
    }

    public static function renderString($option){
        $value = \CM\CMFAQ_Settings::get( $option['name'], $option['value'] );
        return "<div class='form-group'>
                <label for='{$option['name']}' class='label'>{$option['title']}<div class='cm_field_help' data-title='{$option['hint']}'></div></label>
                <input type='text' id='{$option['name']}' name='{$option['name']}' value='{$value}'/>
            </div>";
    }

    public static function renderRadioSelect($option){
        $options = $option['options'];
        $output = "<div class='form-group'>
                <label class='label'>{$option['title']}<div class='cm_field_help' data-title='{$option['hint']}'></div></label>
                <div>";
        if(is_callable($option['options'], false, $callable_name)) {
            $options = call_user_func($option['options']);
        }
        foreach($options as $item) {
            $checked = checked($item['value'],\CM\CMFAQ_Settings::get( $option['name'] ),false);
            $output .= "<input type='radio' id='{$option['name']}_{$item['value']}' name='{$option['name']}' value='{$item['value']}' {$checked}/>
                <label for='{$option['name']}_{$item['value']}'>{$item['title']}</label><br>";
        }
        $output .= "</div></div>";
        return $output;
    }

    public static function renderColor($option) {
        ob_start(); ?>
        <script>
            jQuery(function ($) {
                $('input[name="<?php echo esc_attr($option['name']); ?>"]').wpColorPicker({
                    change: function (event, ui) {
                        var color = ui.color.toString();
                        let name = $(this).attr('name');
                        if(name == 'cmfaq_css_color_tile_title'){
                            $('.links_preview h4').css('color',color)
                        }if(name == 'cmfaq_css_color_tile_link'){
                            $('.links_preview li').css('color',color)
                        }if(name == 'cmfaq_css_color_tile_more'){
                            $('.links_preview span').css('color',color)
                        }
                    },
                    clear:function () {
                        let input = $(this).closest('.form-group').find('input[type=text]');
                        let name = input.attr('name');
                        console.log(input,name)
                        if(name == 'cmfaq_css_color_tile_title'){
                            $('.links_preview h4').css('color','unset')
                        }if(name == 'cmfaq_css_color_tile_link'){
                            $('.links_preview li').css('color','unset')
                        }if(name == 'cmfaq_css_color_tile_more'){
                            $('.links_preview span').css('color','unset')
                        }
                    }
                });
            });
        </script> <?php
        $output = ob_get_clean();
        $value = \CM\CMFAQ_Settings::get( $option['name'], $option['value']);
        $output .= "<div class='form-group'>
            <label for='{$option['name']}' class='label'>{$option['title']}<div class='cm_field_help' data-title='{$option['hint']}'></div></label>";
        $output .= sprintf('<input type="text" name="%s" value="%s" />', esc_attr($option['name']), esc_attr($value));
        $output .= "</div>";
        return $output;
    }

    public static function renderSelect($option)
    {
        $options = $option['options'];
        $output = "<div class='form-group'>
                <label for='{$option['name']}' class='label'>{$option['title']}<div class='cm_field_help' data-title='{$option['hint']}'></div></label>
                <select id='{$option['name']}' name='{$option['name']}'>";
        if ( is_callable($option['options'], false, $callable_name) ) {
            $options = call_user_func($option['options']);
        }
        foreach ($options as $key => $item) {
            $selected = selected($key, \CM\CMFAQ_Settings::get($option['name']), false);
            $output .= "<option value='{$key}' {$selected}>{$item}</option>";
        }
        $output .= "</select></div>";
        return $output;
    }
    public static function renderMulticheckbox($option){
        $options = $option['options'];
        $output = "<div class='form-group'>
                <label class='label'>{$option['title']}<div class='cm_field_help' data-title='{$option['hint']}'></div></label>
                <div>";
        if(is_callable($option['options'], false, $callable_name)) {
            $options = call_user_func($option['options']);
        }
        foreach($options as $item) {
            $checked = in_array($item['value'],\CM\CMFAQ_Settings::get( $option['name'] )) ? 'checked' : '';
            $output .= "<input type='checkbox' id='{$option['name']}_{$item['value']}' name='{$option['name']}[]' value='{$item['value']}' {$checked}/>
                <label for='{$option['name']}_{$item['value']}'>{$item['title']}</label><br>";
        }
        $output .= "</div></div>";
        return $output;
    }

    public static function renderWizardMenu($current_step){
        $steps = self::$steps;
        $output = "<ul class='cm-wizard-menu'>";
        foreach ($steps as $key => $step) {
            $num = $key;
            $selected = $num == $current_step ? 'class="selected"' : '';
            $output .= "<li {$selected} data-step='$num'>Step $num: {$step['title']}</li>";
        }
        $output .= "</ul>";
        return $output;
    }

    public static function getStepTitle($current_step){
        $steps = self::$steps;
        $title = "Step {$current_step}: ";
        $title .= $steps[$current_step]['title'];
        return $title;
    }

    public static function saveOptions(){
        if (isset($_POST['data'])) {
            // Parse the serialized data
            parse_str($_POST['data'], $formData);
            if(!wp_verify_nonce($formData['_wpnonce'],'wizard-form')){
                wp_send_json_error();
            }
            foreach($formData as $key => $value){
                if( !str_contains($key, 'cmfaq_') ){
                    continue;
                }

                if(is_array($value)){
                    $sanitized_value = array_map('sanitize_text_field', $value);
                    \CM\CMFAQ_Settings::set($key, $sanitized_value);
                    continue;
                }
                $sanitized_value = sanitize_text_field($value);
                \CM\CMFAQ_Settings::set($key, $sanitized_value);
            }
            wp_send_json_success();
        } else {
            wp_send_json_error();
        }
    }
}
