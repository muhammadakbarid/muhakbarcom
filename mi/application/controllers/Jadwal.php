<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jadwal extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('MJadwal');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'jadwal?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jadwal?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jadwal';
            $config['first_url'] = base_url() . 'jadwal';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->MJadwal->total_rows($q);
        $jadwal = $this->MJadwal->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'jadwal_data' => $jadwal,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['semester'] = $this->MJadwal->get_smt(1);
        $data['title'] = 'Jadwal';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Jadwal' => '',
        ];

        $data['page'] = 'jadwal/jadwal_list';
        $this->load->view('template/backend', $data);
    }

    public function read($id)
    {
        $row = $this->MJadwal->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'nama' => $row->nama,
                'waktu_mulai' => $row->waktu_mulai,
                'waktu_akhir' => $row->waktu_akhir,
                'hari' => $row->hari,
                'semester' => $row->semester,
            );
            $data['title'] = 'Jadwal';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'jadwal/jadwal_read';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('jadwal'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jadwal/create_action'),
            'id' => set_value('id'),
            'nama' => set_value('nama'),
            'waktu_mulai' => set_value('waktu_mulai'),
            'waktu_akhir' => set_value('waktu_akhir'),
            'hari' => set_value('hari'),
            'semester' => set_value('semester'),
        );
        $data['title'] = 'Jadwal';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'jadwal/jadwal_form';
        $this->load->view('template/backend', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nama' => $this->input->post('nama', TRUE),
                'waktu_mulai' => $this->input->post('waktu_mulai', TRUE),
                'waktu_akhir' => $this->input->post('waktu_akhir', TRUE),
                'hari' => $this->input->post('hari', TRUE),
                'semester' => $this->input->post('semester', TRUE),
            );
            // var_dump($data);
            // exit;

            $this->MJadwal->insert($data);
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(site_url('jadwal'));
        }
    }

    public function semester_action()
    {
        $data = array(
            'semester' => $this->input->post('semester', TRUE),
        );

        $this->MJadwal->update_smt($data);
        $this->session->set_flashdata('success', 'Update Record Success');
        redirect(site_url('jadwal'));
    }

    public function update($id)
    {
        $row = $this->MJadwal->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jadwal/update_action'),
                'id' => set_value('id', $row->id),
                'nama' => set_value('nama', $row->nama),
                'waktu_mulai' => set_value('waktu_mulai', $row->waktu_mulai),
                'waktu_akhir' => set_value('waktu_akhir', $row->waktu_akhir),
                'hari' => set_value('hari', $row->hari),
                'semester' => set_value('semester', $row->semester),
            );
            $data['title'] = 'Jadwal';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'jadwal/jadwal_form';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('jadwal'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'nama' => $this->input->post('nama', TRUE),
                'waktu_mulai' => $this->input->post('waktu_mulai', TRUE),
                'waktu_akhir' => $this->input->post('waktu_akhir', TRUE),
                'hari' => $this->input->post('hari', TRUE),
                'semester' => $this->input->post('semester', TRUE),
            );

            $this->MJadwal->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('jadwal'));
        }
    }

    public function delete($id)
    {
        $row = $this->MJadwal->get_by_id($id);

        if ($row) {
            $this->MJadwal->delete($id);
            $this->session->set_flashdata('success', 'Delete Record Success');
            redirect(site_url('jadwal'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('jadwal'));
        }
    }

    public function deletebulk()
    {
        $delete = $this->MJadwal->deletebulk();
        if ($delete) {
            $this->session->set_flashdata('success', 'Delete Record Success');
        } else {
            $this->session->set_flashdata('error', 'Delete Record failed');
        }
        echo $delete;
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('waktu_mulai', 'waktu mulai', 'trim|required');
        $this->form_validation->set_rules('waktu_akhir', 'waktu akhir', 'trim|required');
        $this->form_validation->set_rules('hari', 'hari', 'trim|required');
        $this->form_validation->set_rules('semester', 'semester', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Jadwal.php */
/* Location: ./application/controllers/Jadwal.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-05-27 16:54:05 */
/* http://harviacode.com */