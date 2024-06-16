"use client"
import React, { useState } from 'react'

import Link from 'next/link';

import useSWR from "swr";

// buat fungsi untuk fetchData
const fetchData = (url: string) =>
    fetch(url).then((response) => response.json());

export default function PakanPage() {
    // buat state awal
    const [search, setSearch] = useState("");

    // buat fungsi untuk pencarian
    const searchData = (e: any) => {
        e.preventDefault();

        // isi nilai result dari text cari yang diisi
        const result = e.target[0].value;
        // isi nilai state "setSearch"
        setSearch(result);
    };

    // buat variabel object
    // process.env.API diambil dari file "next.config.mjs"
    const { data, mutate } = useSWR(
        search == ""
            ? `${process.env.API}/view`
            : `${process.env.API}/search/${search}`,
        fetchData
    );

    // buat fungsi untuk hapus data
    const setDelete = (kode: string, jenis: string) => {
        // alert(`Data DataPakan : ${jenis} Ingin Dihapus ?`);

        // konfirmasi hapus data
        // jika tombol "Ok" dipilih
        if (confirm(`Data Pakan : ${jenis} Ingin Dihapus ?`) == true) {
            // buat variabel untuk hash "kode"
            let kode_hash = btoa(kode);
            // ambil service "delete" dari service
            fetch(`${process.env.API}/delete/${kode_hash}`, {
                method: "DELETE",
            })
                // response (format json)
                .then((response) => response.json())
                // result (hasil dari "response")
                .then((result) => {
                    alert(result.message);
                    // refresh data
                    mutate(data);
                })
                // jika proses "fetch" bermasalah
                .catch(() => console.error("Data Gagal Dikirim !"));
        }
    };

    let data_number = 1

    return (
        <div>
            {/* area menu */}
            <nav className="flex justify-center bg-gradient-to-r from-gray-300 to-sky-300 p-3 shadow-lg">
                <Link
                    href={"/"}
                    className="flex justify-center mr-1 px-5 py-3 w-50 rounded-full text-white active:bg-sky-300 active:text-grey w-2/12"
                >
                    Home
                </Link>
                <a
                    href={"/kolam"}
                    className="flex justify-center mr-1 px-5 py-3 w-50 rounded-full text-white active:bg-sky-300 active:text-grey w-2/12"
                >
                    Data Kolam
                </a>
                <a
                    href={"/bibit"}
                    className="flex justify-center mr-1 px-5 py-3 w-50 rounded-full text-white active:bg-sky-300 active:text-grey w-2/12"
                >
                    Data Bibit
                </a>
                <a
                    href={"/pakan"}
                    className="flex justify-center mr-1 px-5 py-3 w-50 rounded-full text-white active:bg-sky-300 active:text-grey w-2/12"
                >
                    Data Pakan
                </a>
                <a
                    href={"/panen"}
                    className="flex justify-center mr-1 px-5 py-3 w-50 rounded-full text-white active:bg-sky-300 active:text-grey w-2/12"
                >
                    Data Panen
                </a>

            </nav>

            {/* area data pakan */}
            <div className="container mx-auto p-8">
                <h1 className="text-4xl font-bold mb-4">Data Pakan</h1>
                <div className="flex flex-col md:flex-row gap-4 mb-5 items-center">
                    <Link
                        href="/add"
                        className="mr-1 bg-sky-300 px-5 py-3 w-40 rounded-full text-white active:bg-black active:text-sky-300 text-center"
                    >
                        Tambah Data
                    </Link>
                    <form action="" onSubmit={searchData} className="flex items-center space-x-5 w-2/5">
                        <input
                            type="text"
                            placeholder="Cari Data Pakan (Kode / Jenis / Jumlah)"
                            className="border-2 border-slate-300 px-3 py-2 rounded-lg outline-none focus:border-sky-300 w-full"
                            onChange={(e) => (e.target.value)}
                        />
                        <button className="mr-1 bg-sky-300 px-5 py-3 w-40 rounded-full text-white active:bg-black active:text-sky-300 text-center">
                            Cari Data
                        </button>
                    </form>
                </div>
                <div className="bg-white rounded-lg shadow p-6">
                    <table className="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th className="py-2 px-4 border-b-2 border-gray-200">Aksi</th>
                                <th className="py-2 px-4 border-b-2 border-gray-200">No</th>
                                <th className="py-2 px-4 border-b-2 border-gray-200">Kode Pakan</th>
                                <th className="py-2 px-4 border-b-2 border-gray-200">Jenis Pakan</th>
                                <th className="py-2 px-4 border-b-2 border-gray-200">Jumlah Pakan</th>
                            </tr>
                        </thead>

                        {/* isi tabel */}
                        <tbody>
                            {/* tampilkan data panen dari service getData dalam format object */}

                            {
                                // jika data tidak ditemukan
                                data && data.datapakan.length == 0 ? (
                                    // {/* kondisi ketika data tidak ditemukan */}
                                    <tr>
                                        <td
                                            colSpan={5}
                                            className="border-2 border-slate-300 bg-white text-black h-8 text-center p-1"
                                        >
                                            Data Tidak Ditemukan !
                                        </td>
                                    </tr>
                                ) : (

                                    // isi nilai data dan lakukan pengambilan data
                                    data &&
                                    data.datapakan.map((item: any) => (
                                        <tr key={item.id_pakan}>
                                            <td className="border-2 border-slate-300 bg-white text-black h-8 text-center p-3">
                                                <Link
                                                    href={`/edit/${btoa(item.kode_pakan)}`}
                                                    className="bg-sky-700 text-white px-3 py-2 rounded-md mr-1"
                                                >
                                                    <i className="fa-solid fa-pencil"></i>
                                                </Link>
                                                <Link
                                                    href={"/"}
                                                    className="bg-rose-700 text-white px-3 py-2 rounded-md ml-1"
                                                    onClick={(e) =>
                                                        setDelete(item.kode_pakan, item.jenis_pakan)
                                                    }
                                                >
                                                    <i className="fa-solid fa-trash-can"></i>
                                                </Link>
                                            </td>
                                            <td className="py-2 px-4 border-b border-gray-200">{data_number++}</td>
                                            <td className="py-2 px-4 border-b border-gray-200">{item.kode_pakan}</td>
                                            <td className="py-2 px-4 border-b border-gray-200">{item.jenis_pakan}</td>
                                            <td className="py-2 px-4 border-b border-gray-200">{item.jumlah_pakan}</td>
                                        </tr>
                                    ))
                                )
                            }
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    )
}
