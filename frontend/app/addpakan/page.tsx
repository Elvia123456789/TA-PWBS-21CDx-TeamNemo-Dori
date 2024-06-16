"use client";

import axios from "axios";
import React, { useState } from "react";

export default function AddPage() {
  // buat state untuk untuk setiap komponen
  const [getKode, setKode] = useState("");
  const [getJenis, setJenis] = useState("");
  const [getJumlah, setJumlah] = useState("");

  // buat arrow function untuk "setPost"
  const setPost = () => {
    // jika ada salah satu komponen tidak diisi
    if (getKode == "" || getJenis == "" || getJumlah == "") {
      alert("Seluruh Data Wajib Diisi !");
    }
    // jika semua komponen diisi
    else {
      // kirim ke service "POST" backend
      // process.env.API diambil dari file "next.config.mjs"
      axios
        .post(`${process.env.API}/save`, {
          kode: getKode,
          jenis: getJenis,
          jumlah: getJumlah,
        })
        .then((response: { data: { message: any; error: number; }; }) => {
          // ambil nilai "message" dari server
          alert(response.data.message);

          // jika nilai "error" = 0
          if (response.data.error == 0) {
            // panggil fungsi "setRefresh"
            setRefresh();
          }
        });
    }
  };

  // buat arrow function untuk "btn_refresh"
  const setRefresh = () => {
    location.reload();
  };

  return (
    <div className="bg-white rounded-lg shadow p-10 m-40">
      {/* area komponen */}
      <section className="flex items-center mb-4 ">
        {/* area label */}
        <section className="w-1/4">
          <label htmlFor="txt_kode">Kode Pakan</label>
        </section>

        {/* area input */}
        <section className="w-3/4">
          <input
            type="text"
            name=""
            id="txt_kode"
            className="w-full border-2 border-slate-300 px-3 py-2 rounded-lg outline-none focus:border-sky-500"
            placeholder="Isi Data Kode Pakan"
            onChange={(e) => setKode(e.target.value)}
          />
        </section>
      </section>

      {/* area komponen */}
      <section className="flex items-center mb-4">
        {/* area label */}
        <section className="w-1/4">
          <label htmlFor="txt_jenis">Jenis Pakan</label>
        </section>

        {/* area input */}
        <section className="w-3/4">
          <input
            type="text"
            name=""
            id="txt_jenis"
            className="w-full border-2 border-slate-300 px-3 py-2 rounded-lg outline-none focus:border-sky-500"
            placeholder="Isi Data Jenis Pakan"
            onChange={(e) => setJenis(e.target.value)}
          />
        </section>
      </section>

      {/* area komponen */}
      <section className="flex items-center mb-4">
        {/* area label */}
        <section className="w-1/4">
          <label htmlFor="txt_jumlah">Jumlah Pakan</label>
        </section>

        {/* area input */}
        <section className="w-3/4">
          <input
            type="text"
            name=""
            id="txt_jumlah"
            className="w-full border-2 border-slate-300 px-3 py-2 rounded-lg outline-none focus:border-sky-500"
            placeholder="Isi Data Jumlah Pakan"
            onChange={(e) => setJumlah(e.target.value)}
          />
        </section>
      </section>

      {/* area komponen */}
      <section className="flex items-center">
        {/* area label */}
        <section className="w-1/4"></section>

        {/* area button */}
        <section className="w-3/4">
          <button
            id="btn_simpan"
            className="mr-1 bg-sky-500 px-5 py-3 w-40 rounded-full text-white active:bg-black active:text-sky-300 text-center"
            onClick={setPost}
          >
            Simpan
          </button>

          <button
            id="btn_refresh"
            className="ml-1 border-2 border-sky-500 px-5 py-3 w-40 rounded-full text-center"
            onClick={setRefresh}
          >
            Refresh
          </button>
        </section>
      </section>
    </div>
  );
}
