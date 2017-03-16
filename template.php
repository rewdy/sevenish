<?php
/**
 * @file
 * Sevenish Template.php
 * ---------------------
 * A few minor theme tweakies
*/


/**
 * Implements theme_preprocess_html(),
 */
function sevenish_preprocess_html(&$variables) {
	/**
	 * Add default stylesheet is less is unavailable
	*/
	if (!module_exists('less')) {
		$css_backup_path = drupal_get_path('theme', 'sevenish') . '/sevenish.css';
		drupal_add_css($css_backup_path, array(
			'every_page' => TRUE,
			'group' => CSS_THEME
		));
	}
	/**
	* Add our script/styles to the page_bottom output
	*/
	$variables['extra_html'] = '';
	$include_html = theme_get_setting('sevenish_externals_enabled');
	if ($include_html) {
		$html_to_include = theme_get_setting('sevenish_externals');
		$html_to_include = trim($html_to_include);
		if ($html_to_include != '') {
			$variables['extra_html'] = $html_to_include;
		}
	}
}

/**
 * Implements hook_process_html(),
 */
function sevenish_process_html(&$variables) {
}

function sevenish_breadcrumb($variables) {
	$breadcrumb = $variables['breadcrumb'];

	if (!empty($breadcrumb)) {
		// Provide a navigational heading to give context for breadcrumb links to
		// screen-reader users. Make the heading invisible with .element-invisible.
		$output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';

		$output .= '<div class="breadcrumb">' . implode(' / ', $breadcrumb) . '</div>';
		return $output;
	}
}
