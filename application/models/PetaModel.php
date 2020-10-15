<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PetaModel extends CI_Model {

    function __construct()
  {
    parent::__construct();
  }

  public function getPeta(){
    return $this->db->query('SELECT * FROM peta_wilayah p LEFT JOIN user u ON p.created_by = u.user_id')->result();
  }

  public function getPetaCreatedBy($id){
    return $this->db->query("SELECT * FROM peta_wilayah p LEFT JOIN user u ON p.created_by = u.user_id WHERE p.created_by='$id'")->result();
  }

}
