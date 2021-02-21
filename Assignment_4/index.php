<?php
require('model/database.php');
require('model/categor_db.php');
require('model/item_db.php');

//init show all items in a table with the item_list.php file
$action = filter_input(INPUT_POST, 'action');
if($action == NULL){
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
    $categoryName= get_categoryName($category_id);
    $items = get_items_by_category($category_id);
}
?>