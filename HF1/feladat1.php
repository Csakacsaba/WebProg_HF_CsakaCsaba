<?php

/*feladat 1*/

$array = [5, '5', '05', 12.3, '16.7', 'five', 'true', 0xDECAFBAD, '10e200'];

foreach ($array as $element) {
    $type = gettype($element);
    $isNumeric = is_numeric($element);

    if ($isNumeric) {
        echo "$type: Igen\n";
    } else {
        echo "$type: Nem\n";
    }
}


