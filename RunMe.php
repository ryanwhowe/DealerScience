<?php
/* ensure that the autoloaded exists */
try {
    if(!file_exists('vendor/autoload.php')){
        throw new Exception("Composer has not installed the autoloader. Please run $> composer i");
    } else {
        require_once('vendor/autoload.php');
    }
} catch (\Exception $e) {
    echo("Message : " . $e->getMessage() . PHP_EOL);
    echo("Code : " . $e->getCode() . PHP_EOL);
    die();
}

use rhowe\Exorcise\ExorciseTwo;
use rhowe\Exorcise\ExorciseFour;

$test_cases = [
    ['ACGT', 'GTC'],
    ['ACGT', 'CAT'],
    ['ACA',  'AC'],
    ['ACA',  'GT']
];

/* Generate the first questions output */
console_header("Frist Question: Exorcise Two: DNA kinship");
foreach($test_cases as $test_case){
    $result = ExorciseTwo::akin($test_case[0], $test_case[1]);
    echo "DNA 1: {$test_case[0]}; DNA 2: {$test_case[1]}" . PHP_EOL;
    echo "Lenght: {$result[0]}; Position DNA 1: {$result[1]}; Position DNA 2: {$result[2]}" . PHP_EOL . PHP_EOL;
}

/* Generate the second questions output */
console_header("Second Question: Exorcise Four: Letter Count");
$result = ExorciseFour::calculation();
$print_result = number_format($result);
echo "The letters used to write out from 1 to 1000 : {$print_result}" . PHP_EOL;

function console_header(string $string){
    $count = strlen($string) + 4;
    printf("%'#{$count}s","");
    echo PHP_EOL . "# " . $string . " #" . PHP_EOL;
    printf("%'#{$count}s","");
    echo PHP_EOL;
}
