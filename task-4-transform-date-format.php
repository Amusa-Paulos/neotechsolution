<?php
    /**
     * Function transformDateFormat 
     * transforms date format
     * @param array $dates
     * @return array
     */
    function transformDateFormat (array $dates) : array {
        // Create an empty array to store the transformed dates
        $newDates = [];
        // Loop through the dates array
        foreach ($dates as $date) {
            // Check the date format if it is in the correct format of either YYYY/MM/DD, DD/MM/YYYY or MM-DD-YYYY
            preg_match_all("/(\d+)[\/|\-](\d+)[\/|\-](\d+)/", $date, $match); 
            // if match is empty, continue to the next iteration
            if (empty($match[0])) continue;
            // an array to store the the matched values
            $match_array = [$match[1][0], $match[2][0], $match[3][0]];
            // if date format is MM-DD-YYYY and the DD value is greater than 12, change the match_array array 
            // index 1 to index 0 and index 0 to 1 (i.e switch the month and day values)
            if ($match_array[1] > 12 && preg_match("/(\d+)[\-](\d+)[\-](\d+)/", $date)) {
                @list($match_array[1], $match_array[0]) = $match_array;
            }
            // create the date by converting the date value to unix timestamp and then converting it back 
            // to the correct date format
            $newDates[] = date("Ymd", strtotime(implode("-", [$match_array[0], $match_array[1], $match_array[2]])));
        }
        // return the transformed dates
        return $newDates;
    }

    // var_dump(transformDateFormat(["2010/02/20", "19/12/2016", "11-18-2012","20130720"]));
    // output:
    //          array(3) {
    //              [0]=>
    //              string(8) "20100220"
    //              [1]=>
    //              string(8) "20161219"
    //              [2]=>
    //              string(8) "20121118"
    //          }
?>