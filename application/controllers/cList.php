<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cList extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mDashboard');
		$this->load->model('mEbook');
	}
	public function index()
	{
		$data = array(
			'buku' => $this->mDashboard->buku()
		);
		$this->load->view('vList', $data);
	}
	public function perkategori()
	{
		$kategori = $this->input->post('kategori');
		$kelas = $this->input->post('kelas');

		if ($kategori == 'all_kategori') {
			$search = $this->db->query("SELECT * FROM `buku` WHERE kelas='" . $kelas . "';")->result();
		} else if ($kelas == 'all_kelas') {
			$search = $this->db->query("SELECT * FROM `buku` WHERE id_kategori='" . $kategori . "';")->result();
		} else {
			$search = $this->db->query("SELECT * FROM `buku` WHERE id_kategori='" . $kategori . "' AND kelas='" . $kelas . "';")->result();
		}

		$data = array(
			'buku' => $search,
			'jml' => $this->mEbook->jml()
		);
		$this->load->view('Ebook/Layouts/head', $data);
		$this->load->view('Ebook/vperKategori', $data);
		$this->load->view('Ebook/Layouts/footer');
	}
}

/* End of file cList.php */
