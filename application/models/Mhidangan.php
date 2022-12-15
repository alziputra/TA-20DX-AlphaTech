<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mhidangan extends CI_Model
{
    public function getData()
    {
        // tampilkan data dari database "tb_hidangan"
        $this->db->from("tb_hidangan");
        // urutkan berdasarkan Nama secara ascending
        $this->db->order_by("nama", "ASC");
        // eksekusi query
        $query = $this->db->get()->result();
        // kirim hasil query ke controller "Hidangan"
        return $query;
    }

    // fungsi untuk cek simpan data
    function checkSave($nama)
    {
        $this->db->select("nama");
        $this->db->from("tb_hidangan");
        $this->db->where("nama= '$nama'");
        // eksekusi query
        $query = $this->db->get()->result();
        // kirim hasil query ke controller "Mhidangan"
        return $query;
    }

    function saveData($nama, $harga, $foto, $aktif)
    {
        $data = array(
            "nama" => $nama,
            "harga" => $harga,
            "foto" => $foto,
            "aktif" => $aktif
        );
        // simpan data
        $this->db->insert("tb_hidangan", $data);
    }
}