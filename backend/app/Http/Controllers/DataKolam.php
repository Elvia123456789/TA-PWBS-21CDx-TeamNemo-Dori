<?php

namespace App\Http\Controllers;

use App\Models\MDataKolam;
use Illuminate\Http\Request;

class DataKolam extends Controller
{
    // buat inisialisasi untuk pengambilan model
    protected $model;

    // buat konstruktor
    function __construct()
    {
        // isi nilai variabel "$model" 
        $this->model = new MDataKolam();
    }

     // buat fungsi untuk tambah data
     function viewData()
     {
         // jika data kolam tidak ada
         if (count($this->model->viewData()) == 0) {
             $data = [];
             $error = 1;
             $message = "Data Kolam Tidak Ditemukan !";
         }
         // jika data kolam ada / tersedia
         else {
             // ambil method "viewData" dari model "MDataKolam"
             $data = $this->model->viewData();
             $error = 0;
             $message = "";
         }
 
         return response(["kolam" => $data, "error" => $error, "message" => $message], http_response_code());
     }

      // buat fungsi untuk pencarian data
    function searchData($keyword)
    {
        // isi nilai variabel "data" dari fungsi "searchData" dari model "MDataKolam" sesuai dengan isi parameter "keyword"
        $data = $this->model->searchData($keyword);

        // kembalikan nilai variabel "result" ke dalam object "kolam"
        return response(["kolam" => $data], http_response_code());
    }

    // buat fungsi untuk tambah data
    function saveData(Request $req)
    {
        // ambil data jenis kolam
        $jenis = $req->jenis;

        // jika jenis kolam sudah ada
        if (count($this->model->checkSaveData($jenis)) != 0) {
            $error = 1;
            $message = "Data Gagal Disimpan (Jenis Kolam Sudah Terpakai !)";
        }
        // jika jenis kolam belum ada
        else {
            // ambil request
            $nama = $req->nama;
            $ukuran = $req->ukuran;

            // proses simpan data
            $this->model->saveData($jenis, $nama, $ukuran);

            $error = 0;
            $message = "Data Berhasil Disimpan";
        }
        return response(["error" => $error, "message" => $message], http_response_code());
    }

     // buat fungsi hapus data
     function deleteData($npm)
     {
         // cek apakah data kolam(npm) tersedia/tidak pada model checkData
         // jika data tersedia
         if (count($this->model->checkData($jenis)) == 1) {
             // panggil model "deleteData"
             $this->model->deleteData($jenis);
 
             $error = 0;
             $message = "Data Berhasil Dihapus";
         }
         // jika data tidak tersedia
         else {
             $error = 1;
             $message = "Data Gagal Dihapus !";
         }
         return response(["error" => $error, "message" => $message], http_response_code());
     }




}
