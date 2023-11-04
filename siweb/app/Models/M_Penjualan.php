<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Penjualan extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }
    public function get_all_data_penjualan()
    {
        $query = $this->db->query("SELECT * from data_penjualan a LEFt JOIN item_toko b ON a.item_id = b.item_id where EXTRACT(MONTH FROM a.tgl_penjualan) = EXTRACT(MONTH FROM CURRENT_DATE)");
        return $query;
    }
    public function get_data_penjualan_by_id($sale_id)
    {
        $query = $query = $this->db->query("select * from data_penjualan WHERE sale_id = ?", [$sale_id]);
        return $query;
    }
    public function get_data_penjualan_group_by($sale_id, $item_id, $tgl_penjualan)
    {
        $param1 = ("item_id = ". $item_id);
        $param2 = ("sale_id = ". $sale_id);
        $query = $this->db->query("select * from data_penjualan WHERE sale_id = ?", [$sale_id]);
        // dd($query);
        return $query;
    }
    public function get_data_penjualan_by_tgl($tgl_awal, $tgl_akhir) {
        $query = $this->db->table('data_penjualan')
            ->select('sale_id, item_id, quantity_purchased')
            ->where('tgl_penjualan >=', $tgl_awal)
            ->where('tgl_penjualan <=', $tgl_akhir)
            ->get();

        return $query;
    }


}
