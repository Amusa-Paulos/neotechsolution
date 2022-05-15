<?php
    $sql = "UPDATE recipes SET cost = (recipes.cost + 2) WHERE EXISTS (SELECT * FROM ingredients WHERE ingredients.name = 'tuna')";
?>