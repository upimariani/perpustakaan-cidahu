<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mDataMaster extends CI_Model
{
	//data admin
	public function select_admin()
	{
		$this->db->select('*');
		$this->db->from('user');
		return $this->db->get()->result();
	}
	public function insert_admin($data)
	{
		$this->db->insert('user', $data);
	}
	public function edit_admin($id)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id_user', $id);
		return $this->db->get()->row();
	}
	public function update_admin($id, $data)
	{
		$this->db->where('id_user', $id);
		$this->db->update('user', $data);
	}
	public function delete_admin($id)
	{
		$this->db->where('id_user', $id);
		$this->db->delete('user');
	}

	//data kategori

	public function select_kategori()
	{
		$this->db->select('*');
		$this->db->from('kategori_buku');
		return $this->db->get()->result();
	}
	public function insert_kategori($data)
	{
		$this->db->insert('kategori_buku', $data);
	}
	public function edit_kategori($id)
	{
		$this->db->select('*');
		$this->db->from('kategori_buku');
		$this->db->where('id_kategori', $id);
		return $this->db->get()->row();
	}
	public function update_kategori($id, $data)
	{
		$this->db->where('id_kategori', $id);
		$this->db->update('kategori_buku', $data);
	}
	public function delete_kategori($id)
	{
		$this->db->where('id_kategori', $id);
		$this->db->delete('kategori_buku');
	}

	//kelola data buku
	public function select_buku()
	{
		$this->db->select('*');
		$this->db->from('buku');
		$this->db->join('kategori_buku', 'buku.id_kategori = kategori_buku.id_kategori', 'left');
		return $this->db->get()->result();
	}
	public function insert_buku($data)
	{
		$this->db->insert('buku', $data);
	}
	public function edit_buku($id)
	{
		$this->db->select('*');
		$this->db->from('buku');
		$this->db->where('id_buku', $id);
		return $this->db->get()->row();
	}
	public function update_buku($id, $data)
	{
		$this->db->where('id_buku', $id);
		$this->db->update('buku', $data);
	}
	public function delete_buku($id)
	{
		$this->db->where('id_buku', $id);
		$this->db->delete('buku');
	}
}

/* End of file mDataMaster.php */
