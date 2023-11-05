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
        $this->itemModel      = new M_Item();
        $this->penjualanModel = new M_Penjualan();
        $this->analisaModel   = new M_Analisa();
    }

    public function index()
    {
        $data['title']    = 'Analisa Apriori';
        return view("Admin\Analisa\index", $data);
    }

    public function AnalisaData() {
        try {
            $hasil['title']      = 'Apriori Rules Results';
            $tgl_awal            = $this->request->getPost('tgl_awal');
            $tgl_akhir           = $this->request->getPost('tgl_akhir');
            $min_support         = (int)$this->request->getPost('min_support');
            $data['min_support'] = $min_support/1000;
            $data['penjualan']   = $this->penjualanModel->get_data_penjualan_by_tgl($tgl_awal, $tgl_akhir)->getResultArray();
            $data['item']        = $this->itemModel->get_all_data_item()->getResultArray();
            $hasil['response']   = $this->analisaModel->post_data_penjualan($data);
            // dd($hasil);
            // return json_encode($hasil['response']);
            // $hasil['content'] = view("Admin/Analisa/tabel", $data); 
            return view("Admin/Analisa/tabel", $hasil); 
        } catch (\Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }
}


