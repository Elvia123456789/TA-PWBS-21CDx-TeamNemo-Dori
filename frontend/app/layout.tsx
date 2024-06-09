import type { Metadata } from "next";
// panggil file "style.module.css"
import style from "./styles/style.module.css";
// panggil file tailwind
import "tailwindcss/tailwind.css";
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
      <body className={style.layout}>

        {/* <div class="abc def hij"></div> */}
        <section className={`${style.content} ${style.content_bg}`}>
          {children}
        </section>

        <footer className={style.footer}>&copy; 2024 | PWBS - NEMO & DORI</footer>
      </body>
    </html>
  );
}
