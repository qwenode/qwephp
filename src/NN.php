<?php

namespace qwephp;

/**
 * number helper
 */
class NN
{
    const MAX_INT = 2147483647;
    const MIN_INT = -2147483648;
    const MAX_SMALLINT = 32767;
    const MIN_SMALLINT = -32768;
    const MAX_BIGINT = 9223372036854775807;
    const MIN_BIGINT = -9223372036854775808;
    const ZERO = 0;
    
    /**
     * @param int|float $i
     * @param int|float $min
     * @param int|float $max
     * @return bool
     * @deprecated
     * @see AA::numberAreBetween()
     */
    public static function between(int|float $i, int|float $min, int|float $max): bool
    {
        return $i >= $min && $i <= $max;
    }
    
    /**
     * @param $number
     * @param int $decimals
     * @return float
     */
    public static function round($number,int $decimals)
    {
        return floatval(sprintf('%0.'.$decimals.'f',$number));
    }
}