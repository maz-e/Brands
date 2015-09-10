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
 * Brand Model
 *
 * @since  0.0.1
 */
class BrandModelBrand extends JModelList
{
	/**
	 * Method to build an SQL query to load the list data.
	 *
	 * @return      string  An SQL query
	 */
	protected function getListQuery()
	{	
		// Initialize variables.
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);
 
		// Create the base select statement.
		$query->select('a.brand_name, a.published, a.webpage, a.logo, a.catid, c.parent_id, c.path, c.title')
                ->from($db->quoteName('#__brand').'AS a')
				->join('LEFT', '#__categories AS c ON c.id = a.catid');
						
		// Filter by published and category state		
		$cat = $this->getState("list.mycategory");
		
		// Get model category 
		$categoriesModel = JCategories::getInstance('brand');
		$category = $categoriesModel->get($cat);
 		
		if (is_numeric($cat))
		{
			$query->where('a.published = 1 and a.catid = ' . (int) $cat, 'OR');
			
			// Check childrens category 
			if($category->hasChildren()){
				$query->where('a.published = 1 and c.parent_id = ' . (int) $cat);
			}
		}
		else
		{
			$query->where('a.published = 1');
		}
		
		// Ordering clause
		$query->order('a.brand_name asc');
 		
		return $query;
	}
}