<?php
/**
 *
 * @copyright   Copyright (C) 2013 & later Mayotitech. All rights reserved.
 * @license     GNU General Public License version 3 or later; see LICENSE
 */
// no direct access
defined('_JEXEC') or die('Restricted access');

class LendrHelpersStyle
{
	function load()
	{
		$document = JFactory::getDocument();

		//stylesheets
		$document->addStylesheet(JURI::base().'components/com_lendr/assets/css/style.css');

		//javascripts
		$document->addScript(JURI::base().'components/com_lendr/assets/js/lendr.js');

	}
}