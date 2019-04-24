<?php
declare(strict_types=1);
/**
 * This file contains the ExerciseFour class for the second exorcise given in the email
 * 
 * @author Ryan Howe <ryanwhowe@gmail.com>
 * @since 2019-04-23
 */
namespace rhowe\Exercise;

/**
 * Exercise 4: 
 *  
 * if all the numbers from 1 to 1000 (one thousand) inclusive were written out in words, how many
 * letters would be used?
 * 
 * Note: Do not count spaces or hyphens. For example, 342 (three hundred and forty-two) contains
 * 23 letters and 115 (one hundred and fifteen) contains 20 letters.  For this exercise you should
 * use "and" when writing out numbers in compliance with British usage.
 * 
 * Example:
 * 1,2,3,4,5 = 'one' + 'two' + 'three' + 'four' + 'five' = 'onetwothreefourfive' = 19 letters
 * 
 */
class ExerciseFour {

    /**
     * This is a solution for small (n), this solution while an O(n) will work for any 
     * range of numbers from x -> y.  This was used to test the outputs of the two other 
     * solutions below.
     */
    public static function numberNameAdder(int $start, int $end):int {
        /* O(n) solution using built in php method */
        $result = 0;
        for($i = $start; $i <= $end; $i++){
            $result += strlen(self::formatted($i));
        }
        return $result;
    }

    /**
     * This solution utilizes a linear regression.  This is based off an x,y scatter plot
     * of ending values (starting from 1) and going to 5000.  From this a linear slope of
     * the plot was taken to generate a function that represents the values within .2% of
     * the actual values and computes in O(1) assuming an error rate of .2% is tollerable.
     */
    public static function linearRegression(int $end): int {
        /* the linear function representing this line is different from 1-100 vs 100 - 1000 vs + 1000 */
        if($end <= 10){
            return (int) round(4.15 * $end - 1.75);
        } elseif($end <= 100){
            return (int) round(8.9764 * $end - 53.477);
        } elseif($end <= 1000){
            return (int) round(22.59 * $end - 1559.9);
        } else {
            return (int) round(33.287 * $end - 13659);
        }
    }

    /**
     * The only unique words that are used in the addition are the number names 
     *  * from 1 to 20,
     *  * intervals of 10
     *  * hundred and 'and'
     * 
     * the number of occurences for each word is calculable and can be used to generate
     * the output for the letter count specifically to 100
     */
    public static function calculation(): int {
        $word_count = [
            /* single digits are said 9 times per 100 plus 100 times for it's 100 ie three hundred & '''' */
            /* one is said 1 additional time with one thousand */
            "one"       => (9 * 10 + 100 + 1),
            "two"       => (9 * 10 + 100),
            "three"     => (9 * 10 + 100),
            "four"      => (9 * 10 + 100),
            "five"      => (9 * 10 + 100),
            "six"       => (9 * 10 + 100),
            "seven"     => (9 * 10 + 100),
            "eight"     => (9 * 10 + 100),
            "nine"      => (9 * 10 + 100),
            /* ten & teens are only once per 100 */
            "ten"       => (10),
            "eleven"    => (10),
            "twelve"    => (10),
            "thirteen"  => (10),
            "fourteen"  => (10),
            "fifteen"   => (10),
            "sixteen"   => (10),
            "seventeen" => (10),
            "eighteen"  => (10),
            "nineteen"  => (10),
            /* multiples of 10 are 10 times per hundred */
            "twenty"    => (10 * 10),
            "thirty"    => (10 * 10),
            "forty"     => (10 * 10),
            "fifty"     => (10 * 10),
            "sixty"     => (10 * 10),
            "seventy"   => (10 * 10),
            "eighty"    => (10 * 10),
            "ninety"    => (10 * 10),
            /* hundred is said 100 times per hundred except < 100 */
            "hundred"   => (9 * 100),
            /* and is said 100 times per hundred except < 100 and for one thousand */
            "and"       => (9 * 99),
            /* only said once in 1000 */
            "thousand"  => 1
        ];
        $result = 0;
        foreach($word_count as $word=>$count){
            $result += strlen($word) * $count;
        }
        return $result;
    }

    /**
     * Utilize the NumberFormatter class to spell out the words that make up the number
     */
    public static function format(int $number): string {
        $f = new \NumberFormatter("en-GB", \NumberFormatter::SPELLOUT);
        return $f->format($number);
    }

    /**
     * The NumberFormatter class does not use the 'and' when spelling out numbers.  We also
     * need to remove the spaces and slashes from the output.
     */
    public static function formatted(int $number): string {
        if($number > 100 && $number % 100 !== 0){ 
            $prepend = 'and'; 
        } else {
            $prepend = ''; 
        }
        return str_replace(['-',' '],'',self::format($number)).$prepend;
    }
}