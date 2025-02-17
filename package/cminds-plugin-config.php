<?php
ob_start();
include plugin_dir_path(__FILE__) . 'views/plugin_compare_table.php';
$plugin_compare_table = ob_get_contents();
ob_end_clean();
$activation_redirect_wizard = isset(get_option('cmfaq_options')['cmfaq_add_wizard_menu']) ? get_option('cmfaq_options')['cmfaq_add_wizard_menu'] : true;
$cminds_plugin_config = array(
	'plugin-is-pro'				 => FALSE,
	'plugin-has-addons'			 => FALSE,
	'plugin-version'			 => '1.2.4',
	'plugin-abbrev'				 => 'cmfaq',
	'plugin-short-slug'			 => 'cmfaq',
	'plugin-parent-short-slug'	 => '',
    'plugin-affiliate'               => '',
    'plugin-redirect-after-install'  => $activation_redirect_wizard ? admin_url( 'admin.php?page=cmfaq_setup_wizard' ) : admin_url( 'admin.php?page=cm-faq-options' ),
     'plugin-show-guide'                 => TRUE,
     'plugin-guide-text'                 => '    <div style="display:block">
        <ol>
         <li>From the plugin admin menu select <strong>"Categories"</strong> and define your initial categories</li>
         <li>From the plugin admin menu select <strong>Add New Question </strong> to add your first question</li>
            <li>Make sure to select your question <strong>Categories</strong> and also the <strong>Main Category</strong></li>
            <li>From the plugin <strong>Options</strong> click on <strong>CM FAQ Pro page</strong> link.</li>
             <li><strong>Troubleshooting:</strong> Make sure that you are using Post name permalink structure in the WP Admin Settings -> Permalinks.</li>
            <li><strong>Troubleshooting:</strong> If post type archive does not show up or displays 404 then install Rewrite Rules Inspector plugin and use the Flush rules button.</li>
            <li><strong>Troubleshooting:</strong> Questions which appears under Uncategorized in the FAQ index page require that they will assigned to a category..</li>        
        </ol>
    </div>',
     'plugin-guide-video-height'         => 240,
     'plugin-guide-videos'               => array(
          array( 'title' => 'Installation tutorial', 'video_id' => '160219571' ),
     ),
     'plugin-upgrade-text'           => 'Good Reasons to Upgrade to Pro',
    'plugin-upgrade-text-list'      => array(
        array( 'title' => 'Introduction to the faq manager', 'video_time' => '0:00' ),
        array( 'title' => 'Search and filter main faq list', 'video_time' => '0:34' ),
        array( 'title' => 'Search floating widget', 'video_time' => '0:42' ),
        array( 'title' => 'Vote using thumbs up or down', 'video_time' => '0:51' ),
        array( 'title' => 'Advanced edition options', 'video_time' => '0:57' ),
        array( 'title' => 'Categories support', 'video_time' => '1:26' ),
        array( 'title' => 'Tags support', 'video_time' => '1:43' ),
        array( 'title' => 'Advanced setting options', 'video_time' => '1:49' ),
        array( 'title' => 'Labels and apperance setting options', 'video_time' => '2:00' ),
    ),
    'plugin-upgrade-video-height'   => 240,
    'plugin-upgrade-videos'         => array(
        array( 'title' => 'FAQ Plugin Premium Features', 'video_id' => '147647330' ),
    ),
	'plugin-file'				 => CMFAQ_FILE,
	'plugin-dir-path'			 => plugin_dir_path( CMFAQ_FILE ),
	'plugin-dir-url'			 => plugin_dir_url( CMFAQ_FILE ),
	'plugin-basename'			 => plugin_basename( CMFAQ_FILE ),
	'plugin-icon'				 => '',
	'plugin-name'				 => CMFAQ_NAME,
	'plugin-license-name'		 => CMFAQ_NAME,
	'plugin-slug'				 => '',
	'plugin-menu-item'			 => CMFAQ_SLUG_NAME,
	'plugin-textdomain'			 => CMFAQ_SLUG_NAME,
	'plugin-userguide-key'		 => '2743-cm-faq-cmfaq-free-version-tutorial',
    'plugin-campign'             => '?utm_source=faqfree&utm_campaign=freeupgrade',
	'plugin-store-url'			 => 'https://www.cminds.com/wordpress-plugins-library/faq-plugin-for-wordpress-by-creativeminds?utm_source=faqree&utm_campaign=freeupgrade&upgrade=1',
	'plugin-review-url'			 => 'https://www.cminds.com/wordpress-plugins-library/faq-plugin-for-wordpress-by-creativeminds#reviews',
	'plugin-support-url'		 => 'https://www.cminds.com/contact/',
	'plugin-video-tutorials-url'		 => 'https://www.videolessonsplugin.com/video-lesson/lesson/frequently-asked-questions-plugin/',
	'plugin-changelog-url'		 => CMFAQ_RELEASE_NOTES_URL,
	'plugin-licensing-aliases'	 => array( ),
	'plugin-compare-table'	 => $plugin_compare_table,
);