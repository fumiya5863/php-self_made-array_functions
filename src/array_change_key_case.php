<?php


/*=============================================================================*/
/*  array_change_key_case( array array [, int $case = CASE_LOWER] ) : array
    array_change_key_case — Changes the case of all keys in an array */
/*=============================================================================*/

$input_array = array("First" => 1, "SecOnd" => 4);

// Built-in functions
print_r(array_change_key_case($input_array, CASE_UPPER));

// Method 1
function keyCase($array, $case) {
    if (!is_array($array)) {
        return false;
    }
    foreach($array as $key => $value) {
        if (!is_string($key)) {
            continue;
        }
        unset($array[$key]);
        if ($case === 1) {
            $array[strtoupper($key)] = $value;
        } else {
            $array[strtolower($key)] = $value; 
        }
    }
    return $array;
}
$result = keyCase($input_array, CASE_UPPER);
print_r($result);

// Method 2
function _keyCase($array, $case) {
    if (!is_array($array)) {
        return false;
    }
    $keys = array_keys($array);
    foreach($keys as &$key) {
        if (!is_string($key)) {
            continue;
        }
        
        if (CASE_UPPER === 1) {
            $key = strtoupper($key);
        } else {
            $key = strtolower($key);
        }
    }
    return array_combine($keys, $array);
}
$result = _keycase($input_array, CASE_UPPER);
print_r($result);

// Method 3(Recursive function)
function __keyCase($array, $case, $num, $keys) {
    if (!is_array($array)) {
        return false;
    }
    if ($num === count($keys)) {
        return $array;
    }    
    if (is_string($keys[$num])) {
        $key   = $keys[$num];
        $value = $array[$keys[$num]];
        unset($array[$keys[$num]]);
        if ($case === 1) {
            $array[strtoupper($key)] = $value;
        } else {
            $array[strtolower($key)] = $value;
        }
    } 
    $num++;
    return __keyCase($array, $case, $num, $keys);
}
$result = __keyCase($input_array, CASE_UPPER, 0, array_keys($input_array));
print_r($result);

// Method3-1(Recursive function ※key is limited to character strings)
// function __keyCase($array, $case, $num) {
//     if (!is_array($array)) {
//         return false;
//     }
//     $key = array_key_first($array);
//     if ($case === 1) {
//         $array[strtoupper($key)] = array_shift($array);
//     } else {
//         $array[strtolower($key)] = array_shift($array);
//     }
//     $num--;
//     if ($num > 0) {
//         return _keyCase($array, $case, $num);
//     }
//     return $array;
// }
// $result = __keyCase($input_array, CASE_UPPER, count($input_array));
// print_r($result);

// Method 4(Recursive function+internal pointer operation+passing by reference)
function getValueAndKey(&$array) {
    $value    = current($array);
    $cp_array = array_flip($array);
    $key = $cp_array[$value];
    next($array);
    return ["key" => $key, 'value' => $value];
}
function ___keyCase($array, $case, $num) {
    $result = getValueAndKey($array);
    if (is_string($result["key"])) {
        unset($array[$result['key']]);
        if ($case === 1) {
            $array[strtoupper($result["key"])] = $result['value'];
        } else {
            $array[strtoupper($result["key"])] = $result['value'];
        }
    }
    $num--;
    if ($num > 0) {
        return ___keyCase($array, $case, $num);
    }
    return $array;
}
$result = ___keyCase($input_array, CASE_UPPER, count($input_array));
print_r($result);


