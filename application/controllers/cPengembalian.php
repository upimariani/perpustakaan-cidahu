<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cPengembalian extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mPengembalian');
		$this->load->model('mPeminjaman');
	}


	public function index()
	{
		$this->protect->protect();
		$data = array(
			'kembali' => $this->mPengembalian->select()
		);
		$this->load->view('Layouts/head');
		$this->load->view('Layouts/navbar');
		$this->load->view('Layouts/aside');
		$this->load->view('pengembalian/kembali', $data);
		$this->load->view('Layouts/footer');
	}
	public function kembali($id)
	{
		$data = array(
			'id_detail' => $id,
			'tgl_kembali' => date('Y-m-d'),
			'denda' => $this->input->post('denda')
		);
		$this->mPengembalian->insert($data);

		$detail_peminjaman = array(
			'stat_pinjam' => '1'
		);
		$this->mPengembalian->status_pinjam($id, $detail_peminjaman);


		// //cek status buku
		$buku = $this->mPengembalian->status_buku($id);
		$jml_bk_sebelumnya = $buku->sisa_buku;
		$jml_bk_pinjam = $buku->jml;
		$jml_kembali = $jml_bk_sebelumnya + $jml_bk_pinjam;
		$data_jml = array(
			'sisa_buku' => $jml_kembali
		);
		$this->mPengembalian->update_buku($buku->id_buku, $data_jml);


		if ($buku->sisa_buku == '0') {
			$data_status = array(
				'status' => '0'
			);
			$this->mPengembalian->update_buku($buku->id_buku, $data_status);
		}


		$status_pinjam_all = $this->mPengembalian->book_back($buku->id_pinjam);
		if ($status_pinjam_all->jml == '0') {
			$stat_all = array(
				'stat_pinjam_all' => '1'
			);
			$this->mPengembalian->stat_pinjam_all($buku->id_pinjam, $stat_all);
			// echo $buku->id_pinjam;
		}




		// $peminjaman = $this->mPeminjaman->detail_peminjaman($id);
		// foreach ($peminjaman['buku'] as $key => $value) {
		// 	$jml_kembali = $value->sisa_buku + $value->jml;
		// 	if ($value->status == '0') {
		// 		$status = array(
		// 			'status' => '0',
		// 			'sisa_buku' => $jml_kembali
		// 		);
		// 	} else {
		// 		$status = array(
		// 			'sisa_buku' => $jml_kembali
		// 		);
		// 	}
		// 	$this->mPeminjaman->update_status($value->id_buku, $status);
		// }



		// $status_pinjam = array(
		// 	'stat_pinjam' => '1'
		// );
		// $this->mPengembalian->status_pinjam($id, $status_pinjam);



		$this->session->set_flashdata('success', 'Buku Telah Berhasil Dikembalikan! ');
		redirect('cPengembalian');
	}
	public function delete($id, $id_pinjam)
	{
		//mengembalikan jml pinjam buku
		$buku_pengembalian = $this->mPengembalian->buku_pengembalian($id);
		// echo $buku_pengembalian->id_pinjam;
		$jml_pinjam = $buku_pengembalian->jml;
		$jml_sisa = $buku_pengembalian->sisa_buku;
		$jml_kembali = $jml_sisa - $jml_pinjam;


		$jumlah = array(
			'sisa_buku' => $jml_kembali
		);
		if ($jml_kembali == '0') {
			$jumlah['status'] = '1';
		}
		$this->mPengembalian->jml_buku_delete($buku_pengembalian->id_buku, $jumlah);

		//id = id_detail
		//update status detail pinjam
		$status_detail = array(
			'stat_pinjam' => '0'
		);
		$this->mPengembalian->update_detail($id, $status_detail);

		//hapus data di tabel pengembalian
		$this->mPengembalian->hapus_pengembalian($id);


		$status_pinjam_all = array(
			'stat_pinjam_all' => '0'
		);
		$this->mPengembalian->stat_pinjam_all($id_pinjam, $status_pinjam_all);
		// $this->db->where('id_pinjam', $id_pinjam);
		$this->db->update('peminjaman', $status_pinjam_all);
		redirect('cPengembalian');
	}
}

/* End of file cPengembalian.php */
