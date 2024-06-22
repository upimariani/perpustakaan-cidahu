<?php


defined('BASEPATH') or exit('No direct script access allowed');

class mLaporan extends CI_Model
{
	//peminjaman
	public function lap_harian($tanggal, $bulan, $tahun)
	{
		$this->db->select('*');
		$this->db->from('peminjaman');
		$this->db->join('detail_peminjaman', 'peminjaman.id_pinjam = detail_peminjaman.id_pinjam', 'left');
		$this->db->join('buku', 'buku.id_buku = detail_peminjaman.id_buku', 'left');
		$this->db->join('anggota', 'peminjaman.id_anggota = anggota.id_anggota', 'left');

		$this->db->where('DAY(peminjaman.tgl_pinjam)', $tanggal);
		$this->db->where('MONTH(peminjaman.tgl_pinjam)', $bulan);
		$this->db->where('YEAR(peminjaman.tgl_pinjam)', $tahun);
		$this->db->order_by('peminjaman.id_pinjam', 'desc');
		return $this->db->get()->result();
	}

	public function lap_bulanan($bulan, $tahun)
	{
		$this->db->select('*');
		$this->db->from('peminjaman');
		$this->db->join('detail_peminjaman', 'peminjaman.id_pinjam = detail_peminjaman.id_pinjam', 'left');
		$this->db->join('buku', 'buku.id_buku = detail_peminjaman.id_buku', 'left');
		$this->db->join('anggota', 'peminjaman.id_anggota = anggota.id_anggota', 'left');
		$this->db->where('MONTH(tgl_pinjam)', $bulan);
		$this->db->where('YEAR(tgl_pinjam)', $tahun);
		$this->db->where('stat_pinjam=1');
		$this->db->order_by('peminjaman.id_pinjam', 'desc');
		return $this->db->get()->result();
	}

	public function lap_tahunan($tahun)
	{
		$this->db->select('*');
		$this->db->from('peminjaman');
		$this->db->join('anggota', 'peminjaman.id_anggota = anggota.id_anggota', 'left');
		$this->db->join('detail_peminjaman', 'peminjaman.id_pinjam = detail_peminjaman.id_pinjam', 'left');
		$this->db->join('buku', 'buku.id_buku = detail_peminjaman.id_buku', 'left');
		$this->db->where('YEAR(tgl_pinjam)', $tahun);
		$this->db->where('stat_pinjam=1');
		$this->db->order_by('peminjaman.id_pinjam', 'desc');

		return $this->db->get()->result();
	}

	//pengembalian
	public function lap_harian_pengembalian($tanggal, $bulan, $tahun)
	{
		$this->db->select('*');
		$this->db->from('pengembalian');
		$this->db->join('detail_peminjaman', 'pengembalian.id_Detail = detail_peminjaman.id_detail', 'left');
		$this->db->join('peminjaman', 'detail_peminjaman.id_pinjam = peminjaman.id_pinjam', 'left');
		$this->db->join('buku', 'buku.id_buku = detail_peminjaman.id_buku', 'left');
		$this->db->join('anggota', 'peminjaman.id_anggota = anggota.id_anggota', 'left');

		$this->db->where('DAY(tgl_kembali)', $tanggal);
		$this->db->where('MONTH(tgl_kembali)', $bulan);
		$this->db->where('YEAR(tgl_kembali)', $tahun);
		return $this->db->get()->result();
	}
	public function lap_bulanan_pengembalian($bulan, $tahun)
	{
		$this->db->select('*');
		$this->db->from('pengembalian');
		$this->db->join('detail_peminjaman', 'pengembalian.id_Detail = detail_peminjaman.id_detail', 'left');
		$this->db->join('peminjaman', 'detail_peminjaman.id_pinjam = peminjaman.id_pinjam', 'left');
		$this->db->join('buku', 'buku.id_buku = detail_peminjaman.id_buku', 'left');
		$this->db->join('anggota', 'peminjaman.id_anggota = anggota.id_anggota', 'left');

		$this->db->where('MONTH(tgl_kembali)', $bulan);
		$this->db->where('YEAR(tgl_kembali)', $tahun);
		return $this->db->get()->result();
	}
	public function lap_tahunan_pengembalian($tahun)
	{
		$this->db->select('*');
		$this->db->from('pengembalian');
		$this->db->join('detail_peminjaman', 'pengembalian.id_Detail = detail_peminjaman.id_detail', 'left');
		$this->db->join('peminjaman', 'detail_peminjaman.id_pinjam = peminjaman.id_pinjam', 'left');
		$this->db->join('buku', 'buku.id_buku = detail_peminjaman.id_buku', 'left');
		$this->db->join('anggota', 'peminjaman.id_anggota = anggota.id_anggota', 'left');

		$this->db->where('YEAR(tgl_kembali)', $tahun);
		return $this->db->get()->result();
	}

	//laporan buku masuk
	public function buku_harian($tanggal, $bulan, $tahun, $id_kategori)
	{
		$this->db->select('*');
		$this->db->from('buku');
		$this->db->join('kategori_buku', 'buku.id_kategori = kategori_buku.id_kategori', 'left');

		$this->db->where('DAY(create_at)', $tanggal);
		$this->db->where('MONTH(create_at)', $bulan);
		$this->db->where('YEAR(create_at)', $tahun);
		$this->db->where('buku.id_kategori', $id_kategori);

		return $this->db->get()->result();
	}
	public function buku_bulanan($bulan, $tahun, $id_kategori)
	{
		$this->db->select('*');
		$this->db->from('buku');
		$this->db->join('kategori_buku', 'buku.id_kategori = kategori_buku.id_kategori', 'left');

		$this->db->where('MONTH(create_at)', $bulan);
		$this->db->where('YEAR(create_at)', $tahun);
		$this->db->where('buku.id_kategori', $id_kategori);

		return $this->db->get()->result();
	}
	public function buku_tahunan($tahun, $id_kategori)
	{
		$this->db->select('*');
		$this->db->from('buku');
		$this->db->join('kategori_buku', 'buku.id_kategori = kategori_buku.id_kategori', 'left');

		$this->db->where('YEAR(create_at)', $tahun);
		$this->db->where('buku.id_kategori', $id_kategori);

		return $this->db->get()->result();
	}
}

/* End of file M_laporan.php */
