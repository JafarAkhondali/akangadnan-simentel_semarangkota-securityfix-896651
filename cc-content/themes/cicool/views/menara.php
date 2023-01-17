<?= get_header();?>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" />
<link rel="stylesheet" href="<?= BASE_ASSET;?>ionicons/css/ionicons.min.css" />

<!-- Star Services Area
============================================= -->
<div class="services-style-seven-area default-padding bottom-less" style="background-image: url(<?= theme_assets();?>img/shape/19.png); padding-bottom: 20px;">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="site-heading text-center">
					<h2>Peta Menara Telekomunikasi Kota Semarang</h2>
					<div class="devider"></div>
				</div>
			</div>
		</div>
		<div class="row" style="margin-top: 150px;">
			<div class="col-lg-6">
				<div class="form-group">
					<input class="form-control" id="latitude" name="latitude" placeholder="Latitude" type="text">
				</div>
			</div>
			<div class="col-lg-6">
				<div class="form-group">
					<input class="form-control" id="longitude" name="longitude" placeholder="Longitude" type="text">
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Services Area -->

<!-- Star Google Maps
============================================= -->
<div class="maps-area">
	<div class="google-maps">
		<div id="map" style="width: 100%; height: 720px; z-index: 1;"></div>
	</div>
</div>
<!-- End Google Maps -->

<script type="text/javascript" src="<?= BASE_ASSET;?>admin-lte/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"></script>

<script type="text/javascript">
	var curLocation = [0, 0];

	if (curLocation[0] == 0 && curLocation[1] == 0) {
		curLocation = [-6.982078308206165, 110.41283060930145];
	}

	var latLngZones 	= <?php echo json_encode($latlng);?>;
	var latLngTowers 	= <?php echo json_encode($tower);?>;

	var map 		= L.map('map').setView(curLocation, 13);

	map.attributionControl.setPrefix(false);

	L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="https://semarangkota.go.id/">Kota Semarang</a> | <a href="https://diskominfo.semarangkota.go.id/">Diskominfo</a> contributors'
	}).addTo(map);

	$.getJSON('<?= base_url().'peta-administrasi/Wilayah-Administrasi-Kecamatan-Kota_Semarang.geojson';?>', function (data) {
		geoLayer = L.geoJson(data, {
			style : function (feature) {
				return {
					opacity : 0.5,
					color : '#007100',
					weight : 1,
					fillOpacity : 0.4,
					fillColor : 'grey'
				}
			},
		}).addTo(map);
	});

	var markerDraggable = L.marker(curLocation, {
		draggable: true
	}).addTo(map);

	markerDraggable.on('dragend', function(event) {
		var position = markerDraggable.getLatLng();

		markerDraggable.setLatLng(position, {
			draggable: 'true'
		}).bindPopup(position).update();

		$("#latitude").val(position.lat);
		$("#longitude").val(position.lng).keyup();
	});

	$("#latitude, #longitude").change(function() {
		var position = [$("#latitude").val(), $("#longitude").val()];
		console.log(position);

		markerDraggable.setLatLng(position, {
			draggable: 'true'
		}).bindPopup(position).update();

		map.panTo(position);
	});

	var markerArray = [];
	var circleArray = [];
	var markerZonesArray = [];

	latLngZones.forEach(function (circleZone) {
		var dataCircleZone =  L.circle(circleZone, {
								color: "green",
								fillColor: "#408039",
								fillOpacity: 0.5,
								radius: circleZone.radius
							}).addTo(map);

		circleArray.push(dataCircleZone);

		var iconZones = L.icon({
			iconUrl: '<?= BASE_ASSET;?>icons/pin_location_green.png',
			iconSize: [20, 20],
		});

		var dataMarkerZones =  L.marker(circleZone, {
			icon: iconZones,
		}).addTo(map)
		.bindPopup('<b>Zona '+circleZone.nama+'</b><br/>ID : '+circleZone.id+'<br/>Latitude : '+circleZone.lat+'<br/>Longitude : '+circleZone.lng+'<br/>Kecamatan : '+circleZone.kecamatan);

		markerZonesArray.push(dataMarkerZones);
	});

	var iconTowers = L.icon({
		iconUrl: '<?= BASE_ASSET;?>icons/menara-tower.png',
		iconSize: [30, 30],
	});

	latLngTowers.forEach(function (markerTower) {
		var dataMarkerTower =  L.marker(markerTower, {icon: iconTowers}).addTo(map)
							.bindPopup('<a href="<?= BASE_URL;?>detail-menara?id='+markerTower.id+'" target="blank"><b>'+markerTower.nama+
							'</b></a><br/>ID : '+markerTower.id+'<br/>Latitude : '+markerTower.lat+'<br/>Longitude : '+markerTower.lng+
							'<br/>Alamat : '+markerTower.alamat+'<br/>Kecamatan : '+markerTower.kecamatan+'<br/>Kelurahan : '+markerTower.kelurahan+
							'<br/>Tipe site : '+markerTower.tipesite+'<br/>Operator : '+markerTower.operator);

		markerArray.push(dataMarkerTower);
	});
</script>

<?= get_footer();?>