<?php
function get_categories(){
    $query = 'SELECT * FROM categories
                       ORDER BY categoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();
    return $categories;
}

function get_category_name($category_id){
    $query = 'SELECT * FROM categories
                       WHERE categoryID= :category_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id',$category_id);
    $statement->execute();
    $categories = $statement->fetch();
    $statement->closeCursor();
    $categoryName = $category['categoryName'];
    if(!$categoryName){
        $categoryName='None';
    }
    return $categoryName;
}

function add_category($categoryName){
    //count to flag item deleted to be returned 
    $query = 'INSERT INTO categories
                 (categoryName)
              VALUES
                 (:categoryName)';
    $statement = $db->prepare($query);
    $statement->bindValue(':categoryName', $categoryName);
    $statement->execute();
    $statement->closeCursor();
}

function delete_category($category_id){
    //count to flag item deleted to be returned 
    $query = 'DELETE FROM categories
              WHERE categoryID = :category_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $success = $statement->execute();
    $statement->closeCursor();
}


?>