  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url();?>" class="brand-link">
      <img src="<?php echo base_url();?>assets/sumatera_utara.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Pantau Corona V1</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php if (!empty($this->session->userdata('foto'))): ?>
            <img src="<?php echo base_url().$this->session->userdata('foto');?>" class="img-circle elevation-2" alt="User Image">
          <?php else: ?>
            <img src="<?php echo base_url();?>assets/indonesia_640.png" class="img-circle elevation-2" alt="User Image">
          <?php endif; ?>
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $this->session->userdata('username');?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">Menu</li>
          <?php
          $parentModul = $this->ParentModulModel->get_parent_modul();
          foreach ($parentModul as $key): ?>
          <?php if (cekParentModul($key->id_parent_modul) == TRUE): ?>
          <?php if ($key->tampil_sidebar_parent == 'Y'): ?>
            <?php if ($key->child_module == 'N'): ?>
              <li class="nav-item">
                <a href="<?php echo base_url().$key->link;?>" class="nav-link <?php if($key->nama_parent_modul == $title){ echo 'active'; }?>">
                  <i class="<?php echo $key->icon;?>"></i>
                  <span><?php echo $key->nama_parent_modul;?></span>
                </a>
              </li>
              <?php else: ?>
              <li class="nav-item has-treeview <?php if($key->nama_parent_modul == $title){ echo 'menu-open'; }?>">
                <a href="#" class="nav-link <?php if($key->nama_parent_modul == $title){ echo 'active'; }?>">
                  <i class="<?php echo $key->icon;?>"></i>
                  <p>
                    <?php echo $key->nama_parent_modul;?>
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <?php $childModul = $this->ModulModel->get_modul($key->id_parent_modul);
                    foreach ($childModul as $row):
                    ?>
                    <?php if (cekModul($row->id_modul) == true): ?>
                    <?php if ($row->tampil_sidebar == 'Y'): ?>
                      <li class="nav-item">
                        <a href="<?php echo base_url().$row->link_modul;?>" class="nav-link <?php if($row->nama_modul == $subtitle){ echo 'active'; }?>">
                          <i class="far fa-circle nav-icon"></i>
                          <p><?php echo $row->nama_modul;?></p>
                        </a>
                      </li>
                    <?php endif; ?>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </ul>
            </li>
          <?php endif; ?>
            <?php endif; ?>
          <?php endif; ?>
        <?php endforeach; ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
