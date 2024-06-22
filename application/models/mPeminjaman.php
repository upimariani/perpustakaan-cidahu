<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mPeminjaman extends CI_Model
{
	public function cek_peminjaman($id)
	{
		return $this->db->query("SELECT SUM(jml) as jml_peminjaman, anggota.id_anggota FROM `detail_peminjaman` JOIN peminjaman ON peminjaman.id_pinjam=detail_peminjaman.id_pinjam JOIN anggota ON peminjaman.id_anggota=anggota.id_anggota WHERE stat_pinjam_all = 0 AND anggota.id_anggota='" . $id . "'")->row();
	}
	public function select_pinjam()
	{
		$this->db->select('*');
		$this->db->from('peminjaman');
		$this->db->join('user', 'user.id_user = peminjaman.id_user', 'left');
		$this->db->join('anggota', 'anggota.id_anggota = peminjaman.id_anggota', 'left');
		$this->db->where('stat_pinjam_all=0');
		return $this->db->get()->result();
	}
	public function detail_peminjaman($id)
	{
		$data['peminjam'] = $this->db->query("SELECT * FROM `peminjaman` JOIN anggota ON peminjaman.id_anggota=anggota.id_anggota WHERE id_pinjam='" . $id . "'")->row();
		$data['buku'] = $this->db->query("SELECT * FROM detail_peminjaman JOIN peminjaman ON peminjaman.id_pinjam=detail_peminjaman.id_pinjam JOIN buku ON detail_peminjaman.id_buku=buku.id_buku JOIN kategori_buku ON buku.id_kategori=kategori_buku.id_kategori WHERE peminjaman.id_pinjam='" . $id . "'")->result();
		return $data;
	}
	public function select_buku()
	{
		$this->db->select('*');
		$this->db->from('buku');
		$this->db->join('kategori_buku', 'buku.id_kategori = kategori_buku.id_kategori', 'left');
		$this->db->where('status!=1');
		return $this->db->get()->result();
	}
	public function insert_pinjam($data)
	{
		$this->db->insert('peminjaman', $data);
	}
	//update status buku
	public function update_status($id, $data)
	{
		$this->db->where('id_buku', $id);
		$this->db->update('buku', $data);
	}

	//edit peminjaman
	public function edit($id)
	{
		$this->db->select('*');
		$this->db->from('peminjaman');
		$this->db->join('buku', 'peminjaman.id_buku = buku.id_buku', 'left');

		$this->db->where('id_pinjam', $id);
		return $this->db->get()->row();
	}
	public function buku()
	{
		$this->db->select('*');
		$this->db->from('buku');
		$this->db->join('kategori_buku', 'buku.id_kategori = kategori_buku.id_kategori', 'left');
		return $this->db->get()->result();
	}
	public function update($id, $data)
	{
		$this->db->where('id_pinjam', $id);
		$this->db->update('peminjaman', $data);
	}

	// //menampilkan buku yang dipinjam
	// public function buku_pinjam($id)
	// {
	// 	return $this->db->query("SELECT * FROM `peminjaman` JOIN detail_peminjaman ON peminjaman.id_pinjam=detail_peminjaman.id_pinjam JOIN buku ON detail_peminjaman.id_buku=buku.id_buku WHERE peminjaman.id_pinjam='" . $id . "'")->result();
	// }
	//delete peminjaman
	public function delete($id)
	{
		$this->db->where('id_pinjam', $id);
		$this->db->delete('peminjaman');
	}
	// //delete detail_peminjaman
	// public function delete_detail($id)
	// {
	// 	$this->db->where('id_pinjam', $id);
	// 	$this->db->delete('detail_peminjaman');
	// }
}

/* End of file mPeminjaman.php */
