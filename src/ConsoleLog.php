<?php
/*
 * @copyright  Copyright (c) 2021 www.qwephp.com, All rights reserved.
 * @link       https://github.com/qwenode/qwephp
 * @license    MIT
 */

namespace qwephp;

/**
 * print msg to console
 */
class ConsoleLog
{
    //是否关闭日志打印
    public static bool $disabledOutput = FALSE;
    
    public static function error($message, ...$params)
    {
        static::_print('ERROR', $message, $params);
        return 1;
    }
    
    public static function info($message, ...$params)
    {
        static::_print('INFO', $message, $params);
        return 0;
    }
    
    public static function warning($message, ...$params)
    {
        static::_print('WARNING', $message, $params);
        return 2;
    }
    
    public static function success($message, ...$params)
    {
        static::_print('SUCCESS', $message, $params);
        return 0;
    }
    
    protected static function _print($type, $message, $params): void
    {
        if (static::$disabledOutput) {
            return;
        }
        if (strpos($message, '{0}') !== FALSE) {
            foreach ($params as $k => $v) {
                $v       = is_string($v) ? $v : json_encode($v);
                $message = str_replace('{' . $k . '}', "[{$v}]", $message);
            }
        } else {
            $explode = explode('{}', $message);
            $msg     = '';
            foreach ($explode as $k => $value) {
                $msg .= $value;
                if (isset($params[$k])) {
                    $param = $params[$k];
                    if (is_array($param)) {
                        $param = json_encode($param);
                    }
                    $msg .= $param;
                }
            }
            $message = $msg;
        }
        $s = sprintf("[%s][%s]: %s\n", date('Y-m-d H:i:s'), $type, $message);
        
    
        if (defined('STDERR') && ($type == 'ERROR' || $type == 'WARNING')) {
            fwrite(STDERR, $s);
        }else{
            echo $s;
        }
    }
}