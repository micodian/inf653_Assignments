<?php
require('database.php');


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <main>
        <header class="heading">
            <h1>TODO LIST</h1>
        </header>

        
        <?php if (!$title && !$description){ ?>
           
            <?php 
                $query = 'SELECT * FROM todoitems
                ORDER BY itemNum DESC';
                $statement = $db->prepare($query);
                
                $statement->execute();
                $results = $statement->fetchAll();
                $statement->closeCursor(); 
            ?>
            

            <section>
                
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method ="POST">
                    <label for="title">Title</label>
                    <input type="text" class="task_input" name="title" required><br><br>
                    <label for="description">Desc</label>
                    <input type="text" class="task_input" name="description" required>
                    <button type="submit" class="add_btn" name="submit">Submit</button>
                </form>
                <?php 
                if(isset($_POST['submit'])){ 
                        $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
                        $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_STRING); 
                        $query = 'INSERT INTO todoitems
                                        (Title,Description)
                                                VALUES
                                                    (:title, :description)';
                        $statement = $db->prepare($query);
                        $statement->bindValue(':title',$title); 
                        $statement->bindValue(':description',$description);
                        $statement->execute();
                        $statement->closeCursor(); 
                        header('location: index.php');
                     } ?>
                
            </section>

            <?php if(empty($results)) echo "List is empty";?>
            <section>
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach ($results as $result){ ?>
                                <tr>
                                    <td class="task"><?php echo $result['Title']?></td>
                                    <td class="task"><?php echo $result['Description']?></td>
                                    <td >
                                        <form action="delete.php" method="POST">
                                            <input type="submit" name="itemNum" value="<?php echo $result['itemNum']; ?>">
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>    
                        <?php ?>
                    </tbody>
                </table>
            </section>

        <?php } ?>
        
        
            
    </main>
    
</body>
</html>