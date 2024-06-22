<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mAnggota extends CI_Model
{
	public function insert($data)
	{
		$this->db->insert('anggota', $data);
	}
	public function select()
	{
		$this->db->select('*');
		$this->db->from('anggota');
		return $this->db->get()->result();
	}
	public function edit($id)
	{
		$this->db->select('*');
		$this->db->from('anggota');
		$this->db->where('id_anggota', $id);
		return $this->db->get()->row();
	}
	public function update($id, $data)
	{
		$this->db->where('id_anggota', $id);
		$this->db->update('anggota', $data);
	}
	public function delete($id)
	{
		$this->db->where('id_anggota', $id);
		$this->db->delete('anggota');
	}
}

/* End of file mAnggota.php */
