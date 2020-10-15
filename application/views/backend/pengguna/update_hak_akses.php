<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?php echo $subtitle;?> <?php echo $title;?></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active"><?php echo $subtitle;?> <?php echo $title;?></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
 <section class="content">
   <div class="container-fluid">
     <div class="row">
       <!-- left column -->
       <div class="col-md-12">
         <!-- general form elements -->
         <div class="card card-success">
           <div class="card-header">
             <h3 class="card-title"><?php echo $subtitle;?> <?php echo $title;?></h3>
           </div>
           <!-- /.card-header -->
           <!-- form start -->
           <form class="form-horizontal" method="post" action="<?php echo base_url('backend/pengguna/update_hak_akses/do_update/'.$id);?>" enctype="multipart/form-data">
            <div class="card-body">
              <div class="form-group">
                  <input type="text" name="nama_hak_akses" class="form-control" placeholder="Nama Hak Akses" value="<?php echo $hakAkses[0]->nama_hak_akses;?>" required>
              </div>
              <div class="form-group">
              <?php foreach ($parentModul as $key): ?>
                  <div class="card">
                    <div class="card-header">
                      <div class="checkbox">
                          <label for="checkbox<?php echo $key->id_parent_modul;?>">
                              <input type="checkbox" id="checkbox<?php echo $key->id_parent_modul;?>" onchange="cek('<?php echo $key->id_parent_modul;?>')" name="parent_modul_akses[]" value="<?php echo $key->id_parent_modul;?>" <?php if (cekParentModulPengguna($key->id_parent_modul,$id) == TRUE){ echo "checked";  }?>>
                              <b><?php echo $key->nama_parent_modul;?></b>
                          </label>
                      </div>
                    </div>
                    <div class="card-body <?php if (cekParentModulPengguna($key->id_parent_modul,$id) == FALSE){ echo "d-none";  }?>" id='ParentModul<?php echo $key->id_parent_modul;?>'>
                      <?php $modul = $this->ModulModel->get_modul($key->id_parent_modul)?>
                      <?php if ($modul): ?>
                      <div class="table-responsive">
                      <table class="table table-hover table-bordered">
                        <tr>
                          <th>Nama Modul</td>
                          <th>Tipe Modul</td>
                        </tr>
                          <?php foreach ($modul as $row): ?>
                        <tr>
                          <td>
                            <div class="checkbox">
                                <label for="checkbox_modul<?php echo $row->id_modul;?>">
                                    <input type="checkbox" id="checkbox_modul<?php echo $row->id_modul;?>" name="modul_akses[]" value="<?php echo $row->id_modul;?>" <?php if(cekModulPengguna($row->id_modul,$id) == TRUE){ echo "checked";}?>> <b><?php echo $row->nama_modul;?></b>
                                </label>
                            </div>
                          </td>
                          <td>
                            <?php if($row->type_modul=='C'):?>
                            Create
                          <?php elseif($row->type_modul=='R'): ?>
                            Read
                          <?php elseif($row->type_modul=='U'): ?>
                            Update
                          <?php elseif($row->type_modul=='D'): ?>
                            delete
                          <?php endif;?>
                          </td>
                        </tr>
                      <?php endforeach;?>
                      </table>
                    <?php endif;?>
                    </div>
                  </div>
                </div>
            <?php endforeach; ?>
            <div class="form-group">
              <a href="<?php echo base_url('backend/pengguna');?>" class="btn btn-danger">Kembali</a>
              <button class="btn btn-success" type="submit">Simpan</button>
            </div>
          </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<script type="text/javascript">
  function cek(id){
    if ($('#checkbox'+id).is(':checked')) {
      $('#ParentModul'+id).removeClass('d-none')
    }else {
      $('#ParentModul'+id).addClass('d-none')
    }
  }
</script>
  <!-- Main
