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
    public static function createDirectory(string $path,int $mode = 0775,bool $recursive = true)
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
}