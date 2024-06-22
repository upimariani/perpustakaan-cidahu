<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLogin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mLogin');
	}
	public function index()
	{
		$this->load->view('login');
	}
	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$data = $this->mLogin->login($username, $password);
		if ($data) {
			$id = $data->id_user;
			$this->session->set_userdata('id', $id);
			if ($data->role == '1') {
				redirect('cDashboard');
			} else {
				redirect('KepalaPerpustakaan/cDashboard');
			}
		} else {
			$this->session->set_flashdata('error', 'Username dan Password Salah!');
			redirect('');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('id');
		$this->session->set_flashdata('success', 'Anda Berhasil LogOut!');
		redirect('');
	}
}

/* End of file cLogin.php */
