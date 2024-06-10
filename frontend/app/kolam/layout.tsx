import React from "react";
import type { Metadata } from "next";
import KolamPage from "./page";

export const metadata: Metadata = {
  title: "Data Kolam",
};

export default function KolamLayout() {
  return (
    <div>
      {/* panggil file "page" (folder "kolam") */}
      <KolamPage
       
      />
    </div>
  );
}