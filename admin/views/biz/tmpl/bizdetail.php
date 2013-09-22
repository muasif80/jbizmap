<?php
	$biz = $this->item;
?>

<h2><?php echo $biz->bizname; ?></h2>

<table class="table table-striped" style="width: 600px;">
	<tr>
		<th>Contact Name</th>
		<td><?php echo $biz->bizcontactname; ?></td>
	</tr>
	<tr>
		<th>Location</th>
		<td><?php echo $biz->bizloclat . ", " . $biz->bizloclng; ?></td>
	</tr>
	<tr>
		<th>Address</th>
		<td><?php echo $biz->bizaddress; ?></td>
	</tr>
	<tr>
		<th>Phone</th>
		<td><?php echo $biz->bizphone; ?></td>
	</tr>
	<tr>
		<th>Email</th>
		<td><?php echo $biz->bizemail; ?></td>
	</tr>
	<tr>
		<th>Category</th>
		<td><?php echo $biz->bizcategory; ?></td>
	</tr>
	<tr>
		<th>Description</th>
		<td><?php echo $biz->bizdescription; ?></td>
	</tr>
	
</table>