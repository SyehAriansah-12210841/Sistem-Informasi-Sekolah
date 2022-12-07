<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasSiswaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kelas_siswa';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
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
        $view = (new KelasSiswaModel())
                    ->select("kelas_siswa.*, kelas.tingkat as kelas, siswa.nisn ")
                    ->join('kelas','kelas_siswa.kelas_id = kelas.id','left')
                    ->join('siswa','kelas_siswa.siswa_id = siswa.id','left')
                    ->builder();
                    $r = db_connect()->newQuery()->fromSubquery($view, 'tbl');
                    $r->table = 'tbl';
                    return $r;
    }
}
