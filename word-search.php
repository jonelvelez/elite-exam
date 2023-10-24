<?php 

$elements = ["I", "TWO", "FORTY", "THREE", 'JEN', "TWO", "tWo", "Two"];
$target = "TWO";

$indices = array();

for ($i = 0; $i < count($elements); $i++) {
    if (strcasecmp($elements[$i], $target) === 0) {
        $indices[] = $i;
    }
    if (count($indices) == 2) { // Stop after finding the first two occurrences
        break;
    }
}

if (!empty($indices)) {
    $output = "INDEX " . implode(" and INDEX ", $indices) . " // [" . implode(",", $indices) . "]";
    echo $output;
} else {
    echo "No matching elements found.";
}


?>