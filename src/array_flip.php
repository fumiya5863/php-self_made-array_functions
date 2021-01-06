<?php

/*=============================================================================*/
/*  array_flip(array $array): array
    配列のキーと値を反転する  */
/*=============================================================================*/

$input = array("oranges", "apples", "pears");
// $flipped = array_flip($input);
// print_r($flipped);

// 方法1
// function flip($array) {
//     $result = [];
//     foreach($array as $key => $value) {
//         if (!is_string($key) && !is_int($key)) {
//             continue;
//         }
//         $result[$value] = $key;
//     }
//     return $result;
// }
// $result = flip($input);
// print_r($result);

// 方法2(再帰処理)
// function _flip($array, $keys, $num) {
//     $result = [];
//     $key = $keys[$num];
//     $value = array_shift($array);
//     $result[$value] = $key;
//     $num++;
//     if (count($array) > 0) {
//         $result = $result + _flip($array, $keys, $num);
//     }
//     return $result;
// }
// $result = _flip($input, array_keys($input), 0);
// print_r($result);

// 方法2-1(再帰処理)
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

// 方法2-2(再帰処理)
function _flip($array) {
    $result = [];
    $key = array_key_first($array);
    $value = array_shift($array);
    $result[$value] = $key;
    
    if (count($array) > 0) {
        $result = $result + _flip($array);
    }
    return $result;
}
$result = _flip($input);
print_r($result);

// 方法3(再帰処理+内部ポインタ+参照渡し)