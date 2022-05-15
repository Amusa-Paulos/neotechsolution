<?php 
    /**
     * Function getViewCount
     * @param string $json_data
     * @return int
     */
    function getViewCount ($json_data): int {
        $decoded_json_data = json_decode($json_data, true);
        $viewCounts = 0;
        foreach ($decoded_json_data['videos'] as $videos) {
            $viewCounts += $videos['viewCount'];
        }

        return $viewCounts;
    }

    $json_string = '{
        "apiVersion": "2.1",
        "videos": [
        {
        "id": "253",
        "category": "Music",
        "title": "Jingle Bells",
        "duration": 457,
        "viewCount": 88270796
        }
        ]}';
        
    echo getViewCount($json_string);
?>