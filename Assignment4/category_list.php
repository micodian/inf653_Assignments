<?php
require_once('database.php');
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
        <tr></tr>

    </table><br><br>
    
    <h2>Add Category</h2>
    <!-- Code for adding category -->

    <br>
    <p><a href="index.php">View Todo List</a></p>

    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Todo List App</p>
    </footer>
</body>
</html>