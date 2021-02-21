<?php include 'header.php'; ?> 
    <main>
        <h1>Add Item</h1>
        <form action="index.php" method="post"
              id="add_item_form">

            <label>Category:</label>
            <select name="category_id">
                <!-- <option value="All categories">All categories</option> -->
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>
            </select><br><br>

            <label>Title: </label>
            <input type="text" name="title"><br>

            <label>Description:</label>
            <input type="text" name="description"><br>

            <label>&nbsp;</label>
            <input type="submit" value="Add Item"><br>
        </form>
        <p class="last_paragraph"><a href="?action=show_item_list">View Item List</a></p>
    </main>

<?php include 'footer.php'; ?>     