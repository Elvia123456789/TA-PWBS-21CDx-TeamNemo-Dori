"use client"
import React from 'react'

import Link from 'next/link';

export default function ViewPage() {
    return (
        <div>
            {/* area menu */}
            <nav className="flex justify-right bg-gradient-to-r from-gray-300 to-sky-300 p-3 shadow-lg">
                <Link
                    href={"/login"}
                    className="mr-1 bg-sky-300 px-5 py-3 w-30 rounded-full text-white active:bg-black active:text-sky-300"
                >
                    Log in
                </Link>
                <a
                    href={"/"}
                    className="flex justify-center mr-1 px-5 py-3 w-50 rounded-full text-white active:bg-sky-300 active:text-grey w-2/12"
                >
                    Home
                </a>
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


            {/* area home */}
            <div className="bg-gradient-to-r from-gray-300 to-sky-300 shadow py-12 flex items-center">
                <div className="w-2/3">
                    <h1 className="text-white text-4xl font-bold mb-4 ml-14">Sistem Informasi Budidaya Ikan Lele</h1>
                    <p className="text-white text-lg mb-4 ml-14">
                        Budidaya ikan lele adalah salah satu bentuk budidaya perikanan yang populer di Indonesia dan banyak negara lainnya. Ikan lele dikenal sebagai ikan yang mudah dipelihara dan memiliki nilai ekonomi yang tinggi.
                    </p>
                </div>
                <div className="w-1/3 flex justify-center">
                    <img
                        src="../images/logo.png"
                        alt="Logo"
                        width={600}
                        height={600}
                        className="w-4/6 flex justify-right"
                    />
                </div>
            </div>

            <div className="container mx-auto p-8">
                <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    <div className="bg-sky-300 p-6 rounded-lg shadow-md">
                        <h2 className="text-gray font-bold mb-2 text-center">Pengendalian Hama dan Penyakit</h2>
                        <p className="text-gray">Pencegahan hama dan penyakit sangat penting untuk menjaga kesehatan ikan lele. Beberapa langkah yang dapat dilakukan adalah:
                            Karantina Bibit (Karantina bibit sebelum dimasukkan ke kolam utama). Sanitasi Kolam (Bersihkan kolam secara rutin). Penggunaan Obat dan Vitamin(Berikan obat dan vitamin sesuai kebutuhan.).</p>
                    </div>
                    <div className="bg-sky-300 p-6 rounded-lg shadow-md">
                        <h2 className="text-gray font-bold mb-2 text-center">Pengelolaan Kualitas Air</h2>
                        <p className="text-gray">Kualitas air sangat berpengaruh pada kesehatan dan pertumbuhan ikan lele. Beberapa parameter kualitas air yang perlu diperhatikan adalah:
                            pH Air (pH ideal untuk budidaya lele adalah antara 6.5 hingga 8).
                            Suhu Air (Suhu optimal untuk pertumbuhan lele berkisar antara 28-30°C).
                            Kadar Oksigen (Pastikan kadar oksigen terlarut dalam air cukup, minimal 3 mg/liter).</p>
                    </div>
                    <div className="bg-sky-300 p-6 rounded-lg shadow-md">
                        <h2 className="text-gray font-bold mb-2 text-center">Keuntungan Budidaya Ikan Lele</h2>
                        <p className="text-gray">Mudah Dipelihara (Ikan lele tahan terhadap kondisi lingkungan yang buruk).
                            Cepat Panen (Masa panen ikan lele relatif singkat, sekitar 3-4 bulan).
                            Pasar yang Luas (Permintaan ikan lele cukup tinggi di pasaran).
                            Biaya Rendah (Biaya produksi ikan lele relatif rendah dibandingkan jenis ikan lainnya).</p>
                    </div>
                </div>
            </div>
        </div>
    );
}

