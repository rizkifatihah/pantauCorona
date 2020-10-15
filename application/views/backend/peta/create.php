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
           <form class="form-horizontal" method="post" action="<?php echo base_url('backend/peta/create/do_create/');?>" enctype="multipart/form-data">
            <div class="card-body">
              <script type="text/javascript">
                function ceknik(nik){
                  $.ajax({
                    url:'<?php echo base_url('backend/peta/cekNik/');?>'+nik,
                    success:function(data){
                      if(data=='true'){
                        $('#btnSimpan').prop('disabled',true);
                        $('#notif').prop('color','red');
                        $('#notif').text('NIK sudah ada dalam database');
                      }else {
                        $('#btnSimpan').prop('disabled',false);
                        $('#notif').prop('color','green');
                        $('#notif').text('NIK belum ada dalam database dan dapat ditambahkan');
                      }
                    }
                  })
                }
              </script>
              <div class="form-group">
                  <input type="text" name="nik" class="form-control" placeholder="NIK" onkeyup="ceknik('this.value')" required>
                  <font color="" id='notif'></font>
              </div>
              <div class="form-group">
                  <input type="text" name="nama" class="form-control" placeholder="Nama">
              </div>
              <div class="form-group">
                <select class="form-control" name="jenkel">
                  <option value="">-Pilih jenkel-</option>
                  <option value="L">Laki-laki</option>
                  <option value="P">Perempuan</option>
                </select>
              </div>
              <div class="form-group">
                  <input type="text" name="lokasi" class="form-control" placeholder="Masukkan Lokasi / Alamat">
              </div>
              <div class="form-group">
                  <input type="text" name="lon" class="form-control" placeholder="Masukkan Longitude" required>
              </div>
              <div class="form-group">
                  <input type="text" name="lat" class="form-control" placeholder="Masukkan Latitude" required>
              </div>
              <div class="form-group">
                  <input type="text" name="kabupaten" class="form-control" placeholder="Masukkan Kabupaten/Kota">
              </div>
              <div class="form-group">
                  <input type="number" name="usia" class="form-control" placeholder="Masukkan usia">
              </div>
              <div class="form-group">
                <select class="form-control" name="kp_name">
                  <option value="">-Pilih Kategori-</option>
                  <?php foreach ($kategori_peta as $key): ?>
                    <option value="<?php echo $key->kp_name;?>"><?php echo $key->kp_name;?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <button class="btn btn-success" type="submit" id="btnSimpan">Simpan</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
