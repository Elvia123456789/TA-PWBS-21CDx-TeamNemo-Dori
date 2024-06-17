<?php

namespace App\Http\Controllers;

use App\Models\MDataBibit;
use Illuminate\Http\Request;

class Mahasiswa extends Controller
{
    // buat inisialisasi untuk pengambilan model
    protected $model;

    // buat konstruktor
    function __construct()
    {
        // isi nilai variabel "$model" 
        $this->model = new MDataBibit();
    }

    // buat fungsi untuk tambah data
    function viewData()
    {
        // jika data bibit ikan tidak ada
        if (count($this->model->viewData()) == 0) {
            $data = [];
            $error = 1;
            $message = "Data Bibit Ikan Tidak Ditemukan !";
        }
        // jika data bibit ikan ada / tersedia
        else {
            // ambil method "viewData" dari model "MDataBibit"
            $data = $this->model->viewData();
            $error = 0;
            $message = "";
        }

        return response(["bibit" => $data, "error" => $error, "message" => $message], http_response_code());
    }

    // buat fungsi untuk pencarian data
    function searchData($keyword)
    {
        // isi nilai variabel "data" dari fungsi "searchData" dari model "MDataBibit" sesuai dengan isi parameter "keyword"
        $data = $this->model->searchData($keyword);

        // kembalikan nilai variabel "result" ke dalam object "bibit"
        return response(["bibit" => $data], http_response_code());
    }

    // buat fungsi untuk tambah data
    function saveData(Request $req)
    {
        // ambil data kode
        $kode = $req->kode;

        // jika kode sudah ada
        if (count($this->model->checkSaveData($kode)) != 0) {
            $error = 1;
            $message = "Data Gagal Disimpan (kode Sudah Terpakai !)";
        }
        // jika kode belum ada
        else {
            // ambil request
            $jenis = $req->jenis;
            $jumlah= $req->jumlah;
            $ukuran = $req->ukuran;

            // proses simpan data
            $this->model->saveData($kode, $jenis, $jumlah, $ukuran);

            $error = 0;
            $message = "Data Berhasil Disimpan";
        }

        return response(["error" => $error, "message" => $message], http_response_code());
    }

    // buat fungsi hapus data
    function deleteData($kode)
    {
        // cek apakah data bibit ikan (kode) tersedia/tidak pada model checkData
        // jika data tersedia
        if (count($this->model->checkData($kode)) == 1) {
            // panggil model "deleteData"
            $this->model->deleteData($kode);

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

    // buat fungsi untuk detail data
    function detailData($kode)
    {
        // isi nilai variabel "result" dari fungsi "detailData" dari model "MDatabibit" sesuai dengan isi parameter "id"
        $data = $this->model->detailData($kode);

        // kembalikan nilai variabel "result" ke dalam object "bibit"
        return response(["bibit" => $data], http_response_code());
    }

    // buat fungsi untuk edit data
    function editData($kode_lama, Request $req)
    {
        // ambil data kode
        $kode = $req->kode;



        // cek apakah data bibit ikan (kode) tersedia/tidak pada model checkEditData
        // jika data tersedia
        if (count($this->model->checkEditData($kode_lama, $kode)) == 0) {
            $jenis = $req->jenis;
            $jumlah= $req->jumlah;
            $ukuran = $req->ukuran;

            // panggil model "editData"
            $this->model->editData($kode, $jenis, $jumlah, $ukuran, $kode_lama);

            $error = 0;
            $message = "Data Berhasil Diubah";
        }
        // jika data tidak tersedia
        else {
            $error = 1;
            $message = "Data Gagal Diubah (kode Sudah Terpakai !)";
        }



        return response(["error" => $error, "message" => $message], http_response_code());
    }
}
