<script type="text/javascript">
<!--
Joomla.submitbutton = function(task){
	
    if (task == 'processfile'){
        jQuery('input[name=task]', jQuery('#adminForm')).val(task);
        jQuery('input[name=controller]', jQuery('#adminForm')).val("processfile");
        //jQuery('input[name=view]', jQuery('#adminForm')).val("add");
        //jQuery('#adminForm').ajaxSubmit();
        Joomla.submitform(task);
        
    } else if(task == 'remove'){
		/*
    	jQuery('input[name=task]', jQuery('#adminForm')).val('remove');
        jQuery('input[name=controller]', jQuery('#adminForm')).val("delete");
        //jQuery('input[name=view]', jQuery('#adminForm')).val("default");
        Joomla.submitform(task);
        */
        
    } else Joomla.submitform(task);
    return false;
};



//-->
</script>

<form action="index.php" method="post" id="adminForm" name="adminForm" enctype="multipart/form-data">

	<div class="row-fluid">
			<label>Upload File</label>
			<input class="span12" type="file" name="bizFile" placeholder="Upload excel file for businesses" />
	</div>
	
	<!-- LIST OF FILES UPLOADED -->
	<table cellpadding="0" cellspacing="0" width="100%" class="table table-striped">
		<thead>
			<tr>
				<th></th>
				<th>S. No.</th>
				<th><?php echo JHTML::_( 'grid.sort', 'Businesses File Name', 'biz_file_name', 'asc', 'biz_file_name'); ?></th>
			</tr>
		</thead>
		<tbody id="biz-list">
			<?php for($i=0, $n = count($this->bizFileList); $i<$n; $i++) { 
			        $bizFile = $this->bizFileList[$i];
			?>
					<tr>
						<td style="width: 1%;">
							<?php echo JHtml::_('grid.id', $i, $bizFile->biz_file_id); ?>
						</td>
						<td style="width: 5%;">
							<?php echo $i + 1; ?>
						</td>
						<td>
							<?php echo $bizFile->biz_file_name; ?>
						</td>
					</tr>
			<?php
			} ?>
		</tbody>
	</table>
	<!-- LIST OF FILES UPLOADED - END -->
	

	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="option" value="com_jbizmap" />
	<input type="hidden" name="controller" value="addbulk" />
	<input type="hidden" name="task" value="save" />
	<input type="hidden" name="view" value="addbulk" />
	<input type="hidden" name="table" value="bizfile" />
</form>