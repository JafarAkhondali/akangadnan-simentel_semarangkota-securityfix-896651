<link rel="stylesheet" href="<?= BASE_ASSET;?>bootstrap-sliders/css/bootstrap-slider.min.css"/>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" />
<link rel="stylesheet" href="<?= BASE_ASSET;?>leaflet/plugins/location-picker/src/leaflet-locationpicker.css"/>

<script type="text/javascript">
	function domo() {
		$('*').bind('keydown', 'Ctrl+e', function () {
			$('#btn_edit').trigger('click');
			return false;
		});

		$('*').bind('keydown', 'Ctrl+x', function () {
			$('#btn_back').trigger('click');
			return false;
		});
	}

	jQuery(document).ready(domo);
</script>

<?php
	$lat_lng 		= [$zona->zona_latitude, $zona->zona_longitude];
	$zona_lat_lng 	= implode(', ', $lat_lng);
?>
<section class="content-header">
	<h1>Zona <small><?= cclang('detail', ['Zona']); ?> </small></h1>
	<ol class="breadcrumb">
		<li><ahref="javascript:void(0);"><i class="fa fa-dashboard"></i> Home</ahref=></li>
		<li><a href="<?= site_url('administrator/zona'); ?>">Zona</a></li>
		<li class="active"><?= cclang('detail'); ?></li>
	</ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-body">
					<div class="box box-widget">
						<div class="box-header">
							<h3 class="box-title">Detail Zona <?= _ent($zona->zona_nama);?></h3>
						</div>
						<div name="form_zona" id="form_zona">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="content" class="control-label">ID </label>
										<span class="detail_group-zona_id"><?= _ent($zona->zona_id); ?></span>
									</div>
									<div class="form-group">
										<label for="content" class="control-label">Nama Kecamatan </label>
										<span class="detail_group-kecamatan_id"><?= _ent($zona->kecamatan_kecamatan_nama); ?></span>
									</div>
									<div class="form-group">
										<label for="content" class="control-label">Nama Zona </label>
										<span class="detail_group-zona-nama"><?= _ent($zona->zona_nama); ?></span>
									</div>
									<div class="form-group">
										<label for="content" class="control-label">Longitude </label>
										<span class="detail_group-zona-longitude"><?= _ent($zona->zona_longitude); ?></span>
									</div>
									<div class="form-group">
										<label for="content" class="control-label">Latitude </label>
										<span class="detail_group-zona-latitude"><?= _ent($zona->zona_latitude); ?></span>
									</div>
									<div class="form-group">
										<label for="content" class="control-label">Radius </label>
										<span class="detail_group-zona-radius"><?= _ent($zona->zona_radius); ?></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div id="map" style="height: 400px; width: 100%;"></div>
								</div>
							</div>
						</div>
						<div class="box-footer">
							<?php is_allowed('zona_update', function() use ($zona){?>
							<a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit zona (Ctrl+e)" href="<?= site_url('administrator/zona/edit/'.$zona->zona_id); ?>">
								<i class="fa fa-edit"></i> <?= cclang('update', ['Zona']); ?>
							</a>
							<?php }) ?>
							<a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= site_url('administrator/zona/'); ?>">
								<i class="fa fa-undo"></i>
								<?= cclang('go_list_button', ['Zona']); ?>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript" src="<?= BASE_ASSET;?>bootstrap-sliders/bootstrap-slider.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"></script>
<script type="text/javascript" src="<?= BASE_ASSET;?>leaflet/plugins/location-picker/src/leaflet-locationpicker.js"></script>

<script type="text/javascript">
	var radius 		= <?= $zona->zona_radius;?>;
	var koordinat 	= [<?= $zona_lat_lng;?>];

	var circleOptions = {
		color: 'green',
		fillColor: '#00800080',
		fillOpacity: .6
	};

	var map 			= L.map('map').setView(koordinat, 17);
	var circleRadius 	= L.circle(koordinat, radius, circleOptions).addTo(map);
	var marker 			= L.marker(koordinat).addTo(map);

	map.attributionControl.setPrefix(false);

	L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="https://semarangkota.go.id/" target="blank">Kota Semarang</a> | <a href="https://diskominfo.semarangkota.go.id/" target="blank">Diskominfo</a> contributors'
	}).addTo(map);

	$(document).ready(function () {
		"use strict";
	});
</script>