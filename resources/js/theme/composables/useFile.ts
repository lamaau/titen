import { DocumentTextIcon, PhotoIcon } from "@heroicons/vue/24/solid";

export default function useFile({ name }) {
 let ext = name.substring(name.lastIndexOf(".") + 1, name.length) || name;

 return {
  ext,
 };
}
