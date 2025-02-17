<?php

namespace CM;

class CMFAQ_SettingsView extends \CMFAQ\SettingsView {

	public static function renderOptionControls($optionKey, $settings) {
		switch ($settings['type']) {
			case 'bool':
				return self::renderBool($optionKey, $settings);
			case 'int':
				return self::renderInputNumber($optionKey, $settings);
			case 'textarea':
				return self::renderTextarea($optionKey, $settings);
			case 'rich_text':
				return self::renderRichText($optionKey, $settings);
			case 'radio':
				return '<div class="multiline">' . self::renderRadio($optionKey, $settings['options'], $settings['value']) . '</div>';
			case 'select':
				return self::renderSelect($optionKey, $settings);
			case 'multiselect':
				return self::renderMultiSelect($optionKey, $settings);
			case 'multicheckbox':
				return self::renderMultiCheckbox($optionKey, $settings);
			case 'custom':
				return self::renderCustomFunctionInput($optionKey, $settings);
			case 'string':
				return self::renderInputText($optionKey, $settings);
			case 'label':
				return self::renderLabel($optionKey, $settings);
			case 'color':
				return self::renderColor($optionKey, $settings);
			default:
				if (isset($settings['html'])) {
					return $settings['html'];
				} else {
					throw new \Exception('Missing "html" value for custom setting with id: ' . $optionKey . ' in config');
				}
		}
	}

	protected static function renderInputText($name, $settings) {
		$required = '';
		if(isset($settings['required']) && $settings['required'] == 1) {
			$required = 'required="required"';
		}
		return sprintf('<input type="text" name="%s" value="%s" %s />', esc_attr($name), esc_attr($settings['value']), $required);
	}
	protected static function renderInputNumber($name, $settings) {
		$required = '';
		$step = '';
		$max = '';
		if(isset($settings['required']) && $settings['required'] == 1) {
			$required = 'required="required"';
		}
		if(isset($settings['step'])){
            $step = 'step="' . $settings['step'] .'"';
        }
		if(isset($settings['max'])){
            $max = 'max="' . $settings['max'] .'"';
        }
		return sprintf('<input min="0" type="number" name="%s" value="%s" %s %s %s/>', esc_attr($name), esc_attr($settings['value']), $required, $step, $max);
	}
	protected static function renderLabel($name, $settings) {
		$required = '';
		if(isset($settings['required']) && $settings['required'] == 1) {
			$required = 'required="required"';
		}
		return sprintf('<input type="text" name="%s" value="%s" %s />', $name, $settings['value'], $required);
	}

}