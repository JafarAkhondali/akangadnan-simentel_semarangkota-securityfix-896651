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
      Pemohon      <small><?= cclang('detail', ['Pemohon']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/pemohon'); ?>">Pemohon</a></li>
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
                     <h3 class="widget-user-username">Pemohon</h3>
                     <h5 class="widget-user-desc">Detail Pemohon</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_pemohon" id="form_pemohon" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">ID </label>

                        <div class="col-sm-8">
                        <span class="detail_group-pemohon_id"><?= _ent($pemohon->pemohon_id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Nama Pemohon </label>

                        <div class="col-sm-8">
                        <span class="detail_group-pemohon-nama"><?= _ent($pemohon->pemohon_nama); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Jenis Kelamin </label>

                        <div class="col-sm-8">
                        <span class="detail_group-pemohon-jenkel"><?= _ent($pemohon->pemohon_jenkel); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Alamat </label>

                        <div class="col-sm-8">
                        <span class="detail_group-pemohon-alamat"><?= _ent($pemohon->pemohon_alamat); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">RT </label>

                        <div class="col-sm-8">
                        <span class="detail_group-pemohon-rt"><?= _ent($pemohon->pemohon_rt); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">RW </label>

                        <div class="col-sm-8">
                        <span class="detail_group-pemohon-rw"><?= _ent($pemohon->pemohon_rw); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Kecamatan </label>

                        <div class="col-sm-8">
                           <?= _ent($pemohon->kecamatan_kecamatan_nama); ?>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Kelurahan </label>

                        <div class="col-sm-8">
                           <?= _ent($pemohon->kelurahan_kelurahan_nama); ?>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Agama </label>

                        <div class="col-sm-8">
                           <?= _ent($pemohon->agama_agama_nama); ?>
                        </div>
                    </div>
                                        
                    <br>
                    <br>


                     
                         
                    <div class="view-nav">
                        <?php is_allowed('pemohon_update', function() use ($pemohon){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit pemohon (Ctrl+e)" href="<?= site_url('administrator/pemohon/edit/'.$pemohon->pemohon_id); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Pemohon']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= site_url('administrator/pemohon/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Pemohon']); ?></a>
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