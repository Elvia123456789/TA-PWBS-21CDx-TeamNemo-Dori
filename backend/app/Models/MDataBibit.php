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
}
