<?php 

namespace App\Models;
use CodeIgniter\Model;
use function App\Helpers\post_api;

class M_Analisa extends Model {
    public function post_data_penjualan($data){
        $endpoint = 'receive_data';
        $url      = post_api($endpoint, null, $data);
        return $url;
    }
}
