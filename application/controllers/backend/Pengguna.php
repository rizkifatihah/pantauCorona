<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

  function __costruct()
   {
       parent::__costruct();
       if($this->session->userdata('LoggedIN') == FALSE )
       {
           redirect('Auth/logout');
       }
   }
   private $title = 'Pengguna';

   public function index()
   {
     if(cekModul(9) == FALSE) redirect('auth/access_denied');
       $data['title'] = $this->title;
       $data['subtitle'] = 'List Pengguna';
       $data['content'] = 'backend/pengguna/index';
       $data['user'] = $this->GeneralModel->get_general('user');
       $this->load->view('backend/content',$data);
   }

   public function create($param1='',$param2='')
   {
     if(cekModul(10) == FALSE) redirect('auth/access_denied');
     if ($param1=='do_create') {
       $data = array(
           'username' => $this->input->post('username'),
           'email' => $this->input->post('email'),
           'password' => sha1($this->input->post('password')),
           'alamat' => $this->input->post('alamat'),
           'no_telp' => $this->input->post('no_telp'),
           'hak_akses' => $this->input->post('hak_akses'),
       );

       $config['upload_path']          = 'assets/foto/';
       $config['allowed_types']        = 'jpg|png|jpeg';
       $config['file_name']						= $data['username'];

       $this->load->library('upload', $config);

       if ( ! $this->upload->do_upload('foto'))
       {

       }
       else {
         $data += array(
           'foto' => $config['upload_path'].$this->upload->data('file_name'),
         );
       }
       $this->GeneralModel->create_general('user',$data);
       $this->session->set_flashdata('notif','<div class="alert alert-success">Data pengguna berhasil disimpan</div>');
       redirect('backend/pengguna/');
     }else {
       $data['title'] = $this->title;
       $data['subtitle'] = 'Tambah Pengguna';
       $data['content'] = 'backend/pengguna/create';
       $data['hak_akses'] = $this->GeneralModel->get_general('hak_akses');
       $this->load->view('backend/content',$data);
     }
   }

   public function update($param1='',$param2='')
   {
     if(cekModul(11) == FALSE) redirect('auth/access_denied');
     if ($param1=='do_update') {
       $data = array(
           'username' => $this->input->post('username'),
           'email' => $this->input->post('email'),
           'alamat' => $this->input->post('alamat'),
           'no_telp' => $this->input->post('no_telp'),
           'hak_akses' => $this->input->post('hak_akses'),
       );

       if (!empty($this->input->post('password'))) {
         $data += array(
           'password' => sha1($this->input->post('password')),
           );
       }

       $config['upload_path']          = 'assets/foto/';
       $config['allowed_types']        = 'jpg|png|jpeg';
       $config['file_name']						= $data['username'];

       $this->load->library('upload', $config);

       if ( ! $this->upload->do_upload('foto'))
       {

       }
       else {
         $data += array(
           'foto' => $config['upload_path'].$this->upload->data('file_name'),
         );
       }
       $this->GeneralModel->update_general('user','user_id',$param2,$data);
       $this->session->set_flashdata('notif','<div class="alert alert-success">Data pengguna berhasil diupdate</div>');
       redirect('backend/pengguna/');
     }else {
       $data['title'] = $this->title;
       $data['subtitle'] = 'Update Pengguna';
       $data['content'] = 'backend/pengguna/update';
       $data['hak_akses'] = $this->GeneralModel->get_general('hak_akses');
       $data['user'] = $this->GeneralModel->get_by_id_general('user','user_id',$param1);
       $this->load->view('backend/content',$data);
     }
   }

   public function delete($id)
   {
     if(cekModul(12) == FALSE) redirect('auth/access_denied');
      $this->GeneralModel->delete_general('user','user_id',$id);
      $this->session->set_flashdata('notif','<div class="alert alert-success">Data pengguna dihapus</div>');
      redirect('backend/pengguna');
   }

   //-------------------------------------------- HAK AKSES ----------------------------------------//
   public function hak_akses()
   {
     if(cekModul(13) == FALSE) redirect('auth/access_denied');
       $data['title'] = $this->title;
       $data['subtitle'] = 'List Hak Akses Pengguna';
       $data['content'] = 'backend/pengguna/hak_akses';
       $data['hak_akses'] = $this->GeneralModel->get_general('hak_akses');
       $this->load->view('backend/content',$data);
   }

   public function create_hak_akses($param1='',$param2='')
   {
     if(cekModul(14) == FALSE) redirect('auth/access_denied');
     if ($param1=='do_create') {
       $parent_modul = $this->input->post('parent_modul_akses');
       $nama_hak_akses = $this->input->post('nama_hak_akses');
       $parent_modul = array_unique($parent_modul);
       $parent_modul = array_values(array_unique($parent_modul));

       $parent_modul = array(
         "parent_modul" => $parent_modul,
       );
       $parent_modul = json_encode($parent_modul,JSON_PRETTY_PRINT);

       echo "<br/><br/><br/><br/><br/>";

       $modul = $this->input->post('modul_akses');
       $modul = array(
         "modul" => $modul,
       );

       $modul = json_encode($modul,JSON_PRETTY_PRINT);

       $data = array(
         'nama_hak_akses' => $nama_hak_akses,
         'modul_akses' => $modul,
         'parent_modul_akses' => $parent_modul,
       );
       $this->GeneralModel->create_general('hak_akses',$data);
       $this->session->set_flashdata('notif','<div class="alert alert-success">Data hak akses berhasil disimpan</div>');
       redirect('backend/pengguna/hak_akses');
     }else {
       $data['title'] = $this->title;
       $data['subtitle'] = 'Tambah Hak Akses';
       $data['parentModul'] = $this->GeneralModel->get_general('parent_modul');
       $data['content'] = 'backend/pengguna/create_hak_akses';
       $this->load->view('backend/content',$data);
     }
   }

   public function update_hak_akses($param1='',$param2='')
   {
     if(cekModul(15) == FALSE) redirect('auth/access_denied');
     if ($param1=='do_update') {
       $parent_modul = $this->input->post('parent_modul_akses');
 			$nama_hak_akses = $this->input->post('nama_hak_akses');
 			$parent_modul = array_unique($parent_modul);
 			$parent_modul = array_values(array_unique($parent_modul));

 			$parent_modul = array(
 				"parent_modul" => $parent_modul,
 			);
 			$parent_modul = json_encode($parent_modul,JSON_PRETTY_PRINT);

 			echo "<br/><br/><br/><br/><br/>";

 			$modul = $this->input->post('modul_akses');
 			$modul = array(
 				"modul" => $modul,
 			);

 			$modul = json_encode($modul,JSON_PRETTY_PRINT);

 			$data = array(
 				'nama_hak_akses' => $nama_hak_akses,
 				'modul_akses' => $modul,
 				'parent_modul_akses' => $parent_modul,
 			);

 			if($this->GeneralModel->update_general('hak_akses','id_hak_akses',$param2,$data) ==  TRUE){
 				$this->session->set_flashdata('notif','<div class="alert alert-success">Data hak akses berhasil di perbarui</div>');
 				redirect('backend/pengguna/hak_akses');
      }
     }else {
       $data['title'] = $this->title;
       $data['subtitle'] = 'Update Hak Akses';
       $data['content'] = 'backend/pengguna/update_hak_akses';
       $data['id'] = $param1;
       $data['parentModul'] = $this->GeneralModel->get_general('parent_modul');
       $data['hakAkses'] = $this->GeneralModel->get_by_id_general('hak_akses','id_hak_akses',$param1);
       $this->load->view('backend/content',$data);
     }
   }

   public function delete_hak_akses($id)
   {
     if(cekModul(16) == FALSE) redirect('auth/access_denied');
      $this->GeneralModel->delete_general('hak_akses','id_hak_akses',$id);
      $this->session->set_flashdata('notif','<div class="alert alert-success">Data hak akses dihapus</div>');
      redirect('backend/pengguna/hak_akses');
   }

}
?>
