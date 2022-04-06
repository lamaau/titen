import { id } from "date-fns/locale";
import { differenceInDays, format, formatDistanceStrict } from "date-fns";

/**
 * Formating number
 *
 * @param {Number|String} number
 * @returns
 */
const formatNumber = (number) => {
  if (typeof number == "undefined" || number == null || number == 0) return 0;

  return Intl.NumberFormat("id-ID").format(number);
};

/**
 * Get total days in a month
 *
 * @param {String} month
 * @param {String} year
 * @returns
 */
const daysInMonth = (month, year) => {
  let dt = new Date();

  if (typeof month === "undefined" || typeof month === null) {
    month = dt.getMonth();
  }

  if (typeof year === "undefined" || typeof year === null) {
    year = dt.getFullYear();
  }

  let daysInMonth = new Date(year, month, 0).getDate();

  return daysInMonth;
};

/**
 * @see https://www.w3resource.com/javascript-exercises/javascript-math-exercise-22.php
 */
const romanToNumber = (str1) => {
  const char_to_int = function (c) {
    switch (c) {
      case "I":
        return 1;
      case "V":
        return 5;
      case "X":
        return 10;
      case "L":
        return 50;
      case "C":
        return 100;
      case "D":
        return 500;
      case "M":
        return 1000;
      default:
        return -1;
    }
  };

  if (str1 == null) return -1;
  var num = char_to_int(str1.charAt(0));
  var pre, curr;

  for (var i = 1; i < str1.length; i++) {
    curr = char_to_int(str1.charAt(i));
    pre = char_to_int(str1.charAt(i - 1));

    if (curr <= pre) {
      num += curr;
    } else {
      num = num - pre * 2 + curr;
    }
  }

  return num;
};

/**
 * Number to roman
 *
 * @param {String} num
 * @returns
 */
const numberToRoman = (num) => {
  if (!+num) return false;
  let digits = String(+num).split(""),
    key = [
      "",
      "C",
      "CC",
      "CCC",
      "CD",
      "D",
      "DC",
      "DCC",
      "DCCC",
      "CM",
      "",
      "X",
      "XX",
      "XXX",
      "XL",
      "L",
      "LX",
      "LXX",
      "LXXX",
      "XC",
      "",
      "I",
      "II",
      "III",
      "IV",
      "V",
      "VI",
      "VII",
      "VIII",
      "IX",
    ],
    roman = "",
    i = 3;
  while (i--) roman = (key[+digits.pop() + i * 10] || "") + roman;
  return Array(+digits.join("") + 1).join("M") + roman;
};

const shortTimestamp = (date) => {
  const givenDate = new Date(date);
  const todayDate = new Date();

  if (differenceInDays(todayDate, givenDate) > 6) {
    return format(givenDate, "EEEE, dd MMMM yyyy", { locale: id });
  }

  return formatDistanceStrict(givenDate, todayDate, {
    locale: id,
    addSuffix: true,
  });
};

const formatDate = (date) => {
  let newDate = new Date(date);

  return format(newDate, "EEEE, dd MMMM yyyy", { locale: id });
};

export {
  daysInMonth,
  formatNumber,
  romanToNumber,
  numberToRoman,
  shortTimestamp,
  formatDate,
};

export default {
  daysInMonth,
  formatNumber,
  romanToNumber,
  numberToRoman,
  shortTimestamp,
  formatDate,
};
