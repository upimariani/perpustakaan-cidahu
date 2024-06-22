<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLearning extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mEbook');
	}

	public function index()
	{
		$this->load->view('Ebook/vLoginSiswa');
	}
	public function login_siswa()
	{
		$nama = $this->input->post('nama');
		$nis = $this->input->post('nis');
		$cek = $this->mEbook->login_siswa($nama, $nis);
		if ($cek) {
			$id = $cek->id_anggota;

			$array = array(
				'id' => $id
			);
			$this->session->set_userdata($array);
			redirect('clearning/halaman_utama');
		} else {
			$this->session->set_flashdata('error', 'Nama Anggota dan Kelas Tidak Terdaftar!!!');
			redirect('clearning');
		}
	}
	public function halaman_utama()
	{
		$data = array(
			'jml' => $this->mEbook->jml(),
			'ebook' => $this->mEbook->ebook()
		);
		$this->load->view('Ebook/Layouts/head', $data);
		$this->load->view('Ebook/vbook', $data);
		$this->load->view('Ebook/Layouts/footer');
	}
	public function detailebook($id)
	{
		$histori = array(
			'id_anggota' => $this->session->userdata('id'),
			'id_buku' => $id
		);
		$this->db->insert('history_ebook', $histori);

		$data = array(
			'jml' => $this->mEbook->jml(),
			'ebook' => $this->mEbook->detailebook($id)
		);
		$this->load->view('Ebook/Layouts/head', $data);
		$this->load->view('Ebook/vdetailebook', $data);
		$this->load->view('Ebook/Layouts/footer');
	}
	public function logout()
	{
		$this->session->set_flashdata('success', 'Berhasil Logout!!!');
		$this->session->unset_userdata('id');
		redirect('clearning');
	}
}

/* End of file cLearning.php */
