"use client"
import React from 'react'

import Link from 'next/link'

//import module/package "swr"
//import useSWR from 'swr'

//definisi "fetcher"
//const fetcher = (url: string) =>
    //fetch(url).then((response) => response.json())

export default function KolamPage() {
    //definisi "swr"
   // const { data } = useSWR('http://localhost:8000/api/view', fetcher)
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

            {/* area data kolam */}
            <div className="container mx-auto p-8">
                <h1 className="text-4xl font-bold mb-4">Data Kolam</h1>
                <div className="bg-white rounded-lg shadow p-6">
                    <table className="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th className="py-2 px-4 border-b-2 border-gray-200">Nama Kolam</th>
                                <th className="py-2 px-4 border-b-2 border-gray-200">Jenis</th>
                                <th className="py-2 px-4 border-b-2 border-gray-200">Ukuran</th>
                            </tr>
                        </thead>
                        <tbody>
                            {
                               // (data && data.kolam.map((item: any) => (
                                    <tr>
                                        <td className="py-2 px-4 border-b border-gray-200">{/*{item.nama_kolam}*/}</td>
                                        <td className="py-2 px-4 border-b border-gray-200">{/*{item.jenis_kolam}*/}</td>
                                        <td className="py-2 px-4 border-b border-gray-200">{/*{item.ukuran_kolam}*/}</td>
                                    </tr>
                                //)))
                            }
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    )
}
