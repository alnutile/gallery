<?php

if (! function_exists('get_fixture_v2')) {
    function get_fixture_v2($file_name, $decode = true)
    {
        $results = File::get(base_path(sprintf(
            'tests/fixtures/%s',
            $file_name
        )));

        if (! $decode) {
            return $results;
        }

        return json_decode($results, true);
    }
}

if (!function_exists("put_fixture")) {
    function put_fixture($file_name, $content = [], $json = true)
    {
        if ($json) {
            $content = json_encode($content, 128);
        }
        File::put(
            base_path(sprintf("tests/fixtures/%s", $file_name)),
            $content
        );
        return true;
    }
}


if (!function_exists("get_fixture")) {
    function get_fixture($file_name, $decode = true)
    {
        $results = File::get(base_path(sprintf(
            "tests/fixtures/%s",
            $file_name
        )));
        if (!$decode) {
            return $results;
        }
        return json_decode($results, true);
    }
}