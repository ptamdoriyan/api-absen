<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\PegawaiModel;

class Pegawai extends ResourceController
{

    use ResponseTrait;
    public function index()
    {
        //inisasi model
        $pegawaiModel = new PegawaiModel();

        //tangkap data nip pegawai
        $nipPegawai = $this->request->getVar('nip');

        //cek nip pegawai terdaftar atau tidak
        $data = $pegawaiModel->where('nip', $nipPegawai)->first();
        if ($data) {
            # kembalikan response
            return $this->respond($data, 200);
        } else {
            # kembalikan info error
            return $this->failNotFound('Data tidak ditemukan, Silahkan hubungi Admin');
        }
    }
}
