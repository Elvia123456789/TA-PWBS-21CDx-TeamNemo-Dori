<?php

namespace App\Http\Controllers;

use App\Models\MDataPakan;
use Illuminate\Http\Request;

class DataPakan extends Controller
{
    // buat inisialisasi untuk pengambilan model
    protected $model;

    // buat konstruktor
    function __construct()
    {
        // isi nilai variabel "$model"
        $this->model = new MDataPakan();
    }

    function viewData()
    {
        // jika data pakan tidak ada
        if (count($this->model->viewData()) == 0) {
            $data = [];
            $error = 1;
            $messege = "Data Pakan Tidak Ditemukan";
        }
        // jika data pakan ada / tersedia
        else {
            // ambil method "viewData" dari model "MDataPakan"
            $data = $this->model->viewData();
            $error = 0;
            $messege = "";
        }

        return response(["datapakan" => $data, "error" => $error, "messege" => $messege], http_response_code());
    }

    // buat fungsi untuk pencarian data
    function searchData($keyword)
    {
        // isi nilai variabel "data" dari fungsi "searchData" dari model "MDataPakan" sesuai dengan isi parameter "keyword"
        $data = $this->model->searchData($keyword);

        // kembalikan nilai variabel "result" ke dalam object "datapakan"
        return response(["datapakan" => $data], http_response_code());
    }

    // buat fungsi untuk tambah data
    function saveData(Request $req)
    {
        // ambil data kode pakan
        $kode = $req->kode;

        // jika kode pakan sudah ada
        if (count($this->model->checkSaveData($kode)) != 0) {
            $error = 1;
            $messege = "Data Gagal Disimpan (Kode Pakan Sudah Terpakai !)";
        }
        // jika kode pakan belum ada
        else {
            // ambil request
            $jenis = $req->jenis;
            $jumlah = $req->jumlah;

            // proses simpan data
            $this->model->saveData($kode, $jenis, $jumlah);

            $error = 0;
            $messege = "Data Berhasil Disimpan";
        }

        return response(["error" => $error, "messege" => $messege], http_response_code());
    }

    //buat fungsi hapus data
    function deleteData($kode)
    {
        //cek data apakah data pakan (kode) tersedia/tidak pada model checkData
        //jika data tersedia
        if (count($this->model->checkData($kode)) == 1) {
            //panggil model "deleteData"
            $this->model->deleteData($kode);

            $error = 0;
            $messege = "Data Berhasil Dihapus!";
        }
        //jika data tidak tersedia
        else {
            $error = 1;
            $messege = "Data Gagal Dihapus!";
        }
        return response(["error" => $error, "messege" => $messege], http_response_code());
    }

     // buat fungsi untuk detail data
     function detailData($kode)
     {
         // isi nilai variabel "result" dari fungsi "detailData" dari model "MDataPakan" sesuai dengan isi parameter "id"
         $data = $this->model->detailData($kode);
 
         // kembalikan nilai variabel "result" ke dalam object "datapakan"
         return response(["datapakan" => $data], http_response_code());
     }

    // buat fungsi untuk edit data
    function editData($kode_lama, Request $req)
    {
        // ambil data kode
        $kode = $req->kode;

        if (count($this->model->checkData($kode)) == 1) {
            //cek data apakah data pakan (kode) tersedia/tidak pada model checkEditData
            //jika data tersedia
            if (count($this->model->checkEditData($kode_lama, $kode)) == 0) {
                $jenis = $req->jenis;
                $jumlah = $req->jumlah;

                // panggil model "updateData"
                $this->model->editData($kode, $jenis, $jumlah, $kode_lama);

                $error = 0;
                $messege = "Data Berhasil Diubah!";
            }
            //jika data tidak tersedia
            else {
                $error = 1;
                $messege = "Data Gagal Diubah (Kode Pakan Sudah Terpakai !)";
            }
        } else {
            $error = 2;
            $messege = "Data Tidak Ditemukan !";
        }

        return response(["error" => $error, "messege" => $messege], http_response_code());
    }
}
