<?php
/* ensure that the autoloaded exists */
try {
    if(!file_exists(__DIR__ . '/vendor/autoload.php')){
        throw new Exception("Composer has not installed the autoloader. Please run $> composer i");
    } else {
        require_once(__DIR__ . '/vendor/autoload.php');
    }
} catch (\Exception $e) {
    echo("Message : " . $e->getMessage() . PHP_EOL);
    echo("Code : " . $e->getCode() . PHP_EOL);
    die();
}

use rhowe\Exercise\ExerciseTwo;
use rhowe\Exercise\ExerciseFour;

$test_cases = [
    ['ACGT', 'GTC'],
    ['ACGT', 'CAT'],
    ['ACA',  'AC'],
    ['ACA',  'GT']
];

/* Generate the first questions output */
console_header("First Question: Exorcise Two: DNA kinship");
foreach($test_cases as $test_case){
    list($case1, $case2) = $test_case;
    $result = ExerciseTwo::akin($case1, $case2);
    list ($length, $position1, $position2) = $result;
    echo "DNA 1: ${case1}; DNA 2: ${case2}" . PHP_EOL;
    echo "Length: ${length}; Position DNA 1: ${position1}; Position DNA 2: ${position2}" . PHP_EOL . PHP_EOL;
}

/* Generate the second questions output */
console_header("Second Question: Exorcise Four: Letter Count");
$result = ExerciseFour::calculation();
$print_result = number_format($result);
echo "The letters used to write out from 1 to 1000 : {$print_result}" . PHP_EOL;

/**
 * simple function for generating a header enclosed in '*'
 */
function console_header(string $string){
    $count = strlen($string) + 4;
    printf("%'#{$count}s","");
    echo PHP_EOL . "# " . $string . " #" . PHP_EOL;
    printf("%'#{$count}s","");
    echo PHP_EOL;
}
