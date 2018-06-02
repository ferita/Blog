<?php


function myFormatDate($time = null) {
    return date('d.m.Y H:i', $time);
}
/**
 * Array random
 *
 * Randomly picks a value from an array. PHP's array_rand() only returns index
 * values, so this functions wraps that one, returning an array of random values.
 *
 * @param  array   $array  The array to draw from.
 * @param  integer $number The number or random elements to pick.
 * @return array           An array containing the randomly selected values.
 */
function my_array_random(array $array, $number = 1)
{
    $random = array();
    // array_rand() only return the indexes, not their index and value, so we'll
    // need to iterate over the random index, and extract our values after
    $selected = (array) array_rand($array, $number);
    foreach ($selected as $index)
    {
        $random[] = $array[$index];
    }
    return $random;
}

/**
 * Array random, associatively
 *
 * Returns an array comprised of randomly selected keys and their values from $array.
 *
 * @param  array   $array  The array to draw from.
 * @param  integer $number The number or random elements to pick.
 * @return array           An array containing the randomly selected values.
 */
function array_random_assoc(array $array, $num = 1)
{
    $keys = array_keys($array);
    shuffle($keys);
    $r = array();
    for ($i = 0; $i < $num; $i++)
    {
        $r[$keys[$i]] = $array[$keys[$i]];
    }
    return $r;
}


/**
 * Array random item
 *
 * Returns a random element from an array.
 *
 * @param  array $array The array to pick an element from.
 * @return array        The random element, or null if no elements exist.
 */
function array_item_rand(array $array)
{
    if (!$array)
    {
        return null;
    }
    return $array[array_rand($array)];
}

function alert_webmaster($subject, $message)
{
    mail($_ENV['EMAIL_ERROR'], $subject, $message, join("\n", array(
        "From: {$_ENV['EMAIL_ERROR']}",
    )));
}