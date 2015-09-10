<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_brand
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
 
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');

JHtml::_('formbehavior.chosen', 'select');
 
$listOrder     = $this->escape($this->filter_order);
$listDirn      = $this->escape($this->filter_order_Dir);
?>
<div id="j-sidebar-container" class="span2">
    <?php echo $this->sidebar; ?>
</div>
<div id="j-main-container" class="span10">
  <form action="index.php?option=com_brand&view=brands" method="post" id="adminForm" name="adminForm">
      <div class="row-fluid">
          <div class="span12">
              <?php
                  //Search tools bar
                  echo JLayoutHelper::render('joomla.searchtools.default', array('view' => $this));
              ?>
          </div>        
      </div>
      <?php if (empty($this->items)) : ?>
          <div class="alert alert-no-items">
              <?php echo JText::_('JGLOBAL_NO_MATCHING_RESULTS'); ?>
          </div>
      <?php else : ?>   		
      <table class="table table-striped table-hover">
          <thead>
          <tr>
              <th width="1%"><?php echo JText::_('COM_BRAND_NUM'); ?></th>
              <th width="2%">
                  <?php echo JHtml::_('grid.checkall'); ?>
              </th>
              <th width="8%" class="center">
                  <?php echo JHtml::_('grid.sort', 'COM_BRAND_PUBLISHED', 'a.published', $listDirn, $listOrder); ?>
              </th>
              <th width="50%">
                  <?php echo JHtml::_('grid.sort', 'COM_BRAND_BRANDS_NAME', 'a.brand_name', $listDirn, $listOrder); ?>
              </th>
              <th width="5%">
                  <?php echo JText::_('COM_BRAND_WEBPAGE'); ?>
              </th>
              <th width="5%">
                  <?php echo JText::_('COM_BRAND_LOGO'); ?>
              </th>
              <th width="10%">
                  <?php echo JHtml::_('grid.sort', 'COM_BRAND_GROUP', 'c.path', $listDirn, $listOrder); ?>
              </th>
              <th width="10%">
                  <?php echo JText::_('COM_BRAND_SUBGROUP'); ?>
              </th>
              <th width="5%" class="center">
                  <?php echo JHtml::_('grid.sort', 'COM_BRAND_ID', 'a.id', $listDirn, $listOrder); ?>
              </th>
          </tr>
          </thead>
          <tfoot>
              <tr>
                  <td colspan="9">
                  	  <?php 
					  	// Pagination footer
						echo $this->pagination->getListFooter(); 
					  ?>
                  </td>
              </tr>
          </tfoot>
          <tbody>
              <?php if (!empty($this->items)) : ?>
                  <?php foreach ($this->items as $i => $row) : 
                      $link = JRoute::_('index.php?option=com_brand&task=brand.edit&id=' . $row->id);
				  ?>
   
                      <tr>
                          <td><?php echo $this->pagination->getRowOffset($i); ?></td>
                          <td>
                              <?php echo JHtml::_('grid.id', $i, $row->id); ?>
                          </td>
                          <td class="center">
                              <?php echo JHtml::_('jgrid.published', $row->published, $i, 'brands.', true, 'cb'); ?>
                          </td>
                          <td>
                              <a href="<?php echo $link; ?>" title="<?php echo JText::_('COM_BRAND_EDIT_BRAND'); ?>">						
                                  <?php echo strtoupper($row->brand_name); ?>
                              </a>
                          </td>
                          <td class="center">
                          	  <?php if($row->webpage != "http://") : ?>
                              	<i class="icon-ok"></i>
                              <?php endif;?>	
                          </td>
                          <td class="center">
                          	  <?php if($row->logo != NULL) : ?>
                              	<i class="icon-picture"></i>
                              <?php endif;?>	
                          </td>
                          <td>					
                          	  <?php 
								if($row->parent_id == 1){
									echo $row->title;
								} else{
									$group_string = explode("/", $row->path);
									echo ucwords($group_string[0]); 
								}
						  	  ?>
                          	 
                          </td>
                          <td>					
                              <?php
							  	if($row->parent_id != 1){
									echo $row->title;
								} else{
									echo ''; 
								}
							  ?>
                          </td>
                          <td class="center">
                              <?php echo $row->id; ?>
                          </td>
                      </tr>
                  <?php endforeach; ?>
              <?php endif; ?>
          </tbody>
      </table>
      <?php endif; ?>
      <input type="hidden" name="task" value=""/>
      <input type="hidden" name="boxchecked" value="0"/>
      <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>"/>
      <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>"/>
      <?php echo JHtml::_('form.token'); ?>
  </form>
</div>