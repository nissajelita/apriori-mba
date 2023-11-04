<?php

namespace App\Controllers\Admin;

use App\Models\M_Item;
use App\Controllers\BaseController;

class C_Item extends BaseController
{
    public function __construct()
    {
        $this->itemModel = new M_Item();
    }

    public function index()
    {
        $data['title']    = 'Item';
        $result           = $this->itemModel->get_all_data_item()->getResultArray();
        $data['category'] = $this->itemModel->get_all_category()->getResultArray();
        $data['item']     = $result;
        return view("Admin\Item\index", $data);
    }

     public function simpanItem()
    {
        
        $nama_item = $this->request->getPost('nama_item');
        $categori = $this->request->getPost('kategori');
        $item_id = $this->itemModel->get_max_item_id()->getRow()->max;
        $data = array(
            'name' => $nama_item,
            'category' => $categori,
            'item_id' => (int)$item_id + 1,
        );
        // dd($data);

        try {
            $insert_result = $this->itemModel->post_save_data_item($data);

            if ($insert_result) {
                $result = array(
                    'Code' => 200,
                    'Message' => 'Data Berhasil Ditambahkan'
                );
            } else {
                throw new Exception('Gagal menyimpan data!');
            }
        } catch (Exception $e) {
            $result = array(
                'Status' => array(
                    'Code' => 500,
                    'Message' => $e->getMessage()
                    )
                );
        }

        return json_encode($result);

    }

    public function saveMulti()
    {
        // try {
            $file_excel = $this->request->getFile('fileexcel');
            $file = $file_excel->getTempName();
            $csv = array_map('str_getcsv', file($file));
            $keys = explode(';', $csv[0][0]); // Split the header row by the delimiter
            
            $data = [];
            // dd($data);
            foreach ($csv as $row) {
                if ($row[0] !== $csv[0][0]) { // Skip the header row
                    $values = explode(';', $row[0]); // Split the data row by the delimiter
                    $rowData = array_combine($keys, $values); // Combine keys with values
                    $data[] = $rowData;
                }
            }
            $insert_result = $this->itemModel->post_save_multiple_item($data);;

            if ($insert_result) {
                $result = array(
                    'Code' => 200,
                    'Message' => 'Item Berhasil Ditambahkan'
                );
            } else {
                throw new Exception('Gagal menyimpan data item');
            }
        // } catch (Exception $e) {
        //     $result = array(
        //         'Status' => array(
        //             'Code' => 500,
        //             'Message' => $e->getMessage()
        //             )
        //         );
        //     }
       return json_encode($result);
    }


   

    // public function simpan()
    // {
    //     $username = $this->request->getPost('username');
    //     $password = $this->request->getPost('passwordUser');
    //     $id_user = $this->request->getPost('id_user');

    //     if($id_user != null || $id_user != ''){
    //     // edit user
    //         $data['nm_user'] = $this->request->getPost('namaUser');
    //         $data['group_id'] = $this->request->getPost('jenisUser');
    //         if($password != null || $password != ''){
    //             $data['usr_pwd'] = password_hash($password, PASSWORD_DEFAULT);
    //         }
    //         else{
    //             $oldPassword = $this->request->getPOst('usr_pwd');
    //             $data['usr_pwd'] = $oldPassword;

    //         }
    //         $data['stt_user'] = $this->request->getPost('sttUser');



    //     // edit user
    //     }
    //     else{
    //         // simpan user baru
    //         // Cek username di tabel
    //         $data_username = $this->userModel->get_data_user_by_username($username)->getRowArray();
            
    //         if ($data_username) {
    //             $result = array(
    //                     'Code' => 400,
    //                     'Message' => 'Username sudah Ada'
    //             );
    //         } else {
    //             $data['nm_user'] = $this->request->getPost('namaUser');
    //             $data['uname'] = $username;
    //             $data['group_id'] = $this->request->getPost('jenisUser');
    //             $data['usr_pwd'] = password_hash($password, PASSWORD_DEFAULT);
    //             $data['stt_user'] = 1;
    //             // dd($data);
    
    //             try {
    //                 $insert_result = $this->userModel->post_save_data_user($data);
    
    //                 if ($insert_result) {
    //                     $result = array(
    //                         'Code' => 200,
    //                         'Message' => 'User Berhasil Ditambahkan'
    //                     );
    //                 } else {
    //                     throw new Exception('Gagal menyimpan data user');
    //                 }
    //             } catch (Exception $e) {
    //                 $result = array(
    //                     'Status' => array(
    //                         'Code' => 500,
    //                         'Message' => $e->getMessage()
    //                         )
    //                     );
    //                 }
    //             }
    //             // simpan user baru
    //         }

    //     return json_encode($result);
    // }

    // public function editUser()
    // {
    //     $username = $this->request->getVar('username');
    //     $data['user'] = $this->userModel->get_data_user_by_username($username)->getRowArray();
    //     // dd($data);
    //     return view("Admin/User/modals/formEditUser", $data);
    // }


}
