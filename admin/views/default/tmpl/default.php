<script type="text/javascript">
<!--
Joomla.submitbutton = function(task, id){
	
    if (task == 'add'){
        jQuery('input[name=task]', jQuery('#adminForm')).val(task);
        jQuery('input[name=controller]', jQuery('#adminForm')).val("add");
        jQuery('input[name=view]', jQuery('#adminForm')).val("add");
        //jQuery('#adminForm').ajaxSubmit();
        Joomla.submitform(task);
        
    }else if (task == 'editBiz'){
        jQuery('input[name=task]', jQuery('#adminForm')).val(task);
        jQuery('input[name=controller]', jQuery('#adminForm')).val("add");
        jQuery('input[name=view]', jQuery('#adminForm')).val("add");
        jQuery('input[name=id]', jQuery('#adminForm')).val(id);
        //jQuery('#adminForm').ajaxSubmit();
        Joomla.submitform(task);
        
    } else if(task == 'showmap'){
    	jQuery('input[name=task]', jQuery('#adminForm')).val('showmap');
        jQuery('input[name=controller]', jQuery('#adminForm')).val("display");
        jQuery('input[name=view]', jQuery('#adminForm')).val("default");
        Joomla.submitform(task);
        
    } else if(task == 'addbulk'){
    	jQuery('input[name=task]', jQuery('#adminForm')).val('addbulk');
        jQuery('input[name=controller]', jQuery('#adminForm')).val("addbulk");
        jQuery('input[name=view]', jQuery('#adminForm')).val("addbulk");
        Joomla.submitform(task);
        
    } else if(task == 'remove'){
    	jQuery('input[name=task]', jQuery('#adminForm')).val('remove');
        jQuery('input[name=controller]', jQuery('#adminForm')).val("delete");
        //jQuery('input[name=view]', jQuery('#adminForm')).val("default");
        Joomla.submitform(task);
        
    } else if(task == 'filter_by_category'){
    	jQuery('input[name=task]', jQuery('#adminForm')).val('filter_by_category');
        jQuery('input[name=controller]', jQuery('#adminForm')).val("display");
        jQuery('input[name=view]', jQuery('#adminForm')).val("default");
		//alert(jQuery('#ddlCategory').val());
        jQuery('input[name=selected_category]', jQuery('#adminForm')).val(jQuery('#ddlCategory').val());
        jQuery('input[name=selected_city]', jQuery('#adminForm')).val(jQuery('#ddlCity').val());
                

        Joomla.submitform(task);
        
		//alert("filter_by_category");
    } else if(task == 'filter_by_city'){
    	jQuery('input[name=task]', jQuery('#adminForm')).val('filter_by_city');
        jQuery('input[name=controller]', jQuery('#adminForm')).val("display");
        jQuery('input[name=view]', jQuery('#adminForm')).val("default");
		//alert(jQuery('#ddlCategory').val());
        jQuery('input[name=selected_category]', jQuery('#adminForm')).val(jQuery('#ddlCategory').val());
        jQuery('input[name=selected_city]', jQuery('#adminForm')).val(jQuery('#ddlCity').val());
                

        Joomla.submitform(task);
        
		//alert("filter_by_category");
    }else Joomla.submitform(task);
    return false;
};



//-->
</script>

<?php 
	$app = JFactory::getApplication();
	$selected_category = $app->input->getString("selected_category", "");
	$selected_city = $app->input->getString("selected_city", "");
	
	
?>

<?php $limitStart = isset($_REQUEST['limitstart']) ? $_REQUEST['limitstart'] : 0; ?>


<div id="view-default-default">

	<select id="ddlCategory" name="ddlCategory" onchange="Joomla.submitbutton('filter_by_category');">
		<!-- This select box should be loaded by the categories present in the biz table -->
		<option value="">Select Category</option>
		<?php 
			foreach($this->bizCategoryList as $bizCategory){
				if($bizCategory->bizcategory == $selected_category){
		?>
				<option value="<?php echo $bizCategory->bizcategory; ?>" selected="selected"><?php echo $bizCategory->bizcategory; ?></option>
		<?php
				}else{
		?>
				<option value="<?php echo $bizCategory->bizcategory; ?>" ><?php echo $bizCategory->bizcategory; ?></option>
		<?php 
				} 
			}
		?>
	</select>
	
	<select id="ddlCity" name="ddlCity" onchange="Joomla.submitbutton('filter_by_city');">
		<!-- This select box should be loaded by the categories present in the biz table -->
		<option value="">Select City</option>
		<?php 
			foreach($this->bizCityList as $bizCity){
				if($bizCity->bizcity == $selected_city){
		?>
				<option value="<?php echo $bizCity->bizcity; ?>" selected="selected"><?php echo $bizCity->bizcity; ?></option>
		<?php
				}else{
		?>
				<option value="<?php echo $bizCity->bizcity; ?>"><?php echo $bizCity->bizcity; ?></option>
		<?php
				}
			}
		?>
	</select>
	
	<form action="index.php" method="post" id="adminForm" name="adminForm">
	
		<table cellpadding="0" cellspacing="0" width="100%" class="table table-striped tbl-bizlist">
			<thead>
				<tr>
					<th></th>
	        		<th><?php echo JHTML::_( 'grid.sort',  JText::_('COM_JBIZMAP_BUSINESS_NAME'), 'bizname', $this->sortDirection, $this->sortColumn); ?></th>
	        		<th><?php echo JHTML::_( 'grid.sort', JText::_('COM_JBIZMAP_CONTACT_NAME'), 'bizcontactname', $this->sortDirection, $this->sortColumn); ?></th>
			        <th><?php echo JText::_('COM_JBIZMAP_PHONE'); ?></th>
			        <th><?php echo JText::_('COM_JBIZMAP_ADDRESS'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php for($i=0, $n = count($this->bizlist); $i<$n; $i++) { 
				        $biz = $this->bizlist[$i];
				?>
						<tr>
							<td style="width: 1%;">
								<?php echo JHtml::_('grid.id', $i, $biz->biz_id); ?>
							</td>
		
							<td>
								<a href="<?php echo JRoute::_('index.php?option=com_jbizmap&view=biz&task=bizdetail&id=' . (int) $biz->biz_id . '&limitstart=' . $limitStart); ?>">
									<?php echo $biz->bizname; ?>
								</a>
								
							</td>
							<td><?php echo $biz->bizcontactname; ?></td>
							<td><?php echo $biz->bizphone; ?></td>
							<td><?php echo $biz->bizaddress; ?></td>
							<td>
								<input class="span12 input-field" type="button" value="Edit" onclick="Joomla.submitbutton('editBiz', <?php echo $biz->biz_id?>)" />
							</td>
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
		<input type="hidden" name="id" value="" />
		
		
		<input type="hidden" name="filter_order" value="<?php echo $this->sortColumn; ?>" />
		<input type="hidden" name="filter_order_Dir" value="<?php echo $this->sortDirection; ?>" />
		
		<input type="hidden" name="selected_category" value="" />
		<input type="hidden" name="selected_city" value="" />
	
	<?php
	echo $this->pagination->getListFooter();
	?>
	
	</form>
</div>