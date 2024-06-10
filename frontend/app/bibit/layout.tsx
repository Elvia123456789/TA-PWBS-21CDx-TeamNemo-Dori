import React from "react";
import type { Metadata } from "next";
import BibitPage from "./page";

export const metadata: Metadata = {
  title: "Data Bibit",
};

export default function BibitLayout() {
  return (
    <div>
      {/* panggil file "page" (folder "bibit") */}
      <BibitPage
      />
    </div>
  );
}