<?php
/**
 *
 * @copyright   Copyright (C) 2013 & later Mayotitech. All rights reserved.
 * @license     GNU General Public License version 3 or later; see LICENSE
 */

//<!-- AIzaSyBM1dSFkcywmp5yyHPiASm4yGBjO1LzvEs -->
//<!-- AIzaSyAMHb77EGZrdSHwgK5gKdgo4C10L-Rjb_Y -->

// no direct access
defined('_JEXEC') or die('Restricted access');

$document = &JFactory::getDocument();
//$document->addStyleSheet('components'.DS.'com_xyz'.DS.'css'.DS.'xyz.css');
$document->addStyleSheet("components/com_jbizmap/css/jbizmap.css");

// Load Classes
JLoader::registerPrefix("Jbizmap", JPATH_COMPONENT_ADMINISTRATOR);

//load tables
JTable::addIncludePath(JPATH_COMPONENT_SITE . '/tables');

// At the moment I am not setting up any helper plugin. I need to understand how helpers plugin works.


// Get Application Instance
// Process the request
// Execute the controller task
$app = JFactory::getApplication();
$controller = $app->input->get("controller", "display");
$className = "JbizmapControllers" . ucwords($controller);
$controller = new $className();
$controller->execute();













