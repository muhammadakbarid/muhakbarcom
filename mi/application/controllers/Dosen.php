<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dosen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('MDosen');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'dosen?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'dosen?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'dosen';
            $config['first_url'] = base_url() . 'dosen';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->MDosen->total_rows($q);
        $dosen = $this->MDosen->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'dosen_data' => $dosen,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Dosen';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dosen' => '',
        ];

        $data['page'] = 'dosen/dosen_list';
        $this->load->view('template/backend', $data);
    }

    public function read($id)
    {
        $row = $this->MDosen->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'nama' => $row->nama,
                'img' => $row->img,
            );
            $data['title'] = 'Dosen';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'dosen/dosen_read';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('dosen'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('dosen/create_action'),
            'id' => set_value('id'),
            'nama' => set_value('nama'),
            'img' => set_value('img'),
        );
        $data['title'] = 'Dosen';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'dosen/dosen_form';
        $this->load->view('template/backend', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $upload_image = $_FILES['img-mhs']['name'];
            if ($upload_image) {
                $config['upload_path'] = './assets/uploads/image/dosen/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('img-mhs')) {

                    $old_image = $this->input->post('img-old');
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/uploads/image/dosen/' . $old_image);
                    }
                    $image = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('dosen/update/' . $id);
                }
            } else {
                $image = $this->input->post('img-old');
            }
            $data = array(
                'nama' => $this->input->post('nama', TRUE),
                'img' => $image,
            );

            $this->MDosen->insert($data);
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(site_url('dosen'));
        }
    }

    public function update($id)
    {
        $row = $this->MDosen->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('dosen/update_action'),
                'id' => set_value('id', $row->id),
                'nama' => set_value('nama', $row->nama),
                'img' => set_value('img', $row->img),
            );
            $data['title'] = 'Dosen';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'dosen/dosen_form';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('dosen'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {

            $upload_image = $_FILES['img-mhs']['name'];
            if ($upload_image) {
                $config['upload_path'] = './assets/uploads/image/dosen/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('img-mhs')) {

                    $old_image = $this->input->post('img-old');
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/uploads/image/dosen/' . $old_image);
                    }
                    $image = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect(site_url('dosen'));
                }
            } else {
                $image = $this->input->post('img-old');
            }

            $data = array(
                'nama' => $this->input->post('nama', TRUE),
                'img' => $image,
            );

            $this->MDosen->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('dosen'));
        }
    }

    public function delete($id)
    {
        $row = $this->MDosen->get_by_id($id);

        if ($row) {
            $this->MDosen->delete($id);
            $this->session->set_flashdata('success', 'Delete Record Success');
            redirect(site_url('dosen'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('dosen'));
        }
    }

    public function deletebulk()
    {
        $delete = $this->MDosen->deletebulk();
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
        // $this->form_validation->set_rules('img', 'img', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Dosen.php */
/* Location: ./application/controllers/Dosen.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-05-27 04:13:12 */
/* http://harviacode.com */