<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use rhowe\Exercise\ExerciseFour;

final class ExerciseFourTest extends TestCase
{
    /**
     * Test provider to test the simple direct string conversions
     */
    public function rawNumberFormattingProvider(){
        return [
            [1, 'one'],
            [115, 'one hundred fifteen'],
            [200, 'two hundred'],
            [201, 'two hundred one'],
            [221, 'two hundred twenty-one'],
            [342, 'three hundred forty-two']
        ];
    }
    
    public function formattedNumberFormattingProvider(){
        return [
            [1, 'one'],
            [115, 'onehundredfifteenand'],
            [200, 'twohundred'],
            [201, 'twohundredoneand'],
            [221, 'twohundredtwentyoneand'],
            [342, 'threehundredfortytwoand']
        ];
    }

    public function numberAddProvider(){
        return [
            /* start, end, length */
            [1,5,19],     /* from example */
            [1,2,6],
            [342,342,23], /* from example */
            [115,115,20]  /* from example */
        ];
    }

    /**
     * @test
     * @dataProvider rawNumberFormattingProvider
     */
    public function formatNumberTest(int $number, string $output_expected){
        $test_output = ExerciseFour::format($number);
        $this->assertEquals($test_output, $output_expected);
    }

    /**
     * @test
     * @dataProvider formattedNumberFormattingProvider
     */
    public function formattedNumberTest(int $number, string $output_expected){
        $test_output = ExerciseFour::formatted($number);
        $this->assertEquals($test_output, $output_expected);
    }

    /**
     * @test
     * @dataProvider numberAddProvider
     */
    public function numberNameAdderTest(int $start, int $end, int $expected){
        $test_output = ExerciseFour::numberNameAdder($start, $end);
        $this->assertEquals($test_output, $expected);
    }

}
