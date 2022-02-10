# DealerScience
Code exorcise for dealer science backend developer job application

## Setup
This is configured to be able to be ran from inside a docker container to ensure there are no issues with compatibility between the development environment and the run environment.  You must have docker installed locally, if you are running in windows it is best to run this from outside of your documents directory.
```shell
docker-compose up
```
**WARNING:** Please read and understand the DockerFile that will build this project, you should never run something on your computer without understanding what it is doing and trust the source.

## Original Exercise Description

### Exercise 2: 
DNA sequences are strings which contain only the letters A, C, G, and T.  Two sequences are considered akin if they both contain sub-sequences which form an anangram of each other (e.g. ACG, GAC, GCA, and etc. ).

In two given DNA sequences find the largest possible sub-sequence that would be considered akin.  Output the length of the akin sub-sequence and its position (0-based) in both input sequences.


### Exercise 4: 
if all the numbers from 1 to 1000 (one thousand) inclusive were written out in words, how many letters would be used?

___Note:___ Do not count spaces or hyphens. For example, 342 (three hundred and forty-two) contains 23 letters and 115 (one hundred and fifteen) contains 20 letters.  For this exercise you should use "and" when writing out numbers in compliance with British usage.

___Example:___ 1,2,3,4,5 = 'one' + 'two' + 'three' + 'four' + 'five' = 'onetwothreefourfive' = 19 letters
