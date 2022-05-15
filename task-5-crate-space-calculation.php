<?php
    /**
     * Function minimum_number_of_crates
     * @param int $items
     * @param int $large_crates
     * @param int $small_crates
     * @return string|int
     * @return -1 if supplied large and small crates can't accomodate all items
     * @return string on success
     */
    function minimum_number_of_crates(int $items, int $large_crates, int $small_crates) {
        $maximum_capacity_of_large_crates = 5; // maximum capacity of large crates
        $maximum_capacity_of_small_crates = 1; // minimum capacity of small crates

        // total number of items that all supplied large crates can contain
        $capacity_of_all_available_large_crates = ($large_crates * $maximum_capacity_of_large_crates);
        // total number of items that all supplied small crates can contain
        $capacity_of_all_available_small_crates = ($small_crates * $maximum_capacity_of_small_crates);

        // fill large crates
        $remaining_items_after_filling_large_crates = (($items - $capacity_of_all_available_large_crates));
        // if the remaining items after filling large crates is greater than 0
        // then remove remaining number of items after filling large crates from 
        // the number of capacity of all available small crates
        $remaining_items_after_filling_small_crates = $remaining_items_after_filling_large_crates > 0 ? 
            ($capacity_of_all_available_small_crates - $remaining_items_after_filling_large_crates) : 0;
    
        // if remaining number of items after filling large crates is less than 0 then 
        // it's impossible
        if ($remaining_items_after_filling_small_crates < 0) {
            return -1;
        }
        
        // calculate all large crates filled
        $all_large_crates_filled = $remaining_items_after_filling_large_crates < 0 ? 
            ceil($items / $maximum_capacity_of_large_crates) :
            ceil(($items - $remaining_items_after_filling_large_crates) / $maximum_capacity_of_large_crates);

        // calculate all small crates filled
        $all_small_crates_filled = $remaining_items_after_filling_small_crates > -1 ? 
            ($capacity_of_all_available_small_crates - $remaining_items_after_filling_small_crates) : 0;

        // calculate total crates filled by adding large crates filled and small crates filled
        $total_crates_filled = ($all_large_crates_filled + $all_small_crates_filled);

        // return all items filled
        return $total_crates_filled . " ({$all_large_crates_filled} large crates + {$all_small_crates_filled} small crates)";
    }

    // echo minimum_number_of_crates(16, 2, 10); // 8 (2 large crates + 6 small crates)
    // echo minimum_number_of_crates(25, 4, 10); // 9 (4 large crates + 5 small crates)
    // echo minimum_number_of_crates(8, 4, 10); // 2 (2 large crates + 0 small crates)
    // echo minimum_number_of_crates(5, 4, 10); // 1 (1 large crates + 0 small crates)
    // echo minimum_number_of_crates(5, 2, 10); // 1 (1 large crates + 0 small crates)
    // echo minimum_number_of_crates(5, 1, 10); // 1 (1 large crates + 0 small crates)
    // echo minimum_number_of_crates(15, 1, 10); // 11 (1 large crates + 10 small crates)
?>