"use client"
import React from 'react'

import Link from 'next/link';

export default function ViewPage() {
    return (
        <div>
            {/* area menu */}
            <nav>
                <Link
                    href={"/login"}
                    className="mr-1 bg-sky-300 px-5 py-3 w-30 rounded-full text-white active:bg-black active:text-sky-300 text-left"
                >
                    Log in
                </Link>
                <a
                    href={"/"}
                    className="mr-1 border-2 border-sky-300 bg-sky-50 px-5 py-3 w-30 rounded-full text-grey active:bg-black active:text-sky-300 text-left"
                >
                    Sign in
                </a>
                <a
                    href={"/kolam"}
                    className="mr-1 px-5 py-3 w-50 rounded-full text-grey active:bg-sky-300 active:text-grey text-center"
                >
                    Kolam
                </a>
                <a
                    href={"/bibit"}
                    className="mr-1 px-5 py-3 w-50 rounded-full text-grey active:bg-sky-300 active:text-grey text-center"
                >
                    Bibit
                </a>
                <a
                    href={"/pakan"}
                    className="mr-1 px-5 py-3 w-50 rounded-full text-grey active:bg-sky-300 active:text-grey text-center"
                >
                    Pakan
                </a>
                <a
                    href={"/pemesanan"}
                    className="mr-1 px-5 py-3 w-50 rounded-full text-grey active:bg-sky-300 active:text-grey text-center"
                >
                    Pemesanan
                </a>
            </nav>
        </div>
    )
}
