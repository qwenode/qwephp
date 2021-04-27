<?php
/*
 * @copyright  Copyright (c) 2021 www.qwephp.com, All rights reserved.
 * @link       https://github.com/qwenode/qwephp
 * @license    MIT
 */

namespace qwephp\file;


/**
 * Class Error
 * @package qwephp\file
 */
class Error
{
    /**
     * 将文件上传失败代码转为可读字符串
     * @param int $errorCode
     * @return string
     */
    public static function getMessage(int $errorCode): string
    {
        $msg = '未知错误:CODE:' . $errorCode;
        switch ($errorCode) {
            case UPLOAD_ERR_CANT_WRITE:
                $msg = '文件写入失败';
                break;
            case UPLOAD_ERR_NO_FILE:
                $msg = '没有文件被上传';
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
                $msg = '临时目录不存在';
                break;
            case UPLOAD_ERR_PARTIAL:
                $msg = '上传的文件仅被部分上传。';
                break;
            case UPLOAD_ERR_FORM_SIZE:
                $msg = '上载的文件超出了HTML表单中指定的MAX_FILE_SIZE指令。';
                break;
            case UPLOAD_ERR_INI_SIZE:
                $msg = '上传的文件超过了php.ini中的upload_max_filesize指令。';
                break;
            case UPLOAD_ERR_EXTENSION:
                $msg = '因php扩展问题导致上传失败,请检查环境';
                break;
        }
        return $msg;
    }
}