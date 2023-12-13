<?php

class City_model extends CI_Model
{
	/**
	 * Get All Provinsi
	 * Get form table tb_provinsi 
	 */
	public function get_all_province()
	{
		return $this->db->get('tb_provinsi')->result_array();
	}

	/**
	 * Get Provinsi Where Kode Provinsi
	 * Get form table tb_provinsi 
	 * 
	 * @param int $kode_provinsi
	 */
	public function get_kode_province($kode_provinsi = null)
	{
		return $this->db->get_where('tb_provinsi', ['kode_provinsi' => $kode_provinsi])->result_array();
	}

	/**
	 * Get Provinsi Where Kode Internasional
	 * Get form table tb_provinsi 
	 * 
	 * @param string $kode_internasional
	 */
	public function get_kode_internasional($kode_internasional = null)
	{
		return $this->db->get_where('tb_provinsi', ['kode_internasional' => $kode_internasional])->result_array();
	}

	/**
	 * Get Provinsi Where Nama Provinsi
	 * Get form table tb_provinsi
	 * 
	 * @param string $nama_provinsi
	 */
	public function get_nama_provinsi($nama_provinsi = null)
	{
		return $this->db->get_where('tb_provinsi', ['provinsi' => $nama_provinsi])->result_array();
	}

	/**
	 * Get All Kota Atau Kabupaten
	 * Get form table tb_kota_kabupaten
	 * 
	 * @param string $nama_provinsi
	 */
	public function get_all_kota_kabupaten()
	{
		return $this->db->get_where('tb_kota_kabupaten')->result_array();
	}

	/**
	 * Get kota/kabupaten Where kode kota kabupaten
	 * Get form table tb_kota_kabupaten
	 * 
	 * @param int $kode_kota_kabupaten
	 */
	public function get_kode_kota_kabupaten($kode_kota_kabupaten = null)
	{
		return $this->db->get_where('tb_kota_kabupaten', ['kode_kota_kabupaten' => $kode_kota_kabupaten])->result_array();
	}

	/**
	 * Get kota/kabupaten Where Nama kota kabupaten
	 * Get form table tb_kota_kabupaten
	 * 
	 * @param string $kode_kota_kabupaten
	 */
	public function get_nama_kota_kabupaten($kota_kabupaten = null)
	{
		return $this->db->get_where('tb_kota_kabupaten', ['kota_kabupaten' => $kota_kabupaten])->result_array();
	}

	/**
	 * Get kota/kabupaten Where kode provinsi kota
	 * Get form table tb_kota_kabupaten
	 * 
	 * @param string $kode_provinsi
	 */
	public function get_kode_provinsi_kota($kode_provinsi = null)
	{
		return $this->db->get_where('tb_kota_kabupaten', ['kode_provinsi' => $kode_provinsi])->result_array();
	}

	/**
	 * Get Join table provinsi dan Kota
	 * Get form table tb_provinsi
	 * 
	 * @param int $join_id_1
	 */
	public function get_join_all($join_id_1 = null)
	{
		$this->db->select('*');
		$this->db->from('tb_provinsi');
		$this->db->join('tb_kota_kabupaten', 'tb_kota_kabupaten.kode_provinsi = tb_provinsi.kode_provinsi');
		$this->db->where('tb_kota_kabupaten.kode_provinsi', $join_id_1);
		return $this->db->get()->result_array();
	}
}
