<?php

namespace App\Controllers;
use App\Models\M_Item;

class C_Home extends BaseController
{
    public function __construct()
    {
        // helper(['form']);
        $this->itemModel = new M_Item;
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        // dd($data);

        // dd($data); // Display the results
  
        return view('dashboard', $data);
    }

    // public function user(){
    //     $result = $this->userModel->get_all_data_user()->getResultArray();
    //     dd($result);
    // }
}
