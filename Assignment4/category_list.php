<?php
require_once('database.php');

// Get all categories
$query = 'SELECT * FROM categories
                       ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo List</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <header><h1>My Todo List</h1></header><br>
    <main>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($categories as $category) : ?>
        <tr>
            <td><?php echo $category['categoryName']; ?></td>
            <td>
            <!--deleting category -->
            <form action="delete_category.php" method="post">
                <input type="hidden" name="category_id" value="<?php echo $category['categoryID']; ?>">
                <input type="submit" value="Delete">
            </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table><br><br>
    
    <h2>Add Category</h2>
    <!-- Code for adding category -->
    
    <form action="add_category.php" method="post">
        <label for="categoryName"> Name </label>
            <input type="text" name="categoryName" required>
            <input type="submit" value="Add category">
    </form>
    
    

    <br>
    <p><a href="index.php">View Todo List</a></p>

    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Todo List App</p>
    </footer>
</body>
</html>