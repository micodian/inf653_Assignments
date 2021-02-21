<?php
require('model/database.php');
require('model/category_db.php');
require('model/item_db.php');

//init show all items in a table with the item_list.php file
$action = filter_input(INPUT_POST, 'action');
if($action == NULL){
    //echo nl2br("i am in the first if\n");
    $action = filter_input(INPUT_GET,'action');
    if($action == NULL){
        $action= 'show_item_list';
    }
}

if($action == 'show_item_list'){
    $category_id = filter_input(INPUT_GET,'category_id',FILTER_VALIDATE_INT);
    if(!$category_id){
       get_items_by_category(null);
    }
    $categories = get_categories();
    //echo nl2br("afer first categories\n");
    $category_name= get_category_name($category_id);
    //echo nl2br("after get categoryname\n");
    $items = get_items_by_category($category_id);
    //echo 'i am here';
    include('view/item_list.php');
}else if($action == 'delete_item'){
    $itemNum = filter_input(INPUT_POST, 'itemNum', 
            FILTER_VALIDATE_INT);
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    if($category_id || $itemNum){
        delete_items($itemNum);
        header("Location: .?category_id=$category_id");
    }else{
        $error = "Missing or incorrect product id or category id.";
        include('view/error.php');
    }      
}else if($action == 'show_add_item_form'){
    $categories= get_categories();
    include('view/add_item.php');
}else if($action == 'add_item'){
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    $title = filter_input(INPUT_POST, 'title');
    $description = filter_input(INPUT_POST, 'description');
    if($category_id || $title || $description){
        add_items($category_id,$title,$description);
        header("Location: .?category_id=$category_id");
    }else{
        $error = "Invalid item data.";
        include('view/error.php');
    }

}
?>