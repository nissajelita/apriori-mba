<?php 

namespace App\Models;
use CodeIgniter\Model;

class M_Home extends Model {
    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }
    public function get_all_data_item()
    {
        $query = $this->db->query('select * from item_toko where category = "0"');
        return $query;
    }
}
