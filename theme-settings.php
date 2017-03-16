<?php
/**
 * Theme settings for sevenish. Yum yum!
*/
function sevenish_form_system_theme_settings_alter(&$form, $form_state) {

	/* ----------------------------- DEVELOPMENT ----------------------------- */
	$form['sevenish_info'] = array(
		'#prefix' => '<h3>Sevenish Configuration</h3> ',
		'#weight'=> -20
	);

  $form['page_code'] = array(
		'#type'          => 'fieldset',
		'#title'         => t('Externals'),
		'#collapsible' => TRUE,
		'#collapsed' => TRUE,
		'#description'   => t('Include external code libraries (be careful, yo)'),
		'#weight'=> 100
	);
	$form['page_code']['sevenish_externals_enabled'] = array(
		'#type'          => 'checkbox',
		'#title'         => t('<b>Include additional HTML for pulling in external resources</b>'),
		'#default_value' => theme_get_setting('sevenish_externals_enabled'),
	);
	$form['page_code']['sevenish_externals'] = array(
		'#type'          => 'textarea',
		'#title'         => t('HTML to add'),
		'#default_value' => theme_get_setting('sevenish_externals'),
		'#description'   => t('Add external scripts or stylesheets to your site footer. <strong>Be careful as this will add code to each of your pages</strong>.'),
	);

}
