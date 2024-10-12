<?php

class DD {
    /**
     * Dump the given variable(s) and terminate the script.
     *
     * @param mixed $data,... Accepts any number of variables to dump
     * @return void
     */
    public static function dd(...$data) {
        echo '<pre>';
        foreach ($data as $value) {
            // Use print_r for human-readable formatting
            print_r($value);
            echo "\n";
        }
        echo '</pre>';
        die(); // or exit();
    }
}
