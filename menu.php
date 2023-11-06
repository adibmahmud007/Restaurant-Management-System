<!DOCTYPE html>
<html>
<head>
    <title>Menu</title>
    
    <link rel="stylesheet" type="text/css" href="./css/menu_style.css">
</head>

<body>
    <?php
        require_once('db_connection.php');

        // Query the menu items and their prices from the database
        $sql = "SELECT item_name, price, category FROM menu";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Create an empty array to store the categories
            $categories = array();
            
            // Loop through each row and group the menu items by category
            while ($row = mysqli_fetch_assoc($result)) {
                $category = $row['category'];
                if (!isset($categories[$category])) {
                    $categories[$category] = array();
                }
                array_push($categories[$category], $row);
            }
            
            // Loop through each category and display the menu items in a table
            foreach ($categories as $category => $menu_items) {
                echo "<h1>$category</h1>";
                echo "<table>";
                echo "<tr><th>Item Name</th><th>Price</th></tr>";
                foreach ($menu_items as $menu_item) {
                    echo "<tr><td>" . $menu_item["item_name"] . "</td><td>" . $menu_item["price"] . "</td></tr>";
                }
                echo "</table>";
            }
        } else {
            echo "No menu items found.";
        }

        // Close the database connection
        mysqli_close($conn);
    ?>
   
</body>
</html>
