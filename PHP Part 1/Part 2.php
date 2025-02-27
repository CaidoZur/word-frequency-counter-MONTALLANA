<?php

function calculateTotalPrice(array $items): float {
    $total = 0.0;
    foreach ($items as $item) {
        if (isset($item['price'])) {
            $total += $item['price'];
        }
    }
    return $total;
}

/**
 * @param string $inputString The string to be modified.
 * @return string The modified string.
 */
function modifyString(string $inputString): string {
    $stringWithoutSpaces = str_replace(' ', '', $inputString);
    $lowercaseString = strtolower($stringWithoutSpaces);
    return $lowercaseString;
}

/**
 * @param int $number The number to check.
 * @return string A message indicating whether the number is even or odd.
 */
function checkEvenOrOdd(int $number): string {
    if ($number % 2 == 0) {
        return "The number $number is even.";
    } else {
        return "The number $number is odd.";
    }
}
