<script src="<?= BASE_ASSET; ?>js/loadingoverlay.min.js"></script>

<link href="<?= BASE_ASSET; ?>/fine-upload/fine-uploader-gallery.min.css" rel="stylesheet">
<script src="<?= BASE_ASSET; ?>/fine-upload/jquery.fine-uploader.js"></script>
<?php $this->load->view('core_template/fine_upload'); ?>
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
	<h1>Menara <small><?= cclang('new', ['Menara']); ?> </small></h1>
	<ol class="breadcrumb">
		<li><a href="javascript:void(0);"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="<?= admin_site_url('/menara'); ?>">Menara</a></li>
		<li class="active"><?= cclang('new'); ?></li>
	</ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
			<?= form_open('', [
					'name' 		=> 'form_menara',
					'id' 		=> 'form_menara',
					'enctype' 	=> 'multipart/form-data',
					'method' 	=> 'POST'
				]);

				$user_groups = $this->model_group->get_user_group_ids();
			?>
				<div class="box-header">
					<h3 class="box-title"><?= cclang('new', ['Menara']); ?></h3>
				</div>
				<div class="box-body">
					<div class="form-group group-pemohon-id">
						<label for="pemohon_id" class="control-label">Pemohon <i class="required">*</i></label>
						<select class="form-control chosen chosen-select-deselect" name="pemohon_id" id="pemohon_id" data-placeholder="Select Pemohon">
							<option value=""></option>
						</select>
						<small class="info help-block"></small>
					</div>
					<div class="form-group group-kecamatan-id">
						<label for="kecamatan_id" class="control-label">Kecamatan <i class="required">*</i></label>
						<select class="form-control chosen chosen-select-deselect" name="kecamatan_id" id="kecamatan_id" data-placeholder="Select Kecamatan">
							<option value=""></option>
						</select>
						<small class="info help-block"></small>
					</div>
					<div class="form-group group-kelurahan-id">
						<label for="kelurahan_id" class="control-label">Kelurahan <i class="required">*</i> </label>
						<select class="form-control chosen chosen-select-deselect" name="kelurahan_id" id="kelurahan_id" data-placeholder="Select Kelurahan">
							<option value=""></option>
						</select>
						<small class="info help-block"></small>
					</div>
					<div class="form-group group-tipesite-id">
						<label for="tipesite_id" class="control-label">Tipe Site <i class="required">*</i></label>
						<select class="form-control chosen chosen-select-deselect" name="tipesite_id" id="tipesite_id" data-placeholder="Select Tipe Site">
							<option value=""></option>
						</select>
						<small class="info help-block"></small>
					</div>
					<div class="form-group group-operator-id">
						<label for="operator_id" class="control-label">Operator<i class="required">*</i></label>
						<select class="form-control chosen chosen-select-deselect" name="operator_id" id="operator_id" data-placeholder="Select Operator">
							<option value=""></option>
						</select>
						<small class="info help-block"></small>
					</div>
					<div class="form-group group-menara-nama">
						<label for="menara_nama" class="control-label">Nama Menara <i class="required">*</i> </label>
						<input type="text" class="form-control" name="menara_nama" id="menara_nama" placeholder="Nama Menara" value="<?= set_value('menara_nama'); ?>">
						<small class="info help-block"><b>Input Menara Nama</b> Max Length : 255.</small>
					</div>
					<div class="form-group group-menara-alamat">
						<label for="menara_alamat" class="control-label">Alamat Menara <i class="required">*</i> </label>
						<textarea id="menara_alamat" name="menara_alamat" rows="5" class="textarea form-control" placeholder="Alamat Menara"><?= set_value('menara_alamat'); ?></textarea>
						<small class="info help-block"></small>
					</div>
					<div class="form-group group-menara-rt">
						<label for="menara_rt" class="control-label">RT <i class="required">*</i></label>
						<input type="text" class="form-control" name="menara_rt" id="menara_rt" placeholder="RT" value="<?= set_value('menara_rt'); ?>">
						<small class="info help-block"></small>
					</div>
					<div class="form-group group-menara-rw">
						<label for="menara_rw" class="control-label">RW <i class="required">*</i></label>
						<input type="text" class="form-control" name="menara_rw" id="menara_rw" placeholder="RW" value="<?= set_value('menara_rw'); ?>">
						<small class="info help-block"></small>
					</div>
					<div class="form-group group-menara-file-berkas">
						<label for="menara_file_berkas" class="control-label">File </label>
						<div id="menara_menara_file_berkas_galery"></div>
						<input class="data_file" name="menara_menara_file_berkas_uuid" id="menara_menara_file_berkas_uuid" type="hidden" value="<?= set_value('menara_menara_file_berkas_uuid'); ?>">
						<input class="data_file" name="menara_menara_file_berkas_name" id="menara_menara_file_berkas_name" type="hidden" value="<?= set_value('menara_menara_file_berkas_name'); ?>">
						<small class="info help-block"><b>Extension file must</b> PDF,DOC,DOCX,XLS,XLSX.</small>
					</div>
					<div class="form-group group-menara-latitude">
						<label for="menara_latitude" class="control-label">Latitude <i class="required">*</i></label>
						<input type="text" class="form-control" name="menara_latitude" id="menara_latitude" placeholder="Latitude" value="<?= set_value('menara_latitude'); ?>">
						<small class="info help-block"><b>Input Menara Latitude</b> Max Length : 255.</small>
					</div>
					<div class="form-group group-menara-longitude">
						<label for="menara_longitude" class="control-label">Longitude <i class="required">*</i></label>
						<input type="text" class="form-control" name="menara_longitude" id="menara_longitude" placeholder="Longitude" value="<?= set_value('menara_longitude'); ?>">
						<small class="info help-block"><b>Input Menara Longitude</b> Max Length : 255.</small>
					</div>
					<div class="form-group group-menara-ketinggian">
						<label for="menara_ketinggian" class="control-label">Ketinggian (m)<i class="required">*</i></label>
						<input type="text" class="form-control" name="menara_ketinggian" id="menara_ketinggian" placeholder="Ketinggian" value="<?= set_value('menara_ketinggian'); ?>">
						<small class="info help-block"></small>
					</div>
					<div class="form-group group-kawasan-id">
						<label for="kawasan_id" class="control-label">Kawasan <i class="required">*</i></label>
						<select class="form-control chosen chosen-select-deselect" name="kawasan_id" id="kawasan_id" data-placeholder="Select Kawasan">
							<option value=""></option>
						</select>
						<small class="info help-block"></small>
					</div>
					<div class="form-group group-menara-image">
						<label for="menara_image" class="control-label">Foto </label>
						<div id="menara_menara_image_galery"></div>
						<div id="menara_menara_image_galery_listed"></div>
						<small class="info help-block"></small>
					</div>
					<div class="form-group group-menara-nama-penyewa">
						<label for="menara_nama_penyewa" class="control-label">Nama Penyewa <i class="required">*</i></label>
						<input type="text" class="form-control" name="menara_nama_penyewa" id="menara_nama_penyewa" placeholder="Nama Penyewa" value="<?= set_value('menara_nama_penyewa'); ?>">
						<small class="info help-block"><b>Input Menara Nama Penyewa</b> Max Length : 255.</small>
					</div>
					<div class="form-group group-menara-pemilik">
						<label for="menara_pemilik" class="control-label">Pemilik <i class="required">*</i></label>
						<input type="text" class="form-control" name="menara_pemilik" id="menara_pemilik" placeholder="Pemilik" value="<?= set_value('menara_pemilik'); ?>">
						<small class="info help-block"><b>Input Menara Pemilik</b> Max Length : 255.</small>
					</div>
					<div class="form-group group-menara-kondisi">
						<label for="menara_kondisi" class="control-label">Kondisi <i class="required">*</i></label>
						<textarea id="menara_kondisi" name="menara_kondisi" rows="5" class="textarea form-control" placeholder="Kondisi"><?= set_value('menara_kondisi'); ?></textarea>
						<small class="info help-block"></small>
					</div>
					<div class="form-group group-menara-luas-area">
						<label for="menara_luas_area" class="control-label">Luas Area Menara <i class="required">*</i></label>
						<input type="text" class="form-control" name="menara_luas_area" id="menara_luas_area" placeholder="Luas Area Menara" value="<?= set_value('menara_luas_area'); ?>">
						<small class="info help-block"><b>Input Menara Luas Area</b> Max Length : 255.</small>
					</div>
					<div class="form-group group-menara-imb">
						<label for="menara_imb" class="control-label">IMB </label>
						<input type="text" class="form-control" name="menara_imb" id="menara_imb" placeholder="IMB" value="<?= set_value('menara_imb'); ?>">
						<small class="info help-block"><b>Input Menara Imb</b> Max Length : 255.</small>
					</div>
					<div class="form-group group-menara-tgl-imb">
						<label for="menara_tgl_imb" class="control-label">Tanggal IMB </label>
						<div class="input-group date col-md-12">
							<input type="text" class="form-control pull-right datepicker" name="menara_tgl_imb" id="menara_tgl_imb">
						</div>
						<small class="info help-block"></small>
					</div>

					<div class="message"></div>
				</div>
				<div class="box-footer">
					<button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="<?= cclang('save_button'); ?> (Ctrl+s)">
						<i class="fa fa-save"></i> <?= cclang('save_button'); ?>
					</button>
					<a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save" data-stype='back' title="<?= cclang('save_and_go_the_list_button'); ?> (Ctrl+d)">
						<i class="ion ion-ios-list-outline"></i> <?= cclang('save_and_go_the_list_button'); ?>
					</a>

					<div class="custom-button-wrapper"></div>

					<a class="btn btn-flat btn-default btn_action" id="btn_cancel" title="<?= cclang('cancel_button'); ?> (Ctrl+x)">
						<i class="fa fa-undo"></i> <?= cclang('cancel_button'); ?>
					</a>

					<span class="loading loading-hide">
						<img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg">
						<i><?= cclang('loading_saving_data'); ?></i>
					</span>
				</div>
				<?= form_close(); ?>
			</div>
		</div>
	</div>
