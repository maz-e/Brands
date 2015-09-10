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
 * Brand View
 *
 * @since  0.0.9
 */
class BrandViewBrand extends JViewLegacy
{
	/**
	 * View form
	 *
	 * @var         form
	 */
	protected $form = null;
 
	/**
	 * Display the Brand view
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 */
	public function display($tpl = null)
	{
		// Get the Data
		$this->form = $this->get('Form');
		$this->item = $this->get('Item');
		$this->script = $this->get('Script');
 
		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />', $errors));
 
			return false;
		}
 
 
		// Set the toolbar
		$this->addToolBar();
 
		// Display the template
		parent::display($tpl);
		
		// Set the document
		$this->setDocument();
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
		//$input = JFactory::getApplication()->input;
 
		// Hide Joomla Administrator Main menu
		//$input->set('hidemainmenu', true);
 
		$isNew = ($this->item->id == 0);
 
		if ($isNew)
		{
			//$title = JText::_('COM_BRAND_MANAGER_BRAND_NEW');
			JToolBarHelper::title(JText::_('COM_BRAND_MANAGER_BRAND_NEW'));
		}
		else
		{
			//$title = JText::_('COM_BRAND_MANAGER_BRAND_EDIT');
			JToolBarHelper::title(JText::_('COM_BRAND_MANAGER_BRAND_EDIT'));
		}
 
		//JToolBarHelper::title($title, 'brand');
		JToolBarHelper::apply('brand.apply');
		JToolBarHelper::save('brand.save');
		JToolBarHelper::save2new('brand.save2new');
		JToolBarHelper::cancel(
			'brand.cancel',
			$isNew ? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE'
		);
	}
	
	/**
	 * Method to set up the document properties
	 *
	 * @return void
	 */
	protected function setDocument() 
	{
		$document = JFactory::getDocument();
		$document->addScript(JURI::root() . $this->script);
		$document->addScript(JURI::root() . "/administrator/components/com_brand"
		                                  . "/views/brand/submitbutton.js");
		JText::script('COM_BRAND_BRAND_ERROR_UNACCEPTABLE');
	}
}