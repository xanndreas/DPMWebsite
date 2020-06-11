<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Oprec extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('user_model', 'user');
        if ($this->session->userdata('user_login') == null) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['ud'] = $this->session->userdata('user_login');
        $this->load->view('user/template/header', $data);
        $this->load->view('user/oprec/index', $data);
        $this->load->view('user/template/footer');
    }
    public function oprec()
    {
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('foto')) {
			$error = array('error' => $this->upload->display_errors());
            $data['ud'] = $this->session->userdata('user_login');
			$this->load->view('user/template/header',$data);
            $this->load->view('user/oprec/fail',$data);
            $this->load->view('user/template/footer');
		} else {
            $upload_data = $this->upload->data();
            $nim = $this->input->post('nim');
            $datas = array(
                'nim' => $nim,
                'nama' => $this->input->post('nama'),
                "ttl" => $this->input->post('ttl'),
                "jurusan" => $this->input->post('jurusan'),
                "prodi" => $this->input->post('prodi'),
                "alamat_asal" => $this->input->post('alamat_asal'),
                "alamat_kos" => $this->input->post('alamat_kos'),
                "motivasi" => $this->input->post('motivasi'),
                "kelebihan" => $this->input->post('kelebihan'),
                "kekurangan" => $this->input->post('alasan'),
                "alasan" => $this->input->post('alasan'),
                "prestasi" => $this->input->post('prestasi'),
                "foto" => $upload_data['file_name'],
                "date" => date("Y-m-d H:i:s")
            );
        
            $n = array('nim' => $nim);
            $cek = $this->user->getWhere('oprec', $n)->row();
            if ($cek == null) {
            $exc = $this->user->insertData('oprec', $datas);
            if ($exc > 0) {
                $data['ud'] = $this->session->userdata('user_login');
                $this->load->view('user/template/header',$data);
                $this->load->view('user/oprec/success',$data);
                $this->load->view('user/template/footer');
            } else {
                $data['ud'] = $this->session->userdata('user_login');
                $this->load->view('user/template/header',$data);
                $this->load->view('user/oprec/fail',$data);
                $this->load->view('user/template/footer');
            }  
            }else {
                $this->session->set_flashdata('flash-data', 'NIM sudah mendaftar');
                redirect('oprec');
            }
        }
    }
}

/* End of file Aspirasi.php */
