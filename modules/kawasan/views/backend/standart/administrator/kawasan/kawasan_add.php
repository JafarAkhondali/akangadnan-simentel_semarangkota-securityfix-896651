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
	<h1>Kawasan <small><?= cclang('new', ['Kawasan']); ?> </small></h1>
	<ol class="breadcrumb">
		<li><a href="javscript:void(0);"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="<?= admin_site_url('/kawasan'); ?>">Kawasan</a></li>
		<li class="active"><?= cclang('new'); ?></li>
	</ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
			<?= form_open('', [
					'name' 		=> 'form_kawasan',
					'id' 		=> 'form_kawasan',
					'enctype' 	=> 'multipart/form-data',
					'method' 	=> 'POST'
				]);

				$user_groups = $this->model_group->get_user_group_ids();
			?>
				<div class="box-header">
					<h3 class="box-title">Tambah Data Jenis Kawasan</h3>
				</div>
				<div class="box-body">
					<div class="form-group group-kawasan-nama">
						<label for="kawasan_nama" class="control-label">Jenis Kawasan <i class="required">*</i></label>
						<input type="text" class="form-control" name="kawasan_nama" id="kawasan_nama" placeholder="Masukkan nama Jenis Kawasan" value="<?= set_value('kawasan_nama'); ?>">
						<small class="info help-block"><b>Input Jenis Kawasan</b> Max Length : 255.</small>
					</div>

					<div class="message"></div>
				</div>
				<div class="box-footer">
					<div class="row-fluid">
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
				</div>
				<?= form_close(); ?>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript">
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
					window.location.href = ADMIN_BASE_URL + '/kawasan';
				}
			});

			return false;
		}); /*end btn cancel*/

		$('.btn_save').click(function () {
			$('.message').fadeOut();

			var form_kawasan = $('#form_kawasan');
			var data_post = form_kawasan.serializeArray();
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
				url: ADMIN_BASE_URL + '/kawasan/add_save',
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
							$('form #' + index).parents('.form-group').addClass(
								'has-error');
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
	}); /*end doc ready*/
</script>