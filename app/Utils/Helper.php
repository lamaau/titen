<?php

use Illuminate\Support\Carbon;

if (! function_exists('capitalize')) {
    function capitalize(string $string): string
    {
        return ucwords(strtolower($string));
    }
}

if (! function_exists('format_date')) {
    function format_date($date)
    {
        if (is_string($date)) {
            return Carbon::parse($date)->translatedFormat('d F Y');
        }
    }
}

if (! function_exists('user')) {
    /**
     * Get current user authenticated.
     *
     * @return User
     */
    function user()
    {
        return auth()->user();
    }
}

if (! function_exists('number_to_roman')) {
    /**
     * Convert number to roman.
     *
     * @param int|string $number
     * @return string
     */
    function number_to_roman($number): string
    {
        // Be sure to convert the given parameter into an integer
        $n = intval($number);
        $result = '';

        // Declare a lookup array that we will use to traverse the number:
        $lookup = [
            'M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400,
            'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40,
            'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1,
        ];

        foreach ($lookup as $roman => $value) {
            // Look for number of matches
            $matches = intval($n / $value);

            // Concatenate characters
            $result .= str_repeat($roman, $matches);

            // Substract that from the number
            $n = $n % $value;
        }

        return $result;
    }
}

if (! function_exists('format_number')) {
    /**
     * Format number.
     *
     * @param string|int|null $number
     * @return string
     */
    function format_number(string|int|null $number): string
    {
        return $number ? (string) number_format((float) $number, 0, ',', '.') : 0;
    }
}

if (! function_exists('array_split')) {
    /**
     * Splice and merge array.
     *
     * @param array $array
     * @param int $pieces
     * @return array
     */
    function array_split(array $array, $pieces = 2): array
    {
        if ($pieces < 2) {
            return [$array];
        }

        $newCount = ceil(count($array) / $pieces);
        $a = array_slice($array, 0, $newCount);
        $b = array_split(array_slice($array, $newCount), $pieces - 1);

        return array_merge([$a], $b);
    }
}

if (! function_exists('clean_number')) {
    /**
     * Clean number from dot.
     *
     * @param string|int|null $number
     * @return int
     */
    function clean_number(string|int|null $number): int
    {
        return $number ? (int) str_replace('.', '', $number) : 0;
    }
}

if (! function_exists('file_size_convert')) {
    /**
     * Converts bytes into human readable file size.
     *
     * @param string $bytes
     * @author Mogilev Arseny
     * @return null|string human readable file size (2,87 Мб)
     */
    function file_size_convert($bytes)
    {
        $bytes = floatval($bytes);
        $arBytes = [
            0 => [
                'UNIT' => 'TB',
                'VALUE' => pow(1024, 4),
            ],
            1 => [
                'UNIT' => 'GB',
                'VALUE' => pow(1024, 3),
            ],
            2 => [
                'UNIT' => 'MB',
                'VALUE' => pow(1024, 2),
            ],
            3 => [
                'UNIT' => 'KB',
                'VALUE' => 1024,
            ],
            4 => [
                'UNIT' => 'B',
                'VALUE' => 1,
            ],
        ];

        $result = null;

        foreach ($arBytes as $arItem) {
            if ($bytes >= $arItem['VALUE']) {
                $result = $bytes / $arItem['VALUE'];
                $result = str_replace('.', ',', strval(round($result, 2))).' '.$arItem['UNIT'];
                break;
            }
        }

        return $result;
    }
}
