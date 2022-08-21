<?php

if (!function_exists('dump')) {
    /**
     * var_dump
     * @param ...$data
     */
    function dump(...$data)
    {
        static $pre = false;
        $debug_backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
        if ($pre === false) {
            echo '<pre>';
            $pre = true;
        }
        if (isset($debug_backtrace[0])) {
            echo "\r\n" . $debug_backtrace[0]['file'] . ':' . $debug_backtrace[0]['line'] . "]\r\n";
        }
        foreach ($data as $item) {
            var_dump($item);
        }
    }
}

