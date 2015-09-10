<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_brand
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
 
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// Set some global property
//$document = JFactory::getDocument();
//$document->addStyleDeclaration('.icon-brand {background-image: url(../media/com_helloworld/images/tux-16x16.png);}');

// Require helper file
JLoader::register('BrandHelper', JPATH_COMPONENT . '/helpers/brand.php');
 
// Get an instance of the controller prefixed by Brand
$controller = JControllerLegacy::getInstance('Brand');
 
// Perform the Request task
$input = JFactory::getApplication()->input;
$controller->execute($input->getCmd('task'));
 
// Redirect if set by the controller
$controller->redirect();