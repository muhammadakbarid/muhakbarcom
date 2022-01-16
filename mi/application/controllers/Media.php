<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Media extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('MMedia');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'media?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'media?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'media';
            $config['first_url'] = base_url() . 'media';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->MMedia->total_rows($q);
        $media = $this->MMedia->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'media_data' => $media,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Media';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Media' => '',
        ];

        $data['page'] = 'media/media_list';
        $this->load->view('template/backend', $data);
    }

    public function read($id) 
    {
        $row = $this->MMedia->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'caption' => $row->caption,
		'url' => $row->url,
	    );
        $data['title'] = 'Media';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'media/media_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('media'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('media/create_action'),
	    'id' => set_value('id'),
	    'caption' => set_value('caption'),
	    'url' => set_value('url'),
	);
        $data['title'] = 'Media';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'media/media_form';
        $this->load->view('template/backend', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'caption' => $this->input->post('caption',TRUE),
		'url' => $this->input->post('url',TRUE),
	    );

            $this->MMedia->insert($data);
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(site_url('media'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->MMedia->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('media/update_action'),
		'id' => set_value('id', $row->id),
		'caption' => set_value('caption', $row->caption),
		'url' => set_value('url', $row->url),
	    );
            $data['title'] = 'Media';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'media/media_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('media'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'caption' => $this->input->post('caption',TRUE),
		'url' => $this->input->post('url',TRUE),
	    );

            $this->MMedia->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('media'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->MMedia->get_by_id($id);

        if ($row) {
            $this->MMedia->delete($id);
            $this->session->set_flashdata('success', 'Delete Record Success');
            redirect(site_url('media'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('media'));
        }
    }

    public function deletebulk(){
        $delete = $this->MMedia->deletebulk();
        if($delete){
            $this->session->set_flashdata('success', 'Delete Record Success');
        }else{
            $this->session->set_flashdata('error', 'Delete Record failed');
        }
        echo $delete;
    }
   
    public function _rules() 
    {
	$this->form_validation->set_rules('caption', 'caption', 'trim|required');
	$this->form_validation->set_rules('url', 'url', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Media.php */
/* Location: ./application/controllers/Media.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-05-25 15:39:52 */
/* http://harviacode.com */