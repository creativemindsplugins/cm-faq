<div class="cm-wizard-step step-0">
    <h1>Welcome to the FAQ Setup Wizard</h1>
    <p>Thank you for installing the CM FAQ plugin!</p>
    <p>This plugin helps you create a comprehensive FAQ section on your website, enabling visitors to find answers to <br/>
        common questions quickly and enhancing their overall experience.</p>
    <img class="img" src="<?php echo CMFAQ_PLUGIN_DIR_URL . 'assets/backend/img/WPFAQB_new.png';?>">
    <p>To help you get started, we’ve prepared a quick setup wizard to guide you through these steps:</p>
    <ul>
        <li>• Configuring essential settings</li>
        <li>• Creating FAQ categories</li>
        <li>• Adding your first FAQ item</li>
    </ul>
    <button class="next-step" data-step="0">Start</button>
    <p><a href="<?php echo admin_url( 'admin.php?page='. CMFAQ_SLUG_NAME . '-options'); ?>" >Skip the setup wizard</a></p>
</div>
<?php echo CMFAQ_SetupWizard::renderSteps(); ?>