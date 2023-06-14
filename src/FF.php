<?php

namespace qwephp;
/**
 * File Helper
 */
class FF
{
    /**
     * Creates a new directory.
     * @param string $path
     * @param int $mode
     * @param bool $recursive
     * @return bool
     * @throws \ErrorException
     */
    public static function createDirectory(string $path, int $mode = 0775, bool $recursive = true)
    {
        if (is_dir($path)) {
            return true;
        }
        $mask = @umask(0);
        @mkdir($path, $mode, $recursive);
        @umask($mask);
        if (!is_dir($path)) {
            throw new \ErrorException("Failed to create directory \"$path\": ");
        }
        return true;
    }
    
    /**
     * joins any number of path elements into a single path
     * @param ...$elem
     * @return string
     */
    public static function join(...$elem): string
    {
        foreach ($elem as $k => $path) {
            $path     = str_replace('\\', DIRECTORY_SEPARATOR, $path);
            $elem[$k] = str_replace('/', DIRECTORY_SEPARATOR, $path);
        }
        $full = '';
        foreach ($elem as $path) {
            if (AA::notNull($full)) {
                $path = ltrim($path, DIRECTORY_SEPARATOR);
            }
            $full .= rtrim($path, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
        }
        return rtrim($full, DIRECTORY_SEPARATOR);
    }
}