import type { Metadata } from "next";

// panggil file tailwind
import "tailwindcss/tailwind.css";

//const inter = Inter({ subsets: ["latin"] });

export const metadata: Metadata = {
  title: "Sistem Informasi Budidaya Ikan Lele",
};

export default function MainLayout({
  children,
}: Readonly<{
  children: React.ReactNode;
}>) {
  return (
    <html lang="en">
      <head>
        {/* tambahkan favicon */}
        <link
          rel="shortcut icon"
          href="../images/favicon.png"
          type="image/x-icon"
        />
      </head>
      <body className="m-5">{children}</body>
    </html>
  );
}
