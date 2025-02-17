<?php
namespace CM;

const TYPE_BOOL          = 'bool';
const TYPE_INT           = 'int';
const TYPE_STRING        = 'string';
const TYPE_TEXTAREA      = 'textarea';
const TYPE_RICH_TEXT     = 'rich_text';
const TYPE_RADIO         = 'radio';
const TYPE_SELECT        = 'select';
const TYPE_MULTISELECT   = 'multiselect';
const TYPE_MULTICHECKBOX = 'multicheckbox';
const TYPE_LABEL         = 'label';
const TYPE_CUSTOM        = 'custom';
const TYPE_COLOR         = 'color';

$config = [
    'tabs'    => [
        0 => [
            'tab_name' => 'Upgrade',
        ],
        1 => [
        	'tab_name' => 'General',
	        'section' => [
	        	0 => 'General',
                1 => 'Chat GPT',
                2 => 'REST API',
	        ]
        ],
        2 => [
	        'tab_name' => 'Labels',
	        'section' => [
		        0 => 'General',
		        1 => 'Widget',
	        ]
        ],
        3 => [
	        'tab_name' => 'Search Widget',
	        'section' => [
		        0 => 'General',
	        ]
        ],
        4 => [
	        'tab_name' => 'Voting',
	        'section' => [
		        0 => 'General',
	        ]
        ],
        5 => [
	        'tab_name' => 'Appearance',
	        'section' => [
		        0 => 'Frontpage',
		        1 => 'Breadcrumbs and Question lists',
		        2 => 'Questions content',
		        3 => 'QA list appearance',
	        ]
        ],
        6 => [
	        'tab_name' => 'Template',
	        'section' => [
		        0 => 'General',
	        ]
        ],
        7 => [
	        'tab_name' => 'Installation Guide',
        ],
        8 => [
	        'tab_name' => 'Shortcodes',
        ],
    ],
    'value'  => [
    ],
    'settings' => [

	    'cmfaq_page_id' => [
		    'type'        => TYPE_SELECT,
		    'value'       => 0,
		    'tab'         => 1,
		    'section'     => 0,
		    'options'     => CMFAQ_Settings::getPages(),
		    'label'       => __( 'Default CM FAQ page', 'cmfaq' ),
		    'description' => __( 'Used for example by shortcode displaying all categories.', 'cmfaq' ),
	    ],
	    'cmfaq_question_slug' => [
		    'type'        => TYPE_STRING,
		    'value'       => 'cm-faq-question',
		    'tab'         => 1,
		    'section'     => 0,
		    'label'       => __( 'CM FAQ questions slug *', 'cmfaq' ),
		    'required'    => 1,
		    'description' => __( 'Make your links prettier (' . site_url() . '/<strong>' . CMFAQ_Settings::forceGet('cmfaq_question_slug', 'cm-faq-question') . '</strong>/what-are-prime-numbers/).', 'cmfaq' ),
	    ],
	    'cmfaq_category_slug' => [
		    'type'        => TYPE_STRING,
		    'value'       => 'cm-faq-category',
		    'tab'         => 1,
		    'section'     => 0,
		    'label'       => __( 'CM FAQ categories slug *', 'cmfaq' ),
		    'required'    => 1,
		    'description' => __( 'Make your links prettier (' . site_url() . '/<strong>' . CMFAQ_Settings::forceGet('cmfaq_category_slug', 'cm-faq-category') . '</strong>/what-are-prime-numbers/).', 'cmfaq' ),
	    ],
	    'cmfaq_category_slug_include' => [
		    'type'        => TYPE_BOOL,
		    'value'       => 0,
		    'tab'         => 1,
		    'section'     => 0,
		    'label'       => __( 'Include category slug in question URL', 'cmfaq' ),
		    'description' => __( 'Include the category taxonomy part in the question URL.', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
	    'cmfaq_tag_slug' => [
		    'type'        => TYPE_STRING,
		    'value'       => 'cm-faq-tag',
		    'tab'         => 1,
		    'section'     => 0,
		    'label'       => __( 'CM FAQ tags slug *', 'cmfaq' ),
		    'required'    => 1,
		    'description' => __( 'Make your links prettier (' . site_url() . '/<strong>' . CMFAQ_Settings::forceGet('cmfaq_tag_slug', 'cm-faq-tag') . '</strong>/what-are-prime-numbers/).', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
	    'cmfaq_front_categories' => [
		    'type'        => TYPE_MULTISELECT,
		    'value'       => '',
		    'tab'         => 1,
		    'section'     => 0,
		    'options'     => [''],
		    'label'       => __( 'Front categories', 'cmfaq' ),
		    'description' => __( 'Select which categories should be displayed on start screen.
                            <br />
                            If you use shortcode with list attribute front categories will be filtered.
                            <br />
                            Order to change in <a href="edit-tags.php?taxonomy=cmfaq_category">categories</a>.', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
	    'cmfaq_front_num_questions' => [
		    'type'        => TYPE_INT,
		    'value'       => 5,
		    'tab'         => 1,
		    'section'     => 0,
		    'label'       => __( 'Front questions limit *', 'cmfaq' ),
		    'required'    => 1,
		    'description' => __( 'Limit number of questions displayed under categories on front page of CM FAQ plugin.', 'cmfaq' ),
	    ],
	    'cmfaq_num_words' => [
		    'type'        => TYPE_INT,
		    'value'       => 200,
		    'tab'         => 1,
		    'section'     => 0,
		    'label'       => __( 'Answer word limit', 'cmfaq' ),
		    'description' => __( 'Answer content word limit on pages with questions list.<br />Leave empty or set 0 to remove limit - full content will be shown.<br />Option works when next one is disabled.', 'cmfaq' ),
	    ],
        'cmfaq_show_as_answers' => [
            'type'        => TYPE_SELECT,
            'value'       => 1,
            'tab'         => 1,
            'section'     => 0,
            'options'     => ['Nothing', 'Answer','Excerpt'],
            'label'       => __( 'Show as an answer on a category/tag page:', 'cmfaq' ),
            'description' => __( 'Choose what should be shown as answers on the category/tag pages.', 'cmfaq' ),
            'onlyin'      => 'Pro'
        ],
	    'cmfaq_show_html_tags' => [
		    'type'        => TYPE_BOOL,
		    'value'       => 1,
		    'tab'         => 1,
		    'section'     => 0,
		    'label'       => __( 'Preserve HTML-tags', 'cmfaq' ),
		    'description' => __( 'If enabled, HTML-formatting of content will be kept in QA list view.', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
	    'cmfaq_show_related' => [
		    'type'        => TYPE_BOOL,
		    'value'       => 1,
		    'tab'         => 1,
		    'section'     => 0,
		    'label'       => __( 'Show related Questions', 'cmfaq' ),
		    'description' => __( 'Related Questions are based on Tags.<br />If enabled under answer will be shown 5 Questions with commons Tags.', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
	    'cmfaq_show_tags_cloud_in_front' => [
		    'type'        => TYPE_BOOL,
		    'value'       => 1,
		    'tab'         => 1,
		    'section'     => 0,
		    'label'       => __( 'Show tags cloud', 'cmfaq' ),
		    'description' => __( 'Tags cloud in frontend FAQ page.<br />If enabled, tags cloud will be shown in frontend FAQ page.', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
	    'cmfaq_show_search_bar' => [
		    'type'        => TYPE_BOOL,
		    'value'       => 1,
		    'tab'         => 1,
		    'section'     => 0,
		    'label'       => __( 'Show search bar', 'cmfaq' ),
		    'description' => __( 'Search bar in FAQ pages.<br />If enabled, search bar will be shown FAQ pages.', 'cmfaq' ),
	    ],
	    'cmfaq_show_breadcrumbs' => [
		    'type'        => TYPE_BOOL,
		    'value'       => 1,
		    'tab'         => 1,
		    'section'     => 0,
		    'label'       => __( 'Show breadcrumbs', 'cmfaq' ),
		    'description' => __( 'Breadcrumbs in FAQ pages.<br />If enabled, breadcrumbs line will be shown FAQ pages.', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
	    'cmfaq_as_show_content' => [
		    'type'        => TYPE_BOOL,
		    'value'       => 1,
		    'tab'         => 1,
		    'section'     => 0,
		    'label'       => __( 'Search suggestion with content', 'cmfaq' ),
		    'description' => __( 'Show first line of answer in search suggestion.', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
	    'cmfaq_orderby' => [
		    'type'        => TYPE_SELECT,
		    'value'       => 1,
		    'tab'         => 1,
		    'section'     => 0,
		    'options'     => ['date' => 'Publish Date', 'voting' => 'Voting', 'title' => 'Title', 'modified' => 'Modify Date'],
		    'label'       => __( 'Questions order by', 'cmfaq' ),
		    'description' => __( 'Used to sort Questions in search result.', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
	    'cmfaq_order' => [
		    'type'        => TYPE_SELECT,
		    'value'       => 1,
		    'tab'         => 1,
		    'section'     => 0,
		    'options'     => ['desc' => 'Descending', 'asc' => 'Ascending'],
		    'label'       => __( 'Questions order', 'cmfaq' ),
		    'description' => __( 'Used to sort Questions in search result.', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
	    'cmfaq_is_noindex' => [
		    'type'        => TYPE_BOOL,
		    'value'       => 0,
		    'tab'         => 1,
		    'section'     => 0,
		    'label'       => __( 'Categories and Tags noindex', 'cmfaq' ),
		    'description' => __( 'If enabled meta noindex will be appended to page head on categories and tags pages.', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
	    'cmfaq_is_enabled_statistics' => [
		    'type'        => TYPE_BOOL,
		    'value'       => 0,
		    'tab'         => 1,
		    'section'     => 0,
		    'label'       => __( 'Plugin statistics', 'cmfaq' ),
		    'description' => __( 'If enabled statistics about displaying and voting will be collected.', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
	    'cmfaq_add_wizard_menu' => [
		    'type'        => TYPE_BOOL,
		    'value'       => 1,
		    'tab'         => 1,
		    'section'     => 0,
		    'label'       => __( 'Display "Setup Wizard" in plugin menu', 'cmfaq' ),
		    'description' => __( 'Uncheck this to remove Setup Wizard from plugin menu.', 'cmfaq' ),
	    ],
        'cmfaq_gpt_enabled' => [
		    'type'        => TYPE_BOOL,
		    'value'       => false,
		    'tab'         => 1,
		    'section'     => 1,
		    'label'       => __( 'Enable Chat_GPT', 'cmfaq' ),
		    'description' => __( 'If enabled answers will be automatically generated after publishing the question without an answer.', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
        'cmfaq_gpt_api_key' => [
		    'type'        => TYPE_STRING,
		    'value'       => '',
		    'tab'         => 1,
		    'section'     => 1,
		    'label'       => __( 'Chat GPT API Key', 'cmfaq' ),
		    'description' => __( 'API key from here <a href="https://platform.openai.com/account/api-keys" target="_blank">https://platform.openai.com/account/api-keys</a>', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
        'cmfaq_gpt_model' => [
            'type'        => TYPE_SELECT,
            'value'       => '',
            'tab'         => 1,
            'section'     => 1,
            'options'     => [''],
            'label'       => __( 'Chat GPT Model', 'cmfaq' ),
            'description' => __( 'Select the model for the API calls. <strong>Warning: GPT-4 may not be avaialable for you.
						Currently it is in limited beta stage and requires joining the waitlist on the OpenAI page.
						</strong>', 'cmfaq' ),
            'onlyin'      => 'Pro'
        ],
        'cmfaq_gpt_system_role' => [
		    'type'        => TYPE_TEXTAREA,
		    'value'       => 'You are a helpful assistant.',
		    'tab'         => 1,
		    'section'     => 1,
		    'label'       => __( 'Chat GPT AI Role', 'cmfaq' ),
		    'description' => __( 'Define the role that the ChatGPT AI should assume. This can have a huge impact on the responses.', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
        'cmfaq_gpt_prompt_template' => [
		    'type'        => TYPE_STRING,
		    'value'       => '{question}',
		    'tab'         => 1,
		    'section'     => 1,
		    'label'       => __( 'Chat GPT Prompt Template', 'cmfaq' ),
		    'description' => __( 'Template for the prompt that\'s sent to Chat GPT server.
						<strong>It must contain: {question}</strong> which is a placeholder for the dynamic part.', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
        'cmfaq_gpt_reply_length' => [
		    'type'        => TYPE_INT,
		    'value'       => 1500,
		    'tab'         => 1,
		    'section'     => 1,
		    'label'       => __( 'Chat GPT Reply Length', 'cmfaq' ),
		    'description' => __( 'Set the maximum length of the reply from the chat. <strong>Warning: longer replies use more
							tokens, so you can reach limit faster.</strong>', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
        'cmfaq_gpt_temperature' => [
            'type'        => TYPE_INT,
            'value'       => 0.5,
            'tab'         => 1,
            'section'     => 1,
            'step'        => 0.1,
            'max'         => 2,
            'label'       => __( 'Chat GPT AI Temperature', 'cmfaq' ),
            'description' => __( 'Ranges from 0 to 2. Higher values like 0.8 will make the output more random, while lower values
						like 0.2 will make it more focused and deterministic.', 'cmfaq' ),
            'onlyin'      => 'Pro'
        ],
		'cmfaq_rest_api_enabled' => [
		    'type'        => TYPE_BOOL,
		    'value'       => false,
		    'tab'         => 1,
		    'section'     => 2,
		    'label'       => __( 'Enable REST API', 'cmfaq' ),
		    'description' => __( 'If enabled then you can access questions using REST API.', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
        'cmfaq_rest_api_key' => [
		    'type'        => TYPE_STRING,
		    'value'       => '1432-adcb-7098-wzyx',
		    'tab'         => 1,
		    'section'     => 2,
		    'label'       => __( 'REST API Key', 'cmfaq' ),
		    'description' => __( 'Enter the REST API key. You should add this key in the settings for use REST API', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
	    'cmfaq_label_side_categories' => [
		    'type'        => TYPE_LABEL,
		    'value'       => 'Categories',
		    'tab'         => 2,
		    'section'     => 0,
		    'label'       => __( 'Categories', 'cmfaq' ),
		    'description' => __( 'Default: Categories', 'cmfaq' ),
	    ],
	    'cmfaq_label_side_tags' => [
		    'type'        => TYPE_LABEL,
		    'value'       => 'Tags',
		    'tab'         => 2,
		    'section'     => 0,
		    'label'       => __( 'Tags', 'cmfaq' ),
		    'description' => __( 'Default: Tags', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
	    'cmfaq_label_tiles_show_more' => [
		    'type'        => TYPE_LABEL,
		    'value'       => 'Show more »',
		    'tab'         => 2,
		    'section'     => 0,
		    'required'    => 1,
		    'label'       => __( 'Tiles show more *', 'cmfaq' ),
		    'description' => __( 'Default: Show more »', 'cmfaq' ),
	    ],
	    'cmfaq_label_breadcrumb_home' => [
		    'type'        => TYPE_LABEL,
		    'value'       => 'Home',
		    'tab'         => 2,
		    'section'     => 0,
		    'required'    => 1,
		    'label'       => __( 'Breadcrumb home *', 'cmfaq' ),
		    'description' => __( 'Default: Home', 'cmfaq' ),
	    ],
	    'cmfaq_label_post_tags' => [
		    'type'        => TYPE_LABEL,
		    'value'       => 'Tags:',
		    'tab'         => 2,
		    'section'     => 0,
		    'label'       => __( 'Question tags', 'cmfaq' ),
		    'description' => __( 'Default: Tags:', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
	    'cmfaq_label_post_related' => [
		    'type'        => TYPE_LABEL,
		    'value'       => 'Related',
		    'tab'         => 2,
		    'section'     => 0,
		    'label'       => __( 'Related questions', 'cmfaq' ),
		    'description' => __( 'Default: Related', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
	    'cmfaq_label_as_placeholder' => [
		    'type'        => TYPE_LABEL,
		    'value'       => 'Search ...',
		    'tab'         => 2,
		    'section'     => 0,
		    'label'       => __( 'Search input placeholder', 'cmfaq' ),
		    'description' => __( 'Default: Search ...', 'cmfaq' ),
	    ],
	    'cmfaq_label_search_no_results' => [
		    'type'        => TYPE_LABEL,
		    'value'       => 'Sorry, but nothing found.',
		    'tab'         => 2,
		    'section'     => 0,
		    'label'       => __( 'Search / taxonomy no results', 'cmfaq' ),
		    'description' => __( 'Default: Sorry, but nothing found.', 'cmfaq' ),
	    ],
	    'cmfaq_label_search_results' => [
		    'type'        => TYPE_LABEL,
		    'value'       => 'Search results',
		    'tab'         => 2,
		    'section'     => 0,
		    'label'       => __( 'Search results', 'cmfaq' ),
		    'description' => __( 'Default: Search results', 'cmfaq' ),
	    ],
	    'cmfaq_label_same_category_shortcode' => [
		    'type'        => TYPE_LABEL,
		    'value'       => 'View other questions in this category:',
		    'tab'         => 2,
		    'section'     => 0,
		    'label'       => __( 'Title for same category questions shortcode', 'cmfaq' ),
		    'description' => __( 'Default: View other questions in this category:', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
	    'cmfaq_sw_title_open' => [
		    'type'        => TYPE_LABEL,
		    'value'       => 'Get Assistance',
		    'tab'         => 2,
		    'section'     => 1,
		    'required'    => 1,
		    'label'       => __( 'Open title *', 'cmfaq' ),
		    'description' => __( 'Default: Get Assistance', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
	    'cmfaq_sw_title_closed' => [
		    'type'        => TYPE_LABEL,
		    'value'       => 'Need Guidance?',
		    'tab'         => 2,
		    'section'     => 1,
		    'required'    => 1,
		    'label'       => __( 'Closed title *', 'cmfaq' ),
		    'description' => __( 'Default: Need Guidance?', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
	    'cmfaq_sw_label_search_placeholder' => [
		    'type'        => TYPE_LABEL,
		    'value'       => 'Search ...',
		    'tab'         => 2,
		    'section'     => 1,
		    'label'       => __( 'Search placeholder', 'cmfaq' ),
		    'description' => __( 'Default: Search ...', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
	    'cmfaq_sw_label_search_no_results' => [
		    'type'        => TYPE_LABEL,
		    'value'       => 'Sorry, but nothing matched your search terms.',
		    'tab'         => 2,
		    'section'     => 1,
		    'required'    => 1,
		    'label'       => __( 'Search no results label *', 'cmfaq' ),
		    'description' => __( 'Default: Sorry, but nothing matched your search terms.', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
	    'cmfaq_sw_show_on_cmfaq_page' => [
		    'type'        => TYPE_BOOL,
		    'value'       => 1,
		    'tab'         => 3,
		    'section'     => 0,
		    'label'       => __( 'Show on CM FAQ Page', 'cmfaq' ),
		    'description' => __( 'Show FAQ Search widget on FAQ Page', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
	    'cmfaq_sw_show_on_homepage' => [
		    'type'        => TYPE_BOOL,
		    'value'       => 1,
		    'tab'         => 3,
		    'section'     => 0,
		    'label'       => __( 'Show on Front Page', 'cmfaq' ),
		    'description' => __( 'Show FAQ Search widget on front (home) page', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
	    'cmfaq_sw_show_on_post_types' => [
		    'type'        => TYPE_MULTISELECT,
		    'value'       => ['post', 'page'],
		    'tab'         => 3,
		    'section'     => 0,
		    'options'     => [''],
		    'label'       => __( 'Show on given post types', 'cmfaq' ),
		    'description' => __( 'FAQ Search widget will be shown on chosen post types', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
	    'cmfaq_sw_show_content' => [
		    'type'        => TYPE_BOOL,
		    'value'       => 1,
		    'tab'         => 3,
		    'section'     => 0,
		    'label'       => __( 'Show answer', 'cmfaq' ),
		    'description' => __( 'Show first line of answer in Search Widget.', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
	    'cmfaq_sw_color1' => [
		    'type'        => TYPE_COLOR,
		    'value'       => '#0099FF',
		    'tab'         => 3,
		    'section'     => 0,
		    'label'       => __( 'Color *', 'cmfaq' ),
		    'description' => __( 'Choose the FAQ widget color', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
	    'cmfaq_sw_placement' => [
		    'type'        => TYPE_SELECT,
		    'value'       => 'BL',
		    'tab'         => 3,
		    'section'     => 0,
		    'options'     => ['BL' => 'Bottom Left', 'BR' => 'Bottom Right'],
		    'label'       => __( 'Placement', 'cmfaq' ),
		    'description' => __( 'Choose where the FAQ widget will be placed', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
	    'cmfaq_show_voting' => [
		    'type'        => TYPE_BOOL,
		    'value'       => 1,
		    'tab'         => 3,
		    'section'     => 0,
		    'label'       => __( 'Voting', 'cmfaq' ),
		    'description' => __( 'General option to enable/disable voting.<br /><strong>Use this option to disable voting in all places.</strong>', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
	    'cmfaq_show_voting_taxonomy' => [
		    'type'        => TYPE_BOOL,
		    'value'       => 1,
		    'tab'         => 3,
		    'section'     => 0,
		    'label'       => __( 'Categories voting', 'cmfaq' ),
		    'description' => __( 'Show voting in categories and tags.', 'cmfaq' ),
		    'condition'   => ['cmfaq_show_voting' => 1],
            'onlyin'      => 'Pro'
	    ],
	    'cmfaq_show_voting_search' => [
		    'type'        => TYPE_BOOL,
		    'value'       => 1,
		    'tab'         => 3,
		    'section'     => 0,
		    'label'       => __( 'Search results voting', 'cmfaq' ),
		    'description' => __( 'Show voting in search results.', 'cmfaq' ),
		    'condition'   => ['cmfaq_show_voting' => 1],
            'onlyin'      => 'Pro'
	    ],
	    'cmfaq_show_voting_ajaxsearch' => [
		    'type'        => TYPE_BOOL,
		    'value'       => 1,
		    'tab'         => 4,
		    'section'     => 0,
		    'label'       => __( 'Search suggestion voting', 'cmfaq' ),
		    'description' => __( 'Show voting in search suggestion.', 'cmfaq' ),
		    'condition'   => ['cmfaq_show_voting' => 1],
            'onlyin'      => 'Pro'
	    ],
	    'cmfaq_show_voting_widget' => [
		    'type'        => TYPE_BOOL,
		    'value'       => 1,
		    'tab'         => 4,
		    'section'     => 0,
		    'label'       => __( 'Search Widget voting', 'cmfaq' ),
		    'description' => __( 'Show voting in Search Widget.', 'cmfaq' ),
		    'condition'   => ['cmfaq_show_voting' => 1],
            'onlyin'      => 'Pro'
	    ],
	    'cmfaq_css_color_front_side_title' => [
			'type'        => TYPE_COLOR,
			'value'       => '',
			'tab'         => 5,
			'section'     => 0,
			'label'       => __( 'Categories and Tags titles color', 'cmfaq' ),
			'description' => __( 'Front side Categories and Tags titles', 'cmfaq' ),
            'onlyin'      => 'Pro'
		],
	    'cmfaq_css_size_front_side_title' => [
		    'type'        => TYPE_SELECT,
		    'value'       => '',
		    'tab'         => 5,
		    'section'     => 0,
		    'options'     => CMFAQ_Settings::getFontSizes(),
		    'label'       => __( 'Categories and Tags titles font size', 'cmfaq' ),
		    'description' => __( 'Front side Categories and Tags titles', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
	    'cmfaq_css_color_front_side_link' => [
		    'type'        => TYPE_COLOR,
		    'value'       => '',
		    'tab'         => 5,
		    'section'     => 0,
		    'label'       => __( 'Categories and Tags links color', 'cmfaq' ),
		    'description' => __( 'Front side Categories and Tags links', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
	    'cmfaq_css_size_front_side_link' => [
		    'type'        => TYPE_SELECT,
		    'value'       => '',
		    'tab'         => 5,
		    'section'     => 0,
		    'options'     => CMFAQ_Settings::getFontSizes(),
		    'label'       => __( 'Categories links font size', 'cmfaq' ),
		    'description' => __( 'Front side Categories links', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
	    'cmfaq_css_color_tile_title' => [
		    'type'        => TYPE_COLOR,
		    'value'       => '',
		    'tab'         => 5,
		    'section'     => 0,
		    'label'       => __( 'Tiles titles color', 'cmfaq' ),
		    'description' => __( 'Front side Tiles titles', 'cmfaq' ),
	    ],
	    'cmfaq_css_size_tile_title' => [
		    'type'        => TYPE_SELECT,
		    'value'       => '',
		    'tab'         => 5,
		    'section'     => 0,
		    'options'     => CMFAQ_Settings::getFontSizes(),
		    'label'       => __( 'Tiles titles font size', 'cmfaq' ),
		    'description' => __( 'Front side Tiles titles', 'cmfaq' ),
	    ],
	    'cmfaq_css_color_tile_link' => [
		    'type'        => TYPE_COLOR,
		    'value'       => '',
		    'tab'         => 5,
		    'section'     => 0,
		    'label'       => __( 'Tiles links color', 'cmfaq' ),
		    'description' => __( 'Front side Tiles links', 'cmfaq' ),
	    ],
	    'cmfaq_css_size_tile_link' => [
		    'type'        => TYPE_SELECT,
		    'value'       => '',
		    'tab'         => 5,
		    'section'     => 0,
		    'options'     => CMFAQ_Settings::getFontSizes(),
		    'label'       => __( 'Tiles links font size', 'cmfaq' ),
		    'description' => __( 'Front side Tiles links', 'cmfaq' ),
	    ],
	    'cmfaq_css_color_tile_more' => [
		    'type'        => TYPE_COLOR,
		    'value'       => '',
		    'tab'         => 5,
		    'section'     => 0,
		    'label'       => __( 'Tiles links more color', 'cmfaq' ),
		    'description' => __( 'Front side Tiles links more', 'cmfaq' ),
	    ],
	    'cmfaq_css_size_tile_more' => [
		    'type'        => TYPE_SELECT,
		    'value'       => '',
		    'tab'         => 5,
		    'section'     => 0,
		    'options'     => CMFAQ_Settings::getFontSizes(),
		    'label'       => __( 'Tiles links more font size', 'cmfaq' ),
		    'description' => __( 'Front side Tiles links more', 'cmfaq' ),
	    ],
	    'cmfaq_css_background_tile' => [
		    'type'        => TYPE_COLOR,
		    'value'       => '',
		    'tab'         => 5,
		    'section'     => 0,
		    'label'       => __( 'Tiles Tiles background color', 'cmfaq' ),
		    'description' => __( 'Front side Tiles background', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
	    'cmfaq_css_color_breadcrumb' => [
		    'type'        => TYPE_COLOR,
		    'value'       => '',
		    'tab'         => 5,
		    'section'     => 1,
		    'label'       => __( 'Breadcrumbs color', 'cmfaq' ),
		    'description' => __( 'Breadcrumbs color', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
	    'cmfaq_css_size_breadcrumb' => [
		    'type'        => TYPE_SELECT,
		    'value'       => '',
		    'tab'         => 5,
		    'section'     => 1,
		    'options'     => CMFAQ_Settings::getFontSizes(),
		    'label'       => __( 'Breadcrumbs font size', 'cmfaq' ),
		    'description' => __( 'Breadcrumbs font size', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
	    'cmfaq_css_color_tax_title' => [
		    'type'        => TYPE_COLOR,
		    'value'       => '',
		    'tab'         => 5,
		    'section'     => 1,
		    'label'       => __( 'Search results, Categories and Tags question lists titles color', 'cmfaq' ),
		    'description' => __( 'Search results, Categories and Tags question lists titles color', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
	    'cmfaq_css_size_tax_title' => [
		    'type'        => TYPE_SELECT,
		    'value'       => '',
		    'tab'         => 5,
		    'section'     => 1,
		    'options'     => CMFAQ_Settings::getFontSizes(),
		    'label'       => __( 'Search results, Categories and Tags question lists titles font size', 'cmfaq' ),
		    'description' => __( 'Search results, Categories and Tags question lists titles font size', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
	    'cmfaq_css_color_related_title' => [
		    'type'        => TYPE_COLOR,
		    'value'       => '',
		    'tab'         => 5,
		    'section'     => 2,
		    'label'       => __( 'Related title color', 'cmfaq' ),
		    'description' => __( 'Related title color', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
	    'cmfaq_css_size_related_title' => [
		    'type'        => TYPE_SELECT,
		    'value'       => '',
		    'tab'         => 5,
		    'section'     => 2,
		    'options'     => CMFAQ_Settings::getFontSizes(),
		    'label'       => __( 'Related title font size', 'cmfaq' ),
		    'description' => __( 'Related title font size', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
	    'cmfaq_css_color_related_link' => [
		    'type'        => TYPE_COLOR,
		    'value'       => '',
		    'tab'         => 5,
		    'section'     => 2,
		    'label'       => __( 'Related links color', 'cmfaq' ),
		    'description' => __( 'Related links color', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
	    'cmfaq_css_size_related_link' => [
		    'type'        => TYPE_SELECT,
		    'value'       => '',
		    'tab'         => 5,
		    'section'     => 2,
		    'options'     => CMFAQ_Settings::getFontSizes(),
		    'label'       => __( 'Related links font size', 'cmfaq' ),
		    'description' => __( 'Related links font size', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
	    'cmfaq_show_accordion' => [
		    'type'        => TYPE_BOOL,
		    'value'       => 1,
		    'tab'         => 5,
		    'section'     => 3,
		    'label'       => __( 'Accordion', 'cmfaq' ),
		    'description' => __( 'Convert a pairs of question and answer panels appearance into accordion visual effect.<br/>Can be overset by shortcode\'s parameter.', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
		'cmfaq_accordion_show_category_icon' => [
		    'type'        => TYPE_BOOL,
		    'value'       => 0,
		    'tab'         => 5,
		    'section'     => 3,
		    'label'       => __( 'Category icon', 'cmfaq' ),
		    'description' => __( 'If enable then category icon will show.', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
		'cmfaq_accordion_collapsed_icon' => [
		    'type'        => TYPE_CUSTOM,
		    'value'       => 0,
		    'tab'         => 5,
		    'section'     => 3,
		    'html'        => '',
		    'label'       => __( 'Collapsed panel icon', 'cmfaq' ),
		    'description' => __( 'Select icon for collapsed QA pair.', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
		'cmfaq_accordion_head_bg_color' => [
		    'type'        => TYPE_COLOR,
		    'value'       => '',
		    'tab'         => 5,
		    'section'     => 3,
		    'label'       => __( 'Header background color', 'cmfaq' ),
		    'description' => __( 'Header background color', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
		'cmfaq_accordion_expanded_icon' => [
		    'type'        => TYPE_CUSTOM,
		    'value'       => 0,
		    'tab'         => 5,
		    'section'     => 3,
		    'html'        => '',
		    'label'       => __( 'Expanded panel icon', 'cmfaq' ),
		    'description' => __( 'Select icon for expanded QA pair.', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
		'cmfaq_accordion_border_color' => [
		    'type'        => TYPE_COLOR,
		    'value'       => '',
		    'tab'         => 5,
		    'section'     => 3,
		    'label'       => __( 'Border color', 'cmfaq' ),
		    'description' => __( 'Border color', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
		'cmfaq_accordion_icon_size' => [
		    'type'        => TYPE_SELECT,
		    'value'       => '1em',
		    'tab'         => 5,
		    'section'     => 3,
		    'options'    => CMFAQ_Settings::getFontSizes(),
		    'label'       => __( 'Icon size', 'cmfaq' ),
		    'description' => __( 'Select icon size.', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
		'cmfaq_accordion_icon_color' => [
		    'type'        => TYPE_COLOR,
		    'value'       => '',
		    'tab'         => 5,
		    'section'     => 3,
		    'label'       => __( 'Icon color', 'cmfaq' ),
		    'description' => __( 'Icon color', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
		'cmfaq_accordion_icon_position' => [
		    'type'        => TYPE_SELECT,
		    'value'       => 'left',
		    'tab'         => 5,
		    'section'     => 3,
		    'options'    => array('left'=>'Left', 'right'=>'Right'),
		    'label'       => __( 'Icon position', 'cmfaq' ),
		    'description' => __( 'Select icon position.', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
		'cmfaq_accordion_q_title_color' => [
		    'type'        => TYPE_COLOR,
		    'value'       => '',
		    'tab'         => 5,
		    'section'     => 3,
		    'label'       => __( 'Question color', 'cmfaq' ),
		    'description' => __( 'Question color', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
		'cmfaq_accordion_q_title_size' => [
		    'type'        => TYPE_SELECT,
		    'value'       => '',
		    'tab'         => 5,
		    'section'     => 3,
		    'options'     => CMFAQ_Settings::getFontSizes(),
		    'label'       => __( 'Question font size', 'cmfaq' ),
		    'description' => __( 'Question font size', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
		'cmfaq_accordion_q_description_bg_color' => [
		    'type'        => TYPE_COLOR,
		    'value'       => '',
		    'tab'         => 5,
		    'section'     => 3,
		    'label'       => __( 'Description background color', 'cmfaq' ),
		    'description' => __( 'Description background color', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
		'cmfaq_accordion_q_description_size' => [
		    'type'        => TYPE_SELECT,
		    'value'       => '',
		    'tab'         => 5,
		    'section'     => 3,
		    'options'     => CMFAQ_Settings::getFontSizes(),
		    'label'       => __( 'Description font size', 'cmfaq' ),
		    'description' => __( 'Description font size', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
		'cmfaq_accordion_q_description_color' => [
		    'type'        => TYPE_COLOR,
		    'value'       => '',
		    'tab'         => 5,
		    'section'     => 3,
		    'label'       => __( 'Description color', 'cmfaq' ),
		    'description' => __( 'Description color', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
		'cmfaq_accordion_space_between_questions' => [
		    'type'        => TYPE_SELECT,
		    'value'       => '',
		    'tab'         => 5,
		    'section'     => 3,
		    'options'     => [''],
		    'label'       => __( 'Space between questions', 'cmfaq' ),
		    'description' => __( 'Space between questions', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
		'cmfaq_accordion_q_description_link_color' => [
		    'type'        => TYPE_COLOR,
		    'value'       => '',
		    'tab'         => 5,
		    'section'     => 3,
		    'label'       => __( 'Description links color', 'cmfaq' ),
		    'description' => __( 'Description links color', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
	    'cmfaq_template' => [
		    'type'        => TYPE_SELECT,
		    'value'       => 'cm_default',
		    'tab'         => 6,
		    'section'     => 0,
	        'options'     => [''],
		    'label'       => __( 'Default template', 'cmfaq' ),
		    'description' => __( 'For custom template copy <strong>frontend</strong> dir from "wp-content/plugins/cm-faq/views/" to "wp-content/themes/your_theme/CMF/" after that option will enable', 'cmfaq' ),
            'onlyin'      => 'Pro'
	    ],
        'cmfaq_question_template' => [
            'type'        => TYPE_SELECT,
            'value'       => 'single.php',
            'tab'         => 6,
            'section'     => 0,
            'options'     => [''],
            'label'       => __( 'Page layout for single FAQ question:', 'cmfaq' ),
            'description' => __( 'Choose the page layout of the current theme or set default', 'cmfaq' ),
            'onlyin'      => 'Pro'
        ],
    ],
    'presets' => [
        'default' => [
            0  => [
	            'generic' => [
		            'label'    => '',
		            'before'   => '',
		            'settings' => [

		            ]
	            ],
            ],
            1  => [
	            'generic' => [
		            'label'    => '',
		            'before'   => '',
		            'settings' => [

		            ]
	            ],
            ],
            2  => [
	            'generic' => [
		            'label'    => '',
		            'before'   => '',
		            'settings' => [

		            ]
	            ],
            ],
            3  => [
	            'generic' => [
		            'label'    => '',
		            'before'   => '',
		            'settings' => [

		            ]
	            ],
            ],
        ]
    ]

];