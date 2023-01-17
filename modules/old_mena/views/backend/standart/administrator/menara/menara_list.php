<?php
	// echo json_encode($menaras);
	// exit;
?>
<script type="text/javascript">
	function domo() {
		$('*').bind('keydown', 'Ctrl+a', function () {
			window.location.href = BASE_URL + '/administrator/Menara/add';
			return false;
		});

		$('*').bind('keydown', 'Ctrl+f', function () {
			$('#sbtn').trigger('click');
			return false;
		});

		$('*').bind('keydown', 'Ctrl+x', function () {
			$('#reset').trigger('click');
			return false;
		});

		$('*').bind('keydown', 'Ctrl+b', function () {

			$('#reset').trigger('click');
			return false;
		});
	}

	jQuery(document).ready(domo);
</script>
<section class="content-header">
	<h1><?= cclang('menara') ?><small><?= cclang('list_all'); ?></small></h1>
	<ol class="breadcrumb">
		<li><a href="javascript:void(0);"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><?= cclang('menara') ?></li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title"><?= cclang('list_all', [cclang('menara')]); ?> <i class="label bg-yellow"><?= $menara_counts; ?> <?= cclang('items'); ?></i></h3>
					<div class="pull-right">
						<?php is_allowed('menara_add', function(){?>
						<a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="<?= cclang('add_new_button', [cclang('menara')]); ?>  (Ctrl+a)" href="<?=  site_url('administrator/menara/add'); ?>">
							<i class="fa fa-plus-square-o"></i> <?= cclang('add_new_button', [cclang('menara')]); ?>
						</a>
						<?php }) ?>
						<?php is_allowed('menara_export', function(){?>
						<a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> <?= cclang('menara') ?> " href="<?= site_url('administrator/menara/export?q='.$this->input->get('q').'&f='.$this->input->get('f')); ?>">
							<i class="fa fa-file-excel-o"></i> <?= cclang('export'); ?> XLS
						</a>
						<?php }) ?>
						<?php is_allowed('menara_export', function(){?>
						<a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> pdf <?= cclang('menara') ?> " href="<?= site_url('administrator/menara/export_pdf?q='.$this->input->get('q').'&f='.$this->input->get('f')); ?>">
							<i class="fa fa-file-pdf-o"></i> <?= cclang('export'); ?> PDF
						</a>
						<?php }) ?>
					</div>
				</div>
				<div class="box-body">
					<form name="form_menara" id="form_menara" action="<?= base_url('administrator/menara/index'); ?>">
						<div class="row">
							<div class="col-md-8">
								<div class="col-sm-2 padd-left-0">
									<select type="text" class="form-control chosen chosen-select" name="bulk" id="bulk" placeholder="Site Email">
										<option value="delete">Delete</option>
									</select>
								</div>
								<div class="col-sm-2 padd-left-0">
									<button type="button" class="btn btn-flat" name="apply" id="apply" title="<?= cclang('apply_bulk_action'); ?>"><?= cclang('apply_button'); ?></button>
								</div>
								<div class="col-sm-3 padd-left-0 ">
									<input type="text" class="form-control" name="q" id="filter" placeholder="<?= cclang('filter'); ?>" value="<?= $this->input->get('q'); ?>">
								</div>
								<div class="col-sm-3 padd-left-0">
									<select type="text" class="form-control chosen chosen-select" name="f"
										id="field">
										<option value=""><?= cclang('all'); ?></option>
										<option <?= $this->input->get('f') == 'pemohon_id' ? 'selected' :''; ?> value="pemohon_id">Pemohon</option>
										<option <?= $this->input->get('f') == 'kecamatan_id' ? 'selected' :''; ?> value="kecamatan_id">Kecamatan</option>
										<option <?= $this->input->get('f') == 'kelurahan_id' ? 'selected' :''; ?> value="kelurahan_id">Kelurahan</option>
										<option <?= $this->input->get('f') == 'tipesite_id' ? 'selected' :''; ?> value="tipesite_id">Tipe Site</option>
										<option <?= $this->input->get('f') == 'operator_id' ? 'selected' :''; ?> value="operator_id">Operator Id</option>
										<option <?= $this->input->get('f') == 'menara_nama' ? 'selected' :''; ?> value="menara_nama">Nama Menara</option>
										<option <?= $this->input->get('f') == 'menara_alamat' ? 'selected' :''; ?> value="menara_alamat">Alamat Menara</option>
										<option <?= $this->input->get('f') == 'menara_rt' ? 'selected' :''; ?> value="menara_rt">RT</option>
										<option <?= $this->input->get('f') == 'menara_rw' ? 'selected' :''; ?> value="menara_rw">RW</option>
										<option <?= $this->input->get('f') == 'menara_file_berkas' ? 'selected' :''; ?> value="menara_file_berkas">File</option>
										<option <?= $this->input->get('f') == 'menara_ketinggian' ? 'selected' :''; ?> value="menara_ketinggian">Ketinggian</option>
										<option <?= $this->input->get('f') == 'kawasan_id' ? 'selected' :''; ?> value="kawasan_id">Kawasan</option>
										<option <?= $this->input->get('f') == 'menara_nama_penyewa' ? 'selected' :''; ?> value="menara_nama_penyewa">Nama Penyewa</option>
										<option <?= $this->input->get('f') == 'menara_pemilik' ? 'selected' :''; ?> value="menara_pemilik">Pemilik</option>
										<option <?= $this->input->get('f') == 'menara_kondisi' ? 'selected' :''; ?> value="menara_kondisi">Kondisi</option>
										<option <?= $this->input->get('f') == 'menara_luas_area' ? 'selected' :''; ?> value="menara_luas_area">Luas Area Menara</option>
									</select>
								</div>
								<div class="col-sm-1 padd-left-0">
									<button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply" title="<?= cclang('filter_search'); ?>">
										Filter
									</button>
								</div>
								<div class="col-sm-1 padd-left-0">
									<a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= base_url('administrator/menara');?>" title="<?= cclang('reset_filter'); ?>">
										<i class="fa fa-undo"></i>
									</a>
								</div>
							</div>
							<div class="col-md-4">
								<div class="dataTables_paginate paging_simple_numbers pull-right" id="example2_paginate">
									<?= $pagination; ?>
								</div>
							</div>
						</div>
						<div class="table-responsive" style="margin-top: 10px;">
							<table class="table table-bordered table-striped dataTable">
								<thead>
									<tr>
										<th><input type="checkbox" class="flat-red toltip" id="check_all" name="check_all" title="check all"></th>
										<th data-field="menara_nama" data-sort="1" data-primary-key="0"><?= cclang('menara_nama') ?></th>
										<th data-field="menara_nama_penyewa" data-sort="1" data-primary-key="0"><?= cclang('menara_nama_penyewa') ?></th>
										<th data-field="menara_pemilik" data-sort="1" data-primary-key="0"><?= cclang('menara_pemilik') ?></th>
										<th data-field="operator_id" data-sort="1" data-primary-key="0"><?= cclang('operator_id') ?></th>

										<!-- <th data-field="pemohon_id" data-sort="1" data-primary-key="0"><?= cclang('pemohon_id') ?></th>
										<th data-field="kecamatan_id" data-sort="1" data-primary-key="0"><?= cclang('kecamatan_id') ?></th>
										<th data-field="kelurahan_id" data-sort="1" data-primary-key="0"><?= cclang('kelurahan_id') ?></th>
										<th data-field="tipesite_id" data-sort="1" data-primary-key="0"><?= cclang('tipesite_id') ?></th>
										<th data-field="menara_alamat" data-sort="1" data-primary-key="0"><?= cclang('menara_alamat') ?></th>
										<th data-field="menara_rt" data-sort="1" data-primary-key="0"><?= cclang('menara_rt') ?></th>
										<th data-field="menara_rw" data-sort="1" data-primary-key="0"><?= cclang('menara_rw') ?></th>
										<th data-field="menara_file_berkas" data-sort="0" data-primary-key="0"><?= cclang('menara_file_berkas') ?></th>
										<th data-field="menara_latitude" data-sort="1" data-primary-key="0"><?= cclang('menara_lat_lng') ?></th>
										<th data-field="menara_ketinggian" data-sort="1" data-primary-key="0"><?= cclang('menara_ketinggian') ?></th>
										<th data-field="kawasan_id" data-sort="1" data-primary-key="0"><?= cclang('kawasan_id') ?></th>
										<th data-field="menara_kondisi" data-sort="1" data-primary-key="0"><?= cclang('menara_kondisi') ?></th>
										<th data-field="menara_luas_area" data-sort="1" data-primary-key="0"><?= cclang('menara_luas_area') ?></th> -->
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="tbody_menara">
									<?php foreach($menaras as $menara): ?>
									<tr>
										<td width="5"><input type="checkbox" class="flat-red check" name="id[]" value="<?= $menara->menara_id; ?>"></td>
										<td><span class="list_group-menara-nama"><?= _ent($menara->menara_nama); ?></span></td>
										<td><span class="list_group-menara-nama-penyewa"><?= _ent($menara->menara_nama_penyewa); ?></span></td>
										<td><span class="list_group-menara-pemilik"><?= _ent($menara->menara_pemilik); ?></span></td>
										<td>
										<?php
											if ($menara->operator_operator_nama != null) {
												echo $menara->operator_operator_nama;
											} else {
												echo $menara->operator_id;
											}
										?>
										</td>

										<!-- <td><?php echo $menara->pemohon_pemohon_nama;?></td>
										<td><?php echo $menara->kecamatan_kecamatan_nama;?></td>
										<td><?php echo $menara->kelurahan_kelurahan_nama;?></td>
										<td><?php echo $menara->tipe_site_tipe_site_nama;?></td>
										<td><span class="list_group-menara-alamat"><?= _ent($menara->menara_alamat); ?></span></td>
										<td><span class="list_group-menara-rt"><?= _ent($menara->menara_rt); ?></span></td>
										<td><span class="list_group-menara-rw"><?= _ent($menara->menara_rw); ?></span></td>
										<td>
											<?php if (!empty($menara->menara_file_berkas)): ?>
											<?php if (is_image($menara->menara_file_berkas)): ?>
											<a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/menara/' . $menara->menara_file_berkas; ?>">
												<img src="<?= BASE_URL . 'uploads/menara/' . $menara->menara_file_berkas; ?>" class="image-responsive" alt="image menara" title="menara_file_berkas menara" width="40px">
											</a>
											<?php else: ?>
											<a href="<?= BASE_URL . 'uploads/menara/' . $menara->menara_file_berkas; ?>" target="blank">
												<img src="<?= get_icon_file($menara->menara_file_berkas); ?>" class="image-responsive image-icon" alt="image menara" title="menara_file_berkas <?= $menara->menara_file_berkas; ?>" width="40px">
											</a>
											<?php endif; ?>
											<?php endif; ?>
										</td>
										<td><span class="list_group-menara-latitude"><?= _ent($menara->menara_latitude).', '._ent($menara->menara_longitude); ?></span></td>
										<td><span class="list_group-menara-ketinggian"><?= _ent($menara->menara_ketinggian); ?>m</span></td>
										<td><?php echo $menara->kawasan_kawasan_nama;?></td>
										<td><span class="list_group-menara-kondisi">
										<?php
											if (strlen(_ent($menara->menara_kondisi)) < 20) {
												echo _ent($menara->menara_kondisi);
											} else {
												echo substr(_ent($menara->menara_kondisi), 0, 20) . ' [...]';
											}
										?>
										</span></td>
										<td><span class="list_group-menara-luas-area"><?= _ent($menara->menara_luas_area); ?></span></td> -->
										<td width="200">
											<?php is_allowed('menara_view', function() use ($menara){?>
											<a href="<?= site_url('administrator/menara/view/' . $menara->menara_id); ?>" class="label-default"><i class="fa fa-newspaper-o"></i>
											<?= cclang('view_button'); ?></a>
											<?php }) ?>
											<?php is_allowed('menara_update', function() use ($menara){?>
											<a href="<?= site_url('administrator/menara/edit/' . $menara->menara_id); ?>"
												class="label-default"><i class="fa fa-edit"></i>
												<?= cclang('update_button'); ?></a>
											<?php }) ?>
											<?php is_allowed('menara_delete', function() use ($menara){?>
											<a href="javascript:void(0);"
												data-href="<?= site_url('administrator/menara/delete/' . $menara->menara_id); ?>"
												class="label-default remove-data"><i class="fa fa-close"></i>
												<?= cclang('remove_button'); ?></a>
											<?php }) ?>
										</td>
									</tr>
									<?php endforeach; ?>
									<?php if ($menara_counts == 0) :?>
									<tr>
										<td colspan="100">
											Menara data is not available
										</td>
									</tr>
									<?php endif; ?>
								</tbody>
							</table>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>


