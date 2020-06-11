<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('admin_model', 'a');
		$this->load->library('xls', 'xls');
		date_default_timezone_set('Asia/Bangkok');
		$a = $this->session->userdata('admin_login');
		if ($a == null) {
			redirect('admin/login');
		}
	}

	public function index()
	{
		$data['ud'] = $this->session->userdata('admin_login');
		$data['main_view'] = 'admin/barang';
		$data['brg'] = $this->a->get('list_alat')->result();
		$this->load->view('admin/dashboard', $data);
	}

	public function listPeminjaman()
	{
		$data['ud'] = $this->session->userdata('admin_login');
		$data['main_view'] = 'admin/peminjaman';
		$data['a'] = $this->a->get('list_alat')->result();
		$data['pj'] = $this->a->getPeminjaman()->result();
		
		$this->load->view('admin/dashboard', $data);
	}
	public function modal()
	{
		if (!empty($this->input->post('ids'))) { 
			$a = $this->input->post('ids');
			$data = $this->a->modal($a)->result();

			echo json_encode($data); 
			exit();
		}
	}
	public function ins_peminjaman()
	{
		$wkt = date('H:i:s');
		$plot = $this->input->post('Tplot');
		$pinjam = $this->input->post('Tpinjam');
		$bali =  $this->input->post('Tbali');
		$time1 = date('Y-m-d H:i:s', strtotime($wkt, strtotime($plot)));
		$time2 = date('Y-m-d H:i:s', strtotime($wkt, strtotime($pinjam)));
		$time3 = date('Y-m-d H:i:s', strtotime($wkt, strtotime($bali)));

		$arr = array(

			'NAMA_PEMINJAM'		=>	$this->input->post('namapeminjam'),
			'NAMA_ORGANISASI'		=>	$this->input->post('namorgan'),
			'TANGGAL_PLOT'			=>	$time1,
			'TANGGAL_PEMINJAMAN'	=>  $time2,
			'TANGGAL_PENGEMBALIAN'	=>	$time3,
			'UNTUK_KEPERLUAN'		=>	$this->input->post('keperluan'),
			'JAMINAN'				=>	$this->input->post('jaminan'),
			'STATUS'				=> "N"
		);
		$this->a->insert('plot', $arr);

		$ab = $this->input->post('namabarang[]');
		$a = $this->input->post('jumlah[]');
		$b = $this->a->getLastId('ID_PEMINJAMAN', 'plot', 1)->row()->ID_PEMINJAMAN;
		for ($i = 0; $i < count($a); $i++) {
			$arra = array(
				'ALAT_ID' => (int) $ab[$i],
				'id_peminjaman' => $b,
				'jumlah' =>	(int) $a[$i],
			);
			$this->a->insert('plot_detail', $arra);

			$bx = $this->a->getById('list_alat', 'ALAT_ID', (int) $ab[$i]);
			$total = $bx->JUMLAH_ALAT - (int) $a[$i];
			$obj = array('JUMLAH_ALAT' => $total, ); $where = array('ALAT_ID' => (int) $ab[$i], );
			$this->a->update('list_alat', $obj, $where);
		}

		redirect("admin/Peminjaman/listPeminjaman");
	}

	public function ins_barangP()
	{
		$this->form_validation->set_rules('namabarang', 'Nama Barang', 'required');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required','numeric');
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Data Gagal ditambahkan");
			redirect("admin/Peminjaman");
		} else {
			$arr = array(
				'ALAT_NAMA'		=>	$this->input->post('namabarang'),
				'JUMLAH_ALAT'	=>	$this->input->post('jumlah'),
			);
			if($this->a->insert('list_alat', $arr)==TRUE){
				$this->session->set_flashdata('success',"Data Berhasil ditambahkan");
				redirect("admin/Peminjaman");
			} else {
				$this->session->set_flashdata('error',"Data Gagal ditambahkan");
				redirect("admin/Peminjaman");
			}
		}
	}
	public function handleAllAction()
    {
        if ($_POST['edit'] == "barangedit") {
            $this->edit_barang();
        }
	}
	public function edit_barang()
    {
        $datas = array(
            'ALAT_NAMA' => $this->input->post('namabarang'),
            'JUMLAH_ALAT' => $this->input->post('jumlah')
        );
        $where = array(
            'ALAT_ID' => $this->input->post('id')
        );
        $this->a->updateDatas($where, $datas, "list_alat");
        redirect("admin/Peminjaman");
    }

	public function del_peminjaman()
	{
		$dt = $this->input->post('pilih');
		$jl = count($dt);
		if ($jl != 0) {
			for ($i = 0; $i < $jl; $i++) {
				$this->a->delete('ID_PEMINJAMAN', $dt[$i], 'plot');
			}
		} else {
			redirect('admin/peminjaman/listPeminjaman');
		}
		redirect('admin/peminjaman/listPeminjaman');
	}

	public function del_barangP()
	{
		$dt = $this->input->post('pilih');
		$jl = count($dt);

		for ($i = 0; $i < $jl; $i++) {
			$this->a->delete('ALAT_ID', $dt[$i], 'list_alat');
		}

		redirect('admin/peminjaman');
	}
	public function execute()
	{
		$value = $this->input->post('request');

		if ($value == "delete") {
			$this->del_peminjaman();
		} else if ($value == "print") {
			$this->print_barang();
		}
	}
	public function changeStatus($id)
	{
		$datas = array(
            'STATUS' => "Y"
		);
		$where = array(
            'ID_PEMINJAMAN' => $id
        );
		if($this->a->update("plot",$datas,$where)==TRUE){
			$this->session->set_flashdata('success',"Status OK");
			redirect("admin/peminjaman/listPeminjaman");
		} else {
			$this->session->set_flashdata('error',"Status gagal diubah");
			redirect("admin/peminjaman/listPeminjaman");
		}
	}
	public function print_barang()
	{
		$checkedData = $this->input->post_get('pilih');

		if (!empty($checkedData)) {
			foreach ($checkedData as $checked) {
				$data[] = $checked;
			}
			$this->printExecutor($data);
		} else {
			redirect('admin/peminjaman/listPeminjaman');
		}
	}
	public function printExecutor($barangdatas)
	{
		$__DATA = array();
		$ct = count($barangdatas);
		for ($i = 0; $i < $ct; $i++) {
			//ini buat get id dan kawan kawan
			$id = $barangdatas[$i];
			$datas = $this->a->__getbyid('plot', "ID_PEMINJAMAN", $id)->result_array();

			//Masukin array biar uwu
			$__DATA["data"][] = $datas;
		}
		$this->xls->export_xls($__DATA, 'barang');
	}
	public function upd_peminjaman()
	{
		# code...
	}

	public function upd_barangP()
	{
		# code...
	}
}

/* End of file Peminjaman.php */
/* Location: ./application/controllers/Peminjaman.php */
