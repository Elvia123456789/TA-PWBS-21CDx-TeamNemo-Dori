import React from "react";
import type { Metadata } from "next";
import PageLogin from "./page";

export const metadata: Metadata = {
  title: "Login",
};

export default function LoginLayout() {
  return (
    <div>
      {/* panggil file "page" (folder "login") */}
      <PageLogin
       
      />
    </div>
  );
}