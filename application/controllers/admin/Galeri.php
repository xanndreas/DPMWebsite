<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('admin_model', 'a');
		$a = $this->session->userdata('admin_login');
		if ($a == null) {
			redirect('admin/login');
		}
	}

	public function index()
	{
		$data['ud'] = $this->session->userdata('admin_login');
		$data['main_view'] = 'admin/galeri';
		$data['gal'] = $this->a->get('galeri')->result();
		$this->load->view('admin/dashboard', $data);
	}
	public function ins_galeri()
	{
		//$id = $this->session->userdata('auth');
		$acara = $this->input->post('namaacara');
		$konten = $this->input->post('kontenacara');
		$komisi = $this->input->post('komisi');

		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('gambar')) {
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('success',"Gagal Tambah Galeri");
			redirect('admin/galeri', 'refresh');
		} else {
			$upload_data = $this->upload->data();
			$ins = array(
				'NAMA_ACARA' => $acara,
				'KONTEN' => $konten,
				'KOMISI' => $komisi,
				'GAL_NAMA' => $upload_data['file_name'],
			);
			$this->a->insert('galeri', $ins);
			$this->session->set_flashdata('success',"Success Tambah Galeri");
			redirect('admin/galeri', 'refresh');
		}
	}
	public function editGaleri()
	{
		$acara = $this->input->post('namaacara');
		$konten = $this->input->post('kontenacara');
		$komisi = $this->input->post('komisi');
		$id = $this->input->post('id');
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('gambar')) {
			$error = array('error' => $this->upload->display_errors());
			var_dump($error);
		} else {
			$upload_data = $this->upload->data();
			$ins = array(
				'NAMA_ACARA' => $acara,
				'KONTEN' => $konten,
				'KOMISI' => $komisi,
				'GAL_NAMA' => $upload_data['file_name'],
			);
			$where = array(
				'GALERI_ID' => $id,
			);
			$this->a->update('galeri', $ins, $where);
			$this->session->set_flashdata('success',"Success Update Galeri");
			redirect('admin/galeri', 'refresh');
		}
	}
	public function del_galeri($id)
	{
		$this->a->delete('GALERI_ID', $id, 'galeri');
		$this->session->set_flashdata('success',"Success hapus Galeri");
		redirect('admin/galeri', 'refresh');
	}
}

/* End of file Galeri.php */
/* Location: ./application/controllers/Galeri.php */
