<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cAnggota extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mAnggota');
	}


	public function index()
	{
		$this->protect->protect();
		$data = array(
			'anggota' => $this->mAnggota->select()
		);
		$this->load->view('Layouts/head');
		$this->load->view('Layouts/navbar');
		$this->load->view('Layouts/aside');
		$this->load->view('anggota/anggota', $data);
		$this->load->view('Layouts/footer');
	}
	public function create()
	{
		$this->form_validation->set_rules('fieldname', 'fieldlabel', 'trim|required|min_length[5]|max_length[12]');

		$this->form_validation->set_rules('nama', 'Nama Anggota', 'required|alpha');
		$this->form_validation->set_rules('kelas', 'Kelas Anggota', 'required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('nis', 'NIS', 'required|min_length[7]|max_length[7]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('Layouts/head');
			$this->load->view('Layouts/navbar');
			$this->load->view('Layouts/aside');
			$this->load->view('anggota/create');
			$this->load->view('Layouts/footer');
		} else {
			$data = array(
				'nis' => $this->input->post('nis'),
				'nama_anggota' => $this->input->post('nama'),
				'kelas' => $this->input->post('kelas'),
				'jk' => $this->input->post('jk'),
			);
			$this->mAnggota->insert($data);
			$this->session->set_flashdata('success', 'Data Anggota Berhasil Ditambahkan!');
			redirect('cAnggota');
		}
	}
	public function edit($id)
	{
		$this->form_validation->set_rules('nama', 'Nama Anggota', 'required');
		$this->form_validation->set_rules('kelas', 'Kelas Anggota', 'required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('nis', 'NIS', 'required');


		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'anggota' => $this->mAnggota->edit($id)
			);
			$this->load->view('Layouts/head');
			$this->load->view('Layouts/navbar');
			$this->load->view('Layouts/aside');
			$this->load->view('anggota/update', $data);
			$this->load->view('Layouts/footer');
		} else {
			$data = array(
				'nis' => $this->input->post('nis'),
				'nama_anggota' => $this->input->post('nama'),
				'kelas' => $this->input->post('kelas'),
				'jk' => $this->input->post('jk'),
			);
			$this->mAnggota->update($id, $data);
			$this->session->set_flashdata('success', 'Data Anggota Berhasil Diperbaharui!');
			redirect('cAnggota');
		}
	}
	public function delete($id)
	{
		$this->mAnggota->delete($id);
		$this->session->set_flashdata('success', 'Data Anggota Berhasil Dihapus!');
		redirect('cAnggota');
	}
	public function cetak()
	{

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
		$pdf->Cell(190, 10, 'LAPORAN ANGGOTA PERPUSTAKAAN', 0, 1, 'C');
		$pdf->SetFont('Times', '', 10);


		$pdf->Cell(10, 10, '', 0, 1);
		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(35, 7, 'Nomor Induk', 1, 0, 'C');
		$pdf->Cell(130, 7, 'Nama Anggota', 1, 0, 'C');
		$pdf->Cell(10, 7, 'Kelas', 1, 0, 'C');
		$pdf->Cell(10, 7, 'JK', 1, 1, 'C');

		$pdf->SetFont('Times', '', 9);

		$dt_anggota = $this->db->query("SELECT * FROM `anggota`")->result();
		foreach ($dt_anggota as $key => $value) {
			$pdf->Cell(35, 7, $value->nis, 1, 0, 'C');
			$pdf->Cell(130, 7, $value->nama_anggota, 1, 0);
			$pdf->Cell(10, 7, $value->kelas, 1, 0, 'C');
			$pdf->Cell(10, 7, $value->jk, 1, 1, 'C');
		}

		$pdf->Cell(10, 20, '', 0, 1);
		$pdf->Cell(95, 7, 'Mengetahui,', 0, 0, 'C');
		$pdf->Cell(95, 7, 'Cidahu, ' . date('j F Y'), 0, 1, 'C');
		$pdf->Cell(95, 7, 'Kepala Perpustakaan', 0, 0, 'C');
		$pdf->Cell(95, 7, 'Admin Perpustakaan', 0, 1, 'C');
		$pdf->Cell(95, 10, '', 0, 1, 'C');

		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(95, 7, '(......................)', 0, 0, 'C');
		$pdf->Cell(95, 7, '(......................)', 0, 0, 'C');

		$pdf->Output();
	}
	public function cetak_kartu()
	{
		$id_anggota = $this->input->post('id_anggota');

		require('asset/fpdf/fpdf.php');

		// intance object dan memberikan pengaturan halaman PDF
		$pdf = new FPDF('L', 'mm', array(150, 100));
		$pdf->AddPage();


		$pdf->SetFont('Times', 'B', 14);
		$pdf->Image('asset/smp.png', 10, 3, 20);
		$pdf->Cell(150, 5, 'SMP NEGERI 2 CIDAHU', 0, 1, 'C');
		$pdf->SetFont('Times', '', 10);
		$pdf->Cell(150, 10, 'Jln. Raya Cikeusik Cidahu, Kec. Cidahu Kab. Kuningan, Jawa Barat', 0, 0, 'C');

		$pdf->SetLineWidth(1);
		$pdf->Line(10, 33, 140, 33);
		$pdf->SetLineWidth(0);
		$pdf->Line(10, 32, 140, 32);
		$pdf->Cell(3, 23, '', 0, 1);

		$dt = $this->db->query("SELECT * FROM `anggota` WHERE id_anggota='" . $id_anggota . "'")->result();

		$pdf->SetFont('Times', 'B', 10);
		$pdf->Cell(130, 5, 'KARTU ANGGOTA PERPUSTAKAAN', 0, 1, 'C');
		$pdf->SetFont('Times', '', 10);

		foreach ($dt as $key => $value) {
			if ($value->jk == '1') {
				$jk = 'Perempuan';
			} else {
				$jk = 'Laki - Laki';
			}

			$pdf->Cell(3, 3, '', 0, 1);
			$pdf->SetFont('Times', 'B', 7);
			$pdf->Cell(60, 4, 'Nama:', 0, 0, 'R');
			$pdf->SetFont('Times', '', 7);
			$pdf->Cell(50, 4, $value->nama_anggota, 0, 1, 'L');


			$pdf->SetFont('Times', 'B', 7);
			$pdf->Cell(60, 4, 'NIS:', 0, 0, 'R');
			$pdf->SetFont('Times', '', 7);
			$pdf->Cell(50, 4, $value->nis, 0, 1, 'L');

			$pdf->SetFont('Times', 'B', 7);
			$pdf->Cell(60, 4, 'Jenis Kelamin:', 0, 0, 'R');
			$pdf->SetFont('Times', '', 7);
			$pdf->Cell(50, 4, $jk, 0, 1, 'L');

			$pdf->SetFont('Times', 'B', 7);
			$pdf->Cell(60, 4, 'Kelas:', 0, 0, 'R');
			$pdf->SetFont('Times', '', 7);
			$pdf->Cell(50, 4, $value->kelas, 0, 1, 'L');

			$pdf->SetFont('Times', '', 7);
		}

		$pdf->Cell(3, 3, '', 0, 1);
		$pdf->Cell(45, 3, 'Mengetahui,', 0, 0, 'C');
		$pdf->Cell(130, 3, 'Cidahu, ' . date('j F Y'), 0, 1, 'C');
		$pdf->Cell(45, 3, 'Kepala Perpustakaan', 0, 0, 'C');
		$pdf->Cell(130, 3, 'Admin Perpustakaan', 0, 1, 'C');
		$pdf->Cell(3, 3, '', 0, 1, 'C');

		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(45, 5, '(......................)', 0, 0, 'C');
		$pdf->Cell(130, 5, '(......................)', 0, 0, 'C');

		$pdf->Output();
	}
}

/* End of file cAnggota.php */
