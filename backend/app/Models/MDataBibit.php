<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MDataBibit extends Model
{
       // buat fungsi untuk menampilkan data bibit
    protected $table = "tb_databibit";

    // buat fungsi untuk menampilkan data bibit
    function viewData()
    {
        $query = $this->select("id AS id_bibit", "kode AS kode_bibit", "jenis AS jenis_bibit", "jumlah AS jumlah_bibit",  "ukuran AS ukuran_bibit")->from($this->table)->orderBy("id");

        // $query = $this->from($this->table)->where("id","0")->orderBy("id");

        return $query->get();
    }

    // buat fungsi untuk pencarian data bibit
    function searchData($keyword)
    {
        $query = $this->select("id AS id_bibit", "kode AS kode_bibit", "jenis AS jenis_bibit", "jumlah AS jumlah_bibit",  "ukuran AS ukuran_bibit")->from($this->table)
        // pencarian kode dan jumlah harus sesuai dengan data
        ->where('kode', $keyword)
        ->orWhere('jumlah', $keyword)
        ->orWhere('ukuran', $keyword)
        // pencarian jenis sesuai dengan karakter yang ada pada data
        ->orWhereRaw('jenis LIKE ?',["%$keyword%"])
        ->orderBy("id");

        return $query->get();
    }

     // buat fungsi untuk cek simpan data
     function checkSaveData($kode)
     {
         $query = $this->select("kode")->from($this->table)->where("kode", "=", $kode);
 
         return $query->get();
     }
 
     // buat fungsi untuk simpan data
     function saveData($kode, $jenis, $jumlah, $ukuran)
     {
         $this->insert([
             "kode" => $kode,
             "jenis" => $jenis,
             "jumlah" => $jumlah,
             "ukuran" => $ukuran,
         ]);
     }
}