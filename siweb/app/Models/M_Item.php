<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Item extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }
    public function get_all_data_item()
    {
        $query = $this->db->query('select * from item_toko');
        return $query;
    }
    public function get_all_category()
    {
        $query = $this->db->query('select category from item_toko group by category');
        return $query;
    }
    public function get_max_item_id()
    {
        $query = $this->db->query('select max(item_id) as max from item_toko');
        return $query;
    }
    public function post_save_multiple_item($data)
    {
        $query = $this->db->table('item_toko')->insertBatch($data);
        return $query ? true : false;
    }

    // public function get_data_user_by_username($username)
    // {
    //     $query = $this->db->query("select * from mst_user WHERE uname = ?", [$username]);
    //     return $query;
    // }


    public function post_save_data_item($data)
    {
        $query = $this->db->table('item_toko')->insert($data);
        return $query ? true : false;
    }

    // public function post_update_data_user($data)
    // {
    //     $query = $this->db->query("update mst_user set nama_user = ?"
    // );

    // }

}
