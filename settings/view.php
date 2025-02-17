<?php echo do_shortcode('[cminds_free_activation id="cmfaq"]'); ?>

<br/>
<?php if (!empty($messages)): ?>
    <div class="updated" style="clear:both; margin-left: 0;"><p><?php echo $messages; ?></p></div>
<?php endif; ?>
<br/>

<?php

use CM\CMFAQ_Settings;

?>

<div class="clear"></div>

<div id="cminds_settings_container">

    <div class="card">
		<?php $index_page = get_post( CMFAQ_Settings::get( 'cmfaq_page_id', - 1 ) ); ?>
		<?php if ( $index_page ): ?>
            <h4>Default FAQ Page</h4>
            <p>
                Current default FAQ page:
                <a href="<?php echo esc_attr( get_page_link( $index_page->ID ) ); ?>"><?php echo esc_html( get_page_link( $index_page->ID ) ); ?></a>
                (<a href="<?php echo esc_attr( admin_url( 'post.php?post=' . $index_page->ID . '&action=edit' ) ); ?>">edit</a>)
            </p>
            <hr/>
		<?php endif; ?>
        <div id="cmfaq-plugin-reset-show">
            <h4>
                <a href="javascript:void(0)" onclick="jQuery('#cmfaq-plugin-reset-show').hide();
                        jQuery('#cmfaq-plugin-reset').show();">Show Plugin Reset Options</a>
            </h4>
        </div>
        <div id="cmfaq-plugin-reset" style="display: none;">
            <h4>Plugin Reset Options</h4>
            <form method="post">
                <p>
					<?php submit_button( 'Restore options to defaults', 'secondary', null, false, array( 'onclick' => 'return confirm("Are you sure?\n\nThis action cannot be undone.");' ) ); ?>
                </p>
                <input type="hidden" name="cmfaq_action_restore_defaults" value="1"/>
                <input type="hidden"
                       name="nonce"
                       value="<?php echo wp_create_nonce( 'cmfaq_action_restore_defaults' ); ?>"/>
            </form>
        </div>
    </div>
    <div style="width:100%; height: 47px">
        <form method="post">
            <div style="float:right; margin-bottom: 15px;">
                <input onclick="jQuery('.block .form-table tr:has(.onlyinpro), .onlyinpro').toggleClass('hide'); return false;" type="submit" name="cmfaq_toggleProOptions" value="Show/hide Pro options" class="button cmfaq-toggleProOptions-button"/>
            </div>
        </form>
    </div>
    <form method="post" id="cminds_settings_form">

        <div id="cminds_settings_search--container">
            <input id="cminds_settings_search" placeholder="Search in settings..."><span id="cminds_settings_search_clear">&times;</span>
        </div>

        <?php wp_nonce_field('update-options'); ?>
        <input type="hidden" name="action" value="update" />

        <div id="cm_settings_tabs" class="invitationCodesSettingsTabs">

            <?php
            CMFAQ_Settings::renderSettingsTabsControls();
            CMFAQ_Settings::renderSettingsTabs();
            ?>

            <p class="submit" style="clear:left">
                <input id="cminds_settings_save" type="submit"  value="<?php echo 'Save Changes' ?>" name="<?php echo CMFAQ_Settings::abbrev('_saveSettings'); ?>" />
            </p>
            <small>* - required fields</small>
            <br />
            <br />
            <small>This plugin uses icons from <a href="https://fortawesome.github.io/Font-Awesome/" target="_blank">Font Awesome</a>.</small>
        </div>
    </form>
</div>
<div class="clear"></div>