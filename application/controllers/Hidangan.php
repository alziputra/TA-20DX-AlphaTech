<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hidangan extends CI_Controller
{
   public function index()
   {
      // panggil model "Mhidangan"
      $this->load->model("Mhidangan", "hdg", TRUE);

      //  panggil fungsi "getData()"
      $data = array(
         "hasil" => $this->hdg->getData()
      );
      // panggil view "vw_hidangan"
      $this->load->view("admin/vw_hidangan", $data);
   }

   // buat fungsi tambah data hidangan
   function create()
   {
      // panggil model "Mhidangan"
      $this->load->model("Mhidangan", "hdg", TRUE);
      // panggil view "add_hidangan"
      $this->load->view("add_hidangan");
   }

   // buat fungsi simpan data hidangan
   function save()
   {
      // panggil model "Mhidangan"
      $this->load->model("Mhidangan", "hdg", TRUE);
      // ambil nilai dari fetch
      $nama = $this->input->post("nama-hdg");
      $harga = $this->input->post("harga-hdg");
      $foto = $this->input->post("foto-hdg");
      $aktif = $this->input->post("aktif-hdg");
      $status = $this->input->post("status-hdg");

      // 1. cek data tbl(nama), apakah nama hidangan yang dikirim sudah pernah disimpan atau belum
      $check = $this->hdg->checkSave($nama);

      // 2. jika pernah tersimpan, set status (json_encode) bernilai 0
      if (count($check) != 0) {
         // kirim nilai status 0 atau 1
         echo json_encode(array("status" => 0));
      }
      // 3. jika belum pernah tersimpan, maka lakukan penyimpanan dan set status (json_encode) bernilai 1
      else {
         // proses penyimpanan data
         $this->mhs->saveData($nama, $harga, $foto, $aktif, $status);
         // kirim nilai status 0 atau 1
         echo json_encode(array("status" => 1));
      }
   }
}