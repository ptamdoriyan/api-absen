<?php

namespace App\Models;

use CodeIgniter\Model;

class DataAbsen extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'data';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
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


    public function getDataAbsen($time_start, $time_end)
    {
        $time_awal = strtotime($time_start);
        $time_akhir = strtotime($time_end);
       // dd($time_awal);
        $db = db_connect();
        $query = "SELECT DISTINCT pegawai.*, data.time FROM pegawai LEFT JOIN data ON pegawai.finger = data.pin AND (data.time BETWEEN $time_awal AND $time_akhir) WHERE pegawai.deactive IS null GROUP BY pegawai.id ORDER BY pegawai.jabatan_id ASC;";
        $hasil = $db->query($query)->getResultArray();
        return $hasil;
    }
}
