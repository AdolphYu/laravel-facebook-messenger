<?php

namespace AdolphYu\FBMessenger\Utils;

class Arr extends \Illuminate\Support\Arr
{
    public static function has($array,$keys){
        $keys = (array) $keys;

        if (! $array || $keys === []) {
            return false;
        }
        foreach ($keys as $key) {
            $subKeyArray = $array;

            if (static::exists($array, $key)) {
                continue;
            }

            foreach (explode('.', $key) as $segment) {
                if($segment=='*'&&isset($subKeyArray[0])){
                    $subKeyArray = $subKeyArray[0];
                    continue;
                }

                if (static::accessible($subKeyArray) && static::exists($subKeyArray, $segment)) {
                    $subKeyArray = $subKeyArray[$segment];
                } else {
                    return false;
                }


            }
        }

        return true;
    }
}
