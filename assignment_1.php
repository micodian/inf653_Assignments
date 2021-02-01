<?php


$mode = "dark";
$first_name = filter_input(INPUT_GET,'first_name',FILTER_SANITIZE_STRING);
$last_name = filter_input(INPUT_GET,'last_name',FILTER_SANITIZE_STRING);
$age=filter_input(INPUT_GET,'age',FILTER_SANITIZE_STRING);
$days = $age * 365;
$statement_greater = "and I am old enough to vote in the United States.";
$statement_less ="and I am not old enough to vote in the United States.";
$print_statement =( $age < 18?"I am {$age} years old,{$statement_less}":"I am {$age} years old, {$statement_greater}");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 1</title>
    <link rel="stylesheet" href="main.css">
</head>
<body <?php if ($mode === "dark"): ?> class = "dark"<?php endif ?>>
    
    <?php 
    if(isset($first_name)&& isset($last_name)&&isset($age)){
        if(!empty($first_name)&& !empty($last_name)&& !empty($age) ){
            echo  "<h2>Hello, my name is {$first_name} {$last_name}.</h2>";
            echo "<br>";
           
            echo $print_statement;
            echo "<br>";
            echo "That means I'm at least {$days} days old";
        }else{echo '<div class= "error"><h1>Parameter not set</h1></div>';}
    }
    else{echo '<div class= "error"><h1>Please provide required details, first_name,last_name, and age</h1></div>';}  
    
    
        ?>
    
</body>
</html>