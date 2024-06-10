import React from "react";
import type { Metadata } from "next";
import RegisterPage from "./page";

export const metadata: Metadata = {
  title: "Register",
};

export default function RegisterLayout() {
  return (
    <div>
      {/* panggil file "page" (folder "register") */}
      <RegisterPage
       
      />
    </div>
  );
}