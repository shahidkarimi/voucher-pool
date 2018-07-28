<?php
/**
 * Created by PhpStorm.
 * User: win8.1
 * Date: 11/21/2017
 * Time: 6:56 PM
 */

namespace App;


class Utilities
{
    public static function randomKey($length = 8)
    {
        $pool = array_merge(range(0, 9), range('A', 'Z'));
        $key = '';
        for ($i = 0; $i < $length; $i++) {
            $key .= $pool[mt_rand(0, count($pool) - 1)];
        }
        return $key;
    }
}