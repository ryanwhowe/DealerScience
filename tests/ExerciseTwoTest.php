<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use rhowe\Exercise\ExerciseTwo;

final class ExerciseTwoTest extends TestCase
{
    /**
     * Test case provider to determine the akin output.  These are the given 
     * examples to determine if the method is returning the correct output.
     * 
     */
    public function exerciseCaseProvider()
    {
        return [
            /* Input strings , length, position of string1, posotion of string2 */
            [ ['ACGT', 'GTC'], [3,1,0]   ],
            [ ['ACGT', 'CAT'], [2,0,0]   ],
            [ ['ACA',  'AC'],  [2,0,0]   ],
            [ ['ACA',  'GT'],  [0,-1,-1] ]
        ];
    }

    /**
     * The example output does not show the output for may additional cases this
     * is to test additional output to ensure all cases are coverd by method
     * 
     */
    public function personalCaseProvider()
    {
        return [
            /* Input strings , length, position of string1, posotion of string2 */
            [ ['ACGT', 'GT'],  [2,2,0]   ],
            [ ['ACGT', 'GAT'], [0,-1,-1] ],
            [ ['GCA',  'TCA'], [2,1,1]   ],
            [ ['ACA',  'GT'],  [0,-1,-1] ]
        ];
    }
    
    /**
     * This is a test provider for the anagram test method
     */
    public function anagramCaseProvider(){
        return [
            [['test','ttes'], true],
            [['ryan','anry'], true],
            [['ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'ZYXWVUTSRQPONMLKJIHGFEDCBA'], true],
            [['yes','no'], false]
        ];
    }

    /**
     * Test that the isAnagram method is correctly determining if two strings are anagrams
     * 
     * @test
     * @dataProvider anagramCaseProvider
     */
    public function anagramTest(array $strings, bool $expected_output){
        $test_result = ExerciseTwo::isAnagram($strings[0], $strings[1]);
        $this->assertEquals($test_result, $expected_output);
    }

    /**
     * Test the generate substring method
     * @test
     */
    public function generateSubstringsTest(){
        $test = 'ACTG';
        $expected_output = [
            [ 'string' => 'ACTG', 'position' => 0 ],
            [ 'string' => 'ACT',  'position' => 0 ],
            [ 'string' => 'AC',   'position' => 0 ],
            [ 'string' => 'CTG',  'position' => 1 ],
            [ 'string' => 'CT',   'position' => 1 ],
            [ 'string' => 'TG',   'position' => 2 ],
        ];

        $test_output = ExerciseTwo::generateSubSequence($test);
        $this->assertEquals($test_output, $expected_output);
    }

    /**
     * Thest that the length portion of the output to ensure that the found lengths are correct 
     * for the expected results
     * 
     * @test
     * @dataProvider exerciseCaseProvider
     * @dataProvider personalCaseProvider
     */
    public function akinLenghtTest(array $test_input, array $expected_output)
    {
        $test_output = ExerciseTwo::akin($test_input[0],$test_input[1]);
        $this->assertEquals($test_output[0], $expected_output[0]);
    }

    /**
     * Thest that the length portion of the output to ensure that the found lengths are correct 
     * for the expected results
     * 
     * @test
     * @dataProvider exerciseCaseProvider
     * @dataProvider personalCaseProvider
     */
    public function akinPositionOneTest(array $test_input, array $expected_output)
    {
        $test_output = ExerciseTwo::akin($test_input[0],$test_input[1]);
        $this->assertEquals($test_output[1], $expected_output[1]);
    }

    /**
     * Thest that the length portion of the output to ensure that the found lengths are correct 
     * for the expected results
     * 
     * @test
     * @dataProvider exerciseCaseProvider
     * @dataProvider personalCaseProvider
     */
    public function akinPositionTwoTest(array $test_input, array $expected_output)
    {
        $test_output = ExerciseTwo::akin($test_input[0],$test_input[1]);
        $this->assertEquals($test_output[2], $expected_output[2]);
    }
}
