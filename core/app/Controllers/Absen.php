<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;
use App\Models\DataAbsen;
use App\Models\Pegawai;

use PHPUnit\Framework\Constraint\IsNull;

class Absen extends ResourceController
{

    use ResponseTrait;

    public function index()
    {
        //inisiasi model
        $modelAbsen = new DataAbsen();
        $modelPegawai = new Pegawai();

        //ambil data dari parameter jika ada
        $date = $this->request->getVar('date');
        if ($date == null) {
            //jika tidak kirim parameter date == tanggal sekarang
            $date = date('Y-m-d');
        }
        //buat format
        $time_start_keluar = "$date 12:00:00";
        $time_end_keluar = "$date 12:35:00";
        $time_start_masuk = "$date 12:30:00";
        $time_end_masuk = "$date 13:05:00";
        //panggil fungsi getDatanow() dari model
        // $data['absen_keluar'] = $modelAbsen->getDataAbsen($time_start_keluar, $time_end_keluar);
        $data['absen_masuk'] = $modelAbsen->getDataAbsen($time_start_masuk, $time_end_masuk);
        //kembalikan sebagai respond API
        return $this->respond($data, 200);
    }
}
