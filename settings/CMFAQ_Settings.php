<?php
namespace CM;

include_once plugin_dir_path(__FILE__) . 'Settings.php';
include_once plugin_dir_path(__FILE__) . 'CMFAQ_SettingsView.php';

class CMFAQ_Settings extends \CMFAQ\Settings {

	protected static $abbrev = 'cmfaq';
	protected static $dir = __DIR__;
	protected static $settingsPageSlug;

    public static function init() {
	    add_action( 'admin_enqueue_scripts', [ __CLASS__, 'enqueueAssets' ] );
	    add_action( self::abbrev( '_save_options_after' ), [ __CLASS__, 'afterSavingOptions' ], 10, 2 );
	    add_action( 'admin_menu', [ __CLASS__, 'add_settings_page' ] );

	    // Optional
	    add_filter( 'cm_settings_get', [ __CLASS__, 'maybeUnserialize' ], 10, 3 );
	    add_action( self::abbrev( '-settings-item-class' ), [ __CLASS__, 'settingItemClass' ], 1, 2 );
	    add_action( static::abbrev( '_save_options_before' ), [ __CLASS__, 'beforeSavingOptions' ], 10, 2 );
        add_action( 'admin_init', [ __CLASS__, 'adminInit' ] );

        add_filter('cmfaq-custom-settings-tab-content-0',[__CLASS__,'renderUpgradeTab']);
	    add_filter('cmfaq-custom-settings-tab-content-7',[__CLASS__,'renderInstallationGuideTab']);
	    add_filter('cmfaq-custom-settings-tab-content-8',[__CLASS__,'renderShortcodeTab']);

    }

    public static function renderUpgradeTab($content){
        $content = '<div class="block">' . do_shortcode( '[cminds_upgrade_box id="cmfaq"]' ) . '</div>';
        return $content;
    }

    public static function renderInstallationGuideTab($content){
        $content = '<div class="block">' . do_shortcode( '[cminds_free_guide id="cmfaq"]' ) . '</div>';
        return $content;
    }

    public static function renderShortcodeTab($content){
        $content = '<div class="block" style="margin-top: -40px;"><p><strong>Shortcode:</strong> <code>[cm_faq]</code></p></div>';
        return $content;
    }

	public static function add_settings_page() {
		self::$settingsPageSlug = add_submenu_page(CMFAQ_SLUG_NAME, 'Options', 'Options', 'level_1', CMFAQ_SLUG_NAME . '-options', [__CLASS__, 'render']);
	}

	public static function render() {
    	echo parent::render();
		ob_start(); ?>
		<style>
            .cmfaq-toggleProOptions-button{
                border-color: #6BC07F !important;
                color: #6BC07F !important;
            }
			.wp-picker-active {
				position: relative;
			}
			.wp-picker-holder {
				position: absolute;
			}
            .cmfaq-icon-selector span {
				font-size: 14px;
            }
            #cminds_settings_container > .card {
				margin-bottom: 20px;
				width: 100%;
				background: #FFFFFF;
				box-shadow: 0 0 3px 1px #6bc07f;
				border: unset;
				transition: .3s;
                max-width: unset;
            }
			#cminds_settings_container > .card a {
                color: #6bc07f;
            }
			#cminds_settings_container > .card #cmfaq-plugin-reset {
                display: flex;
                align-items: center;
            }
			#cminds_settings_container > .card #cmfaq-plugin-reset p {
                margin: 15px;
            }
            .cmfaq-icon-selector ul {
                max-height: 200px;
                overflow-y: auto;
            }
            .field-custom div.cmfaq-icon-selector > span.ui-icon {
                margin: 2px;
            }
			.field-custom div.cmfaq-icon-selector > span.cmfaq-default-accrd-icon {
                margin: 0;
            }
			#cmfaq-plugin-reset .button {
				transition: .3s;
				background-color: #6BC07F;
				color: #FFFFFF;
				font-size: 14px;
				line-height: 1;
				padding: 10px 15px;
				border-radius: 5px;
				cursor: pointer;
				border: none;
			}
			#cmfaq-plugin-reset .button:hover,
            #cmfaq-plugin-reset .button:focus {
				background-color: #4A8B5A;
				outline: none;
				box-shadow: unset;
				border: none;
				color: #fff;
			}
		</style>
		<?php
		echo ob_get_clean();
	}

	// May be used for adding custom class to the option HTML container
	public static function settingItemClass($class, $setting) {
        return $class;
    }

    public static function afterSavingOptions($post, $message) {
        self::addSuccessSaveMessage($post, $message);
    }

	// Show success message after settings saving
	public static function addSuccessSaveMessage($post, $message) {
        if(isset($post['cmfaq_action_restore_defaults'])) {
	        $message[0] = __('Plugin options are restored to defaults.', 'cmfaq');
            return;
        }
		$message[0] = __('Settings Saved', 'cmfaq');
	}

	public static function renderField($key, $config) {
		if (empty($config['name'])) {
			$config['name'] = $key;
		}
		$config['value'] = static::get($config['name'], $config['value']);
		$content = \CM\CMFAQ_SettingsView::renderOptionControls($key, $config);
		return $content;
	}

    public static function beforeSavingOptions($post, $messages) {
	    self::maybeFlushRewriteRules($post);
    }

    public static function maybeFlushRewriteRules($post) {
	    $options = [
		    'cmfaq_question_slug',
		    'cmfaq_category_slug',
	    ];
	    foreach ($options as $optionName) {
		    if($post[$optionName] != self::get($optionName)) {
                \CMFAQ_Base::create_post_type();
			    flush_rewrite_rules();
		    }
	    }
    }

    public static function adminInit() {
	    if (isset($_POST['cmfaq_action_restore_defaults']) && isset($_POST['nonce']) ) {
		    if (wp_verify_nonce($_POST['nonce'], 'cmfaq_action_restore_defaults')) {
			    delete_option(static::abbrev('_options'));
                \CMFAQ_Base::create_post_type();
			    flush_rewrite_rules();
		    }
	    }
    }

	// Put helper functions used in config.php

	public static function maybeUnserialize($value, $option_name, $default) {
		if(strpos($option_name, self::$abbrev) !== false) {
			$value = maybe_unserialize($value);
		}
		return $value;
	}

    /**
     * Return option value without config loading
     * @param string $option_name
     * @param string $default
     * @return mixed
     */
	public static function forceGet($option_name, $default = '') {
		$all_option = get_option(static::abbrev('_options'), []);
        if(!empty($all_option)) {
			if(!empty($all_option[$option_name])) {
				$value = maybe_unserialize($all_option[$option_name]);
				if($value) {
					return $value;
				}
			}
        }
		return $default;
	}

    public static function getPages() {
        global $wpdb;
        $pagesArr = ['None'];
        $sql = "SELECT * FROM $wpdb->posts    
                WHERE (post_type = 'page' AND post_status = 'publish')     
                ORDER BY post_title ASC";
        $pages = $wpdb->get_results( $sql );
        foreach ($pages as $page) {
            $pagesArr[$page->ID] = $page->post_title;
        }
        return $pagesArr;
    }

	public static function getFontSizes() {
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

}