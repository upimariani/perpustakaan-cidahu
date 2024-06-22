<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLaporanPengembalian extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('mLaporan');
	}

	public function index()
	{
		$this->protect->protect();

		$this->load->view('KepalaPerpustakaan/Layouts/head');
		$this->load->view('KepalaPerpustakaan/Layouts/navbar');
		$this->load->view('KepalaPerpustakaan/Layouts/aside');
		$this->load->view('KepalaPerpustakaan/laporanPengembalian/laporan');
		$this->load->view('KepalaPerpustakaan/Layouts/footer');
	}
	public function lap_harian()
	{
		$tanggal = $this->input->post('tanggal');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$data = array(
			'title' => 'Laporan Pengembalian Harian',
			'tanggal' => $tanggal,
			'bulan' => $bulan,
			'tahun' => $tahun,
			'laporan' => $this->mLaporan->lap_harian_pengembalian($tanggal, $bulan, $tahun),
		);
		$this->load->view('KepalaPerpustakaan/Layouts/head');
		$this->load->view('KepalaPerpustakaan/Layouts/navbar');
		$this->load->view('KepalaPerpustakaan/Layouts/aside');
		$this->load->view('KepalaPerpustakaan/laporanPengembalian/harian', $data);
		$this->load->view('KepalaPerpustakaan/Layouts/footer');
	}

	public function lap_bulanan()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$data = array(
			'title' => 'Laporan Pengembalian Bulanan',
			'bulan' => $bulan,
			'tahun' => $tahun,
			'laporan' => $this->mLaporan->lap_bulanan_pengembalian($bulan, $tahun),
		);
		$this->load->view('KepalaPerpustakaan/Layouts/head');
		$this->load->view('KepalaPerpustakaan/Layouts/navbar');
		$this->load->view('KepalaPerpustakaan/Layouts/aside');
		$this->load->view('KepalaPerpustakaan/laporanPengembalian/bulanan', $data);
		$this->load->view('KepalaPerpustakaan/Layouts/footer');
	}

	public function lap_tahunan()
	{
		$tahun = $this->input->post('tahun');

		$data = array(
			'title' => 'Laporan Pengembalian Tahunan',
			'tahun' => $tahun,
			'laporan' => $this->mLaporan->lap_tahunan_pengembalian($tahun),
		);
		$this->load->view('KepalaPerpustakaan/Layouts/head');
		$this->load->view('KepalaPerpustakaan/Layouts/navbar');
		$this->load->view('KepalaPerpustakaan/Layouts/aside');
		$this->load->view('KepalaPerpustakaan/laporanPengembalian/tahunan', $data);
		$this->load->view('KepalaPerpustakaan/Layouts/footer');
	}
}

/* End of file cLaporanPengembalian.php */
