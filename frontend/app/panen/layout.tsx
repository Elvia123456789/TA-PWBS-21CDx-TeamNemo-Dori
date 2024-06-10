import React from "react";
import type { Metadata } from "next";
import PanenPage from "./page";

export const metadata: Metadata = {
  title: "Data Panen",
};

export default function PanenLayout() {
  return (
    <div>
      {/* panggil file "page" (folder "panen") */}
      <PanenPage
       
      />
    </div>
  );
}