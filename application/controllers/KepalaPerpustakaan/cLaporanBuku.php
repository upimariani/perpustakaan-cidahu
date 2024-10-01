<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLaporanBuku extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mDataMaster');
		$this->load->model('mLaporan');
	}

	public function index()
	{
		$this->protect->protect();
		$data = array(
			'kategori' => $this->mDataMaster->select_kategori()
		);
		$this->load->view('KepalaPerpustakaan/Layouts/head');
		$this->load->view('KepalaPerpustakaan/Layouts/navbar');
		$this->load->view('KepalaPerpustakaan/Layouts/aside');
		$this->load->view('KepalaPerpustakaan/LaporanBuku/laporan', $data);
		$this->load->view('KepalaPerpustakaan/Layouts/footer');
	}
	public function lap_harian()
	{
		$tanggal = $this->input->post('tanggal');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$id_kategori = $this->input->post('kategori');
		$laporan = $this->mLaporan->buku_harian($tanggal, $bulan, $tahun, $id_kategori);

		// $data = array(
		// 	'title' => 'Laporan Buku Masuk Harian',
		// 	'tanggal' => $tanggal,
		// 	'bulan' => $bulan,
		// 	'tahun' => $tahun,
		// 	'laporan' => $this->mLaporan->buku_harian($tanggal, $bulan, $tahun, $id_kategori),
		// );
		// $this->load->view('KepalaPerpustakaan/Layouts/head');
		// $this->load->view('KepalaPerpustakaan/Layouts/navbar');
		// $this->load->view('KepalaPerpustakaan/Layouts/aside');
		// $this->load->view('KepalaPerpustakaan/LaporanBuku/harian', $data);
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
		$pdf->Cell(190, 10, 'LAPORAN BUKU PERPUSTAKAAN', 0, 1, 'C');
		$pdf->SetFont('Times', '', 10);

		$pdf->Cell(10, 10, '', 0, 1);
		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(35, 7, 'Nomor ISBN', 1, 0, 'C');
		$pdf->Cell(90, 7, 'Judul', 1, 0, 'C');
		$pdf->Cell(40, 7, 'Pengarang', 1, 0, 'C');
		$pdf->Cell(30, 7, 'Penerbit', 1, 1, 'C');

		$pdf->SetFont('Times', '', 9);

		foreach ($laporan as $key => $value) {
			$pdf->Cell(35, 7, $value->no_isbn, 1, 0, 'C');
			$pdf->Cell(90, 7, $value->judul, 1, 0);
			$pdf->Cell(40, 7, $value->pengarang, 1, 0, 'C');
			$pdf->Cell(30, 7, $value->penerbit, 1, 1, 'C');
		}


		$pdf->Output();
	}

	public function lap_bulanan()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$id_kategori = $this->input->post('kategori');
		$laporan = $this->mLaporan->buku_bulanan($bulan, $tahun, $id_kategori);


		// $data = array(
		// 	'title' => 'Laporan Buku Masuk Bulanan',
		// 	'bulan' => $bulan,
		// 	'tahun' => $tahun,
		// 	'laporan' => $this->mLaporan->buku_bulanan($bulan, $tahun, $id_kategori),
		// );
		// $this->load->view('KepalaPerpustakaan/Layouts/head');
		// $this->load->view('KepalaPerpustakaan/Layouts/navbar');
		// $this->load->view('KepalaPerpustakaan/Layouts/aside');
		// $this->load->view('KepalaPerpustakaan/LaporanBuku/bulanan', $data);
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
		$pdf->Cell(190, 10, 'LAPORAN BUKU PERPUSTAKAAN', 0, 1, 'C');
		$pdf->SetFont('Times', '', 10);

		$pdf->Cell(10, 10, '', 0, 1);
		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(35, 7, 'Nomor ISBN', 1, 0, 'C');
		$pdf->Cell(90, 7, 'Judul', 1, 0, 'C');
		$pdf->Cell(40, 7, 'Pengarang', 1, 0, 'C');
		$pdf->Cell(30, 7, 'Penerbit', 1, 1, 'C');

		$pdf->SetFont('Times', '', 9);

		foreach ($laporan as $key => $value) {
			$pdf->Cell(35, 7, $value->no_isbn, 1, 0, 'C');
			$pdf->Cell(90, 7, $value->judul, 1, 0);
			$pdf->Cell(40, 7, $value->pengarang, 1, 0, 'C');
			$pdf->Cell(30, 7, $value->penerbit, 1, 1, 'C');
		}


		$pdf->Output();
	}

	public function lap_tahunan()
	{
		$tahun = $this->input->post('tahun');
		$id_kategori = $this->input->post('kategori');
		$laporan = $this->mLaporan->buku_tahunan($tahun, $id_kategori);


		// $data = array(
		// 	'title' => 'Laporan Buku Masuk Tahunan',
		// 	'tahun' => $tahun,
		// 	'laporan' => $this->mLaporan->buku_tahunan($tahun, $id_kategori),
		// );
		// $this->load->view('KepalaPerpustakaan/Layouts/head');
		// $this->load->view('KepalaPerpustakaan/Layouts/navbar');
		// $this->load->view('KepalaPerpustakaan/Layouts/aside');
		// $this->load->view('KepalaPerpustakaan/LaporanBuku/tahunan', $data);
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
		$pdf->Cell(190, 10, 'LAPORAN BUKU PERPUSTAKAAN', 0, 1, 'C');
		$pdf->SetFont('Times', '', 10);

		$pdf->Cell(10, 10, '', 0, 1);
		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(35, 7, 'Nomor ISBN', 1, 0, 'C');
		$pdf->Cell(90, 7, 'Judul', 1, 0, 'C');
		$pdf->Cell(40, 7, 'Pengarang', 1, 0, 'C');
		$pdf->Cell(30, 7, 'Penerbit', 1, 1, 'C');

		$pdf->SetFont('Times', '', 9);

		foreach ($laporan as $key => $value) {
			$pdf->Cell(35, 7, $value->no_isbn, 1, 0, 'C');
			$pdf->Cell(90, 7, $value->judul, 1, 0);
			$pdf->Cell(40, 7, $value->pengarang, 1, 0, 'C');
			$pdf->Cell(30, 7, $value->penerbit, 1, 1, 'C');
		}


		$pdf->Output();
	}
}

/* End of file cLaporanBuku.php */
