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
		$laporan = $this->mLaporan->lap_harian($tanggal, $bulan, $tahun);

		// $data = array(
		// 	'title' => 'Laporan Peminjaman Harian',
		// 	'tanggal' => $tanggal,
		// 	'bulan' => $bulan,
		// 	'tahun' => $tahun,
		// 	'laporan' => $this->mLaporan->lap_harian($tanggal, $bulan, $tahun),
		// );
		// $this->load->view('KepalaPerpustakaan/Layouts/head');
		// $this->load->view('KepalaPerpustakaan/Layouts/navbar');
		// $this->load->view('KepalaPerpustakaan/Layouts/aside');
		// $this->load->view('KepalaPerpustakaan/laporan/hari', $data);
		// $this->load->view('KepalaPerpustakaan/Layouts/footer');

		require('asset/fpdf/fpdf.php');

		// intance object dan memberikan pengaturan halaman PDF
		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->AddPage();


		$pdf->SetFont('Times', 'B', 14);
		$pdf->Image('asset/smp.png', 10, 3, 28);
		$pdf->Cell(200, 5, 'SMP NEGERI 2 CIDAHU', 0, 1, 'C');
		$pdf->SetFont('Times', '', 10);
		$pdf->Cell(200, 20, 'Jln. Raya Cikeusik Cidahu, Kec. Cidahu Kab. Kuningan, Jawa Barat', 0, 0, 'C');

		$pdf->SetLineWidth(1);
		$pdf->Line(10, 43, 200, 43);
		$pdf->SetLineWidth(0);
		$pdf->Line(10, 42, 200, 42);
		$pdf->Cell(10, 30, '', 0, 1);



		$pdf->SetFont('Times', 'B', 14);
		$pdf->Cell(190, 10, 'LAPORAN PEMINJAMAN BUKU HARIAN', 0, 1, 'C');
		$pdf->SetFont('Times', '', 10);

		$pdf->Cell(10, 10, '', 0, 1);
		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(55, 7, 'Nama Anggota', 1, 0, 'C');
		$pdf->Cell(70, 7, 'Judul Buku', 1, 0, 'C');
		$pdf->Cell(40, 7, 'Tanggal Peminjaman', 1, 0, 'C');
		$pdf->Cell(30, 7, 'Batas Peminjaman', 1, 1, 'C');

		$pdf->SetFont('Times', '', 9);

		foreach ($laporan as $key => $value) {
			$pdf->Cell(55, 7, $value->nama_anggota, 1, 0, 'C');
			$pdf->Cell(70, 7, $value->judul, 1, 0);
			$pdf->Cell(40, 7, $value->tgl_pinjam, 1, 0, 'C');
			$pdf->Cell(30, 7, $value->bts_pinjam, 1, 1, 'C');
		}


		$pdf->Output();
	}

	public function lap_bulanan()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$laporan = $this->mLaporan->lap_bulanan($bulan, $tahun);

		// $data = array(
		// 	'title' => 'Laporan Peminjaman Bulanan',
		// 	'bulan' => $bulan,
		// 	'tahun' => $tahun,

		// );
		// $this->load->view('KepalaPerpustakaan/Layouts/head');
		// $this->load->view('KepalaPerpustakaan/Layouts/navbar');
		// $this->load->view('KepalaPerpustakaan/Layouts/aside');
		// $this->load->view('KepalaPerpustakaan/laporan/bulan', $data);
		// $this->load->view('KepalaPerpustakaan/Layouts/footer');

		require('asset/fpdf/fpdf.php');

		// intance object dan memberikan pengaturan halaman PDF
		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->AddPage();


		$pdf->SetFont('Times', 'B', 14);
		$pdf->Image('asset/smp.png', 10, 3, 28);
		$pdf->Cell(200, 5, 'SMP NEGERI 2 CIDAHU', 0, 1, 'C');
		$pdf->SetFont('Times', '', 10);
		$pdf->Cell(200, 20, 'Jln. Raya Cikeusik Cidahu, Kec. Cidahu Kab. Kuningan, Jawa Barat', 0, 0, 'C');

		$pdf->SetLineWidth(1);
		$pdf->Line(10, 43, 200, 43);
		$pdf->SetLineWidth(0);
		$pdf->Line(10, 42, 200, 42);
		$pdf->Cell(10, 30, '', 0, 1);



		$pdf->SetFont('Times', 'B', 14);
		$pdf->Cell(190, 10, 'LAPORAN PEMINJAMAN BUKU BULANAN', 0, 1, 'C');
		$pdf->SetFont('Times', '', 10);

		$pdf->Cell(10, 10, '', 0, 1);
		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(55, 7, 'Nama Anggota', 1, 0, 'C');
		$pdf->Cell(70, 7, 'Judul Buku', 1, 0, 'C');
		$pdf->Cell(40, 7, 'Tanggal Peminjaman', 1, 0, 'C');
		$pdf->Cell(30, 7, 'Batas Peminjaman', 1, 1, 'C');

		$pdf->SetFont('Times', '', 9);

		foreach ($laporan as $key => $value) {
			$pdf->Cell(55, 7, $value->nama_anggota, 1, 0, 'C');
			$pdf->Cell(70, 7, $value->judul, 1, 0);
			$pdf->Cell(40, 7, $value->tgl_pinjam, 1, 0, 'C');
			$pdf->Cell(30, 7, $value->bts_pinjam, 1, 1, 'C');
		}


		$pdf->Output();
	}

	public function lap_tahunan()
	{
		$tahun = $this->input->post('tahun');
		$laporan = $this->mLaporan->lap_tahunan($tahun);

		// $data = array(
		// 	'title' => 'Laporan Peminjaman Tahunan',
		// 	'tahun' => $tahun,

		// );
		// $this->load->view('KepalaPerpustakaan/Layouts/head');
		// $this->load->view('KepalaPerpustakaan/Layouts/navbar');
		// $this->load->view('KepalaPerpustakaan/Layouts/aside');
		// $this->load->view('KepalaPerpustakaan/laporan/tahun', $data);
		// $this->load->view('KepalaPerpustakaan/Layouts/footer');

		require('asset/fpdf/fpdf.php');

		// intance object dan memberikan pengaturan halaman PDF
		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->AddPage();


		$pdf->SetFont('Times', 'B', 14);
		$pdf->Image('asset/smp.png', 10, 3, 28);
		$pdf->Cell(200, 5, 'SMP NEGERI 2 CIDAHU', 0, 1, 'C');
		$pdf->SetFont('Times', '', 10);
		$pdf->Cell(200, 20, 'Jln. Raya Cikeusik Cidahu, Kec. Cidahu Kab. Kuningan, Jawa Barat', 0, 0, 'C');

		$pdf->SetLineWidth(1);
		$pdf->Line(10, 43, 200, 43);
		$pdf->SetLineWidth(0);
		$pdf->Line(10, 42, 200, 42);
		$pdf->Cell(10, 30, '', 0, 1);



		$pdf->SetFont('Times', 'B', 14);
		$pdf->Cell(190, 10, 'LAPORAN PEMINJAMAN BUKU TAHUNAN', 0, 1, 'C');
		$pdf->SetFont('Times', '', 10);

		$pdf->Cell(10, 10, '', 0, 1);
		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(55, 7, 'Nama Anggota', 1, 0, 'C');
		$pdf->Cell(70, 7, 'Judul Buku', 1, 0, 'C');
		$pdf->Cell(40, 7, 'Tanggal Peminjaman', 1, 0, 'C');
		$pdf->Cell(30, 7, 'Batas Peminjaman', 1, 1, 'C');

		$pdf->SetFont('Times', '', 9);

		foreach ($laporan as $key => $value) {
			$pdf->Cell(55, 7, $value->nama_anggota, 1, 0, 'C');
			$pdf->Cell(70, 7, $value->judul, 1, 0);
			$pdf->Cell(40, 7, $value->tgl_pinjam, 1, 0, 'C');
			$pdf->Cell(30, 7, $value->bts_pinjam, 1, 1, 'C');
		}
		$pdf->Output();
	}
}
