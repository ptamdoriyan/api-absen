<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AbsenSiangModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use UConverter;

class AbsenSiang extends ResourceController
{
    use ResponseTrait;

    public function index()
    {
        //panggil model
        $absenSiangModel = new AbsenSiangModel();
        //ambil tanggal sekarang
        $date = strtotime(date('Y-m-d'));
        //ambil finger
        $finger = $this->request->getVar('finger');

        if ($finger == null) {
            # Tampilkan semua
            $data = $absenSiangModel->where(['date' => $date])->findAll();
            if ($data) {
                # Response jika ada data...
                return $this->respond($data);
            } else {
                # response jika data tidak ada...
                return $this->failNotFound('Maaf, hari ini belum ada pegawai yang melakukan absensi siang!!');
            }
        } else {
            // ambil data sesuai id Finger yang dimasukkan di params
            $data = $absenSiangModel->where(['date' => $date, 'finger' => $finger])->first();
            if ($data) {
                # Response jika ada data...
                return $this->respond($data);
            } else {
                # response jika data tidak ada...
                return $this->failNotFound('Belum Absen Siang !');
            }
        }
    }


    public function create()
    {
        $absensiangModel = new AbsenSiangModel();
        $data = [
            'finger' => $this->request->getVar('finger'),
            'date' => strtotime(date('Y-m-d')),
            'jam_istirahat' => time()
        ];
        
        //add data to database
        $absensiangModel->insert($data);
        //create response
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Absen Istirahat berhasil direkam'
            ]
        ];
        return $this->respond($response);
       
    }


}