<script>
	$(document).ready(function () {
		"use strict";

		$('.remove-data').click(function () {
			var url = $(this).attr('data-href');

			swal({
				title: "<?= cclang('are_you_sure'); ?>",
				text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "<?= cclang('yes_delete_it'); ?>",
				cancelButtonText: "<?= cclang('no_cancel_plx'); ?>",
				closeOnConfirm: true,
				closeOnCancel: true
			},
			function (isConfirm) {
				if (isConfirm) {
					document.location.href = url;
				}
			});

			return false;
		});

		$('#apply').click(function () {
			var bulk = $('#bulk');
			var serialize_bulk = $('#form_menara').serialize();

			if (bulk.val() == 'delete') {
				swal({
					title: "<?= cclang('are_you_sure'); ?>",
					text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#DD6B55",
					confirmButtonText: "<?= cclang('yes_delete_it'); ?>",
					cancelButtonText: "<?= cclang('no_cancel_plx'); ?>",
					closeOnConfirm: true,
					closeOnCancel: true
				},
				function (isConfirm) {
					if (isConfirm) {
						document.location.href = BASE_URL + '/administrator/menara/delete?' +
							serialize_bulk;
					}
				});

				return false;
			} else if (bulk.val() == '') {
				swal({
					title: "Upss",
					text: "<?= cclang('please_choose_bulk_action_first'); ?>",
					type: "warning",
					showCancelButton: false,
					confirmButtonColor: "#DD6B55",
					confirmButtonText: "Okay!",
					closeOnConfirm: true,
					closeOnCancel: true
				});

				return false;
			}

			return false;
		}); /*end appliy click*/

		//check all
		var checkAll = $('#check_all');
		var checkboxes = $('input.check');

		checkAll.on('ifChecked ifUnchecked', function (event) {
			if (event.type == 'ifChecked') {
				checkboxes.iCheck('check');
			} else {
				checkboxes.iCheck('uncheck');
			}
		});

		checkboxes.on('ifChanged', function (event) {
			if (checkboxes.filter(':checked').length == checkboxes.length) {
				checkAll.prop('checked', 'checked');
			} else {
				checkAll.removeProp('checked');
			}
			checkAll.iCheck('update');
		});
		initSortable('menara', $('table.dataTable'));
	}); /*end doc ready*/
</script>