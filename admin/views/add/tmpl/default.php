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



<form action="index.php" method="post" id="adminForm" name="adminForm">

	<div class="row-fluid">
			<label>Business Name</label>
			<input class="span12" type="text" name="bizname" placeholder="Business Name" />
			
			<label>Business Address</label>
			<input class="span12" type="text" name="bizaddress" placeholder="Business Address" />
			
			
			<label>Phone</label>
			<input class="span12" type="text" id="bizPhone" name="bizphone" placeholder="Phone" />
			
			<label>Email</label>
			<input class="span12" type="text" id="bizEmail" name="bizemail" placeholder="Email" />
			
			<label>Website</label>
			<input class="span12" type="text" id="bizWebsite" name="bizwebsite" placeholder="Website" />
			
			<label>Category</label>
			<input class="span12" type="text" id="bizCategory" name="bizcategory" placeholder="Category" />
			
			<label>Description</label>
			<input class="span12" type="text" id="bizDescription" name="bizdescription" placeholder="Description" />
			
			<label>Location</label>
			<input class="span12" type="text" id="latFld" name="bizloclat" placeholder="Latitude" />
			<input class="span12" type="text" id="lngFld" name="bizloclng" placeholder="Longitude" />
			
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
</form>
	