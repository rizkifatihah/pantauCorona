<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

  function __costruct()
   {
       parent::__costruct();
       if($this->session->userdata('LoggedIN') == FALSE )
       {
           redirect('Auth/logout');
       }
   }
   private $title = 'Profile';

   public function info($param1='',$param2='')
   {
     if ($param1=='do_update') {
       $data = array(
           'username' => $this->input->post('username'),
           'email' => $this->input->post('email'),
           'alamat' => $this->input->post('alamat'),
           'no_telp' => $this->input->post('no_telp'),
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
         $this->session->set_userdata('foto',$data['foto']);
       }
       $this->GeneralModel->update_general('user','user_id',$param2,$data);
       $this->session->set_flashdata('notif','<div class="alert alert-success">Data profile berhasil diupdate</div>');
       redirect('backend/profile/info');
     }else {
       $data['title'] = $this->title;
       $data['subtitle'] = 'Update Informasi Profile';
       $data['content'] = 'backend/pengguna/profile';
       $data['user'] = $this->GeneralModel->get_by_id_general('user','user_id',$this->session->userdata('user_id'));
       $this->load->view('backend/content',$data);
     }
   }

}
?>
