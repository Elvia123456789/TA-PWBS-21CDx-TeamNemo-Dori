<?php

namespace App\Http\Controllers;

use App\Models\MKolam;
use Illuminate\Http\Request;

class Kolam extends Controller
{
    // buat inisialisasi untuk pengambilan model
    protected $model;

    // buat konstruktor
    function __construct()
    {
        // isi nilai variabel "$model" 
        $this->model = new MKolam();
    }
}
