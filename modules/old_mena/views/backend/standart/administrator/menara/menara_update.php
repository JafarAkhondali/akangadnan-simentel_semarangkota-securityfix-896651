
    <script src="<?= BASE_ASSET; ?>js/loadingoverlay.min.js"></script>


    <link href="<?= BASE_ASSET; ?>/fine-upload/fine-uploader-gallery.min.css" rel="stylesheet">
    <script src="<?= BASE_ASSET; ?>/fine-upload/jquery.fine-uploader.js"></script>
    <?php $this->load->view('core_template/fine_upload'); ?>
<script type="text/javascript">
    function domo() {

        $('*').bind('keydown', 'Ctrl+s', function() {
            $('#btn_save').trigger('click');
            return false;
        });

        $('*').bind('keydown', 'Ctrl+x', function() {
            $('#btn_cancel').trigger('click');
            return false;
        });

        $('*').bind('keydown', 'Ctrl+d', function() {
            $('.btn_save_back').trigger('click');
            return false;
        });

    }

    jQuery(document).ready(domo);
</script>
<section class="content-header">
    <h1>
        Menara        <small>Edit Menara</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= site_url('administrator/menara'); ?>">Menara</a></li>
        <li class="active">Edit</li>
    </ol>
</section>

<style>

</style>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-body ">
                    <div class="box box-widget widget-user-2">
                        <div class="widget-user-header ">
                            <div class="widget-user-image">
                                <img class="img-circle" src="<?= BASE_ASSET; ?>/img/add2.png" alt="User Avatar">
                            </div>
                            <h3 class="widget-user-username">Menara</h3>
                            <h5 class="widget-user-desc">Edit Menara</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/menara/edit_save/'.$this->uri->segment(4)), [
                            'name' => 'form_menara',
                            'class' => 'form-horizontal form-step',
                            'id' => 'form_menara',
                            'method' => 'POST'
                        ]); ?>

                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>

                                                    
                        
                        <div class="form-group group-pemohon-id">
                                <label for="pemohon_id" class="col-sm-2 control-label">Pemohon                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <select class="form-control chosen chosen-select-deselect" name="pemohon_id" id="pemohon_id" data-placeholder="Select Pemohon">
                                        <option value=""></option>
                                                                            </select>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>

                        
                        
                                                    
                        
                        <div class="form-group group-kecamatan-id">
                                <label for="kecamatan_id" class="col-sm-2 control-label">Kecamatan                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <select class="form-control chosen chosen-select-deselect" name="kecamatan_id" id="kecamatan_id" data-placeholder="Select Kecamatan">
                                        <option value=""></option>
                                                                            </select>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>

                        
                        
                                                    
                        
                        <div class="form-group group-kelurahan-id">
                                <label for="kelurahan_id" class="col-sm-2 control-label">Kelurahan                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <select class="form-control chosen chosen-select-deselect" name="kelurahan_id" id="kelurahan_id" data-placeholder="Select Kelurahan">
                                        <option value=""></option>
                                                                            </select>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>

                        
                        
                                                    
                        
                        <div class="form-group group-tipesite-id">
                                <label for="tipesite_id" class="col-sm-2 control-label">Tipe Site                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <select class="form-control chosen chosen-select-deselect" name="tipesite_id" id="tipesite_id" data-placeholder="Select Tipe Site">
                                        <option value=""></option>
                                                                            </select>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>

                        
                        
                                                    
                        
                        <div class="form-group group-operator-id">
                                <label for="operator_id" class="col-sm-2 control-label">Operator Id                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <select class="form-control chosen chosen-select-deselect" name="operator_id" id="operator_id" data-placeholder="Select Operator Id">
                                        <option value=""></option>
                                                                            </select>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>

                        
                        
                                                    
                        
                        <div class="form-group group-menara-nama  ">
                                <label for="menara_nama" class="col-sm-2 control-label">Nama Menara                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="menara_nama" id="menara_nama" placeholder="" value="<?= set_value('menara_nama', $menara->menara_nama); ?>">
                                    <small class="info help-block">
                                        <b>Input Menara Nama</b> Max Length : 255.</small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-menara-alamat  ">
                                <label for="menara_alamat" class="col-sm-2 control-label">Alamat Menara                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <textarea placeholder="Alamat Menara" id="menara_alamat" name="menara_alamat" rows="5" class="textarea form-control"><?= set_value('menara_alamat', $menara->menara_alamat); ?></textarea>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-menara-rt  ">
                                <label for="menara_rt" class="col-sm-2 control-label">RT                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="menara_rt" id="menara_rt" placeholder="" value="<?= set_value('menara_rt', $menara->menara_rt); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-menara-rw  ">
                                <label for="menara_rw" class="col-sm-2 control-label">RW                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="menara_rw" id="menara_rw" placeholder="" value="<?= set_value('menara_rw', $menara->menara_rw); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-menara-file-berkas  ">
                                <label for="menara_file_berkas" class="col-sm-2 control-label">File                                    </label>
                                <div class="col-sm-8">
                                    <div id="menara_menara_file_berkas_galery"></div>
                                    <input class="data_file data_file_uuid" name="menara_menara_file_berkas_uuid" id="menara_menara_file_berkas_uuid" type="hidden" value="<?= set_value('menara_menara_file_berkas_uuid'); ?>">
                                    <input class="data_file" name="menara_menara_file_berkas_name" id="menara_menara_file_berkas_name" type="hidden" value="<?= set_value('menara_menara_file_berkas_name', $menara->menara_file_berkas); ?>">
                                    <small class="info help-block">
                                        <b>Extension file must</b> PDF,DOC,DOCX,XLS,XLSX.</small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-menara-latitude  ">
                                <label for="menara_latitude" class="col-sm-2 control-label">Latitude                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="menara_latitude" id="menara_latitude" placeholder="" value="<?= set_value('menara_latitude', $menara->menara_latitude); ?>">
                                    <small class="info help-block">
                                        <b>Input Menara Latitude</b> Max Length : 255.</small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-menara-longitude  ">
                                <label for="menara_longitude" class="col-sm-2 control-label">Longitude                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="menara_longitude" id="menara_longitude" placeholder="" value="<?= set_value('menara_longitude', $menara->menara_longitude); ?>">
                                    <small class="info help-block">
                                        <b>Input Menara Longitude</b> Max Length : 255.</small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-menara-ketinggian  ">
                                <label for="menara_ketinggian" class="col-sm-2 control-label">Ketinggian                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="menara_ketinggian" id="menara_ketinggian" placeholder="" value="<?= set_value('menara_ketinggian', $menara->menara_ketinggian); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-kawasan-id">
                                <label for="kawasan_id" class="col-sm-2 control-label">Kawasan                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <select class="form-control chosen chosen-select-deselect" name="kawasan_id" id="kawasan_id" data-placeholder="Select Kawasan">
                                        <option value=""></option>
                                                                            </select>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>

                        
                        
                                                    
                        
                        <div class="form-group group-menara-image  ">
                                <label for="menara_image" class="col-sm-2 control-label">Foto                                    </label>
                                <div class="col-sm-8">
                                    <div id="menara_menara_image_galery"></div>
                                    <div id="menara_menara_image_galery_listed">
                                        <?php foreach ((array) explode(',', $menara->menara_image) as $idx => $filename): ?>
                                        <input type="hidden" class="listed_file_uuid" name="menara_menara_image_uuid[<?= $idx ?>]" value="" /><input type="hidden" class="listed_file_name" name="menara_menara_image_name[<?= $idx ?>]" value="<?= $filename; ?>" />
                                        <?php endforeach; ?>
                                    </div>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-menara-nama-penyewa  ">
                                <label for="menara_nama_penyewa" class="col-sm-2 control-label">Nama Penyewa                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="menara_nama_penyewa" id="menara_nama_penyewa" placeholder="" value="<?= set_value('menara_nama_penyewa', $menara->menara_nama_penyewa); ?>">
                                    <small class="info help-block">
                                        <b>Input Menara Nama Penyewa</b> Max Length : 255.</small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-menara-pemilik  ">
                                <label for="menara_pemilik" class="col-sm-2 control-label">Pemilik                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="menara_pemilik" id="menara_pemilik" placeholder="" value="<?= set_value('menara_pemilik', $menara->menara_pemilik); ?>">
                                    <small class="info help-block">
                                        <b>Input Menara Pemilik</b> Max Length : 255.</small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-menara-kondisi  ">
                                <label for="menara_kondisi" class="col-sm-2 control-label">Kondisi                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <textarea placeholder="Kondisi" id="menara_kondisi" name="menara_kondisi" rows="5" class="textarea form-control"><?= set_value('menara_kondisi', $menara->menara_kondisi); ?></textarea>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-menara-luas-area  ">
                                <label for="menara_luas_area" class="col-sm-2 control-label">Luas Area Menara                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="menara_luas_area" id="menara_luas_area" placeholder="" value="<?= set_value('menara_luas_area', $menara->menara_luas_area); ?>">
                                    <small class="info help-block">
                                        <b>Input Menara Luas Area</b> Max Length : 255.</small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-menara-imb  ">
                                <label for="menara_imb" class="col-sm-2 control-label">IMB                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="menara_imb" id="menara_imb" placeholder="" value="<?= set_value('menara_imb', $menara->menara_imb); ?>">
                                    <small class="info help-block">
                                        <b>Input Menara Imb</b> Max Length : 255.</small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-menara-tgl-imb  ">
                                <label for="menara_tgl_imb" class="col-sm-2 control-label">Tanggal IMB                                    </label>
                                <div class="col-sm-6">
                                    <div class="input-group date col-sm-8">
                                        <input type="text" class="form-control pull-right datetimepicker" name="menara_tgl_imb" placeholder="" id="menara_tgl_imb" value="<?= set_value('menara_tgl_imb', $menara->menara_tgl_imb); ?>">
                                    </div>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-menara_status  ">
                                <label for="menara_status" class="col-sm-2 control-label">Menara Status                                    </label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="menara_status" id="menara_status" placeholder="" value="<?= set_value('menara_status', $menara->menara_status); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                        
                                                    <div class="message"></div>
                                                <div class="row-fluid col-md-7 container-button-bottom">
                            <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="<?= cclang('save_button'); ?> (Ctrl+s)">
                                <i class="fa fa-save"></i> <?= cclang('save_button'); ?>
                            </button>
                            <a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save" data-stype='back' title="<?= cclang('save_and_go_the_list_button'); ?> (Ctrl+d)">
                                <i class="ion ion-ios-list-outline"></i> <?= cclang('save_and_go_the_list_button'); ?>
                            </a>

                            <div class="custom-button-wrapper">

                                                        </div>
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
                <!--/box body -->
            </div>
            <!--/box -->
        </div>
    </div>
