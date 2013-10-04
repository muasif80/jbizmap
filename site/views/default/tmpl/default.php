<script type="text/javascript">
<!--
Joomla.submitbutton = function(task){
	
    if (task == 'add'){
        jQuery('input[name=task]', jQuery('#adminForm')).val(task);
        jQuery('input[name=controller]', jQuery('#adminForm')).val("add");
        jQuery('input[name=view]', jQuery('#adminForm')).val("add");
        //jQuery('#adminForm').ajaxSubmit();
        Joomla.submitform(task);
        
    } else if(task == 'showmap'){
    	jQuery('input[name=task]', jQuery('#adminForm')).val('showmap');
        jQuery('input[name=controller]', jQuery('#adminForm')).val("display");
        jQuery('input[name=view]', jQuery('#adminForm')).val("default");
        Joomla.submitform(task);
        
    }else if(task == 'remove'){
    	jQuery('input[name=task]', jQuery('#adminForm')).val('remove');
        jQuery('input[name=controller]', jQuery('#adminForm')).val("delete");
        //jQuery('input[name=view]', jQuery('#adminForm')).val("default");
        Joomla.submitform(task);
        
    } else Joomla.submitform(task);
    return false;
};



//-->
</script>

<?php $limitStart = isset($_REQUEST['limitstart']) ? $_REQUEST['limitstart'] : 0; ?>


<div id="view-default-default">
	
	<form action="index.php" method="post" id="adminForm" name="adminForm">
	
		<input type="button" name="btnShowMap" value="Show Map" onclick="Joomla.submitbutton('showmap')" />
		
		<table cellpadding="0" cellspacing="0" width="100%" class="table table-striped tbl-bizlist">
			<thead>
				<tr>
					<th></th>
					<th><?php echo JHTML::_( 'grid.sort', 'Business Name', 'bizname', $this->sortDirection, $this->sortColumn); ?></th>
	        		<th><?php echo JHTML::_( 'grid.sort', 'Contact Name', 'bizcontactname', $this->sortDirection, $this->sortColumn); ?></th>
			        <th>Phone</th>
			        <th>Address</th>
	        
				</tr>
			</thead>
			<tbody>
				<?php for($i=0, $n = count($this->bizlist); $i<$n; $i++) { 
				        $biz = $this->bizlist[$i];
				?>
						<tr>
							<td style="width: 1%;">
								<?php //echo JHtml::_('grid.id', $i, $biz->biz_id); ?>
							</td>
		
							<td>
								<a href="<?php echo JRoute::_('index.php?option=com_jbizmap&view=biz&task=bizdetail&id='.(int) $biz->biz_id . '&limitstart=' . $limitStart); ?>">
									<?php echo $biz->bizname; ?>
								</a>
								
							</td>
							<td><?php echo $biz->bizcontactname; ?></td>
							<td><?php echo $biz->bizphone; ?></td>
							<td><?php echo $biz->bizaddress; ?></td>
							
						</tr>
				<?php
				} ?>
			</tbody>
		</table>
	
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="option" value="com_jbizmap" />
		<input type="hidden" name="controller" value="display" />
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="view" value="default" />
		
		
		<input type="hidden" name="filter_order" value="<?php echo $this->sortColumn; ?>" />
		<input type="hidden" name="filter_order_Dir" value="<?php echo $this->sortDirection; ?>" />
		
	
	<?php
	echo $this->pagination->getListFooter();
	?>
	
	</form>
</div>