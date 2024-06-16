<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MDataPakan extends Model
{
    // buat fungsi untuk menampilkan data pakan
    protected $table = "tb_datapakan";

    // buat fungsi untuk menampilkan data pakan
    function viewData()
    {
        $query = $this->select("id AS id_pakan", "kode AS kode_pakan", "jenis AS jenis_pakan", "jumlah AS jumlah_pakan")->from($this->table)->orderBy("id");

        // $query = $this->from($this->table)->where("id","0")->orderBy("id");

        return $query->get();
    }

    // buat fungsi untuk cek simpan data
    function checkSaveData($kode)
    {
        $query = $this->select("kode")->from($this->table)->where("kode", "=", $kode);

        return $query->get();
    }

    // buat fungsi untuk simpan data
    function saveData($kode, $jenis, $jumlah)
    {
        $this->insert([
            "kode" => $kode,
            "jenis" => $jenis,
            "jumlah" => $jumlah,
        ]);
    }

    //buat fungsi untuk check data (berdasarkan kode)
    function checkData($kode)
    {
        //$query = $this->select("id")->where("kode", "=", $kode);
        $query = $this->select("id")->whereRaw("TO_BASE64(kode) = '$kode'");

        return $query->get();
    }

    //buat fungsi untuk hapus data
    function deleteData($kode)
    {
        //$this->where("npm","=",$npm)->delete();
        //$this->delete();
        $this->whereRaw("TO_BASE64(kode) = '$kode'")->delete();
    }

    //buat fungsi untuk cek edit data
    function checkEditData($kode_lama, $kode)
    {
        $query = $this->select("id")->where("kode","=",$kode)->whereRaw("TO_BASE64(npm) != '$kode_lama'")->get();

        return $query;
    }

    // buat fungsi untuk edit data
    function editData($kode, $jenis, $jumlah, $kode_lama)
    {
        $this->whereRaw("TO_BASE64(npm) = '$kode_lama'")->update([
            "kode" => $kode,
            "jenis" => $jenis,
            "jumlah" => $jumlah,
        ]);
    }
}
