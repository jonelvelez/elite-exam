<?php

$array = "TRUE FRIENDS ARE ME AND YOU";

$words = str_word_count($array, 1);

$minLength = PHP_INT_MAX;

foreach ($words as $word) {
    $wordLength = strlen($word);
    if ($wordLength < $minLength) {
        $minLength = $wordLength;
        $smallestWord = $word;
    }
}

echo $smallestWord;


?>