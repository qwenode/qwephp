<?php

/**
 * var_dump
 * @param ...$data
 */
function d(...$data)
{
    echo '<pre>
====================DUMP=====================
';
    foreach ($data as $item) {
        var_dump($item);
    }
    echo '
====================END======================</pre>';
}