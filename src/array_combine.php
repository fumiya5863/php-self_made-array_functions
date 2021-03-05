<?php

/*=============================================================================*/
/*  array_flip ( array $array ) : array
    array_combine — Creates an array by using one array 
    for keys and another for its values  */
/*=============================================================================*/

$a = array('green', 'red', 'yellow');
$b = array('avocado', 'apple', 'banana');

// Built-in functions
$c = array_combine($a, $b);
print_r($c);

// Method 1
function _array_combine($array1, $array2) {
    $result = [];
    for($i = 0; $i < count($array1); $i++) {
        $result[$array1[$i]] = $array2[$i];
    }
    return $result;
}
$c = __array_combine($a, $b);
print_r($c);

// Method 2(Recursive function)
function __array_combine($array1, $array2) {
    $result = [];
    $result[$array1[0]] = $array2[0];
    array_shift($array1);
    array_shift($array2);
    if (count($array1) > 0) {
        $result = array_merge($result, __array_combine($array1, $array2));
    }
    return $result;
}
$c = __array_combine($a, $b);
print_r($c);

// Method 3(Recursive function + pass by reference + pointer operation)
function ___getNextValue(&$array1, &$array2) {
    $value1 = current($array1);
    $value2 = current($array2);
    next($array1);
    next($array2);
    return [$value1, $value2];
}
function ___isEndValue($array1, $value1) {
    return end($array1) === $value1;
}
function ___array_combine($array1, $array2) {
    $result = [];
    $array = ___getNextValue($array1, $array2);
    $result[$array[0]] = $array[1];
    if (!___isEndValue($array1, $array[0])) {
        $result = array_merge($result, ___array_combine($array1, $array2));
    }
    return $result;
}
$c = ___array_combine($a, $b);
print_r($c);

// Method 4(Recursive function + higher-order function + callback function + pass by reference + variable function + pointer operation)
function ____getNextValue(&$array1, &$array2) {
    $value1 = current($array1);
    $value2 = current($array2);
    next($array1);
    next($array2);
    return [$value1, $value2];
}
function ____isEndValue($array1, $value1) {
    return end($array1) === $value1;
}
function ____array_combine($array1, $array2, $callback) {
    $result = null;
    $array = ____getNextValue($array1, $array2);
    $result = $callback($array);
    if (!____isEndValue($array1, $array[0])) {
        $result = array_merge($result, ____array_combine($array1, $array2, $callback));
    }
    return $result;
}
$callback = function($array) {
    return [$array[0] => $array[1]];
};
$c = ____array_combine($a, $b, $callback);
print_r($c);