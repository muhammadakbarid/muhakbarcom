<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Webhook extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $c_url = $this->router->fetch_class();

    $this->load->model('Akbr_contoh_model');
    $this->load->library('form_validation');
    $this->load->helper(array('dateina', 'whatsapp'));
  }

  public function index()
  {
    whatsapp('089646817762', 'halo');
    echo "ok";
  }



  public function _rules()
  {
    $this->form_validation->set_rules('nama', 'nama', 'trim|required');
    $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
    $this->form_validation->set_rules('email', 'email', 'trim|required');

    $this->form_validation->set_rules('id', 'id', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }
}

/* End of file Akbr_contoh.php */
/* Location: ./application/controllers/Akbr_contoh.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-01-08 18:39:50 */
/* http://harviacode.com */