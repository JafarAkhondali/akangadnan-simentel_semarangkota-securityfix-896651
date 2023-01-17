
    <script src="<?= BASE_ASSET; ?>js/loadingoverlay.min.js"></script>


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
        Pemohon        <small>Edit Pemohon</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= site_url('administrator/pemohon'); ?>">Pemohon</a></li>
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
                            <h3 class="widget-user-username">Pemohon</h3>
                            <h5 class="widget-user-desc">Edit Pemohon</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/pemohon/edit_save/'.$this->uri->segment(4)), [
                            'name' => 'form_pemohon',
                            'class' => 'form-horizontal form-step',
                            'id' => 'form_pemohon',
                            'method' => 'POST'
                        ]); ?>

                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>

                                                    
                        
                        <div class="form-group group-pemohon-nama  ">
                                <label for="pemohon_nama" class="col-sm-2 control-label">Nama Pemohon                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="pemohon_nama" id="pemohon_nama" placeholder="" value="<?= set_value('pemohon_nama', $pemohon->pemohon_nama); ?>">
                                    <small class="info help-block">
                                        <b>Input Pemohon Nama</b> Max Length : 65.</small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group ">
                                <label for="pemohon_jenkel" class="col-sm-2 control-label">Jenis Kelamin                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <select class="form-control chosen chosen-select" name="pemohon_jenkel" id="pemohon_jenkel" data-placeholder="Select Jenis Kelamin">
                                        <option value=""></option>
                                        <option <?= $pemohon->pemohon_jenkel == "1" ? 'selected' :''; ?> value="1">Laki-Laki</option>
                                        <option <?= $pemohon->pemohon_jenkel == "2" ? 'selected' :''; ?> value="2">Perempuan</option>
                                                                            </select>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-pemohon-alamat  ">
                                <label for="pemohon_alamat" class="col-sm-2 control-label">Alamat                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <textarea placeholder="Alamat" id="pemohon_alamat" name="pemohon_alamat" rows="5" class="textarea form-control"><?= set_value('pemohon_alamat', $pemohon->pemohon_alamat); ?></textarea>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-pemohon-rt  ">
                                <label for="pemohon_rt" class="col-sm-2 control-label">RT                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="pemohon_rt" id="pemohon_rt" placeholder="" value="<?= set_value('pemohon_rt', $pemohon->pemohon_rt); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-pemohon-rw  ">
                                <label for="pemohon_rw" class="col-sm-2 control-label">RW                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="pemohon_rw" id="pemohon_rw" placeholder="" value="<?= set_value('pemohon_rw', $pemohon->pemohon_rw); ?>">
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

                        
                        
                                                    
                        
                        <div class="form-group group-agama-id">
                                <label for="agama_id" class="col-sm-2 control-label">Agama                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <select class="form-control chosen chosen-select-deselect" name="agama_id" id="agama_id" data-placeholder="Select Agama">
                                        <option value=""></option>
                                                                            </select>
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
                    window.location.href = BASE_URL + 'administrator/pemohon';
                }
            });

        return false;
    }); /*end btn cancel*/

    $('.btn_save').click(function() {
        $('.message').fadeOut();
        
    var form_pemohon = $('#form_pemohon');
    var data_post = form_pemohon.serializeArray();
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
            url: form_pemohon.attr('action'),
            type: 'POST',
            dataType: 'json',
            data: data_post,
        })
        .done(function(res) {
            $('form').find('.form-group').removeClass('has-error');
            $('form').find('.error-input').remove();
            $('.steps li').removeClass('error');
            if (res.success) {
                var id = $('#pemohon_image_galery').find('li').attr('qq-file-id');
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

    

    

    function chained_kecamatan_id(selected, complete) {
        var val = $('#kecamatan_id').val();
        $.LoadingOverlay('show')
        return $.ajax({
                url: BASE_URL + '/administrator/pemohon/ajax_kecamatan_id/' + val,
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
                url: BASE_URL + '/administrator/pemohon/ajax_kelurahan_id/' + val,
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

    function chained_agama_id(selected, complete) {
        var val = $('#agama_id').val();
        $.LoadingOverlay('show')
        return $.ajax({
                url: BASE_URL + '/administrator/pemohon/ajax_agama_id/' + val,
                dataType: 'JSON',
            })
            .done(function(res) {
                var html = '<option value=""></option>';
                $.each(res, function(index, val) {
                    html += '<option ' + (selected == val.agama_id ? 'selected' : '') + ' value="' + val.agama_id + '">' + val.agama_nama + '</option>'
                });
                $('#agama_id').html(html);
                $('#agama_id').trigger('chosen:updated');
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


    $('#agama_id').change(function(event) {
        chained_agama_id('')
    });

    async function chain() {
         await chained_kecamatan_id("<?= $pemohon->kecamatan_id ?>");
         await chained_kelurahan_id("<?= $pemohon->kelurahan_id ?>");
         await chained_agama_id("<?= $pemohon->agama_id ?>");
            }

    chain();




    }); /*end doc ready*/
</script>