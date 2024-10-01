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
		$laporan = $this->mLaporan->lap_harian_pengembalian($tanggal, $bulan, $tahun);

		// $data = array(
		// 	'title' => 'Laporan Pengembalian Harian',
		// 	'tanggal' => $tanggal,
		// 	'bulan' => $bulan,
		// 	'tahun' => $tahun,
		// 	'laporan' => $this->mLaporan->lap_harian_pengembalian($tanggal, $bulan, $tahun),
		// );
		// $this->load->view('KepalaPerpustakaan/Layouts/head');
		// $this->load->view('KepalaPerpustakaan/Layouts/navbar');
		// $this->load->view('KepalaPerpustakaan/Layouts/aside');
		// $this->load->view('KepalaPerpustakaan/laporanPengembalian/harian', $data);
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
		$pdf->Cell(190, 10, 'LAPORAN PENGEMBALIAN BUKU HARIAN', 0, 1, 'C');
		$pdf->SetFont('Times', '', 10);

		$pdf->Cell(10, 10, '', 0, 1);
		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(55, 7, 'Nama Anggota', 1, 0, 'C');
		$pdf->Cell(70, 7, 'Judul Buku', 1, 0, 'C');
		$pdf->Cell(35, 7, 'Tanggal Peminjaman', 1, 0, 'C');
		$pdf->Cell(35, 7, 'Tanggal Pengembalian', 1, 1, 'C');

		$pdf->SetFont('Times', '', 9);

		foreach ($laporan as $key => $value) {
			$pdf->Cell(55, 7, $value->nama_anggota, 1, 0, 'C');
			$pdf->Cell(70, 7, $value->judul, 1, 0);
			$pdf->Cell(35, 7, $value->tgl_pinjam, 1, 0, 'C');
			$pdf->Cell(35, 7, $value->tgl_kembali, 1, 1, 'C');
		}
		$pdf->Output();
	}

	public function lap_bulanan()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$laporan = $this->mLaporan->lap_bulanan_pengembalian($bulan, $tahun);
		// $data = array(
		// 	'title' => 'Laporan Pengembalian Bulanan',
		// 	'bulan' => $bulan,
		// 	'tahun' => $tahun,
		// 	'laporan' => $this->mLaporan->lap_bulanan_pengembalian($bulan, $tahun),
		// );
		// $this->load->view('KepalaPerpustakaan/Layouts/head');
		// $this->load->view('KepalaPerpustakaan/Layouts/navbar');
		// $this->load->view('KepalaPerpustakaan/Layouts/aside');
		// $this->load->view('KepalaPerpustakaan/laporanPengembalian/bulanan', $data);
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
		$pdf->Cell(190, 10, 'LAPORAN PENGEMBALIAN BUKU BULANAN', 0, 1, 'C');
		$pdf->SetFont('Times', '', 10);

		$pdf->Cell(10, 10, '', 0, 1);
		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(55, 7, 'Nama Anggota', 1, 0, 'C');
		$pdf->Cell(70, 7, 'Judul Buku', 1, 0, 'C');
		$pdf->Cell(35, 7, 'Tanggal Peminjaman', 1, 0, 'C');
		$pdf->Cell(35, 7, 'Tanggal Pengembalian', 1, 1, 'C');

		$pdf->SetFont('Times', '', 9);

		foreach ($laporan as $key => $value) {
			$pdf->Cell(55, 7, $value->nama_anggota, 1, 0, 'C');
			$pdf->Cell(70, 7, $value->judul, 1, 0);
			$pdf->Cell(35, 7, $value->tgl_pinjam, 1, 0, 'C');
			$pdf->Cell(35, 7, $value->tgl_kembali, 1, 1, 'C');
		}
		$pdf->Output();
	}

	public function lap_tahunan()
	{
		$tahun = $this->input->post('tahun');
		$laporan = $this->mLaporan->lap_tahunan_pengembalian($tahun);


		// $data = array(
		// 	'title' => 'Laporan Pengembalian Tahunan',
		// 	'tahun' => $tahun,
		// 	'laporan' => $this->mLaporan->lap_tahunan_pengembalian($tahun),
		// );
		// $this->load->view('KepalaPerpustakaan/Layouts/head');
		// $this->load->view('KepalaPerpustakaan/Layouts/navbar');
		// $this->load->view('KepalaPerpustakaan/Layouts/aside');
		// $this->load->view('KepalaPerpustakaan/laporanPengembalian/tahunan', $data);
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
		$pdf->Cell(190, 10, 'LAPORAN PENGEMBALIAN BUKU TAHUNAN', 0, 1, 'C');
		$pdf->SetFont('Times', '', 10);

		$pdf->Cell(10, 10, '', 0, 1);
		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(55, 7, 'Nama Anggota', 1, 0, 'C');
		$pdf->Cell(70, 7, 'Judul Buku', 1, 0, 'C');
		$pdf->Cell(35, 7, 'Tanggal Peminjaman', 1, 0, 'C');
		$pdf->Cell(35, 7, 'Tanggal Pengembalian', 1, 1, 'C');

		$pdf->SetFont('Times', '', 9);

		foreach ($laporan as $key => $value) {
			$pdf->Cell(55, 7, $value->nama_anggota, 1, 0, 'C');
			$pdf->Cell(70, 7, $value->judul, 1, 0);
			$pdf->Cell(35, 7, $value->tgl_pinjam, 1, 0, 'C');
			$pdf->Cell(35, 7, $value->tgl_kembali, 1, 1, 'C');
		}
		$pdf->Output();
	}
}

/* End of file cLaporanPengembalian.php */
