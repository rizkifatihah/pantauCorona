<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peta extends CI_Controller {

  function __costruct()
   {
       parent::__costruct();
       if($this->session->userdata('LoggedIN') == FALSE )
       {
           redirect('Auth/logout');
       }
   }

   private $title = 'Data Pasien';

   public function index(){
     if(cekModul(1) == FALSE) redirect('auth/access_denied');
       $data['title'] = $this->title;
       $data['subtitle'] = 'List';
       $data['content'] = 'backend/peta/index';
       if ($this->session->userdata('hak_akses')=='superuser'||$this->session->userdata('hak_akses')=='dinkes') {
         $data['peta'] = $this->PetaModel->getPeta();
       }else {
         $data['peta'] = $this->PetaModel->getPetaCreatedBy($this->session->userdata('user_id'));
       }
       $this->load->view('backend/content',$data);
   }

   public function cekNik($nik){
     $cekNIK = $this->GeneralModel->get_by_id_general('peta_wilayah','nik',$nik);
     if ($cekNIK) {
       echo "true";
     }else {
       echo "false";
     }
   }

   public function create($param1='',$param2='')
   {
     if(cekModul(2) == FALSE) redirect('auth/access_denied');
     if ($param1=='do_create') {

       $data = array(
           'nik' => $this->input->post('nik'),
           'nama' => $this->input->post('nama'),
           'jenkel' => $this->input->post('jenkel'),
           'lokasi' => $this->input->post('lokasi'),
           'lon' => $this->input->post('lon'),
           'lat' => $this->input->post('lat'),
           'usia' => $this->input->post('usia'),
           'kabupaten' => strtoupper($this->input->post('kabupaten')),
           'kp_name' => $this->input->post('kp_name'),
           'created_by' => $this->session->userdata('user_id'),
       );

       $this->GeneralModel->create_general('peta_wilayah',$data);
       $this->session->set_flashdata('notif','<div class="alert alert-success">Data berhasil disimpan</div>');
       redirect('backend/peta');
     }else {
       $data['title'] = $this->title;
       $data['subtitle'] = 'Tambah';
       $data['kategori_peta'] = $this->GeneralModel->get_general('kategori_peta');
       $data['content'] = 'backend/peta/create';
       $this->load->view('backend/content',$data);
     }
   }

   public function update($param1='',$param2='')
   {
     if(cekModul(3) == FALSE) redirect('auth/access_denied');
     if ($param1=='do_update') {

       $data = array(
           'nik' => $this->input->post('nik'),
           'jenkel' => $this->input->post('jenkel'),
           'lokasi' => $this->input->post('lokasi'),
           'lon' => $this->input->post('lon'),
           'lat' => $this->input->post('lat'),
           'usia' => $this->input->post('usia'),
           'kabupaten' => strtoupper($this->input->post('kabupaten')),
           'kp_name' => $this->input->post('kp_name'),
           'created_by' => $this->session->userdata('user_id'),
       );

       $this->GeneralModel->update_general('peta_wilayah','id_peta',$param2,$data);
       $this->session->set_flashdata('notif','<div class="alert alert-success">Data berhasil diupdate</div>');
       redirect('backend/peta');
     }else {
       $data['title'] = $this->title;
       $data['subtitle'] = 'Update';
       $data['content'] = 'backend/peta/update';
       $data['kategori_peta'] = $this->GeneralModel->get_general('kategori_peta');
       $data['peta'] = $this->GeneralModel->get_by_id_general('peta_wilayah','id_peta',$param1);
       $this->load->view('backend/content',$data);
     }
   }

   public function delete($id)
   {
     if(cekModul(4) == FALSE) redirect('auth/access_denied');
      $this->GeneralModel->delete_general('peta_wilayah','id_peta',$id);
      $this->session->set_flashdata('notif','<div class="alert alert-success">Data berhasil dihapus</div>');
      redirect('backend/peta');
   }

}
?>
