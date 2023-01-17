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
      Kecamatan      <small><?= cclang('detail', ['Kecamatan']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/kecamatan'); ?>">Kecamatan</a></li>
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
                     <h3 class="widget-user-username">Kecamatan</h3>
                     <h5 class="widget-user-desc">Detail Kecamatan</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_kecamatan" id="form_kecamatan" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">ID </label>

                        <div class="col-sm-8">
                        <span class="detail_group-kecamatan_id"><?= _ent($kecamatan->kecamatan_id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Nama Kecamatan </label>

                        <div class="col-sm-8">
                        <span class="detail_group-kecamatan-nama"><?= _ent($kecamatan->kecamatan_nama); ?></span>
                        </div>
                    </div>
                                        
                    <br>
                    <br>


                     
                         
                    <div class="view-nav">
                        <?php is_allowed('kecamatan_update', function() use ($kecamatan){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit kecamatan (Ctrl+e)" href="<?= site_url('administrator/kecamatan/edit/'.$kecamatan->kecamatan_id); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Kecamatan']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= site_url('administrator/kecamatan/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Kecamatan']); ?></a>
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