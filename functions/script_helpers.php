<?php

namespace App;

/**
 * Collection of characters allowed in a MySQL strong password.
 *
 * @var array
 */
const MYSQL_STRONG_CHARS = [
    'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p',
    'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F',
    'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V',
    'W', 'X', 'Y', 'Z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '!', '@',
    '#', '$', '%', '^', '&', '*', '(', ')', '-', '+', '_', '-', '=', '[', ']', '{',
    '}', '\\', '|', ';', ':', '\'', '"', '<', '>', ',', '.', '/', '?', '~', '`',
];

/**
 * Generates a strong MySQL password with the specified
 * number of characters or 32 characters by default.
 *
 * @param int  $num_chars  Number of characters to generate
 * @return string
 *
 * @throws LogicException if the number of characters is invalid
 */
function mysql_strong_password($num_chars = 32)
{
    if ($num_chars > PHP_INT_MAX || $num_chars < 0)
        throw new \LogicException("Expected argument to be within range of 0 and " . PHP_INT_MAX);

    $password = '';

    $allowed_chars = array_merge([], MYSQL_STRONG_CHARS);

    for ($i = 0; $i < $num_chars; $i += 1)
        $password .= $allowed_chars[mt_rand(0, count($allowed_chars) - 1)];

    return $password;
}
