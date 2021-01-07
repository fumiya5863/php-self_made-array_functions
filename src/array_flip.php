<?php

/*=============================================================================*/
/*  array_flip ( array $array ) : array
    array_flip — Exchanges all keys with their associated values in an array  */
/*=============================================================================*/

$input = array("oranges", "apples", "pears");

// Built-in functions
$flipped = array_flip($input);
print_r($flipped);

// Method 1
function flip($array) {
    $result = [];
    foreach($array as $key => $value) {
        if (!is_string($key) && !is_int($key)) {
            continue;
        }
        $result[$value] = $key;
    }
    return $result;
}
$result = flip($input);
print_r($result);

// Method 2(Recursive function)
function _flip($array, $keys, $num) {
    $result = [];
    $key = $keys[$num];
    $value = array_shift($array);
    $result[$value] = $key;
    $num++;
    if (count($array) > 0) {
        $result = $result + _flip($array, $keys, $num);
    }
    return $result;
}
$result = _flip($input, array_keys($input), 0);
print_r($result);

// Method 2-1(Recursive function)
// function _flip($array, $num) {
//     $result = [];
//     $keys = array_keys($array);
//     $key = $keys[$num];
//     $value = $array[$key];
//     $result[$value] = $key;
//     $num++;
//     if (count($array) > $num) {
//         $result = $result + _flip($array, $num);
//     }
//     return $result;
// }
// $result = _flip($input, 0);
// print_r($result);

// Method 2-2(Recursive function)
// function _flip($array) {
//     $result = [];
//     $key = array_key_first($array);
//     $value = array_shift($array);
//     $result[$value] = $key;
    
//     if (count($array) > 0) {
//         $result = $result + _flip($array);
//     }
//     return $result;
// }
// $result = _flip($input);
// print_r($result);

// Method 3(Recursive function+internal pointer operation+passing by reference)
function getKeyAndValue(&$array) {
    $value = current($array);
    $key = key($array);
    next($array);
    return [
        "key" => $key,
        "value" => $value
    ];
}
function confirmLastValue($array, $value) {
    return $array[count($array)-1] === $value;
}

function __flip($array) {
    $result = [];
    $keyAndvalue = getKeyAndValue($array);
    $result[$keyAndvalue["value"]] = $keyAndvalue["key"];
    if (!confirmLastValue($array, $keyAndvalue["value"])) {
        $result = $result + __flip($array);
    }
    return $result;
}
$result = __flip($input);
print_r($result);