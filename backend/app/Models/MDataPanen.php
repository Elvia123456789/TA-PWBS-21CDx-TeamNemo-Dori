<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MDatapanen extends Model
{
       // buat fungsi untuk menampilkan data panen
    protected $table = "panen";

    // buat fungsi untuk menampilkan data panen
    function viewData()
    {
        $query = $this->select("id AS id_panen", "kode AS kode_panen", "jenis AS jenis_panen", "jumlah AS jumlah_panen",  "tanggal AS tanggal_panen")->from($this->table)->orderBy("id");

        // $query = $this->from($this->table)->where("id","0")->orderBy("id");

        return $query->get();
    }

    // buat fungsi untuk pencarian data panen
    function searchData($keyword)
    {
        $query = $this->select("id AS id_panen", "kode AS kode_panen", "jenis AS jenis_panen", "jumlah AS tanggal_panen",  "tanggal AS tanggal_panen")->from($this->table)
        // pencarian kode dan tanggal harus sesuai dengan data
        ->where('jenis', $keyword)
        ->orWhere('jumlah', $keyword)
        ->orWhere('tanggal', $keyword)
        // pencarian jumlah sesuai dengan karakter yang ada pada data
        ->orWhereRaw('kode LIKE ?',["%$keyword%"])
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
     function saveData($kode, $jenis, $jumlah, $tanggal)
     {
         $this->insert([
             "kode" => $kode,
             "jenis" => $jumlah,
             "jumlah" => $jumlah,
             "tanggal" => $tanggal,
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
        $query = $this->select("id AS id_panen", "kode AS kode_panen", "jenis AS jenis_panen", "jumlah AS jumlah_panen",  "tanggal AS tanggal_panen")->from($this->table)->whereRaw("TO_BASE64(kode) = '$kode'");

        return $query->get();
    }

     // buat fungsi untuk cek edit data
     function checkEditData($kode_lama, $kode)
     {
         $query = $this->select("id")->where("kode","=",$kode)->whereRaw("TO_BASE64(kode) != '$kode_lama'")->get();
 
         return $query;
 
     }
 
     // buat fungsi untuk edit data
     function editData($kode, $jenis, $jumlah, $tanggal, $kode_lama)
     {
         $this->whereRaw("TO_BASE64(kode) = '$kode_lama'")->update([
             "kode" => $kode,
             "jenis" => $jumlah,
             "jumlah" => $jumlah,
             "tanggal" => $tanggal,
         ]);
     }   
}
