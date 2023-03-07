/// <reference types="vite/client" />

interface ImportMetaEnv extends Readonly<Record<string, string>> {
  // ... could include environment variables

  /** APP NAME */
  readonly VITE_APP_NAME: string;
}

interface ImportMeta {
  readonly env: ImportMetaEnv;
}
