<div class="cm-pro-only-label">Available in pro version</div>
<div class="cm-pro-only"><div class="form-field">
    <label for="term_meta[cmfaq_icon]">Icon</label>
    <input type="hidden" name="term_meta[cmfaq_icon]" id="term_meta_cmfaq_icon" value="">
    <div id="cmfaq_icon_div_change" style="display:none">
        <img src="" id="cmfaq_icon_image" style="max-height:32px;max-width:32px;margin-right:5px;vertical-align:middle;" /> 
        <button class="select_cmfaq_icon button" style="vertical-align:middle;">Change</button> 
        <button class="button" style="vertical-align:middle;" id="cmfaq_icon_remove_button">Clear</button> 
    </div>
    <div id="cmfaq_icon_div_select">
        <button class="select_cmfaq_icon button" style="vertical-align:middle;" disabled>Select</button>
    </div>
</div>
<?php if(isset($term)) echo '<br/>'; ?>
<div class="form-field form-required">
    <label for="term-tags">Lists</label>
    <div class="cmfaq-form-field-checkboxes">
        <li id="in-cmfaq_list"><label class="selectit"><input value="" type="checkbox" name="cmfaq_list[]" disabled checked> List 1 Example</label></li>
        <li id="in-cmfaq_list"><label class="selectit"><input value="" type="checkbox" name="cmfaq_list[]" disabled> List 2 Example</label></li>
        <li id="in-cmfaq_list"><label class="selectit"><input value="" type="checkbox" name="cmfaq_list[]" disabled> List 3 Example</label></li>
    </div>
</div>
</div>
<style type="text/css">
.cmfaq-form-field-checkboxes li { list-style: none; float: left; margin-right: 15px; }
.cmfaq-form-field-checkboxes label { float: left; }
.cmfaq-form-field-checkboxes { overflow: auto; }
.cm-pro-only{ border: 3px solid purple; padding: 0 10px; margin-bottom: 10px; }
.cm-pro-only *{ opacity: 0.9; }
.cm-pro-only-label{
    color: purple;
    font-size: 19px;
    font-weight: bold;
    text-align: center;
}
</style>