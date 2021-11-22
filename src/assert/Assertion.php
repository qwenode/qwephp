<?php

namespace qwephp\assert;
/**
 *
 */
class Assertion
{
    /**
     * @param $value array|string
     * @return bool
     */
    public static function notNull($value)
    {
        if ($value == '') {
            return false;
        }
        if ($value == null) {
            return false;
        }
        if (is_array($value)) {
            if (count($value) == 0) {
                return false;
            }
            if (empty($value)) {
                return false;
            }
        }
        return true;
    }

}