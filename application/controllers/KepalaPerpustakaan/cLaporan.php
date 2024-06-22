<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLaporan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mPeminjaman');
		$this->load->model('mAnggota');
		$this->load->model('mDataMaster');
		$this->load->model('mLaporan');
	}

	public function index()
	{
		$this->protect->protect();
		$data = array(
			'pinjam' => $this->mPeminjaman->select_pinjam()

		);
		$this->load->view('KepalaPerpustakaan/Layouts/head');
		$this->load->view('KepalaPerpustakaan/Layouts/navbar');
		$this->load->view('KepalaPerpustakaan/Layouts/aside');
		$this->load->view('KepalaPerpustakaan/laporan/laporan', $data);
		$this->load->view('KepalaPerpustakaan/Layouts/footer');
	}

	public function lap_harian()
	{
		$tanggal = $this->input->post('tanggal');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$data = array(
			'title' => 'Laporan Peminjaman Harian',
			'tanggal' => $tanggal,
			'bulan' => $bulan,
			'tahun' => $tahun,
			'laporan' => $this->mLaporan->lap_harian($tanggal, $bulan, $tahun),
		);
		$this->load->view('KepalaPerpustakaan/Layouts/head');
		$this->load->view('KepalaPerpustakaan/Layouts/navbar');
		$this->load->view('KepalaPerpustakaan/Layouts/aside');
		$this->load->view('KepalaPerpustakaan/laporan/hari', $data);
		$this->load->view('KepalaPerpustakaan/Layouts/footer');
	}

	public function lap_bulanan()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$data = array(
			'title' => 'Laporan Peminjaman Bulanan',
			'bulan' => $bulan,
			'tahun' => $tahun,
			'laporan' => $this->mLaporan->lap_bulanan($bulan, $tahun),
		);
		$this->load->view('KepalaPerpustakaan/Layouts/head');
		$this->load->view('KepalaPerpustakaan/Layouts/navbar');
		$this->load->view('KepalaPerpustakaan/Layouts/aside');
		$this->load->view('KepalaPerpustakaan/laporan/bulan', $data);
		$this->load->view('KepalaPerpustakaan/Layouts/footer');
	}

	public function lap_tahunan()
	{
		$tahun = $this->input->post('tahun');

		$data = array(
			'title' => 'Laporan Peminjaman Tahunan',
			'tahun' => $tahun,
			'laporan' => $this->mLaporan->lap_tahunan($tahun),
		);
		$this->load->view('KepalaPerpustakaan/Layouts/head');
		$this->load->view('KepalaPerpustakaan/Layouts/navbar');
		$this->load->view('KepalaPerpustakaan/Layouts/aside');
		$this->load->view('KepalaPerpustakaan/laporan/tahun', $data);
		$this->load->view('KepalaPerpustakaan/Layouts/footer');
	}
}
