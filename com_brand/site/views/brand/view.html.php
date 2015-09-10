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
 * HTML View class for the Brand Component
 *
 * @since  0.0.1
 */
class BrandViewBrand extends JViewLegacy
{
	/**
	 * Display the Brand view
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 */
	function display($tpl = null)
	{
      $app     = JFactory::getApplication();

		// Get data from the model
		$this->items		   = $this->get('Items');
		$this->pagination	   = $this->get('Pagination');
		$this->filterForm    = $this->get('FilterForm');
      $this->params        = $app->getParams();

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JLog::add(implode('<br />', $errors), JLog::WARNING, 'jerror');

			return false;
		}

		// Display the view
		parent::display($tpl);
	}
}
