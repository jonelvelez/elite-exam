<?php 

$matrix = array(
    array(1, 1, 1, 1),
    array(0, 1, 1, 0),
    array(0, 1, 0, 1),
    array(1, 1, 0, 0)
);

foreach ($matrix as $row) {
    foreach ($row as $value) {
        echo $value ? 'X' : '~';
    }
    echo "<br>";
}

?>