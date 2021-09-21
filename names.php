<?php

    class Names {

        public $nameOne;
        public $nameTwo;

        function __construct($firstName, $secondName)
        {   
            $this->nameOne = $firstName;
            $this->nameTwo = $secondName;
            
        }

        function allNamesTest(){
            //first, we replace any comma and dot of each name with spaces
            $arrayToStrip = array(',','.');
            $nameOneJustSpace = str_replace($arrayToStrip," ",$this->nameOne);
            $nameTwoJustSpace = str_replace($arrayToStrip," ",$this->nameTwo);

            //second, we expload each name by the spaces to turn them to arrays
            $nameOneExploded = explode(" ",$nameOneJustSpace);
            $nameTwoExploded = explode(" ",$nameTwoJustSpace);

            //check of length of each array is one, in which case, we just check if both single elements
            //which are the names are equal
            if(count($nameOneExploded) && count($nameTwoExploded) == 1){
                //now if the names are just single words, do a simple check and return true
                if(strcasecmp($nameOneJustSpace,$nameTwoJustSpace) == 0){
                    echo "true";
                    return true;
                }
            }
            
            //if lenght each array is more than one, meaning name with multiple
            if(count($nameOneExploded) && count($nameTwoExploded) > 1){
                
                $intersectsOfNames = array_intersect($nameOneExploded,$nameTwoExploded);
                //the above function finds the common value pairs or names in each name passed


                $allowanceRatio = 0.66; //66% allowance ratio
                $allowedNumber = (count($nameOneExploded)) * $allowanceRatio;
                //the calculation above calculates the allowed name ratio by using the
                //specified allowanceRatio give, either the first or second name can be
                //used to compute the allowed number

                if(count($intersectsOfNames) > $allowedNumber){
                    echo "true";
                    return true;
                }


                if(count($intersectsOfNames) == 0){
                    //if there are no matches in the names
                    echo "no matches in names";
                    return false;
                }

            }

            //if lenght each array is more than 4, i.e not allowed
            if(count($nameOneExploded) && count($nameTwoExploded) > 3){
                echo "names too long";
                return;
            }
        }

        function getNames(){
            //simple function inside the class to get names passed into the class
            echo $this->nameOne;
            echo $this->nameTwo;
        }

    }

    $name = new Names("john,Doe","Doe john");
    $name->allNamesTest();

?>