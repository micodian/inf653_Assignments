<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My Todo List</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
    <header><h1>My Todo List</h1></header>

    <main>
        <h2 class="top">Error</h2>
        <p><?php echo $error; ?></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Todo List App</p>
    </footer>
</body>
</html>