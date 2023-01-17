<?= get_header();?>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" />
<link rel="stylesheet" href="<?= BASE_ASSET;?>ionicons/css/ionicons.min.css" />

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/gokertanrisever/leaflet-ruler@master/src/leaflet-ruler.css" integrity="sha384-P9DABSdtEY/XDbEInD3q+PlL+BjqPCXGcF8EkhtKSfSTr/dS5PBKa9+/PMkW2xsY" crossorigin="anonymous"> 

<!-- Star Services Area
============================================= -->
<div class="services-style-seven-area default-padding bottom-less" style="background-image: url(<?= theme_assets();?>img/shape/19.png); padding-bottom: 20px;">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="site-heading text-center">
					<h2>Peta Microcell Kota Semarang</h2>
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
<script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"></script>
<script src="https://cdn.jsdelivr.net/gh/gokertanrisever/leaflet-ruler@master/src/leaflet-ruler.js" integrity="sha384-N2S8y7hRzXUPiepaSiUvBH1ZZ7Tc/ZfchhbPdvOE5v3aBBCIepq9l+dBJPFdo1ZJ" crossorigin="anonymous"></script>

<script type="text/javascript">
	var curLocation = [0, 0];

	if (curLocation[0] == 0 && curLocation[1] == 0) {
		curLocation = [-6.982078308206165, 110.41283060930145];
	}

	var latLngTowers 		= <?php echo json_encode($tower);?>;
	var latLngMicrocells 	= <?php echo json_encode($microcells);?>;

	var map 		= L.map('map').setView([-7.001574, 110.406562], 13);

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

	var markerMicrocells = [];

	var iconMicrocells = L.icon({
		iconUrl: '<?= BASE_ASSET;?>icons/microcell.png',
		iconSize: [40, 40],
	});

	latLngMicrocells.forEach(function (markerMicrocell) {
		var dataMarkerMicrocell =  L.marker(markerMicrocell, {icon: iconMicrocells}).addTo(map)
									.bindPopup('<b>'+markerMicrocell.nama+'</b><br/>ID : '+markerMicrocell.id+
									'<br/>Latitude : '+markerMicrocell.lat+'<br/>Longitude : '+markerMicrocell.lng+
									'<br/>Ketinggian : '+markerMicrocell.tinggi+'<br/>Alamat : '+markerMicrocell.alamat);

		markerMicrocells.push(dataMarkerMicrocell);
	});

	var options = {
		lengthUnit: {
			display: 'km',
			decimal: 2,
			factor: null,
			label: 'Panjang :'           
		},
	};
	var ruler = L.control.ruler(options).addTo(map);

</script>

<?= get_footer();?>