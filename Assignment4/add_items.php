<?php
// Get the product data
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
$title = filter_input(INPUT_POST, 'title');
$description = filter_input(INPUT_POST, 'description');


// Validate inputs
if ($category_id == null || $category_id == false ||
        $title == null || $description == null) {
    $error = "Invalid item data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');

    // Add the product to the database  
    $query = 'INSERT INTO todoitems
                 (categoryID, Title, Description)
              VALUES
                 (:category_id, :title, :description)';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':description', $description);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('index.php');
}
?>