import React from 'react'

import Link from 'next/link';

export default function RegisterPage() {
    return (
        <div className="flex items-center justify-center min-h-screen bg-gray-100">
            <div className="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
                <h1 className="text-2xl font-bold mb-6 text-center">Register</h1>

                <div className="mb-4">
                    <label htmlFor="name" className="block text-gray-700 mb-2">Name</label>
                    <input
                        type="text"
                        id="name"
                        className="w-full p-2 border border-gray-300 rounded-lg"

                    />
                </div>
                <div className="mb-4">
                    <label htmlFor="email" className="block text-gray-700 mb-2">Email</label>
                    <input
                        type="email"
                        id="email"
                        className="w-full p-2 border border-gray-300 rounded-lg"

                    />
                </div>
                <div className="mb-6">
                    <label htmlFor="password" className="block text-gray-700 mb-2">Password</label>
                    <input
                        type="password"
                        id="password"
                        className="w-full p-2 border border-gray-300 rounded-lg"

                    />
                </div>
                <button
                    type="submit"
                    className="w-full bg-gradient-to-r from-gray-300 to-sky-300 text-white p-2 rounded-lg hover:bg-blue-600 transition duration-300"
                >
                    Register
                </button>

                <div className="mt-4 text-center">
                    <p> Sudah punya akun? <Link
                        href={"/login"}
                        className="text-blue-500"
                    >
                        Login
                    </Link></p>
                </div>
            </div>
        </div>

    )
}
