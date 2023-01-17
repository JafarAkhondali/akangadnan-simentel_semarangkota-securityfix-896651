<link rel="stylesheet" href="<?= BASE_ASSET;?>bootstrap-sliders/css/bootstrap-slider.min.css"/>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" />
<link rel="stylesheet" href="<?= BASE_ASSET;?>leaflet/plugins/location-picker/src/leaflet-locationpicker.css"/>

<script type="text/javascript" src="<?= BASE_ASSET; ?>js/loadingoverlay.min.js"></script>
<script type="text/javascript">
	function domo() {
		$('*').bind('keydown', 'Ctrl+s', function () {
			$('#btn_save').trigger('click');
			return false;
		});

		$('*').bind('keydown', 'Ctrl+x', function () {
			$('#btn_cancel').trigger('click');
			return false;
		});

		$('*').bind('keydown', 'Ctrl+d', function () {
			$('.btn_save_back').trigger('click');
			return false;
		});
	}

	jQuery(document).ready(domo);
</script>
<style>
</style>
<section class="content-header">
	<h1>Zona <small><?= cclang('new', ['Zona']); ?></small></h1>
	<ol class="breadcrumb">
		<li><a href="javascript:void(0);"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="<?= admin_site_url('/zona'); ?>">Zona</a></li>
		<li class="active"><?= cclang('new'); ?></li>
	</ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
			<?= form_open('', [
					'name' 		=> 'form_zona',
					'id' 		=> 'form_zona',
					'enctype' 	=> 'multipart/form-data',
					'method' 	=> 'POST'
				]);

				$user_groups = $this->model_group->get_user_group_ids();
			?>
				<div class="box-header">
					<h3 class="box-title"><?= cclang('new', ['Zona']); ?></h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group group-kecamatan-id">
								<label for="kecamatan_id" class="control-label">Nama Kecamatan <i class="required">*</i></label>
								<select class="form-control chosen chosen-select-deselect" name="kecamatan_id" id="kecamatan_id" data-placeholder="Select Nama Kecamatan">
									<option value=""></option>
								</select>
								<small class="info help-block"></small>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group group-zona-nama">
								<label for="zona_nama" class="control-label">Nama Zona <i class="required">*</i></label>
								<input type="text" class="form-control" name="zona_nama" id="zona_nama" placeholder="Nama Zona" value="<?= set_value('zona_nama'); ?>">
								<small class="info help-block"><b>Input Zona Nama</b> Max Length : 255.</small>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div id="map-picker" style="height: 400px; width: 100%;"></div>
						</div>
						<div class="col-md-6">
							<div id="map-radius" style="height: 400px; width: 100%;"></div>
						</div>
					</div>
					<div class="row" style="margin-top: 20px;">
						<div class="col-md-6">
							<div class="form-group group-zona-longitude">
								<label for="zona_lat_lng" class="control-label">Koordinat (Lat, Lng) <i class="required">*</i></label>
								<input type="text" class="form-control" name="zona_lat_lng" id="zona_lat_lng" placeholder="lat, Lng" value="<?= set_value('zona_lat_lng'); ?>">
								<small class="info help-block"></small>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group group-zona-radius">
								<label for="zona_radius" class="control-label">Radius <i class="required">*</i></label><br/>
								<!-- <input type="text" class="form-control" name="zona_radius" id="zona_radius" placeholder="Radius" value="<?= set_value('zona_radius'); ?>"> -->
								<!-- <input type="text" value="<?= set_value('zona_radius'); ?>" name="zona_radius" id="zona_radius" data-slider-min="0" data-slider-max="1000" data-slider-step="5" data-slider-value="<?= set_value('zona_radius'); ?>" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="show" data-slider-id="red"> -->
								<input type="text" id="zona_radius" name="zona_radius" class="slider form-control" data-slider-min="0" data-slider-max="1000" data-slider-step="5" data-slider-value="<?= set_value('zona_radius') === '' ? '200' : set_value('zona_radius'); ?>" value="<?= set_value('zona_radius') === '' ? '200' : set_value('zona_radius'); ?>"/>
								<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Radius : <span id="label-radius"><?= set_value('zona_radius') === '' ? '200' : set_value('zona_radius'); ?></span> m</span>
								<small class="info help-block"></small>
							</div>
						</div>	
						<div class="col-md-12">
							<div class="message"></div>
						</div>
					</div>
				</div>
				<div class="box-footer">
					<button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="<?= cclang('save_button'); ?> (Ctrl+s)">
						<i class="fa fa-save"></i> <?= cclang('save_button'); ?>
					</button>
					<a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save" data-stype='back' title="<?= cclang('save_and_go_the_list_button'); ?> (Ctrl+d)">
						<i class="ion ion-ios-list-outline"></i> <?= cclang('save_and_go_the_list_button'); ?>
					</a>

					<div class="custom-button-wrapper"></div>

					<a class="btn btn-flat btn-default btn_action" id="btn_cancel"
						title="<?= cclang('cancel_button'); ?> (Ctrl+x)">
						<i class="fa fa-undo"></i> <?= cclang('cancel_button'); ?>
					</a>

					<span class="loading loading-hide">
						<img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg">
						<i><?= cclang('loading_saving_data'); ?></i>
					</span>
				</div>
			</div>
			<?= form_close(); ?>
		</div>
	</div>
</section>

<script type="text/javascript" src="<?= BASE_ASSET;?>bootstrap-sliders/bootstrap-slider.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"></script>
<script type="text/javascript" src="<?= BASE_ASSET;?>leaflet/plugins/location-picker/src/leaflet-locationpicker.js"></script>

