<?php
if (!function_exists('format_number')) {
    function format_number($number) {
        if ($number >= 1000000) {
            return number_format($number / 1000000, 1) . 'M';
        } elseif ($number >= 1000) {
            return number_format($number / 1000, 1) . 'k';
        } else {
            return $number;
        }
    }
}
