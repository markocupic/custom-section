<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2016 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'Markocupic',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Modules
	'Markocupic\CustomSection' => 'system/modules/custom-section/modules/CustomSection.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_custom_section' => 'system/modules/custom-section/templates',
	'mod_custom_section_footer_first_row' => 'system/modules/custom-section/templates',
	'mod_custom_section_footer_second_row' => 'system/modules/custom-section/templates',
	'mod_custom_section_header' => 'system/modules/custom-section/templates'
));
