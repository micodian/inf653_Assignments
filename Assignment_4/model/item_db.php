<?php
function get_items_by_category($category_id){
    global $db;
    //if $category_id is null
    if(!$category_id){
        $query = 'SELECT * FROM todoitems
                         ';
    }else{
        $query = 'SELECT * FROM todoitems
                         WHERE todoitems.categoryID= :category_id
                             ORDER BY categoryID';
    }
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id',$category_id);
    $statement->execute();
    $items = $statement->fetchAll();
    $statement->closeCursor();
    return $items;
}

function get_items($itemNum){
    global $db;
    $query = 'SELECT * FROM todoitems
                         WHERE itemNum= :itemNum';
    $statement = $db->prepare($query);
    $statement->bindValue(':itemNum',$itemNum);
    $statement->execute();
    $items = $statement->fetch();
    $statement->closeCursor();
    return $items;
}

function delete_items($itemNum){
    global $db;
    //count to flag item deleted to be returned 
    $query = 'DELETE FROM todoitems
              WHERE itemNum = :itemNum';
    $statement = $db->prepare($query);
    $statement->bindValue(':itemNum', $itemNum);
    $success = $statement->execute();
    $statement->closeCursor(); 
}

function add_items($category_id,$title,$description){
    global $db;
    //count to flag item deleted to be returned 
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
}

?>