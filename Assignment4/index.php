<?php 
    require_once('database.php');
    //GET CATEGORY ID
    if(!isset($category_id)){
        $category_id= filter_input(INPUT_GET, 'category_id',FILTER_VALIDATE_INT);
        if($category_id== NULL || $category_id == FALSE){
            $category_id = 1;
        }
    }

    //GET NAME FOR SELECTED CATEGORY
    $queryCategory = 'SELECT * FROM categories 
                   WHERE categoryID= :category_id';
    $statement1=$db->prepare($queryCategory);
    $statement1->bindValue(':category_id',$category_id);
    $statement1->execute();
    $category =$statement1->fetch();
    $category_name = $category['categoryName'];  
    $statement1->closeCursor();  
    
    //GET ALL CATEGORIES
    $query = 'SELECT * FROM categories 
                   ORDER BY categoryID';
    $statement=$db->prepare($query);
    $statement->execute();
    $categories =$statement->fetchAll(); 
    $statement1->closeCursor();

    //GET TODOITEMS FROM SELECTED CATEGORY
    $queryTodoItems = 'SELECT * FROM todoitems
                         WHERE categoryID= :category_id
                             ORDER BY categoryID';
    $statement3 = $db->prepare($queryTodoItems);
    $statement3->bindValue(':category_id',$category_id);
    $statement3->execute();
    $items = $statement3->fetchAll();
    $statement3->closeCursor();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <header><h1>My Todo List</h1></header><br>
    <main>
        <aside>
            <!-- display list of categories -->
            <h2>Categories</h2>
            <nav>
            <ul>
                <?php foreach ($categories as $category) : ?>
                <li><a href=".?category_id=<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName'];?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
            </nav>
        </aside>

       <section>
       <!-- DISPLAY TABLE OF ITEMS -->
       <h2><?php echo $category_name; ?> </h2>
            <table>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>&nbsp;</th>
                </tr>
                <?php foreach ($items as $item) :?>
                <tr>
                    <td><?php echo $item['Title'];?></td>
                    <td><?php echo $item['Description'];?></td>
                    <td><?php echo $item['categoryName'];?></td>
                    <td>
                        <form action="#">
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>    
            </table>

            <p><a href="add_item_form.php">Add New Item</a></p>
            <p><a href="category_list.php">View/Edit Categories</a></p>
       </section> 
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Todo List App</p>
    </footer>
</body>
</html>