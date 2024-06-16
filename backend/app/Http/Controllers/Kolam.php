<?php

namespace App\Http\Controllers;

use App\Models\MKolam;
use Illuminate\Http\Request;

class Kolam extends Controller
{
    // buat inisialisasi untuk pengambilan model
    protected $model;

    // buat konstruktor
    function __construct()
    {
        // isi nilai variabel "$model" 
        $this->model = new MKolam();
    }

     // buat fungsi untuk tambah data
     function viewData()
     {
         // jika data mahasiswa tidak ada
         if (count($this->model->viewData()) == 0) {
             $data = [];
             $error = 1;
             $message = "Data Kolam Tidak Ditemukan !";
         }
         // jika data kolam ada / tersedia
         else {
             // ambil method "viewData" dari model "MKolam"
             $data = $this->model->viewData();
             $error = 0;
             $message = "";
         }
 
         return response(["kolam" => $data, "error" => $error, "message" => $message], http_response_code());
     }

}