</section>


<script>
    $(document).ready(function() {

        "use strict";
        
    window.event_submit_and_action = '';
            
    
      
      
      
        
        
    
    $('#btn_cancel').click(function() {
        swal({
                title: "Are you sure?",
                text: "the data that you have created will be in the exhaust!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes!",
                cancelButtonText: "No!",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function(isConfirm) {
                if (isConfirm) {
                    window.location.href = BASE_URL + 'administrator/menara';
                }
            });

        return false;
    }); /*end btn cancel*/

    $('.btn_save').click(function() {
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
            url: form_menara.attr('action'),
            type: 'POST',
            dataType: 'json',
            data: data_post,
        })
        .done(function(res) {
            $('form').find('.form-group').removeClass('has-error');
            $('form').find('.error-input').remove();
            $('.steps li').removeClass('error');
            if (res.success) {
                var id = $('#menara_image_galery').find('li').attr('qq-file-id');
                if (save_type == 'back') {
                    window.location.href = res.redirect;
                    return;
                }

                $('.message').printMessage({
                    message: res.message
                });
                $('.message').fadeIn();
                $('.data_file_uuid').val('');

            } else {
                if (res.errors) {
                    parseErrorField(res.errors);
                }
                $('.message').printMessage({
                    message: res.message,
                    type: 'warning'
                });
            }

        })
        .fail(function() {
            $('.message').printMessage({
                message: 'Error save data',
                type: 'warning'
            });
        })
        .always(function() {
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
                    endpoint: BASE_URL + '/administrator/menara/upload_menara_file_berkas_file',
                    params: params
                },
                deleteFile: {
                    enabled: true, // defaults to false
                    endpoint: BASE_URL + '/administrator/menara/delete_menara_file_berkas_file'
                },
                thumbnails: {
                    placeholders: {
                        waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
                        notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
                    }
                },
                session: {
                    endpoint: BASE_URL + 'administrator/menara/get_menara_file_berkas_file/<?= $menara->menara_id; ?>',
                    refreshOnRequest: true
                },
                multiple: false,
                validation: {
                    allowedExtensions: ["PDF","DOC","DOCX","XLS","XLSX"],
                    sizeLimit: 0,
                                    },
                showMessage: function(msg) {
                    toastr['error'](msg);
                },
                callbacks: {
                    onComplete: function(id, name, xhr) {
                        if (xhr.success) {
                            var uuid = $('#menara_menara_file_berkas_galery').fineUploader('getUuid', id);
                            $('#menara_menara_file_berkas_uuid').val(uuid);
                            $('#menara_menara_file_berkas_name').val(xhr.uploadName);
                        } else {
                            toastr['error'](xhr.error);
                        }
                    },
                    onSubmit: function(id, name) {
                        var uuid = $('#menara_menara_file_berkas_uuid').val();
                        $.get(BASE_URL + '/administrator/menara/delete_menara_file_berkas_file/' + uuid);
                    },
                    onDeleteComplete: function(id, xhr, isError) {
                        if (isError == false) {
                            $('#menara_menara_file_berkas_uuid').val('');
                            $('#menara_menara_file_berkas_name').val('');
                        }
                    }
                }
            }); /*end menara_file_berkas galey*/
            

            var params = {};
        params[csrf] = token;

        $('#menara_menara_image_galery').fineUploader({
            template: 'qq-template-gallery',
            request: {
                endpoint: BASE_URL + '/administrator/menara/upload_menara_image_file',
                params: params
            },
            deleteFile: {
                enabled: true,
                endpoint: BASE_URL + '/administrator/menara/delete_menara_image_file',
            },
            thumbnails: {
                placeholders: {
                    waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
                    notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
                }
            },
            session: {
                endpoint: BASE_URL + 'administrator/menara/get_menara_image_file/<?= $menara->menara_id; ?>',
                refreshOnRequest: true
            },
            validation: {
                allowedExtensions: ["*"],
                sizeLimit: 0,
                            },
            showMessage: function(msg) {
                toastr['error'](msg);
            },
            callbacks: {
                onComplete: function(id, name, xhr) {
                    if (xhr.success) {
                        var uuid = $('#menara_menara_image_galery').fineUploader('getUuid', id);
                        $('#menara_menara_image_galery_listed').append('<input type="hidden" class="listed_file_uuid" name="menara_menara_image_uuid[' + id + ']" value="' + uuid + '" /><input type="hidden" class="listed_file_name" name="menara_menara_image_name[' + id + ']" value="' + xhr.uploadName + '" />');
                    } else {
                        toastr['error'](xhr.error);
                    }
                },
                onDeleteComplete: function(id, xhr, isError) {
                    if (isError == false) {
                        $('#menara_menara_image_galery_listed').find('.listed_file_uuid[name="menara_menara_image_uuid[' + id + ']"]').remove();
                        $('#menara_menara_image_galery_listed').find('.listed_file_name[name="menara_menara_image_name[' + id + ']"]').remove();
                    }
                }
            }
        }); /*end menara_image galery*/
        

    function chained_pemohon_id(selected, complete) {
        var val = $('#pemohon_id').val();
        $.LoadingOverlay('show')
        return $.ajax({
                url: BASE_URL + '/administrator/menara/ajax_pemohon_id/' + val,
                dataType: 'JSON',
            })
            .done(function(res) {
                var html = '<option value=""></option>';
                $.each(res, function(index, val) {
                    html += '<option ' + (selected == val.pemohon_id ? 'selected' : '') + ' value="' + val.pemohon_id + '">' + val.pemohon_nama + '</option>'
                });
                $('#pemohon_id').html(html);
                $('#pemohon_id').trigger('chosen:updated');
                if (typeof complete != 'undefined') {
                    complete();
                }

            })
            .fail(function() {
                toastr['error']('Error', 'Getting data fail')
            })
            .always(function() {
                $.LoadingOverlay('hide')
            });
    }


    $('#pemohon_id').change(function(event) {
        chained_pemohon_id('')
    });

    function chained_kecamatan_id(selected, complete) {
        var val = $('#kecamatan_id').val();
        $.LoadingOverlay('show')
        return $.ajax({
                url: BASE_URL + '/administrator/menara/ajax_kecamatan_id/' + val,
                dataType: 'JSON',
            })
            .done(function(res) {
                var html = '<option value=""></option>';
                $.each(res, function(index, val) {
                    html += '<option ' + (selected == val.kecamatan_id ? 'selected' : '') + ' value="' + val.kecamatan_id + '">' + val.kecamatan_nama + '</option>'
                });
                $('#kecamatan_id').html(html);
                $('#kecamatan_id').trigger('chosen:updated');
                if (typeof complete != 'undefined') {
                    complete();
                }

            })
            .fail(function() {
                toastr['error']('Error', 'Getting data fail')
            })
            .always(function() {
                $.LoadingOverlay('hide')
            });
    }


    $('#kecamatan_id').change(function(event) {
        chained_kecamatan_id('')
    });

    function chained_kelurahan_id(selected, complete) {
        var val = $('#kelurahan_id').val();
        $.LoadingOverlay('show')
        return $.ajax({
                url: BASE_URL + '/administrator/menara/ajax_kelurahan_id/' + val,
                dataType: 'JSON',
            })
            .done(function(res) {
                var html = '<option value=""></option>';
                $.each(res, function(index, val) {
                    html += '<option ' + (selected == val.kelurahan_id ? 'selected' : '') + ' value="' + val.kelurahan_id + '">' + val.kelurahan_nama + '</option>'
                });
                $('#kelurahan_id').html(html);
                $('#kelurahan_id').trigger('chosen:updated');
                if (typeof complete != 'undefined') {
                    complete();
                }

            })
            .fail(function() {
                toastr['error']('Error', 'Getting data fail')
            })
            .always(function() {
                $.LoadingOverlay('hide')
            });
    }


    $('#kelurahan_id').change(function(event) {
        chained_kelurahan_id('')
    });

    function chained_tipesite_id(selected, complete) {
        var val = $('#tipesite_id').val();
        $.LoadingOverlay('show')
        return $.ajax({
                url: BASE_URL + '/administrator/menara/ajax_tipesite_id/' + val,
                dataType: 'JSON',
            })
            .done(function(res) {
                var html = '<option value=""></option>';
                $.each(res, function(index, val) {
                    html += '<option ' + (selected == val.tipe_site_id ? 'selected' : '') + ' value="' + val.tipe_site_id + '">' + val.tipe_site_nama + '</option>'
                });
                $('#tipesite_id').html(html);
                $('#tipesite_id').trigger('chosen:updated');
                if (typeof complete != 'undefined') {
                    complete();
                }

            })
            .fail(function() {
                toastr['error']('Error', 'Getting data fail')
            })
            .always(function() {
                $.LoadingOverlay('hide')
            });
    }


    $('#tipesite_id').change(function(event) {
        chained_tipesite_id('')
    });

    function chained_operator_id(selected, complete) {
        var val = $('#operator_id').val();
        $.LoadingOverlay('show')
        return $.ajax({
                url: BASE_URL + '/administrator/menara/ajax_operator_id/' + val,
                dataType: 'JSON',
            })
            .done(function(res) {
                var html = '<option value=""></option>';
                $.each(res, function(index, val) {
                    html += '<option ' + (selected == val.operator_id ? 'selected' : '') + ' value="' + val.operator_id + '">' + val.operator_nama + '</option>'
                });
                $('#operator_id').html(html);
                $('#operator_id').trigger('chosen:updated');
                if (typeof complete != 'undefined') {
                    complete();
                }

            })
            .fail(function() {
                toastr['error']('Error', 'Getting data fail')
            })
            .always(function() {
                $.LoadingOverlay('hide')
            });
    }


    $('#operator_id').change(function(event) {
        chained_operator_id('')
    });

    function chained_kawasan_id(selected, complete) {
        var val = $('#kawasan_id').val();
        $.LoadingOverlay('show')
        return $.ajax({
                url: BASE_URL + '/administrator/menara/ajax_kawasan_id/' + val,
                dataType: 'JSON',
            })
            .done(function(res) {
                var html = '<option value=""></option>';
                $.each(res, function(index, val) {
                    html += '<option ' + (selected == val.kawasan_id ? 'selected' : '') + ' value="' + val.kawasan_id + '">' + val.kawasan_nama + '</option>'
                });
                $('#kawasan_id').html(html);
                $('#kawasan_id').trigger('chosen:updated');
                if (typeof complete != 'undefined') {
                    complete();
                }

            })
            .fail(function() {
                toastr['error']('Error', 'Getting data fail')
            })
            .always(function() {
                $.LoadingOverlay('hide')
            });
    }


    $('#kawasan_id').change(function(event) {
        chained_kawasan_id('')
    });

    async function chain() {
         await chained_pemohon_id("<?= $menara->pemohon_id ?>");
         await chained_kecamatan_id("<?= $menara->kecamatan_id ?>");
         await chained_kelurahan_id("<?= $menara->kelurahan_id ?>");
         await chained_tipesite_id("<?= $menara->tipesite_id ?>");
         await chained_operator_id("<?= $menara->operator_id ?>");
         await chained_kawasan_id("<?= $menara->kawasan_id ?>");
            }

    chain();




    }); /*end doc ready*/
</script>