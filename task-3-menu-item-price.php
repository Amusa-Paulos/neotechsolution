<?php
    $sql = "UPDATE menu SET price = (recipes.price * 1.1) WHERE category IN ('Soups', 'Salads')";
?>