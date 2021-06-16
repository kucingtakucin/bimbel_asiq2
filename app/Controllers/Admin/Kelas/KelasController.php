<?php

namespace App\Controllers\Admin\Kelas;

use App\Models\Guru;
use App\Models\Kelas;
use CodeIgniter\RESTful\ResourceController;

class KelasController extends ResourceController
{
    public function __construct()
    {
        $this->session = service('session');
        $this->validator = service('validation');
        $this->kelas = new Kelas(); // Load model kelas
        $this->guru = new Guru();   // Load model guru
    }

    /**
     * Return an array of resource objects, themselves in array format
     * Menampilkan halaman index
     * @return mixed
     */
    public function index()
    {
        $data = [
            'kelas' => $this->kelas->findAll()->join('guru', 'kelas.id_guru = guru.id')
        ];
        return view('Admin/Kelas/index', $data);
    }

    /**
     * Return an array of resource objects for datatable library
     * Mengirimkan array ke tabel datatable
     * @return void
     */
    public function data()
    {
        return $this->kelas->findAll()
            ->join('guru', 'kelas.id_guru = guru.id');
    }
    /**
     * Return the properties of a resource object
     * Menampilkan halaman detail data
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     * Menampilkan halaman form untuk menambah data
     * @return mixed
     */
    public function new()
    {
        return view('Admin/Kelas/new');
    }

    /**
     * Return an array of resource objects for select2 library
     * Mengirimkan array ke dropdown select2
     * @return void
     */
    public function select()
    {
        return $this->response->setHeader('Content-Type', 'application/json')
            ->setStatusCode(200)
            ->setJSON([
                'guru' => $this->guru->findAll()
            ]);
    }

    /**
     * Create a new resource object, from "posted" parameters
     * Mengirimkan data dari form tambah data ke model
     * @return mixed
     */
    public function create()
    {
        if (!$this->validate($this->kelas->getValidationRules())) {
            return redirect()->route('admin.kelas.new')
                ->withInput()->with('errors', $this->validator->getErrors());
        }
        $this->kelas->insert($this->request->getPost());
        return redirect()->route('admin.kelas.index');
    }

    /**
     * Return the editable properties of a resource object
     * Menampilkan halaman form untuk mengedit data
     * @param $id
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     * Mengirimkan data dari form edit data ke model
     * @param $id
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     * Menghapus salah satu data
     * @param $id
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
