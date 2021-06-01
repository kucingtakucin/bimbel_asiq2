<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class KelasController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     * Menampilkan tabel
     * @return mixed
     */
    public function index()
    {
        return view('Kelas/index');
    }

    /**
     * Return the properties of a resource object
     * Menampilkan detail data
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     * Menampilkan form tambah data
     * @return mixed
     */
    public function new()
    {
        return view('Kelas/new');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
