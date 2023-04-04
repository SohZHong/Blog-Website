<?php
require_once '../includes/config.php';

$id=intval($_GET['id']);
$result = $db->query("SELECT * FROM blog_category WHERE category_id=$id");

while($row = $result->fetch_assoc()){
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Edit Category</title>
    </head>

    <body>
        <h2>Edit Category</h2>
        <h3>Modify Existing Categories</h3>
        <form class="input-form" action="update-category.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['category_id'];?>"/>
            <input type="hidden" name="action" value="edit"/>
            <div>
                <label for="category_name">Name *</label>
                <input type="text" id="category_name" name="category_name" value="<?php echo $row['category_name'];?>" required/>
            </div>
            <div>
                <input type="submit" value="Edit Category"/>
            </div>
        </form>
    </body>
</html>
<?php
};
?>