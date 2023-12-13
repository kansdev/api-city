<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Api extends RestController
{

	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->load->model('City_Model', 'city');
	}

	public function users_get()
	{
		// Users from a data store e.g. database
		$users = [
			['id' => 0, 'name' => 'John', 'email' => 'john@example.com'],
			['id' => 1, 'name' => 'Jim', 'email' => 'jim@example.com'],
		];

		$id = $this->get('id');

		if ($id === null) {
			// Check if the users data store contains users
			if ($users) {
				// Set the response and exit
				$data['result'] = $this->response($users, 200);
			} else {
				// Set the response and exit
				$this->response([
					'status' => false,
					'message' => 'No users were found'
				], 404);
			}
		} else {
			if (array_key_exists($id, $users)) {
				$this->response($users[$id], 200);
			} else {
				$this->response([
					'status' => false,
					'message' => 'No such user found'
				], 404);
			}
		}
	}

	public function province_get()
	{
		$kode_provinsi = $this->get('kode_provinsi');

		$provinsi = $this->city->get_all_province();
		$provinsi_with_code = $this->city->get_kode_province($kode_provinsi);

		if ($kode_provinsi === null) {
			// Check if the users data store contains users
			if ($provinsi) {
				// Set the response and exit
				$this->response($provinsi, 200);
			} else {
				// Set the response and exit
				$this->response([
					'status' => false,
					'message' => 'Not found'
				], 404);
			}
		} else {
			if ($provinsi_with_code) {
				$this->response($provinsi_with_code, 200);
			} else {
				$this->response([
					'status' => false,
					'message' => 'No such province found'
				], 404);
			}
		}
	}

	public function city_get()
	{
		$kode_kota_kabupaten = $this->get('kode_kota_kabupaten');

		$city = $this->city->get_all_kota_kabupaten();
		$city_with_code = $this->city->get_kode_kota_kabupaten($kode_kota_kabupaten);
		if ($kode_kota_kabupaten === null) {
			if ($city) {
				$this->response($city, 200);
			} else {
				$this->response([
					'status' => false,
					'message' => 'City not found'
				], 404);
			}
		} else {
			if ($city_with_code) {
				$this->response($city_with_code, 200);
			} else {
				$this->response([
					'status' => false,
					'message' => 'City not found'
				], 404);
			}
		}
	}

	public function city_with_id_provinsi_get()
	{
		$kode_province = $this->get('kode_provinsi');

		$city = $this->city->get_all_kota_kabupaten();
		$city_with_code = $this->city->get_join_all($kode_province);
		if ($kode_province === null) {
			if ($city) {
				$this->response($city, 200);
			} else {
				$this->response([
					'status' => false,
					'message' => 'City not found'
				], 404);
			}
		} else {
			if ($city_with_code) {
				$this->response($city_with_code['kode_provinsi'], 200);
			} else {
				$this->response([
					'status' => false,
					'message' => 'City not found'
				], 404);
			}
		}
	}
}
