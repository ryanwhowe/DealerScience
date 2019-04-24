<?php
declare(strict_types=1);
/**
 * This file contains the ExerciseTwo class for the first exorcise given in the email
 * 
 * @author Ryan Howe <ryanwhowe@gmail.com>
 * @since 2019-04-23
 */
namespace rhowe\Exercise;

/**
 * Exercise 2: 
 * DNA sequences are strings which contain only the letters A, C, G, and T.  Two sequences
 * are considered akin if they both contain sub-sequences which form an anangram of each 
 * other (e.g. ACG, GAC, GCA, and etc. ).
 * 
 * In two given DNA sequences find the largest possible sub-sequence that would be considered
 * akin.  Output the length of the akin sub-sequence and its position (0-based) in both input
 * sequences.
 * 
 */
class ExerciseTwo {

    /**
     * Given two DNA sequences consisting of a combination of A, C, G, and T find the 
     * longest sequence of string 1 that contianed in string 2 as an anagram
     * 
     * @param string $one the first string DNA sequence to examine
     * @param string $two the second string DNA sequence to examine
     */
    public static function akin(string $one, string $two): array {
        // todo: input validation should be added
        $length = 0;
        $position_one = -1;
        $position_two = -1;

        $one_substrings = self::generateSubSequence($one);
        $two_substrings = self::generateSubSequence($two);

        foreach($one_substrings as $one_substring){
            foreach($two_substrings as $two_substring){
                if(self::isAnagram($one_substring['string'], $two_substring['string'])){
                    return [ 
                        strlen($one_substring['string']), 
                        $one_substring['position'], 
                        $two_substring['position']
                    ];
                }
            }
        }
        /* if no result was found the defaults are returned */
        return [ $length, $position_one, $position_two ];
    }

    /**
     * determine if two strings are anagrams of one another
     * @param string $one the first string to check against
     * @param string $two the second string to check against
     * @return bool
     */
    public static function isAnagram(string $one, string $two): bool {
        return count_chars($one, 1) === count_chars($two, 1);
    }

    /**
     * Strings can only be between 2 and 4 characters long, there are a very finite number of them
     * This is the algorythmic answer but given the limited output of possibilities I would tent 
     * towards a more verbose, less clever and easier to maintain solution
     */
    public static function generateSubSequence(string $string): array {
        $min_len = 2;

        $position = 0;
        $return = [];
        
        for($index = 0; $index <= strlen($string) - $min_len; $index++){
            $string_prime = substr($string, $index);
            for($len_offset = 0; $len_offset >= $min_len - strlen($string_prime); $len_offset--){
                if($len_offset !== 0){
                    $return[] = ['string' => substr($string_prime, 0, $len_offset), 'position' => $index];
                } else {
                    $return[] = ['string' => substr($string_prime, 0), 'position' => $index];
                }
            }
        }
        return $return;
        
        // VERBOSE solution
        // if(strlen($string) === 2){
        //     return [ 'string' => $string, 'position' => 0 ];
        // }
        
        // if(strlen($string) === 4){
        //     $return[] = ['string' => $string, 'position' => 0 ];
        //     $return[] = ['string' => substr($string, 0, -1), 'position' => 0 ];
        //     $return[] = ['string' => substr($string, 0, -2), 'position' => 0 ];

        //     $return[] = ['string' => substr($string, 1), 'position' => 1 ];
        //     $return[] = ['string' => substr($string, 1, -1), 'position' => 1 ];

        //     $return[] = ['string' => substr($string, 2), 'position' => 2];
        // }
        // if(strlen($string) === 3){
        //     $return[] = ['string' => $string, 'position' => 0 ];
        //     $return[] = ['string' => substr($string, 0, -1), 'position' => 0 ];

        //     $return[] = ['string' => substr($string, 1), 'position' => 1 ];
        //     $return[] = ['string' => substr($string, 1, -1), 'position' => 1 ];
        // }
    }    
}
