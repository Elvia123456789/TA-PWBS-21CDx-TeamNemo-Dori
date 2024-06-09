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
                    className="mr-1 border-2 border-sky-300 bg-sky-50 px-5 py-3 w-30 rounded-full text-grey active:bg-black active:text-sky-300"
                >
                    Sign in
                </a>
                
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
        </div>
    )
}
