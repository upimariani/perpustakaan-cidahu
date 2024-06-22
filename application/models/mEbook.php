<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mEbook extends CI_Model
{
	public function login_siswa($nama, $nis)
	{
		$this->db->select('*');
		$this->db->from('anggota');
		$this->db->where(array(
			'nama_anggota' => $nama,
			'nis' => $nis
		));
		return $this->db->get()->row();
	}
	public function jml()
	{

		$data['buku'] = $this->db->query("SELECT COUNT(id_buku) as jml_buku FROM `buku`;")->row();
		$data['peminjam'] = $this->db->query("SELECT COUNT(id_pinjam) as jml_pinjam FROM `peminjaman`;")->row();
		$data['anggota'] = $this->db->query("SELECT COUNT(id_anggota) as jml_anggota FROM `anggota`")->row();
		$data['kategori'] = $this->db->query("SELECT COUNT(id_kategori) as jml_kategori FROM `kategori_buku`;")->row();
		return $data;
	}
	public function ebook()
	{
		$this->db->select('*');
		$this->db->from('buku');
		$this->db->join('kategori_buku', 'buku.id_kategori = kategori_buku.id_kategori', 'left');
		$this->db->where('sinopsis !=', NULL);
		return $this->db->get()->result();
	}
	public function detailebook($id)
	{
		$this->db->select('*');
		$this->db->from('buku');
		$this->db->join('kategori_buku', 'buku.id_kategori = kategori_buku.id_kategori', 'left');
		$this->db->where('id_buku', $id);
		return $this->db->get()->row();
	}

	//menampilkan history ebook
	public function histori()
	{
		$this->db->select('*');
		$this->db->from('history_ebook');
		$this->db->join('anggota', 'history_ebook.id_anggota = anggota.id_anggota', 'left');
		$this->db->join('buku', 'buku.id_buku = history_ebook.id_buku', 'left');
		$this->db->order_by('time', 'desc');

		return $this->db->get()->result();
	}
}

/* End of file mEbook.php */
