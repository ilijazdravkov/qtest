<?php

namespace App\Support;

class Search
{
    const RESULTS_PER_PAGE_LIMIT = 10;

    public static function getResultsPerPage(int $show): int{
        //limit 10 results per page
        return $show ? $show > static::RESULTS_PER_PAGE_LIMIT ? static::RESULTS_PER_PAGE_LIMIT : $show : static::RESULTS_PER_PAGE_LIMIT;
    }

    public static function skip(int $page, int $rows): int{
        // calculate how many rows to skip
        return ($page -1) * $rows;
    }

    public static function sanitize(string $string): string{
        return filter_var($string, FILTER_SANITIZE_STRING);
    }
}