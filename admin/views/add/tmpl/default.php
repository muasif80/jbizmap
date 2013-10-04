<script type="text/javascript">

function initialize() {
  var mapOptions = {
    zoom: 14,
    
    //center: new google.maps.LatLng(-34.397, 150.644),
    center: new google.maps.LatLng(33.7167, 73.0667),
    
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

//add a click event handler to the map object
  google.maps.event.addListener(map,'click',function(event) {
      document.getElementById('latFld').value = event.latLng.lat();
      // + ', ' + event.latLng.lng()
    
	  //alert("h");
      // display the lat/lng in your form's lat/lng fields
      document.getElementById("lngFld").value = event.latLng.lng();
  });

  
}

function loadScript() {
  var script = document.createElement("script");
  script.type = "text/javascript";
  script.src = "http://maps.googleapis.com/maps/api/js?key=AIzaSyAMHb77EGZrdSHwgK5gKdgo4C10L-Rjb_Y&sensor=true&callback=initialize";
  document.body.appendChild(script);

//  initialize();
}

window.onload = loadScript;

</script>

<?php

	$app = JFactory::getApplication();
	$itemId = $app->input->getInt("id", null);
	
	/*
	echo "<pre>";
	echo "id = " . $app->input->get("id");
	print_r($this->item);
	echo "</pre>";
	*/
	
	$bizName = "";
	$bizAddress = "";
	$bizCity = "";
	$bizState = "";
	$bizPhone = "";
	$bizEmail = "";
	$bizWebsite = "";
	$bizCategory = "";
	$bizDescription = "";
	$bizLocLat = "";
	$bizLocLng = "";
	
	if(isset($itemId) && $itemId != null && isset($this->item)){
		$bizName = $this->item->bizname;
		$bizAddress = $this->item->bizaddress;
		$bizCity = $this->item->bizcity;
		$bizState = $this->item->bizstate;
		$bizPhone = $this->item->bizphone;
		$bizEmail = $this->item->bizemail;
		$bizWebsite = $this->item->bizwebsite;
		$bizCategory = $this->item->bizcategory;
		$bizDescription = $this->item->bizdescription;
		$bizLocLat = $this->item->bizloclat;
		$bizLocLng = $this->item->bizloclng;
		
	}
?>

<div id="view-add-default">

	<form action="index.php" method="post" id="adminForm" name="adminForm">
	
		<div class="row-fluid">
				<label class="field-label"><?php echo JText::_("COM_JBIZMAP_BUSINESS_NAME"); ?></label>
				<input class="span12 input-field" type="text" name="bizname" placeholder="<?php echo JText::_("COM_JBIZMAP_BUSINESS_NAME"); ?>" value="<?php echo $bizName; ?>" />
				
				<label class="field-label"><?php echo JText::_("COM_JBIZMAP_ADDRESS"); ?></label>
				<input class="span12 input-field" type="text" name="bizaddress" placeholder="<?php echo JText::_("COM_JBIZMAP_ADDRESS"); ?>" value="<?php echo $bizAddress; ?>" />
				
				<label class="field-label"><?php echo JText::_("COM_JBIZMAP_CITY"); ?></label>
				<input class="span12 input-field" type="text" name="bizcity" placeholder="<?php echo JText::_("COM_JBIZMAP_CITY"); ?>" value="<?php echo $bizCity; ?>" />
				
				<label class="field-label"><?php echo JText::_("COM_JBIZMAP_STATE_OR_PROVINCE"); ?></label>
				<input class="span12 input-field" type="text" name="bizstate" placeholder="<?php echo JText::_("COM_JBIZMAP_STATE_OR_PROVINCE"); ?>" value="<?php echo $bizState; ?>" />
				
				<label class="field-label"><?php echo JText::_("COM_JBIZMAP_PHONE"); ?></label>
				<input class="span12 input-field" type="text" id="bizPhone" name="bizphone" placeholder="<?php echo JText::_("COM_JBIZMAP_PHONE"); ?>" value="<?php echo $bizPhone; ?>" />
				
				<label class="field-label"><?php echo JText::_("COM_JBIZMAP_EMAIL"); ?></label>
				<input class="span12 input-field" type="text" id="bizEmail" name="bizemail" placeholder="<?php echo JText::_("COM_JBIZMAP_EMAIL"); ?>" value="<?php echo $bizEmail; ?>" />
				
				<label class="field-label"><?php echo JText::_("COM_JBIZMAP_WEBSITE"); ?></label>
				<input class="span12 input-field" type="text" id="bizWebsite" name="bizwebsite" placeholder="<?php echo JText::_("COM_JBIZMAP_WEBSITE"); ?>" value="<?php echo $bizWebsite; ?>" />
				
				<label class="field-label"><?php echo JText::_("COM_JBIZMAP_CATEGORY"); ?></label>
				<input class="span12 input-field" type="text" id="bizCategory" name="bizcategory" placeholder="<?php echo JText::_("COM_JBIZMAP_CATEGORY"); ?>" value="<?php echo $bizCategory; ?>" />
				
				<label class="field-label"><?php echo JText::_("COM_JBIZMAP_DESCRIPTION"); ?></label>
				<input class="span12 input-field" type="text" id="bizDescription" name="bizdescription" placeholder="<?php echo JText::_("COM_JBIZMAP_DESCRIPTION"); ?>" value="<?php echo $bizDescription; ?>" />
				
				<label class="field-label"><?php echo JText::_("COM_JBIZMAP_LOCATION"); ?></label>
				<input class="span12 input-field" type="text" id="latFld" name="bizloclat" placeholder="Latitude" value="<?php echo $bizLocLat; ?>" />
				<input class="span12 input-field" type="text" id="lngFld" name="bizloclng" placeholder="Longitude" value="<?php echo $bizLocLng; ?>" />
				
		</div>
		
		<h2>Map: Locate the Business on Map</h2>
		<div class="map-wrapper" style="width: 100%; height: 400px; border: solid thick #CCDDCC;">
			<div id="map-canvas" style="width: 100%; height: 100%;">
			</div>
		</div>
		
		<input type="hidden" name="option" value="com_jbizmap" />
		<input type="hidden" name="controller" value="add" />
		<input type="hidden" name="task" value="save" />
		<input type="hidden" name="table" value="biz" />
		<input type="hidden" name="view" value="add" />
		
		<?php if(isset($itemId) && $itemId != null){ ?>
		<input type="hidden" name="biz_id" value="<?php echo $itemId; ?>" />
		<?php } ?>
		
	</form>
</div>