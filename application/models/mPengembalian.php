<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mPengembalian extends CI_Model
{
	public function insert($data)
	{
		$this->db->insert('pengembalian', $data);
	}

	//update status pinjam
	public function status_pinjam($id, $data)
	{
		$this->db->where('id_detail', $id);
		$this->db->update('detail_peminjaman', $data);
	}

	public function update_buku($id, $data)
	{
		$this->db->where('id_buku', $id);
		$this->db->update('buku', $data);
	}

	public function stat_pinjam_all($id, $data)
	{
		$this->db->where('id_pinjam', $id);
		$this->db->update('peminjaman', $data);
	}

	//menghitung jumlah buku yang belum dikembalikan
	public function book_back($id)
	{
		return $this->db->query("SELECT COUNT(stat_pinjam) as jml, detail_peminjaman.id_pinjam FROM `peminjaman` JOIN detail_peminjaman ON peminjaman.id_pinjam=detail_peminjaman.id_pinjam WHERE peminjaman.id_pinjam='" . $id . "' AND stat_pinjam = '0'")->row();
	}

	//tampil status buku
	public function status_buku($id)
	{
		$this->db->select('*');
		$this->db->from('detail_peminjaman');
		$this->db->join('buku', 'buku.id_buku = detail_peminjaman.id_buku', 'left');
		$this->db->where('detail_peminjaman.id_detail', $id);
		return $this->db->get()->row();
	}

	public function select()
	{
		$this->db->select('*');
		$this->db->from('pengembalian');
		$this->db->join('detail_peminjaman', 'detail_peminjaman.id_detail = pengembalian.id_detail', 'left');
		$this->db->join('peminjaman', 'peminjaman.id_pinjam = detail_peminjaman.id_pinjam', 'left');
		$this->db->join('user', 'user.id_user = peminjaman.id_user', 'left');
		$this->db->join('anggota', 'anggota.id_anggota = peminjaman.id_anggota', 'left');
		return $this->db->get()->result();
	}


	//delete-------------------
	public function update_detail($id, $data)
	{
		//id = id_detail
		$this->db->where('id_detail', $id);
		$this->db->update('detail_peminjaman', $data);
	}
	public function hapus_pengembalian($id)
	{
		$this->db->where('id_detail', $id);
		$this->db->delete('pengembalian');
	}
	public function buku_pengembalian($id)
	{
		return $this->db->query("SELECT * FROM `pengembalian` JOIN detail_peminjaman ON pengembalian.id_detail=detail_peminjaman.id_detail JOIN buku ON buku.id_buku=detail_peminjaman.id_buku WHERE pengembalian.id_detail='" . $id . "'")->row();
	}
	public function jml_buku_delete($id, $data)
	{
		$this->db->where('id_buku', $id);
		$this->db->update('buku', $data);
	}
}

/* End of file mPengembalian.php */
