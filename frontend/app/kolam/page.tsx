"use client"
import React from 'react'

import Link from 'next/link';

export default function KolamPage() {
    return (
        <div>
            {/* area menu */}
            <nav className="flex justify-center bg-gradient-to-r from-gray-300 to-sky-300 p-3 shadow-lg">
            <Link
                    href={"/view"}
                    className="flex justify-center mr-1 px-5 py-3 w-50 rounded-full text-white active:bg-sky-300 active:text-grey w-2/12"
                >
                    Home
                    </Link>
                <a
                    href={"/kolam"}
                    className="flex justify-center mr-1 px-5 py-3 w-50 rounded-full text-white active:bg-sky-300 active:text-grey w-2/12"
                >
                    Kolam
                </a>
                <a
                    href={"/bibit"}
                    className="flex justify-center mr-1 px-5 py-3 w-50 rounded-full text-white active:bg-sky-300 active:text-grey w-2/12"
                >
                    Bibit
                </a>
                <a
                    href={"/pakan"}
                    className="flex justify-center mr-1 px-5 py-3 w-50 rounded-full text-white active:bg-sky-300 active:text-grey w-2/12"
                >
                    Pakan
                </a>
                <a
                    href={"/pemesanan"}
                    className="flex justify-center mr-1 px-5 py-3 w-50 rounded-full text-white active:bg-sky-300 active:text-grey w-2/12"
                >
                    Pemesanan
                </a>
                
            </nav>

            {/* area home */}
        </div>
    )
}
