<?php
/*
 * @copyright  Copyright (c) 2021 www.qwephp.com, All rights reserved.
 * @link       https://github.com/qwenode/qwephp
 * @license    MIT
 */

namespace qwephp\datetime;


/**
 * Class Time
 * @package qwephp\datetime
 */
class Time
{
    /**
     * @var int
     */
    protected int $timestamp;

    /**
     * Time constructor.
     * @param int $timestamp
     */
    public function __construct(int $timestamp)
    {
        $this->timestamp = $timestamp;
    }

    /**
     * @param string $datetime
     * @return static
     */
    public static function fromString(string $datetime): self
    {
        return new static(strtotime($datetime));
    }

    /**
     * @param int $timestamp
     * @return static
     */
    public static function fromInt(int $timestamp): self
    {
        return new static($timestamp);
    }

    /**
     * @return int
     */
    public function toUnix(): int
    {
        return $this->timestamp;
    }

    /**
     * @param string $format
     * @return string
     */
    public function toString($format = 'Y-m-d H:i:s'): string
    {
        return date($format, $this->timestamp);
    }
}