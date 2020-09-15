<?php
/*
 * @copyright  Copyright (c) 2020 www.qwephp.com, All rights reserved.
 * @link       https://github.com/qwenode/qwephp
 * @license    MIT
 */

namespace qwephp;


class ConsoleOutput
{
    public static $daemonize = FALSE;

    public static function error($message, ...$params)
    {
        static::log('ERROR', $message, $params);
        return 1;
    }

    public static function info($message, ...$params)
    {
        static::log('INFO', $message, $params);
        return 0;
    }

    public static function warning($message, ...$params)
    {
        static::log('WARNING', $message, $params);
        return 2;
    }

    public static function success($message, ...$params)
    {
        static::log('SUCCESS', $message, $params);
        return 0;
    }

    protected static function log($type, $message, $params)
    {
        if (static::$daemonize) {
            return;
        }
        foreach ($params as $k => $v) {
            $v = is_string($v) ? $v : json_encode($v);
            $message = str_replace('{' . $k . '}', "[{$v}]", $message);
        }
        printf("[%s][%s]: %s\n", date('Y-m-d H:i:s'), $type, $message);
    }
}