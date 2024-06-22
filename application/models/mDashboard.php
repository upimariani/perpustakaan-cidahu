<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mDashboard extends CI_Model
{
	public function jml()
	{
		$data['buku'] = $this->db->query("SELECT COUNT(judul) as jml_buku FROM `buku`")->row();
		$data['kategori'] = $this->db->query("SELECT COUNT(nama_kategori) as jml_kategori FROM `kategori_buku`")->row();
		$data['peminjam'] = $this->db->query("SELECT COUNT(tgl_pinjam) as jml_peminjam FROM `peminjaman` WHERE stat_pinjam_all='0'")->row();
		$data['anggota'] = $this->db->query("SELECT COUNT(nama_anggota) as jml_anggota FROM `anggota`")->row();
		return $data;
	}
	public function buku()
	{
		$this->db->select('*');
		$this->db->from('buku');
		$this->db->join('kategori_buku', 'buku.id_kategori = kategori_buku.id_kategori', 'left');
		return $this->db->get()->result();
	}
}

/* End of file mDashboard.php */
