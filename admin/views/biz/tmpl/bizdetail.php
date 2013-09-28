<?php
	$biz = $this->item;
?>

<script type="text/javascript">
var markerLat = '<?php echo $biz->bizloclat; ?>';
var markerLng = '<?php echo $biz->bizloclng; ?>';
var markerBizName = '<?php echo $biz->bizname; ?>';
var markerBizAddress = '<?php echo $biz->bizaddress; ?>';
var markerBizPhone = '<?php echo $biz->bizphone; ?>';
var markerContent = markerBizName + "<br />" + markerBizAddress + "<br />" + markerBizPhone;

function initialize() {

  var pos = new google.maps.LatLng(markerLat, markerLng);
	  
  var mapOptions = {
    zoom: 14,
    
    //center: new google.maps.LatLng(-34.397, 150.644),
    //center: new google.maps.LatLng(markerLat, markerLng),
  	center: pos,  
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

  
  //bounds.extend(pos);
  marker = new google.maps.Marker({
      position: pos,
      map: map
  });

  var infowindow = new google.maps.InfoWindow(); 
  google.maps.event.addListener(marker, 'click', (function(marker) {
      return function() {
          infowindow.setContent(markerContent);
          infowindow.open(map, marker);
      }
  })(marker));
  
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



<h2><?php echo $biz->bizname; ?></h2>

<table class="table">
	<tr>
		<td style="width: 40%;">
			<table class="table table-striped" style="width: 100%;">
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
		</td>
		<td style="width: 60%;">
			<div class="map-wrapper" style="width: 100%; height: 400px; border: solid thick #CCDDCC;">
				<div id="map-canvas" style="width: 100%; height: 100%;">
				</div>
			</div>
		</td>
	</tr>
</table>

<?php $limitStart = isset($_REQUEST['limitstart']) ? $_REQUEST['limitstart'] : 0; ?>

<a href="<?php echo JRoute::_('index.php?option=com_jbizmap&view=default&limitstart=' . $limitStart); ?>">Show List</a>



