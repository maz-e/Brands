<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_brand
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Brand Component Category Tree
 *
 * @since  1.6
 */
class BrandCategories extends JCategories
{
	/**
	 * Constructor
	 *
	 * @param   array  $options  Array of options
	 *
	 * @since   1.6
	 */
	public function __construct($options = array())
	{
		$options['table']     = '#__brand';
		$options['extension'] = 'com_brand';

		parent::__construct($options);
	}
}
