<?php
class DD
{
    public static function dd(...$data)
    {
        echo '<pre>';
        foreach ($data as $value) {
            print_r($value);
            echo "\n";
        }
        echo '</pre>';
        die();
    }
}
