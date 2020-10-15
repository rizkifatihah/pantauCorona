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
             <h3 class="card-title"><?php echo $subtitle;?></h3>
             <div class="card-tools"><a href="<?php echo base_url('backend/pengguna/create_hak_akses/');?>" class="btn btn-warning btn-xs"><i class="fa fa-plus"></i> Tambah data</a></div>
           </div>
           <!-- /.card-header -->
           <!-- form start -->
           <form role="form">
             <div class="card-body">
               <?php echo $this->session->flashdata('notif');?>
               <div class="table-responsive">
                <table class="table table-stripped table-bordered table-hover" width="100%" id="dataTables">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Hak Akses</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; foreach ($hak_akses as $key): ?>
                    <tr>
                      <td><?php echo $no++;?></td>
                      <td><?php echo $key->nama_hak_akses;?></td>
                      <td>
                        <a href="<?php echo base_url('backend/pengguna/delete_hak_akses/'.$key->id_hak_akses);?>" class="btn btn-xs btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus hak akses <?php echo $key->nama_hak_akses;?>? Data akan berpengaruh kepada data yg berkaitan')"><i class="fa fa-times"></i></a>
                        <a href="<?php echo base_url('backend/pengguna/update_hak_akses/'.$key->id_hak_akses);?>" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
               </div>
             </div>
             <!-- /.card-body -->

           </form>
         </div>
         <!-- /.card -->
       </section>

       <script>
         $(function () {
           $("#dataTables").DataTable();
         });
       </script>
