<?php

namespace App\Models;

use CodeIgniter\Model;

class Mapel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'mapel';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['nama'];

    // Dates
    protected $useTimestamps        = false;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'nama' => 'required'
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
            ->select('mapel.*, mapel.nama as nama_mapel')
            ->get()
            ->getResult();
    }

    public function find($id = null)
    {
        return $this->db->table($this->table)
            ->select('mapel.*, mapel.nama as nama_mapel')
            ->where('mapel.id', $id)
            ->get()
            ->getRow();
    }
}
