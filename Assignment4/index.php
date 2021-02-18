<?php 
    require_once('database.php');
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
        <label for="">Category:</label>
        <select name="category_id" id="">
            <option value="">View All categories</option>
        </select>
        <button type="submit">Submit</button><br><br>

       <section>
            <table>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>&nbsp;</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <form action="">
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            
            </table>

            <p><a href="#">Add New Item</a></p>
            <p><a href="category_list.php">View/Edit Categories</a></p>
       </section> 
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Todo List App</p>
    </footer>
</body>
</html>