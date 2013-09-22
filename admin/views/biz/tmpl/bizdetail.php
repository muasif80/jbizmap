<?php
	$biz = $this->item;
?>

<script type="text/javascript">
var markerLat = '<?php echo $biz->bizloclat; ?>';
var markerLng = '<?php echo $biz->bizloclng; ?>';

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

<div class="map-wrapper" style="width: 100%; height: 400px; border: solid thick #CCDDCC;">
	<div id="map-canvas" style="width: 100%; height: 100%;">
	</div>
</div>