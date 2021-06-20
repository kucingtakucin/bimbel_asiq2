<?php

namespace App\Models;

use CodeIgniter\Model;

class Kelas extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'kelas';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'object';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['nama', 'id_guru'];

    // Dates
    protected $useTimestamps        = false;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'nama' => 'required',
        'id_guru' => 'required'
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks       = true;
    protected $beforeInsert         = [];
    protected $afterInsert          = [];
    protected $beforeUpdate         = [];
    protected $afterUpdate          = [];
    protected $beforeFind           = [];
    protected $afterFind            = [];
    protected $beforeDelete         = [];
    protected $afterDelete          = [];

    public function findAll(int $limit = 0, int $offset = 0)
    {
        return $this->db->table($this->table)
            ->select('kelas.*, guru.nama as nama_guru')
            ->join('guru', 'guru.id = kelas.id_guru')
            ->get()
            ->getResult();
    }

    public function find($id = null)
    {
        return $this->db->table($this->table)
            ->select('kelas.*, guru.nama as nama_guru')
            ->join('guru', 'guru.id = kelas.id_guru')
            ->where('kelas.id', $id)
            ->get()
            ->getRow();
    }
}
