import React from "react";
import type { Metadata } from "next";
import PakanPage from "./page";

export const metadata: Metadata = {
  title: "Data Pakan",
};

export default function PakanLayout() {
  return (
    <div>
      {/* panggil file "page" (folder "pakan") */}
      <PakanPage
       
      />
    </div>
  );
}