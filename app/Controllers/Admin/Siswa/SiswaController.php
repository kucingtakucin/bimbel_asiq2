<?php

namespace App\Controllers\Admin\Siswa;

use App\Models\Siswa;
use App\Models\Kelas;
use CodeIgniter\RESTful\ResourceController;

class SiswaController extends ResourceController
{
	public function __construct()
	{
		$this->session = service('session');
		$this->validator = service('validation');
		$this->siswa = new Siswa();
		$this->kelas = new Kelas();
	}

	/**
	 * Return an array of resource objects, themselves in array format
	 * Menampilkan halaman index
	 * @return mixed
	 */
	public function index()
	{
		return view('Admin/Siswa/index');
	}

	/**
	 * Return an array of resource objects for datatable library
	 * Mengirimkan array ke tabel datatable
	 * @return void
	 */
	public function data()
	{
		return $this->respond([
			'status' => true,
			'data' => $this->siswa->findAll()
		]);
	}
	/**
	 * Return the properties of a resource object
	 * Menampilkan halaman detail data
	 * @return mixed
	 */
	public function show($id = null)
	{
		return $this->respond($this->siswa->find($id));
	}

	/**
	 * Return a new resource object, with default properties
	 * Menampilkan halaman form untuk menambah data
	 * @return mixed
	 */
	public function new()
	{
		return view('Admin/Siswa/new');
	}

	/**
	 * Return an array of resource objects for select2 library
	 * Mengirimkan array ke dropdown select2
	 * @return void
	 */
	public function select()
	{
		return $this->respond([
			'status' => true,
			'kelas' => $this->kelas->findAll()
		]);
	}

	/**
	 * Create a new resource object, from "posted" parameters
	 * Mengirimkan data dari form tambah data ke model
	 * @return mixed
	 */
	public function create()
	{
		if (!$this->validate($this->siswa->getValidationRules())) {
			return $this->respond([
				'status' => false,
				'errors' => $this->validator->getErrors(),
				'message' => 'Gagal ditambahkan!'
			]);
		}
		$this->siswa->insert($this->request->getPost());
		return $this->respondCreated([
			'status' => true,
			'data' => $this->request->getPost(),
			'message' => 'Berhasil ditambahkan!'
		]);
	}

	/**
	 * Return the editable properties of a resource object
	 * Menampilkan halaman form untuk mengedit data
	 * @param $id
	 * @return mixed
	 */
	public function edit($id = null)
	{
		return view('Admin/Siswa/edit', [
			'siswa' => $this->siswa->find($id)
		]);
	}

	/**
	 * Add or update a model resource, from "posted" properties
	 * Mengirimkan data dari form edit data ke model
	 * @param $id
	 * @return mixed
	 */
	public function update($id = null)
	{
		if (!$this->validate($this->siswa->getValidationRules())) {
			return $this->respond([
				'status' => false,
				'errors' => $this->validator->getErrors(),
				'message' => 'Gagal diubah!'
			]);
		}
		$this->siswa->update($id, $this->request->getPost());
		return $this->respondUpdated([
			'status' => true,
			'data' => $this->request->getRawInput(),
			'message' => 'Berhasil diubah!'
		]);
	}

	/**
	 * Delete the designated resource object from the model
	 * Menghapus salah satu data
	 * @param $id
	 * @return mixed
	 */
	public function delete($id = null)
	{
		$this->siswa->delete($id);
		return $this->respondDeleted([
			'status' => true,
			'message' => 'Berhasil dihapus!'
		]);
	}
}
