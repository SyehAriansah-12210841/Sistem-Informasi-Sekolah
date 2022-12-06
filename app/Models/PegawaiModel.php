<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'Pegawai';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
    public static function view(){
        $view = (new PegawaiModel())
                    ->select("Pegawai.*, pendidikan_guru.jenjang, bagian.nama as bagian ")
                    ->join('pendidikan_guru','Pegawai.id = pendidikan_guru.pegawai_id','left')
                    ->join('bagian', 'Pegawai.bagian_id = bagian.id', 'left')
                    ->builder();
                    $r = db_connect()->newQuery()->fromSubquery($view, 'tbl');
                    $r->table = 'tbl';
                    return $r;
    }
}
