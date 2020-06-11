<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Oprec extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('admin_model', 'a');
		$this->load->library('xls', 'xls');
		$a = $this->session->userdata('admin_login');
		if ($a == null) {
			redirect('admin/login');
		}
	}

	public function index()
	{
		$data['ud'] = $this->session->userdata('admin_login');
		$data['main_view'] = 'admin/oprec';
		$data['op'] = $this->a->get('oprec')->result();
		$this->load->view('admin/dashboard', $data);
	}

	public function handleAllAction()
	{
		if ($_POST['request'] == 'delete') {
			$this->del_oprec();
		} else if ($_POST['request'] == 'print') {
			$this->print_oprec();
		}
	}

	public function del_oprec()
	{
		$dt = $this->input->post('pilih');
		$jl = count($dt);
		if ($jl != 0) {
			for ($i = 0; $i < $jl; $i++) {
				$this->a->delete('id_oprec', $dt[$i], 'oprec');
			}
			$this->session->set_flashdata('success',"Data Success Deleted");
			redirect('admin/oprec');
		} else {
			$this->session->set_flashdata('error',"Gagal delete");
			redirect('admin/oprec');
		}
	}
	public function print_oprec()
	{
		$checkedData = $this->input->post_get('pilih');
		if (!empty($checkedData)) {
			foreach ($checkedData as $key) {
				$data[] = $key;
			}
			$this->printExecutor($data);
		} else {
			redirect('admin/oprec');
		}
	}
	public function printExecutor($data)
	{
		$__DATA = array();
		foreach ($data as $key) {
			//Get saran data by id
            $saranData = $this->a->get('oprec')->result_array();
			//push to array 
			$__DATA["data"][] = $saranData;
		}
		//exec
		$this->xls->export_xls($__DATA, 'oprec');
	}
}

/* End of file Saran.php */
/* Location: ./application/controllers/Saran.php */
