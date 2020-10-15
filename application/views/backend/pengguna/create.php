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
           <form class="form-horizontal" method="post" action="<?php echo base_url('backend/pengguna/create/do_create/');?>" enctype="multipart/form-data">
            <div class="card-body">
              <div class="form-group">
                  <input type="file" name="foto" accept="image/*">
              </div>
              <div class="form-group">
                  <input type="text" name="username" class="form-control" placeholder="Username" required>
              </div>
              <div class="form-group">
                  <input type="password" name="password" class="form-control" placeholder="Password" required>
              </div>
              <div class="form-group">
                  <input type="email" name="email" class="form-control" placeholder="Email" required>
              </div>
              <div class="form-group">
                  <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
              </div>
              <div class="form-group">
                  <input type="text" name="no_telp" class="form-control" placeholder="No Telp" required>
              </div>
              <div class="form-group">
                <select class="form-control" name="hak_akses" required>
                  <option value="">.:Pilih Hak Akses:.</option>
                  <?php foreach ($hak_akses as $key): ?>
                    <option value="<?php echo $key->nama_hak_akses;?>"><?php echo $key->nama_hak_akses;?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <a href="<?php echo base_url('backend/pengguna');?>" class="btn btn-danger">Kembali</a>
                <button class="btn btn-success" type="submit">Simpan</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
