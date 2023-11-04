<?php

namespace App\Controllers\Admin;

use App\Models\M_Analisa;
use App\Models\M_Penjualan;
use App\Models\M_Item;
use App\Controllers\BaseController;

class C_Analisa extends BaseController
{
    public function __construct()
    {
        $this->itemModel = new M_Item();
        $this->penjualanModel = new M_Penjualan();
        $this->analisaModel = new M_Analisa();
    }

    public function index()
    {
        $data['title']    = 'Analisa Apriori';
        return view("Admin\Analisa\index", $data);
    }

    public function AnalisaData()
    {
        $tgl_awal = $this->request->getPost('tgl_awal');
        $tgl_akhir = $this->request->getPost('tgl_akhir');
        $data['penjualan'] = $this->penjualanModel->get_data_penjualan_by_tgl($tgl_awal, $tgl_akhir)->getResultArray();
        $data['item'] = $this->itemModel->get_all_data_item()->getResultArray();$this->itemModel->get_all_data_item()->getResultArray();
        $response = $this->analisaModel->post_data_penjualan($data);
        // dd($response);
        return json_encode($response);
    // Anda dapat menangani respons Flask di sini
    // Contoh: var_dump($response);
    //     dd($response);
    // return $response;
    }
}