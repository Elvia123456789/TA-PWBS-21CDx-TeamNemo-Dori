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
                    href={"/pemesanan"}
                    className="flex justify-center mr-1 px-5 py-3 w-50 rounded-full text-white active:bg-sky-300 active:text-grey w-2/12"
                >
                    Data Pemesanan
                </a>
            </nav>


            {/* area home */}
            <div className="bg-gradient-to-r from-gray-300 to-sky-300 rounded-lg shadow py-20 mt-16 flex items-center">
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
        </div>
    )
}

