<script type="text/javascript">
function domo(){
   $('*').bind('keydown', 'Ctrl+e', function() {
      $('#btn_edit').trigger('click');
       return false;
   });

   $('*').bind('keydown', 'Ctrl+x', function() {
      $('#btn_back').trigger('click');
       return false;
   });
}

jQuery(document).ready(domo);
</script>
<section class="content-header">
   <h1>
      Menara      <small><?= cclang('detail', ['Menara']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/menara'); ?>">Menara</a></li>
      <li class="active"><?= cclang('detail'); ?></li>
   </ol>
</section>
<section class="content">
   <div class="row" >
     
      <div class="col-md-12">
         <div class="box box-warning">
            <div class="box-body ">

               <div class="box box-widget widget-user-2">
                  <div class="widget-user-header ">
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/view.png" alt="User Avatar">
                     </div>
                     <h3 class="widget-user-username">Menara</h3>
                     <h5 class="widget-user-desc">Detail Menara</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_menara" id="form_menara" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">ID </label>

                        <div class="col-sm-8">
                        <span class="detail_group-menara_id"><?= _ent($menara->menara_id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Pemohon </label>

                        <div class="col-sm-8">
                           <?= _ent($menara->pemohon_pemohon_nama); ?>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Kecamatan </label>

                        <div class="col-sm-8">
                           <?= _ent($menara->kecamatan_kecamatan_nama); ?>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Kelurahan </label>

                        <div class="col-sm-8">
                           <?= _ent($menara->kelurahan_kelurahan_nama); ?>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Tipe Site </label>

                        <div class="col-sm-8">
                           <?= _ent($menara->tipe_site_tipe_site_nama); ?>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Operator </label>

                        <div class="col-sm-8">
                          <?= join_multi_select($menara->operator_id, 'operator', 'operator_id', 'operator_nama'); ?>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Nama Menara </label>

                        <div class="col-sm-8">
                        <span class="detail_group-menara-nama"><?= _ent($menara->menara_nama); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Alamat Menara </label>

                        <div class="col-sm-8">
                        <span class="detail_group-menara-alamat"><?= _ent($menara->menara_alamat); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">RT </label>

                        <div class="col-sm-8">
                        <span class="detail_group-menara-rt"><?= _ent($menara->menara_rt); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">RW </label>

                        <div class="col-sm-8">
                        <span class="detail_group-menara-rw"><?= _ent($menara->menara_rw); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label"> File </label>
                        <div class="col-sm-8">
                             <?php if (is_image($menara->menara_file_berkas)): ?>
                              <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/menara/' . $menara->menara_file_berkas; ?>">
                                <img src="<?= BASE_URL . 'uploads/menara/' . $menara->menara_file_berkas; ?>" class="image-responsive" alt="image menara" title="menara_file_berkas menara" width="40px">
                              </a>
                              <?php else: ?>
                              <label>
                                <a href="<?= BASE_URL . 'administrator/file/download/menara/' . $menara->menara_file_berkas; ?>">
                                 <img src="<?= get_icon_file($menara->menara_file_berkas); ?>" class="image-responsive" alt="image menara" title="menara_file_berkas <?= $menara->menara_file_berkas; ?>" width="40px"> 
                               <?= $menara->menara_file_berkas ?>
                               </a>
                               </label>
                              <?php endif; ?>
                        </div>
                    </div>
                                      
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Latitude </label>

                        <div class="col-sm-8">
                        <span class="detail_group-menara-latitude"><?= _ent($menara->menara_latitude); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Longitude </label>

                        <div class="col-sm-8">
                        <span class="detail_group-menara-longitude"><?= _ent($menara->menara_longitude); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Ketinggian Menara (m) </label>

                        <div class="col-sm-8">
                        <span class="detail_group-menara-ketinggian"><?= _ent($menara->menara_ketinggian); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label"> Foto </label>
                        <div class="col-sm-8">
                             <?php if (!empty($menara->menara_image)): ?>
                             <?php foreach (explode(',', $menara->menara_image) as $filename): ?>
                               <?php if (is_image($menara->menara_image)): ?>
                                <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/menara/' . $filename; ?>">
                                  <img src="<?= BASE_URL . 'uploads/menara/' . $filename; ?>" class="image-responsive" alt="image menara" title="menara_image menara" width="40px">
                                </a>
                                <?php else: ?>
                                <label>
                                  <a href="<?= BASE_URL . 'administrator/file/download/menara/' . $filename; ?>">
                                   <img src="<?= get_icon_file($filename); ?>" class="image-responsive" alt="image menara" title="menara_image <?= $filename; ?>" width="40px"> 
                                 <?= $filename ?>
                               </a>
                               </label>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          <?php endif; ?>
                        </div>
                    </div>
                  
                                      
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Nama Penyewa </label>

                        <div class="col-sm-8">
                        <span class="detail_group-menara-nama-penyewa"><?= _ent($menara->menara_nama_penyewa); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Pemilik Menara </label>

                        <div class="col-sm-8">
                        <span class="detail_group-menara-pemilik"><?= _ent($menara->menara_pemilik); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Kondisi </label>

                        <div class="col-sm-8">
                        <span class="detail_group-menara-kondisi"><?= _ent($menara->menara_kondisi); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Luas Area </label>

                        <div class="col-sm-8">
                        <span class="detail_group-menara-luas-area"><?= _ent($menara->menara_luas_area); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">IMB </label>

                        <div class="col-sm-8">
                        <span class="detail_group-menara-imb"><?= _ent($menara->menara_imb); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Tanggal IMB </label>

                        <div class="col-sm-8">
                        <span class="detail_group-menara-tgl-imb"><?= _ent($menara->menara_tgl_imb); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Status </label>

                        <div class="col-sm-8">
                        <span class="detail_group-menara-status"><?= _ent($menara->menara_status); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Kawasan </label>

                        <div class="col-sm-8">
                           <?= _ent($menara->kawasan_kawasan_nama); ?>
                        </div>
                    </div>
                                        
                    <br>
                    <br>


                     
                         
                    <div class="view-nav">
                        <?php is_allowed('menara_update', function() use ($menara){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit menara (Ctrl+e)" href="<?= site_url('administrator/menara/edit/'.$menara->menara_id); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Menara']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= site_url('administrator/menara/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Menara']); ?></a>
                     </div>
                    
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<script>
$(document).ready(function(){

    "use strict";
    
   
   });
</script>