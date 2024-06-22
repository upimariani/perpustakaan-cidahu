<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cKelolaDataMaster extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mDataMaster');
	}

	//kelola data admin
	public function admin()
	{
		$this->protect->protect();
		$data = array(
			'admin' => $this->mDataMaster->select_admin()
		);
		$this->load->view('Layouts/head');
		$this->load->view('Layouts/navbar');
		$this->load->view('Layouts/aside');
		$this->load->view('admin/admin', $data);
		$this->load->view('Layouts/footer');
	}
	public function create_admin()
	{
		$this->protect->protect();
		$this->load->view('Layouts/head');
		$this->load->view('Layouts/navbar');
		$this->load->view('Layouts/aside');
		$this->load->view('admin/create');
		$this->load->view('Layouts/footer');
	}
	public function pcreate_admin()
	{
		$this->protect->protect();
		$data = array(
			'nama_user' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'no_hp' => $this->input->post('no_hp'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'role' => $this->input->post('level')
		);
		$this->mDataMaster->insert_admin($data);
		$this->session->set_flashdata('success', 'Data Admin Berhasil Ditambahkan!');
		redirect('cKelolaDataMaster/admin');
	}
	public function edit_admin($id)
	{
		$this->protect->protect();
		$data = array(
			'admin' => $this->mDataMaster->edit_admin($id)
		);
		$this->load->view('Layouts/head');
		$this->load->view('Layouts/navbar');
		$this->load->view('Layouts/aside');
		$this->load->view('admin/update', $data);
		$this->load->view('Layouts/footer');
	}
	public function update_admin($id)
	{
		$this->protect->protect();
		$data = array(
			'nama_user' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'no_hp' => $this->input->post('no_hp'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'role' => $this->input->post('level')
		);
		$this->mDataMaster->update_admin($id, $data);
		$this->session->set_flashdata('success', 'Data Admin Berhasil Diperbaharui!');
		redirect('cKelolaDataMaster/admin');
	}
	public function delete_admin($id)
	{
		$this->mDataMaster->delete_admin($id);
		$this->session->set_flashdata('success', 'Data Admin Berhasil Dihapus!');
		redirect('cKelolaDataMaster/admin');
	}

	//kelola data kategori
	public function kategori()
	{
		$this->protect->protect();
		$data = array(
			'kategori' => $this->mDataMaster->select_kategori()
		);
		$this->load->view('Layouts/head');
		$this->load->view('Layouts/navbar');
		$this->load->view('Layouts/aside');
		$this->load->view('kategori/kategori', $data);
		$this->load->view('Layouts/footer');
	}
	public function create_kategori()
	{
		$this->protect->protect();
		$this->load->view('Layouts/head');
		$this->load->view('Layouts/navbar');
		$this->load->view('Layouts/aside');
		$this->load->view('kategori/create');
		$this->load->view('Layouts/footer');
	}
	public function pcreate_kategori()
	{
		$this->protect->protect();
		$data = array(
			'nama_kategori' => $this->input->post('kategori'),
			'no_rak' => $this->input->post('rak')
		);
		$this->mDataMaster->insert_kategori($data);
		$this->session->set_flashdata('success', 'Data Kategori Berhasil Ditambahkan!');
		redirect('cKelolaDataMaster/kategori');
	}
	public function edit_kategori($id)
	{
		$this->protect->protect();
		$data = array(
			'kategori' => $this->mDataMaster->edit_kategori($id)
		);
		$this->load->view('Layouts/head');
		$this->load->view('Layouts/navbar');
		$this->load->view('Layouts/aside');
		$this->load->view('kategori/update', $data);
		$this->load->view('Layouts/footer');
	}
	public function update_kategori($id)
	{
		$data = array(
			'nama_kategori' => $this->input->post('kategori'),
			'no_rak' => $this->input->post('rak')
		);
		$this->mDataMaster->update_kategori($id, $data);
		$this->session->set_flashdata('success', 'Data Kategori Berhasil Diperbaharui!');
		redirect('cKelolaDataMaster/kategori');
	}
	public function delete_kategori($id)
	{
		$this->mDataMaster->delete_kategori($id);
		$this->session->set_flashdata('success', 'Data Kategori Berhasil Dihapus!');
		redirect('cKelolaDataMaster/kategori');
	}





	//buku

	public function buku()
	{
		$this->protect->protect();
		$data = array(
			'buku' => $this->mDataMaster->select_buku()
		);
		$this->load->view('Layouts/head');
		$this->load->view('Layouts/navbar');
		$this->load->view('Layouts/aside');
		$this->load->view('buku/buku', $data);
		$this->load->view('Layouts/footer');
	}
	public function create_buku()
	{
		$this->protect->protect();
		$data = array(
			'kategori' => $this->mDataMaster->select_kategori()
		);
		$this->load->view('Layouts/head');
		$this->load->view('Layouts/navbar');
		$this->load->view('Layouts/aside');
		$this->load->view('buku/create', $data);
		$this->load->view('Layouts/footer');
	}
	public function pcreate_buku()
	{
		$this->protect->protect();
		$config['upload_path']          = './asset/sampul';
		$config['allowed_types']        = 'jpg|jpeg|png|gif';
		$config['max_size']             = 5000;

		$this->load->library('upload', $config);
		$this->upload->do_upload('sampul');
		$upload_data = $this->upload->data();
		$data = array(
			'id_kategori' => $this->input->post('kategori'),
			'sampul' => $upload_data['file_name'],
			'judul'  => $this->input->post('judul'),
			'pengarang'  => $this->input->post('pengarang'),
			'tahun'  => $this->input->post('tahun'),
			'penerbit'  => $this->input->post('penerbit'),
			'no_isbn' => $this->input->post('isbn'),
			'jml_buku' => $this->input->post('jml'),
			'sisa_buku' => $this->input->post('jml'),
			'kelas' => $this->input->post('kelas')
		);
		$this->mDataMaster->insert_buku($data);
		$this->session->set_flashdata('success', 'Data Buku Berhasil Ditambahkan!');
		redirect('cKelolaDataMaster/buku');
	}
	public function edit_buku($id)
	{
		$data = array(
			'buku' => $this->mDataMaster->edit_buku($id),
			'kategori' => $this->mDataMaster->select_kategori()
		);
		$this->load->view('Layouts/head');
		$this->load->view('Layouts/navbar');
		$this->load->view('Layouts/aside');
		$this->load->view('buku/update', $data);
		$this->load->view('Layouts/footer');
	}
	public function update_buku($id)
	{

		$config['upload_path']          = './asset/sampul';
		$config['allowed_types']        = 'jpg|jpeg|png|gif';
		$config['max_size']             = 5000;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('sampul')) {
			$data = array(
				'buku' => $this->mDataMaster->edit_buku($id),
				'kategori' => $this->mDataMaster->select_kategori()
			);
			$this->load->view('Layouts/head');
			$this->load->view('Layouts/navbar');
			$this->load->view('Layouts/aside');
			$this->load->view('buku/update', $data);
			$this->load->view('Layouts/footer');
		} else {

			$upload_data =  $this->upload->data();
			$data = array(
				'id_kategori' => $this->input->post('kategori'),
				'judul'  => $this->input->post('judul'),
				'pengarang'  => $this->input->post('pengarang'),
				'tahun'  => $this->input->post('tahun'),
				'penerbit'  => $this->input->post('penerbit'),
				'no_isbn' => $this->input->post('isbn'),
				'jml_buku' => $this->input->post('jml'),
				'sisa_buku' => $this->input->post('jml'),
				'sampul' => $upload_data['file_name'],
				'kelas' => $this->input->post('kelas')

			);
			$this->mDataMaster->update_buku($id, $data);
			$this->session->set_flashdata('success', 'Data Buku Berhasil Diperbaharui!');
			redirect('cKelolaDataMaster/buku');
		} //tanpa ganti gambar
		$data = array(
			'id_kategori' => $this->input->post('kategori'),
			'judul'  => $this->input->post('judul'),
			'pengarang'  => $this->input->post('pengarang'),
			'tahun'  => $this->input->post('tahun'),
			'penerbit'  => $this->input->post('penerbit'),
			'no_isbn' => $this->input->post('isbn'),
			'jml_buku' => $this->input->post('jml'),
			'sisa_buku' => $this->input->post('jml'),
			'kelas' => $this->input->post('kelas')
		);
		$this->mDataMaster->update_buku($id, $data);
		$this->session->set_flashdata('success', 'Data Buku Berhasil Diperbaharui!');
		redirect('cKelolaDataMaster/buku');
	}

	public function elearning($id)
	{
		$this->protect->protect();
		$config['upload_path']          = './asset/elearning';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 200000;

		$this->load->library('upload', $config);
		$this->upload->do_upload('elearning');
		$upload_data = $this->upload->data();
		$data = array(
			'sinopsis' => $this->input->post('sinopsis'),
			'file' => $upload_data['file_name']
		);
		$this->mDataMaster->update_buku($id, $data);
		$this->session->set_flashdata('success', 'Data e-Buku Berhasil Ditambahkan!');
		redirect('cKelolaDataMaster/buku');
	}

	public function delete_buku($id)
	{
		$this->mDataMaster->delete_buku($id);
		$this->session->set_flashdata('success', 'Data Buku Berhasil Dihapus!');
		redirect('cKelolaDataMaster/buku');
	}
}

/* End of file cKelolaDataMaster.php */
