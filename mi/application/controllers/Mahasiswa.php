<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('MMahasiswa');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'mahasiswa?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'mahasiswa?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'mahasiswa';
            $config['first_url'] = base_url() . 'mahasiswa';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->MMahasiswa->total_rows($q);
        $mahasiswa = $this->MMahasiswa->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'mahasiswa_data' => $mahasiswa,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Mahasiswa';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Mahasiswa' => '',
        ];

        $data['page'] = 'mahasiswa/mahasiswa_list';
        $this->load->view('template/backend', $data);
    }

    public function read($id)
    {
        $row = $this->MMahasiswa->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'npm' => $row->npm,
                'nama' => $row->nama,
                'tgl_lahir' => $row->tgl_lahir,
                'img' => $row->img,
            );
            $data['title'] = 'Mahasiswa';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'mahasiswa/mahasiswa_read';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('mahasiswa'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('mahasiswa/create_action'),
            'id' => set_value('id'),
            'npm' => set_value('npm'),
            'nama' => set_value('nama'),
            'tgl_lahir' => set_value('tgl_lahir'),
            'img' => set_value('img'),
        );
        $data['title'] = 'Mahasiswa';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'mahasiswa/mahasiswa_form';
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
                $config['upload_path'] = './assets/uploads/image/mahasiswa/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('img-mhs')) {

                    $old_image = $this->input->post('img-old');
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/uploads/image/mahasiswa/' . $old_image);
                    }
                    $image = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('mahasiswa/update/' . $id);
                }
            } else {
                $image = $this->input->post('img-old');
            }
            $data = array(
                'npm' => $this->input->post('npm', TRUE),
                'nama' => $this->input->post('nama', TRUE),
                'tgl_lahir' => $this->input->post('tgl_lahir', TRUE),
                'img' => $image,
            );

            $this->MMahasiswa->insert($data);
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(site_url('mahasiswa'));
        }
    }

    public function update($id)
    {
        $row = $this->MMahasiswa->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mahasiswa/update_action'),
                'id' => set_value('id', $row->id),
                'npm' => set_value('npm', $row->npm),
                'nama' => set_value('nama', $row->nama),
                'tgl_lahir' => set_value('tgl_lahir', $row->tgl_lahir),
                'img' => set_value('img', $row->img),
            );
            $data['title'] = 'Mahasiswa';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'mahasiswa/mahasiswa_form';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('mahasiswa'));
        }
    }

    public function update_action()
    {
        $this->_rules();
        $id = $this->input->post('id', TRUE);
        if ($this->form_validation->run() == FALSE) {
            $this->update($id);
        } else {
            $upload_image = $_FILES['img-mhs']['name'];
            if ($upload_image) {
                $config['upload_path'] = './assets/uploads/image/mahasiswa/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('img-mhs')) {

                    $old_image = $this->input->post('img-old');
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/uploads/image/mahasiswa/' . $old_image);
                    }
                    $image = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('mahasiswa/update/' . $id);
                }
            } else {
                $image = $this->input->post('img-old');
            }

            $data = array(
                'npm' => $this->input->post('npm', TRUE),
                'nama' => $this->input->post('nama', TRUE),
                'tgl_lahir' => $this->input->post('tgl_lahir', TRUE),
                'img' => $image,
            );

            $this->MMahasiswa->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('success', 'Update Record Success');
            redirect('mahasiswa/update/' . $id);
        }
    }

    public function delete($id)
    {
        $row = $this->MMahasiswa->get_by_id($id);

        if ($row) {
            $this->MMahasiswa->delete($id);
            $this->session->set_flashdata('success', 'Delete Record Success');
            redirect(site_url('mahasiswa'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('mahasiswa'));
        }
    }

    public function deletebulk()
    {
        $delete = $this->MMahasiswa->deletebulk();
        if ($delete) {
            $this->session->set_flashdata('success', 'Delete Record Success');
        } else {
            $this->session->set_flashdata('error', 'Delete Record failed');
        }
        echo $delete;
    }

    public function _rules()
    {
        $this->form_validation->set_rules('npm', 'npm', 'trim|required');
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('tgl_lahir', 'tgl lahir', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Mahasiswa.php */
/* Location: ./application/controllers/Mahasiswa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-05-25 12:52:26 */
/* http://harviacode.com */