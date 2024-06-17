<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MDataPakan extends Model
{
    // buat fungsi untuk menampilkan data pakan
    protected $table = "pakan";

    // buat fungsi untuk menampilkan data pakan
    function viewData()
    {
        $query = $this->select("id AS id_pakan", "kode AS kode_pakan", "jenis AS jenis_pakan", "jumlah AS jumlah_pakan")->from($this->table)->orderBy("id");

        // $query = $this->from($this->table)->where("id","0")->orderBy("id");

        return $query->get();
    }

    // buat fungsi untuk pencarian data pakan
    function searchData($keyword)
    {
        $query = $this->select("id AS id_pakan", "kode AS kode_pakan", "jenis AS jenis_pakan", "jumlah AS jumlah_pakan")->from($this->table)
        // pencarian kode dan jumlah harus sesuai dengan data
        ->where('kode', $keyword)
        ->orWhere('jumlah', $keyword)
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
        //$this->where("kode","=",$kode)->delete();
        //$this->delete();
        $this->whereRaw("TO_BASE64(kode) = '$kode'")->delete();
    }

    // buat fungsi untuk detail data
    function detailData($kode)
    {
        $query = $this->select("id AS id_pakan", "kode AS kode_pakan", "jenis AS jenis_pakan", "jumlah AS jumlah_pakan")->from($this->table)->whereRaw("TO_BASE64(kode) = '$kode'");

        return $query->get();
    }

    //buat fungsi untuk cek edit data
    function checkEditData($kode_lama, $kode)
    {
        $query = $this->select("id")->where("kode","=",$kode)->whereRaw("TO_BASE64(kode) != '$kode_lama'")->get();

        return $query;
    }

    // buat fungsi untuk edit data
    function editData($kode, $jenis, $jumlah, $kode_lama)
    {
        $this->whereRaw("TO_BASE64(kode) = '$kode_lama'")->update([
            "kode" => $kode,
            "jenis" => $jenis,
            "jumlah" => $jumlah,
        ]);
    }
}
