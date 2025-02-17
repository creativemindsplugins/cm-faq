jQuery(document).ready(function ($) {
    const steps = $('.cm-wizard-step');

    // Next step button click event
    $('.next-step').on('click' , function () {
        const currentStep = parseInt($(this).data('step'));
        steps.eq(currentStep).hide();
        steps.eq(currentStep + 1).show();
    });

    // Previous step button click event
    $('.prev-step').on('click' , function () {
        const currentStep = parseInt($(this).data('step'));
        steps.eq(currentStep).hide();
        steps.eq(currentStep - 1).show();
    });

    // Step link click event
    $('.cm-wizard-menu li').on('click' , function () {
        const currentStep = parseInt($(this).data('step'));
        steps.hide();
        steps.eq(currentStep).show();
    });

    $('.finish').on('click', function (e) {
        if ($('form').length == 0) {
            return;
        }
        let formData = $('form').serialize();
        $.ajax({
            url: wizard_data.ajaxurl , // WordPress AJAX URL
            type: 'POST' ,
            data: {
                action: 'cmfaq_save_wizard_options' , // Action name for the AJAX handler
                data: formData
            } ,
            success: function (response) {
            } ,
            error: function () {
                alert("An error occurred while saving options.");
            }
        });
    });


    $('.next-step').on('click' , function () {
        // Serialize form data
        let form = $(this).closest('.cm-wizard-step').find('form');

        if (form.length == 0) {
            return;
        }

        let formData = form.serialize();

        // AJAX call to save options
        $.ajax({
            url: wizard_data.ajaxurl , // WordPress AJAX URL
            type: 'POST' ,
            data: {
                action: 'cmfaq_save_wizard_options' , // Action name for the AJAX handler
                data: formData
            } ,
            success: function (response) {
            } ,
            error: function () {
                alert("An error occurred while saving options.");
            }
        });
    });

    var $body = $('body');

    $body.on('mouseenter' , '.cm_field_help' , function () {
        if ($(this).find('.cm_field_help--wrap').length > 0) {
            return;
        }
        var helpHtml = $(this).attr('data-title');
        var $helpItemWrapHeight = "style='min-height:" + $(this).parent().outerHeight() + "px'";
        var $helpItemWrap = $("<div class='cm_field_help--wrap'" + $helpItemWrapHeight + "><div class='cm_field_help--text'></div></div>");

        $(this).append($helpItemWrap);

        var $helpItemText = $(this).find('.cm_field_help--text');
        $helpItemText.html(helpHtml);
        $helpItemText.html($helpItemText.text());

        setTimeout(function () {
            $helpItemWrap.addClass('cm_field_help--active');
        } , 300);
    }).on('mouseleave' , '.cm_field_help' , function () {
        var $helpItem = $(this).find('.cm_field_help--wrap');
        setTimeout(function () {
            $helpItem.removeClass('cm_field_help--active');
        } , 600);
        setTimeout(function () {
            $helpItem.remove();
        } , 800);

    });

    //custom code for CM FAQ

    $('.step-2 select').on('change',function(){
        let name = $(this).attr('name');
        if(name == 'cmfaq_css_size_tile_title'){
            $('.links_preview h4').css('font-size',$(this).val())
        }if(name == 'cmfaq_css_size_tile_link'){
            $('.links_preview li').css('font-size',$(this).val())
        }if(name == 'cmfaq_css_size_tile_more'){
            $('.links_preview span').css('font-size',$(this).val())
        }
    });

    $('.links_preview h4').css('font-size',$('select[name=cmfaq_css_size_tile_title]').val());
    $('.links_preview h4').css('color',$('input[name=cmfaq_css_color_tile_title]').val());
    $('.links_preview li').css('font-size',$('select[name=cmfaq_css_size_tile_link]').val());
    $('.links_preview li').css('color',$('input[name=cmfaq_css_color_tile_link]').val());
    $('.links_preview span').css('font-size',$('select[name=cmfaq_css_size_tile_more]').val());
    $('.links_preview span').css('color',$('input[name=cmfaq_css_color_tile_more]').val());

});