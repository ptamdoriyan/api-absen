<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AbsenSiangModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use UConverter;

class Checkin extends ResourceController
{
    use ResponseTrait;

    public function index()
    {
        $data = [
            'Status' => 'connected',
            'home' => 'on Computer Kepegawaian'
        ];
                return $this->respond($data);
           
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
