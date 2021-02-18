<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>Todo List App</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
    <header><h1>Todo List App</h1></header>

    <main>
        <h1>Database Error</h1>
        <p>There was an error connecting to the database.</p>
        <p>The database must be installed </p>
        <p>MySQL must be running </p>
        <p>Error message: <?php echo $error_message; ?></p>
        <p>&nbsp;</p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Todo List App</p>
    </footer>
</body>
</html>