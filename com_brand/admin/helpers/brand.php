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
 
/**
 * Brand component helper.
 *
 * @param   string  $submenu  The name of the active view.
 *
 * @return  void
 *
 * @since   1.6
 */
abstract class BrandHelper
{
	/**
	 * Configure the Linkbar.
	 *
	 * @return Bool
	 */
 
	public static function addSubmenu($submenu) 
	{
		JHtmlSidebar::addEntry(
			JText::_('COM_BRAND_SUBMENU_BRANDS'),
			'index.php?option=com_brand',
			$submenu == 'brands'
		);
 
		JHtmlSidebar::addEntry(
			JText::_('COM_BRAND_SUBMENU_CATEGORIES'),
			'index.php?option=com_categories&view=categories&extension=com_brand',
			$submenu == 'categories'
		);
 
		// Set some global property
		//$document = JFactory::getDocument();
//		$document->addStyleDeclaration('.icon-48-helloworld ' .
//										'{background-image: url(../media/com_helloworld/images/tux-48x48.png);}');
//		if ($submenu == 'categories') 
//		{
//			$document->setTitle(JText::_('COM_HELLOWORLD_ADMINISTRATION_CATEGORIES'));
//		}
	}
}