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

JHtml::_('formbehavior.chosen', 'select');
$conta 		   = 0;
?>

<h1><?php echo JText::_('COM_BRAND_BRANDS_VIEW'); ?></h1>
 
<form action="<?php echo JRoute::_('index.php?option=com_brand');?>" method="post" id="brandForm" name="brandForm">
	<div class="row-fluid">
		<div class="span12">
			<?php
				echo JLayoutHelper::render(
					'joomla.searchtools.default',
					array('view' => $this)
				);
			?>
		</div>
	</div>
	<br />
<?php if (empty($this->items)) : ?>
  <div class="alert alert-no-items">
      <?php echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'.JText::_('JGLOBAL_NO_MATCHING_RESULTS');?>
  </div>
<?php else : ?>   
<ul class="thumbnails">
  <?php foreach ($this->items as $row) : ?>  	
	<li class="span3">
	  <a href="<?php echo $row->webpage ?>" target="new" class="thumbnail">
		  <img src="<?php echo $row->logo ?>" alt="<?php echo strtoupper($row->brand_name) ?>" 
		  title="<?php echo strtoupper($row->brand_name) ?>"/>
	  </a>
	</li>
    <?php $conta++;?>
    <?php if($conta % 4 == 0){ ?>
		</ul>
        <ul class="thumbnails">
	<?php } ?>
  <?php endforeach ?>
</ul>
<?php endif ?>
<div class="text-center">
	<?php  echo $this->pagination->getListFooter(); ?>
</div>
<input type="hidden" name="task" value="" />
<?php echo JHtml::_('form.token'); ?>
</form>