<script type="text/javascript">
	var val_radius 	= <?= set_value('zona_radius') === '' ? '200' : set_value('zona_radius'); ?>;
	var circles;
	var koordinat 	= [-6.982078308206165, 110.41283060930145];

	var fix_latlng 	= [];
	var cur_lat 	= '';
	var cur_lng 	= '';
	var cur_loc 	= 0;

	var circleOptions = {
		color: 'green',
		fillColor: '#00800080',
		fillOpacity: .6
	};

	var map = L.map('map-radius').setView(koordinat, 14);
	var circleRadius = L.circle(koordinat, val_radius, circleOptions).addTo(map);

	map.attributionControl.setPrefix(false);

	L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="https://semarangkota.go.id/" target="blank">Kota Semarang</a> | <a href="https://diskominfo.semarangkota.go.id/" target="blank">Diskominfo</a> contributors'
	}).addTo(map);

	$(".slider").slider();
	$(".slider").on("slide", function(slideEvt) {
		$("#label-radius").text(slideEvt.value);
	});

	$(".slider").on('change', function(value) {
		val_radius = value.value.newValue;

		if(map.hasLayer(circles))
			map.removeLayer(circles);
			circleRadius.remove();

		circles = L.circle(koordinat, val_radius, circleOptions).addTo(map);

		return 'Radius: ' + value.value.newValue;

	});

	$('#zona_lat_lng').leafletLocationPicker({
		alwaysOpen: true,
		locationMarker: true,
		height: 400,
		locationSep: ', ',
		onChangeLocation: function() {
			map.eachLayer((layer) => {
				if(layer['_latlng'] != undefined)
					layer.remove();
			});

			cur_lat = parseFloat($('#zona_lat_lng').val().split(",")[0]);
			cur_lng = parseFloat($('#zona_lat_lng').val().split(",")[1]);

			var location = [cur_lat, cur_lng];

			koordinat = location;

			L.marker(location).addTo(map).bindPopup("Titik Radius");

			map.setView(location, 17);

			let radius = parseInt(val_radius);

			circles = L.circle(location, val_radius, circleOptions).addTo(map);
		},

		mapContainer: "#map-picker"
	});

	$(document).ready(function () {
		"use strict";

		window.event_submit_and_action = '';

		$('#btn_cancel').click(function () {
			swal({
				title: "<?= cclang('are_you_sure'); ?>",
				text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes!",
				cancelButtonText: "No!",
				closeOnConfirm: true,
				closeOnCancel: true
			},
			function (isConfirm) {
				if (isConfirm) {
					window.location.href = ADMIN_BASE_URL + '/zona';
				}
			});

			return false;
		}); /*end btn cancel*/

		$('.btn_save').click(function () {
			$('.message').fadeOut();

			var form_zona = $('#form_zona');
			var data_post = form_zona.serializeArray();
			var save_type = $(this).attr('data-stype');

			data_post.push({
				name: 'save_type',
				value: save_type
			});

			data_post.push({
				name: 'event_submit_and_action',
				value: window.event_submit_and_action
			});

			$('.loading').show();

			$.ajax({
				url: ADMIN_BASE_URL + '/zona/add_save',
				type: 'POST',
				dataType: 'json',
				data: data_post,
			})
			.done(function (res) {
				$('form').find('.form-group').removeClass('has-error');
				$('.steps li').removeClass('error');
				$('form').find('.error-input').remove();

				if (res.success) {
					if (save_type == 'back') {
						window.location.href = res.redirect;
						return;
					}

					$('.message').printMessage({
						message: res.message
					});
					$('.message').fadeIn();
					resetForm();
					$('.chosen option').prop('selected', false).trigger('chosen:updated');
				} else {
					if (res.errors) {
						$.each(res.errors, function (index, val) {
							$('form #' + index).parents('.form-group').addClass('has-error');
							$('form #' + index).parents('.form-group').find('small').prepend(`<div class="error-input">` + val + `</div>`);
						});
						$('.steps li').removeClass('error');
						$('.content section').each(function (index, el) {
							if ($(this).find('.has-error').length) {
								$('.steps li:eq(' + index + ')').addClass('error').find('a').trigger('click');
							}
						});
					}
					$('.message').printMessage({
						message: res.message,
						type: 'warning'
					});
				}
			})
			.fail(function () {
				$('.message').printMessage({
					message: 'Error save data',
					type: 'warning'
				});
			})
			.always(function () {
				$('.loading').hide();
				$('html, body').animate({
					scrollTop: $(document).height()
				}, 2000);
			});

			return false;
		}); /*end btn save*/

		function chained_kecamatan_id(selected, complete) {
			$.LoadingOverlay('show');

			$.ajax({
				url: ADMIN_BASE_URL + '/zona/ajax_kecamatan_id/',
				dataType: 'JSON',
			})
			.done(function (res) {
				var html = '<option value=""></option>';
				$.each(res, function (index, val) {
					html += '<option value="' + val.kecamatan_id + '">' + val.kecamatan_nama + '</option>'
				});
				$('#kecamatan_id').html(html);
				$('#kecamatan_id').trigger('chosen:updated');
			})
			.fail(function () {
				toastr['error']('Error', 'Getting data fail')
			})
			.always(function () {
				$.LoadingOverlay('hide')
			});
		};

		async function chain() {
			await chained_kecamatan_id();
		}

		chain();
	}); /*end doc ready*/
</script>