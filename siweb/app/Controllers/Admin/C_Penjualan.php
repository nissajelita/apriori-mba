<?php

namespace App\Controllers\Admin;

use App\Models\M_Penjualan;
use App\Controllers\BaseController;

class C_Penjualan extends BaseController
{
    public function __construct()
    {
        $this->penjualanModel = new M_Penjualan();
    }

    public function index()
    {
        $data['title']    = 'Data Penjualan';
        $result           = $this->penjualanModel->get_all_data_penjualan()->getResultArray();
        $data['penjualan']     = $result;
        return view("Admin\Penjualan\index", $data);
    }

    //  public function simpanItem()
    // {
        
    //     $nama_item = $this->request->getPost('nama_item');
    //     $categori = $this->request->getPost('kategori');
    //     $item_id = $this->itemModel->get_max_item_id()->getRow()->max;
    //     $data = array(
    //         'name' => $nama_item,
    //         'category' => $categori,
    //         'item_id' => (int)$item_id + 1,
    //     );
    //     // dd($data);

    //     try {
    //         $insert_result = $this->itemModel->post_save_data_item($data);

    //         if ($insert_result) {
    //             $result = array(
    //                 'Code' => 200,
    //                 'Message' => 'Data Berhasil Ditambahkan'
    //             );
    //         } else {
    //             throw new Exception('Gagal menyimpan data!');
    //         }
    //     } catch (Exception $e) {
    //         $result = array(
    //             'Status' => array(
    //                 'Code' => 500,
    //                 'Message' => $e->getMessage()
    //                 )
    //             );
    //     }

    //     return json_encode($result);

    // }



}
