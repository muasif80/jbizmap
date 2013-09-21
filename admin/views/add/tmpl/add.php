<div id="newBizModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="newBizModalLabel" aria-hidden="true">
  
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel"><?php echo JText::_('COM_JBIZMAP_ADD_BIZ'); ?></h3>
  </div>
  
  <div class="modal-body">
	<div class="row-fluid">
		<form id="bookForm">
			<input class="span12" type="text" name="bizname" placeholder="Business Name" />
      		<input type="hidden" name="user_id" value="<?php echo JFactory::getUser()->id; ?>" />
		</form>
	</div>
  </div>
  
</div>