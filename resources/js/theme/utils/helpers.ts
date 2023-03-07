import { id } from "date-fns/locale";
import { differenceInDays, format, formatDistanceStrict } from "date-fns";

export const APP_NAME = import.meta.env.VITE_APP_NAME;
export const APP_URL = import.meta.env.VITE_APP_URL;
export const APP_DOMAIN = `.${import.meta.env.VITE_APP_DOMAIN}`;

export const url = (path: string) => `${APP_URL}/${path}`;

export function getRandomInt(min: number, max: number) {
  min = Math.ceil(min);
  max = Math.floor(max);

  return Math.floor(Math.random() * (max - min + 1)) + min;
}

export function slugify(text: any) {
  return text
    .toString()
    .toLowerCase()
    .replace(/^-+/, "")
    .replace(/-+$/, "")
    .replace(/\s+/g, "-")
    .replace(/\-\-+/g, "-")
    .replace(/[^\w\-]+/g, "");
}

export function discount(price: number, discount: number) {
  const discountNominal = price * (discount / 100);
  const result = price - discountNominal;

  return Math.round(result);
}

export function formatDate(
  date: Date | string,
  formatType: string = "yyyy-MM-dd",
) {
  const newDate = new Date(date);

  return format(newDate, formatType, { locale: id });
}

export function shortTimestamp(
  date: Date | string,
  formatType: string = "EEEE, dd MMMM yyyy",
) {
  const articleDate = new Date(date);
  const todayDate = new Date();

  if (differenceInDays(todayDate, articleDate) > 6) {
    return format(articleDate, formatType, { locale: id });
  }

  return formatDistanceStrict(articleDate, todayDate, {
    locale: id,
    addSuffix: true,
  });
}

export function formatNumber(number: number, options: object = {}) {
  return new Intl.NumberFormat("id-ID", options).format(number);
}

export const fetchImageToDataURL = (url: string) =>
  fetch(url)
    .then((response) => response.blob())
    .then(
      (blob) =>
        new Promise((resolve, reject) => {
          const reader = new FileReader();
          reader.onloadend = () => resolve(reader.result);
          reader.onerror = reject;
          reader.readAsDataURL(blob);
        }),
    );
