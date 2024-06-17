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

     // buat fungsi untuk check data (berdasarkan kode)
    function checkData($kode)
    {
        // $query = $this->select("id")->where("kode", "=", $kode);
        $query = $this->select("id")
        ->whereRaw("TO_BASE64(kode) = '$kode'");

        return $query->get();
    }

    // buat fungsi untuk hapus data
    function deleteData($kode)
    {
        // $this->where("kode","=",$kode)->delete();
        $this->whereRaw("TO_BASE64(kode) = '$kode'")->delete();
    }

    // buat fungsi untuk detail data
    function detailData($kode)
    {
        $query = $this->select("id AS id_bibit", "kode AS kode_bibit", "jenis AS jenis_bibit", "jumlah AS jumlah_bibit",  "ukuran AS ukuran_bibit")->from($this->table)->whereRaw("TO_BASE64(kode) = '$kode'");

        return $query->get();
    }

     // buat fungsi untuk cek edit data
     function checkEditData($kode_lama, $kode)
     {
         $query = $this->select("id")->where("kode","=",$kode)->whereRaw("TO_BASE64(kode) != '$kode_lama'")->get();
 
         return $query;
 
     }
 
     // buat fungsi untuk edit data
     function editData($kode, $nama, $telepon, $jurusan, $kode_lama)
     {
         $this->whereRaw("TO_BASE64(kode) = '$kode_lama'")->update([
             "kode" => $kode,
             "jenis" => $jenis,
             "jumlah" => $jumlah,
             "ukuran" => $ukuran,
         ]);
     }   
}
