<?php 
    /**
     * Function username_validation 
     * validates username
     * @param string $username
     * @return boolean
    */
    function username_validation (string $username) : bool {
        // Check if the username starts with a letter and contains only letters, numbers, and underscores 
        // and it is at least 4 characters long, if not, return false
        if (!preg_match('/^([a-zA-Z])(\d?){4,}/', $username)) {
            return false;
        }
        // Check if special characters are present in the username, if so, return false
        elseif (strpbrk('#$%^&*()+=-[]\'";,./{}|:<>?~', $username)) { 
            return false;
        }
        //  Check if the username contains spaces, or more than 1 underscores or ends with 
        //  underscores, if so, return false
        elseif (preg_match('/\s|[_]{2,}|(\w_\w?){2,}|_$/', $username)) {
            return false;
        }
        

        // If all checks pass, return true
        return true;
    };

    // False values:
    // echo username_validation('Mike Standish'); // false
    // echo username_validation('MikeStandish_'); // false
    // echo username_validation('4MikeStandish'); // false
    // echo username_validation('Mike_Stan_dish'); // false
    // echo username_validation('Mike__Standish'); // false
    
    // True values:
    // echo username_validation('MikeStandish'); // true
    // echo username_validation('Mike_Standish'); // true
?>