<?php
/**
 *
 * @copyright   Copyright (C) 2013 & later Mayotitech. All rights reserved.
 * @license     GNU General Public License version 3 or later; see LICENSE
 */ 
	// no direct access
	defined('_JEXEC') or die('Restricted access');
?>

<?php
	$markers1 = "[";
	
	$total = count($this->bizlist);
	for($i=0, $n = $total; $i<$n; $i++) { 
	    $biz = $this->bizlist[$i];
		
	    if($biz->bizloclat != null && $biz->bizloclng != null && $biz->bizloclat != "" && $biz->bizloclng != ""){
	    	if($i < $total){
	    		$markers1 .= "['" . $biz->bizname . "', " . $biz->bizloclat . ", " . $biz->bizloclng . "], ";
	    	}else{
	    		$markers1 .= "['" . $biz->bizname . "', " . $biz->bizloclat . ", " . $biz->bizloclng . "]";
	    	}
	    }
	} 
	$markers1 .= "]";
	
	/*
	echo "<pre>";
	var_dump($this->bizlist);
	echo "</pre>";
	*/
?>

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
        
    } else if(task == 'showlist'){
    	jQuery('input[name=task]', jQuery('#adminForm')).val('default');
        jQuery('input[name=controller]', jQuery('#adminForm')).val("display");
        jQuery('input[name=view]', jQuery('#adminForm')).val("default");
        Joomla.submitform(task);
        
    } else Joomla.submitform(task);
    return false;
};


var markers = <?php echo $markers1; ?>;


//var markers = [['Marriott Islamabad', 33.73255769183697, 73.0871593952179]];

	function initialize() {
	  var mapOptions = {
	    zoom: 14,
	    
	    //center: new google.maps.LatLng(-34.397, 150.644),
	    center: new google.maps.LatLng(33.7167, 73.0667),
	    
	    mapTypeId: google.maps.MapTypeId.ROADMAP
	  }
	  var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

	



	  var infowindow = new google.maps.InfoWindow(); 
	  var marker, i;
//	  var bounds = new google.maps.LatLngBounds();

	  for (i = 0; i < markers.length; i++) { 
	      var pos = new google.maps.LatLng(markers[i][1], markers[i][2]);
	      //bounds.extend(pos);
	      marker = new google.maps.Marker({
	          position: pos,
	          map: map
	      });
	      
	      google.maps.event.addListener(marker, 'click', (function(marker, i) {
	          return function() {
	              infowindow.setContent(markers[i][0]);
	              infowindow.open(map, marker);
	          }
	      })(marker, i));

	//	  map.fitBounds(bounds);
		}
	}
	
	function loadScript() {
	  var script = document.createElement("script");
	  script.type = "text/javascript";
	  script.src = "http://maps.googleapis.com/maps/api/js?key=AIzaSyAMHb77EGZrdSHwgK5gKdgo4C10L-Rjb_Y&sensor=true&callback=initialize";
	  document.body.appendChild(script);

	//  initialize();
	}

	window.onload = loadScript;

//-->
</script>


<?php $limitStart = isset($_REQUEST['limitstart']) ? $_REQUEST['limitstart'] : 0; ?>

<div id="view-default-map">

	<a href="<?php echo JRoute::_('index.php?option=com_jbizmap&view=default&limitstart=' . $limitStart); ?>">Show List</a>
	
	
	<form action="index.php" method="post" id="adminForm" name="adminForm">
		<!-- input type="button" name="btnShowList" value="Show List" onclick="Joomla.submitbutton('showlist')" / -->
		
		<h2>Map: Locate the Business on Map</h2>
		<div class="map-wrapper" style="width: 100%; height: 550px; border: solid thick #CCDDCC;">
			<div id="map-canvas" style="width: 100%; height: 100%;">
			</div>
		</div>
	
		
		
		<input type="hidden" name="limitstart" value="<?php echo isset($_REQUEST['limitstart']) ? $_REQUEST['limitstart'] : 0; ?>" />
		
		<input type="hidden" name="option" value="com_jbizmap" />
		<input type="hidden" name="controller" value="" />
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="view" value="default" />
	
		
	</form>
</div>