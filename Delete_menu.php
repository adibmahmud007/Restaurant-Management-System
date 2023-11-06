<!DOCTYPE html>
<html>
<head>
    <title>Delete Item</title>
    <link rel="stylesheet" type="text/css" href="./css/menu_style.css">
</head>
<body>
    <?php
        require_once('db_connection.php');

        // Delete record when delete button is clicked
        if (isset($_POST['delete'])) {
            $id = $_POST['id'];
            $sql = "DELETE FROM menu WHERE id='$id'";
            mysqli_query($conn, $sql);
        }

        $sql = "SELECT id,item_name, price, category FROM menu";
        $result = mysqli_query($conn, $sql);

        // Display the table data on the webpage
        $i=1;
        if (mysqli_num_rows($result) > 0) {
         echo "<h1>Delete Item</h1>";
         echo "<table>";
         echo "<tr><th>Nr.</th><th>item_name</th><th>price</th><th>category</th><th>Action</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
              
                echo "<tr><td>$i</td><td>" . $row["item_name"] . "</td><td>" . $row["price"] . "</td><td>" . $row["category"] . "</td><td><form method='post' action=''><input type='hidden' name='id' value='" . $row["id"] . "'><input type='submit' name='delete' value='Delete' onclick='return confirm(\"Are you sure you want to delete this item?\")'></form></td></tr>";

                $i++;
            }
            echo "</table>";
        } else {
            echo "Food Delete Sucessfully.";
        }

        // Close the database connection
        mysqli_close($conn);
    ?>
</body>
</html>
