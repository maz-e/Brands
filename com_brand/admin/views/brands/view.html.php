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
 * Brands View
 *
 * @since  0.0.1
 */
class BrandViewBrands extends JViewLegacy
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
		// Get application
		$app = JFactory::getApplication();
		$context = "brand.list.admin.brand";
		
		// Get data from the model
		$this->items		= $this->get('Items');
		$this->pagination	= $this->get('Pagination');
		$this->state			= $this->get('State');
		$this->filter_order 	= $app->getUserStateFromRequest($context.'filter_order', 'filter_order', 'a.brand_name', 'cmd');
		$this->filter_order_Dir = $app->getUserStateFromRequest($context.'filter_order_Dir', 'filter_order_Dir', 'asc', 'cmd');
		$this->filterForm    	= $this->get('FilterForm');
		$this->activeFilters 	= $this->get('ActiveFilters');
 
		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />', $errors));
 
			return false;
		}
		
		// Set the submenu
		BrandHelper::addSubmenu('brands');
		$this->sidebar = JHtmlSidebar::render();
		
		// Set the toolbar and number of founds items
		$this->addToolBar();
 
		// Display the template
		parent::display($tpl);
		
		// Set the document
		//$this->setDocument();
	}
	
	/**
	 * Add the page title and toolbar.
	 *
	 * @return  void
	 *
	 * @since   1.6
	 */
	protected function addToolBar()
	{
		//$title = JText::_('COM_BRAND_MANAGER_BRANDS');
 		//JToolBarHelper::title($title, 'brand');
		
		JToolBarHelper::title(JText::_('COM_BRAND_MANAGER_BRANDS'));
		JToolBarHelper::addNew('brand.add');
		JToolBarHelper::editList('brand.edit');
		JToolBarHelper::publishList('brands.publish');
		JToolBarHelper::unpublishList('brands.unpublish');
		JToolBarHelper::deleteList('', 'brands.delete');
		
		//Para poner el boton de opciones en el Toolbar 
		//JToolBarHelper::preferences('com_brand');
	}
	
	/**
	 * Method to set up the document properties
	 *
	 * @return void
	 */
	//protected function setDocument() 
	//{
		//$document = JFactory::getDocument();
		//$document->setTitle(JText::_('COM_BRAND_ADMINISTRATION'));
	//}
}