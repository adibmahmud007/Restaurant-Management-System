<!DOCTYPE html>
<html>
<head>
    <title>Menu</title>
    <link rel="stylesheet" type="text/css" href="./css/add_menu.css">
</head>
<body>
    <?php
      require_once('db_connection.php');

        // Handle form submission for adding a new menu item
        if (isset($_POST["submit"])) {
            $item_name = $_POST["item_name"];
            $price = $_POST["price"];
            $category = $_POST["category"];

            $sql = "INSERT INTO menu (item_name, price, category) VALUES ('$item_name', '$price', '$category')";
            
            if (mysqli_query($conn, $sql)) {
                echo "New menu item added successfully.";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }


       
        // Query the menu items and their prices from the database
        $sql = "SELECT item_name, price, category FROM menu";
        $result = mysqli_query($conn, $sql);


      

        // Close the database connection
        mysqli_close($conn);
    ?>
    <h2>Add New Menu Item</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="item_name">Item Name:</label>
        <input type="text" id="item_name" name="item_name" required>
        <br>
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" required>
        <br>
        <label for="category">Category:</label>
        <select id="category" name="category" required>
            <option value="">--Select Chicken--</option>
            <option value="Pizza">Pizza</option>
            <option value="Burger">Burger</option>
            <option value="Desserts">Desserts</option>
            <option value= "Drinks">Drinks</option>
            <option value="Set Menu">Set Menu</option>
        </select>
        <br>
        <input type="submit" name="submit" value="Add Menu Item">


       