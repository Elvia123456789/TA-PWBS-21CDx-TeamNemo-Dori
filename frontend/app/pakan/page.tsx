"use client"
import React from 'react'

import Link from 'next/link';

export default function PakanPage() {
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
                <div className="bg-white rounded-lg shadow p-6">
                    <table className="min-w-full bg-white">
                    <thead>
                            <tr>
                                <th className="py-2 px-4 border-b-2 border-gray-200">No</th>
                                <th className="py-2 px-4 border-b-2 border-gray-200">Kode Pakan</th>
                                <th className="py-2 px-4 border-b-2 border-gray-200">Jenis</th>
                                <th className="py-2 px-4 border-b-2 border-gray-200">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>


                            <tr>
                                <td className="py-2 px-4 border-b border-gray-200">{/*{item.id_pakan}*/}</td>
                                <td className="py-2 px-4 border-b border-gray-200">{/*{item.kode_pakan}*/}</td>
                                <td className="py-2 px-4 border-b border-gray-200">{/*{item.jenis_pakan}*/}</td>
                                <td className="py-2 px-4 border-b border-gray-200">{/*{item.jumlah_pakan}*/}</td>
                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    )
}
