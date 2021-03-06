<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aspirasi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('admin_model', 'a');
		$this->load->library('xls', 'xls');
		$a = $this->session->userdata('admin_login');
		$b = $this->session->userdata('admin_login')['role'];
		if ($b == '2') {
			redirect('admin/login');
		}
	}

	public function index()
	{
		$data['ud'] = $this->session->userdata('admin_login');
		$data['main_view'] = 'admin/aspirasi';
		$data['asp'] = $this->a->getAspirasi()->result();
		$data['kategori'] = $this->a->get('kategori')->result();
		$data['prodi'] = $this->a->getProdi();
		$this->load->view('admin/dashboard', $data);
	}

	public function handleAllAction()
	{
		if ($_POST['request'] == 'delete') {
			$this->del_aspirasi();
		} else if ($_POST['request'] == 'print') {
			$this->print_aspirasi();
		} else if ($_POST['request'] == 'printKategori') {
			$this->printKategori();
		} else if ($_POST['request'] == 'printProdi') {
			$this->printProdi();
		}
	}
	public function del_aspirasi()
	{
		$dt = $this->input->post('pilih');
		$jl = count($dt);
		if ($jl != 0) {
			for ($i = 0; $i < $jl; $i++) {
				$data = array(
					'DELETED_STATUS' => 1
				);
				$where = "ASP_ID = " . $dt[$i];
				$this->a->update('aspirasi',$data, $where);
			}
		} else {
			redirect('admin/aspirasi');
		}
		$this->session->set_flashdata('success',"Success Delete Aspirasi");
		redirect('admin/aspirasi');
	}
	public function print_aspirasi()
	{
		$checkedData = $this->input->post_get('pilih');

		if (!empty($checkedData)) {
			foreach ($checkedData as $checked) {
				$data[] = $checked;
			}
			$this->printExecutor($data);
		} else {
			redirect('admin/aspirasi');
		}
	}
	public function printExecutor($dataAspirasi)
	{
		$__DATA = array();
		$ct = count($dataAspirasi);
		for ($i = 0; $i < $ct; $i++) {
			//ini buat get id dan kawan kawan
			$id = $dataAspirasi[$i];
			$datas = $this->a->getASPById($id)->result_array();

			//Masukin array biar uwu

			$__DATA["data"][] = $datas;

			//ini untuk manggil update transaksi berdasarkan ID
			$this->updateAspirasiStatus($id);
		}
		$this->xls->export_xls($__DATA, 'aspirasi');
	}

	public function printKategori()
	{
		$id = $this->input->post("kategori");
		// $check = $this->a->get('aspirasi_view')->result();
		$__DATA = array();
		$datas = $this->a->getAspirasiPrint('KAT_NAMA', $id);
		$__DATA["data"][] = $datas;
		$this->xls->export_xls($__DATA, 'kategori');
	}

	public function printProdi()
	{
		$id = $this->input->post("prodi");
		// $check = $this->a->get('aspirasi_view')->result();
		$__DATA = array();	
		$datas = array();	
		$dt = $this->a->getAspirasi()->result_array();
		foreach($dt as $d){
			if($d['PRODI'] == $id){
				$datas += $d;
			}
		}
		var_dump($datas);
		$__DATA["data"][] = $datas;
		$this->xls->export_xls($__DATA, 'prodi');
	}

	public function updateAspirasiStatus($id)
	{
		$where = "ASP_ID = " . $id;
		$data = array(
			'STATUS' => 1
		);
		$table = "aspirasi";
		$this->a->update($table, $data, $where);
	}
}

/* End of file Aspirasi.php */
/* Location: ./application/controllers/Aspirasi.php */