</section>

<script>
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
					window.location.href = ADMIN_BASE_URL + '/menara';
				}
			});

			return false;
		}); /*end btn cancel*/

		$('.btn_save').click(function () {
			$('.message').fadeOut();

			var form_menara = $('#form_menara');
			var data_post = form_menara.serializeArray();
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
				url: ADMIN_BASE_URL + '/menara/add_save',
				type: 'POST',
				dataType: 'json',
				data: data_post,
			})
			.done(function (res) {
				$('form').find('.form-group').removeClass('has-error');
				$('.steps li').removeClass('error');
				$('form').find('.error-input').remove();
				if (res.success) {
					var id_menara_file_berkas = $('#menara_menara_file_berkas_galery').find('li').attr('qq-file-id');

					if (save_type == 'back') {
						window.location.href = res.redirect;
						return;
					}

					$('.message').printMessage({
						message: res.message
					});
					$('.message').fadeIn();
					resetForm();
					$('#menara_menara_image_galery').find('li').each(function () {
						$('#menara_menara_image_galery').fineUploader('deleteFile', $(
							this).attr('qq-file-id'));
					});

					if (typeof id_menara_file_berkas !== 'undefined') {
						$('#menara_menara_file_berkas_galery').fineUploader('deleteFile',
							id_menara_file_berkas);
					}

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

		var params = {};
		params[csrf] = token;

		$('#menara_menara_file_berkas_galery').fineUploader({
			template: 'qq-template-gallery',
			request: {
				endpoint: ADMIN_BASE_URL + '/menara/upload_menara_file_berkas_file',
				params: params
			},
			deleteFile: {
				enabled: true,
				endpoint: ADMIN_BASE_URL + '/menara/delete_menara_file_berkas_file',
			},
			thumbnails: {
				placeholders: {
					waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
					notAvailablePath: BASE_URL +
						'/asset/fine-upload/placeholders/not_available-generic.png'
				}
			},
			multiple: false,
			validation: {
				allowedExtensions: ["PDF", "DOC", "DOCX", "XLS", "XLSX"],
				sizeLimit: 0,
			},
			showMessage: function (msg) {
				toastr['error'](msg);
			},
			callbacks: {
				onComplete: function (id, name, xhr) {
					if (xhr.success) {
						var uuid = $('#menara_menara_file_berkas_galery').fineUploader('getUuid', id);
						$('#menara_menara_file_berkas_uuid').val(uuid);
						$('#menara_menara_file_berkas_name').val(xhr.uploadName);
					} else {
						toastr['error'](xhr.error);
					}
				},
				onSubmit: function (id, name) {
					var uuid = $('#menara_menara_file_berkas_uuid').val();
					$.get(ADMIN_BASE_URL + '/menara/delete_menara_file_berkas_file/' + uuid);
				},
				onDeleteComplete: function (id, xhr, isError) {
					if (isError == false) {
						$('#menara_menara_file_berkas_uuid').val('');
						$('#menara_menara_file_berkas_name').val('');
					}
				}
			}
		}); /*end menara_file_berkas galery*/

		var params = {};
		params[csrf] = token;

		$('#menara_menara_image_galery').fineUploader({
			template: 'qq-template-gallery',
			request: {
				endpoint: ADMIN_BASE_URL + '/menara/upload_menara_image_file',
				params: params
			},
			deleteFile: {
				enabled: true,
				endpoint: ADMIN_BASE_URL + '/menara/delete_menara_image_file',
			},
			thumbnails: {
				placeholders: {
					waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
					notAvailablePath: BASE_URL +
						'/asset/fine-upload/placeholders/not_available-generic.png'
				}
			},
			validation: {
				allowedExtensions: ["*"],
				sizeLimit: 0,

			},
			showMessage: function (msg) {
				toastr['error'](msg);
			},
			callbacks: {
				onComplete: function (id, name, xhr) {
					if (xhr.success) {
						var uuid = $('#menara_menara_image_galery').fineUploader('getUuid', id);
						$('#menara_menara_image_galery_listed').append(
							'<input type="hidden" class="listed_file_uuid" name="menara_menara_image_uuid[' +
							id + ']" value="' + uuid +
							'" /><input type="hidden" class="listed_file_name" name="menara_menara_image_name[' +
							id + ']" value="' + xhr.uploadName + '" />');
					} else {
						toastr['error'](xhr.error);
					}
				},
				onDeleteComplete: function (id, xhr, isError) {
					if (isError == false) {
						$('#menara_menara_image_galery_listed').find('.listed_file_uuid[name="menara_menara_image_uuid[' + id + ']"]').remove();
						$('#menara_menara_image_galery_listed').find('.listed_file_name[name="menara_menara_image_name[' + id + ']"]').remove();
					}
				}
			}
		}); /*end menara_image galery*/

		$('#pemohon_id').change(function (event) {
			var val = $(this).val();
			$.LoadingOverlay('show')
			$.ajax({
				url: ADMIN_BASE_URL + '/menara/ajax_pemohon_id/' + val,
				dataType: 'JSON',
			})
			.done(function (res) {
				var html = '<option value=""></option>';
				$.each(res, function (index, val) {
					html += '<option value="' + val.pemohon_id + '">' + val.pemohon_nama +'</option>';
				});
				$('#pemohon_id').html(html);
				$('#pemohon_id').trigger('chosen:updated');

			})
			.fail(function () {
				toastr['error']('Error', 'Getting data fail')
			})
			.always(function () {
				$.LoadingOverlay('hide')
			});
		});

		function chained_kecamatan_id(selected, complete) {
			$.LoadingOverlay('show')
			$.ajax({
				url: ADMIN_BASE_URL + '/menara/ajax_kecamatan_id/',
				dataType: 'JSON',
			})
			.done(function (res) {
				var html = '<option value=""></option>';
				$.each(res, function (index, val) {
					html += '<option value="' + val.kecamatan_id + '">' + val.kecamatan_nama + '</option>';
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

		$('#kecamatan_id').change(function (event) {
			var val = $(this).val();
			$.LoadingOverlay('show')
			$.ajax({
				url: ADMIN_BASE_URL + '/menara/ajax_kelurahan_id/' + val,
				dataType: 'JSON',
			})
			.done(function (res) {
				var html = '<option value=""></option>';
				$.each(res, function (index, val) {
					html += '<option value="' + val.kelurahan_id + '">' + val.kelurahan_nama + '</option>';
				});
				$('#kelurahan_id').html(html);
				$('#kelurahan_id').trigger('chosen:updated');

			})
			.fail(function () {
				toastr['error']('Error', 'Getting data fail')
			})
			.always(function () {
				$.LoadingOverlay('hide')
			});
		});

		$('#tipesite_id').change(function (event) {
			var val = $(this).val();
			$.LoadingOverlay('show')
			$.ajax({
				url: ADMIN_BASE_URL + '/menara/ajax_tipesite_id/' + val,
				dataType: 'JSON',
			})
			.done(function (res) {
				var html = '<option value=""></option>';
				$.each(res, function (index, val) {
					html += '<option value="' + val.tipe_site_id + '">' + val.tipe_site_nama + '</option>';
				});
				$('#tipesite_id').html(html);
				$('#tipesite_id').trigger('chosen:updated');

			})
			.fail(function () {
				toastr['error']('Error', 'Getting data fail')
			})
			.always(function () {
				$.LoadingOverlay('hide')
			});
		});

		$('#operator_id').change(function (event) {
			var val = $(this).val();
			$.LoadingOverlay('show')
			$.ajax({
				url: ADMIN_BASE_URL + '/menara/ajax_operator_id/' + val,
				dataType: 'JSON',
			})
			.done(function (res) {
				var html = '<option value=""></option>';
				$.each(res, function (index, val) {
					html += '<option value="' + val.operator_id + '">' + val.operator_nama + '</option>';
				});
				$('#operator_id').html(html);
				$('#operator_id').trigger('chosen:updated');

			})
			.fail(function () {
				toastr['error']('Error', 'Getting data fail')
			})
			.always(function () {
				$.LoadingOverlay('hide')
			});
		});

		$('#kawasan_id').change(function (event) {
			var val = $(this).val();
			$.LoadingOverlay('show')
			$.ajax({
				url: ADMIN_BASE_URL + '/menara/ajax_kawasan_id/' + val,
				dataType: 'JSON',
			})
			.done(function (res) {
				var html = '<option value=""></option>';
				$.each(res, function (index, val) {
					html += '<option value="' + val.kawasan_id + '">' + val.kawasan_nama + '</option>';
				});
				$('#kawasan_id').html(html);
				$('#kawasan_id').trigger('chosen:updated');

			})
			.fail(function () {
				toastr['error']('Error', 'Getting data fail')
			})
			.always(function () {
				$.LoadingOverlay('hide')
			});
		});

		async function chain() {
			await chained_kecamatan_id('');
		}

		chain();
	}); /*end doc ready*/
</script>