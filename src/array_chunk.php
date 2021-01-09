<?php

/*=============================================================================*/
/*  array_chunk ( array $array , int $length , bool $preserve_keys = false ) : array
    array_chunk — 配列を分割する */
/*=============================================================================*/


$input_array = array('a', 'b', 'c', 'd', 'e');

// print_r(array_chunk($input_array, 2));
// print_r(array_chunk($input_array, 2, true));

// function chunk($array, $length, $preserve_keys = false) {
//     $results = [];
//     $result = [];
//     foreach($array as $key => $value) {
//         if (count($result) == $length) {
//             $results[] = $result;
//             $result = [];
//         }
//         if ($preserve_keys === true) {
//             $result[$key] = $value;
//             continue;
//         }
//         $result[] = $value;
//     }
//     $results[] = $result;
//     return $results;
// }
// $result = chunk($input_array, 2, true);
// print_r($result);

// function _chunk($array, $length, $results, $result, $preserve_keys = false) {
//     if (count($result) == $length) {
//         $results[] = $result;
//         $result = [];
//     }
//     $key = array_key_first($array);
//     $value = $array[$key];
//     unset($array[$key]);
//     if ($preserve_keys === true) {
//         $result[$key] = $value;
//     } else {
//         $result[] = $value;
//     }
//     if (count($array) > 0) {
//         return _chunk($array, $length, $results, $result, $preserve_keys);
//     }
//     $results[] = $result;
//     return $results;
// }
// $result = _chunk($input_array, 2, [], [], true);
// print_r($result);

// function _chunk($array, $length, $result, $preserve_keys = false) {
//     if (count($result) == $length) {
//         $array[] = $result;
//         $result = [];
//     }
//     $key = array_key_first($array);
//     $value = $array[$key];
//     $result[] = $value;
//     if (!is_array($array[$key])) {
//         unset($array[$key]);
//         return _chunk($array, $length, $result, $preserve_keys);
//     }
//     $array[] = $result;
//     return array_values($array);
// }
// $result = _chunk($input_array, 2, []);
// print_r($result);
