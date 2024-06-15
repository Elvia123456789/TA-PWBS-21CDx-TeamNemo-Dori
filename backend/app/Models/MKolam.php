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
         $query = $this->select("id AS id_kolam", "nama AS nama_kolam", "ukuran AS ukuran_kolam", "jenis AS jenis_kolam")->from($this->table)->orderBy("id");
 
         return $query->get();
        }  

}
