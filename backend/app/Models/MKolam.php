<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MKolam extends Model
{
     // buat variabel untuk inisialisasi tabel
     protected $table = "tb_kolam";

     // buat fungsi untuk menampilkan data mahasiswa
     function viewData()
     {
         $query = $this->select("id AS id_kolam", "nama AS nama_kolam", "jenis AS jenis_kolam", "ukuran AS ukuran_kolam")->from($this->table)->orderBy("id");
 
         return $query->get();
        }

         // buat fungsi untuk pencarian data mahasiswa
    function searchData($keyword)
    {
        $query = $this->select("id AS id_kolam", "nama AS nama_kolam", "jenis AS jenis_kolam", "ukuran AS ukuran_kolam")->from($this->table)
        // pencarian nama, ukuran dan jenis harus sesuai dengan data
        ->orWhere('jenis', $keyword)
        ->orWhere('ukuran', $keyword)
        // pencarian nama sesuai dengan karakter yang ada pada data
        ->orWhereRaw('nama LIKE ?',["%$keyword%"])
        ->orderBy("id");

        return $query->get();
    }  

    // buat fungsi untuk cek simpan data
    function checkSaveData($jenis)
    {
        $query = $this->select("jenis")->from($this->table)->where("npm", "=", $npm);

        return $query->get();
    }

    // buat fungsi untuk simpan data
    function saveData($nama, $jenis, $ukuran)
    {
        $this->insert([
            "nama" => $nama,
            "jenis" => $jenis,
            "ukuran" => $ukuran,
        ]);
    }

    // buat fungsi untuk check data (berdasarkan jenis)
    function checkData($nama)
    {
        // $query = $this->select("id")->where("npm", "=", $npm);
        // $query = $this->select("id")
        // ->whereRaw("TO_BASE64(npm) = '$npm'");

        return $query->get();
    }

     // buat fungsi untuk hapus data
     function deleteData($nama)
     {
         // $this->where("npm","=",$npm)->delete();
        //  $this->whereRaw("TO_BASE64(npm) = '$npm'")->delete();
     }

    //  // buat fungsi untuk detail data
    // function detailData($jenis)
    // {
    //     $query = $this->select("id AS id_kolam", "nama AS nama_kolam", "jenis AS jenis_kolam", "ukuran AS ukuran_kolam")->from($this->table)->whereRaw("TO_BASE64(npm) = '$npm'");

    //     return $query->get();
    // }

    // buat fungsi untuk cek edit data
    function checkEditData($jenis_lama, $jenis)
    {
        $query = $this->select("id")->where("jenis","=",$jenis)->whereRaw("TO_BASE64(jenis) != '$jenis_lama'")->get();

        return $query;

    }





}
