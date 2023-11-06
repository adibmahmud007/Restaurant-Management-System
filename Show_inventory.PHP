<!DOCTYPE html> 
<html>
<head> 
    <title>Inventory List</title>
    <link rel="stylesheet" type="text/css" href="./css/show_inventory.css">
</head>
<body>
    <?php
       require_once('db_connection.php');
        // Delete record when delete button is clicked
        if (isset($_POST['delete'])) {
            $Iteam_Name = $_POST['Iteam_Name'];
            $sql = "DELETE FROM inventory WHERE Iteam_Name='$Iteam_Name'";
            mysqli_query($conn, $sql);
        }

        $sql = "SELECT Iteam_Name, Price, Quantity,Unit FROM inventory";
        $result = mysqli_query($conn, $sql);

        // Display the table data on the webpage
        if (mysqli_num_rows($result) > 0) {
            echo "<h1>Inventory List </h1>";
            echo "<table>";
            echo "<tr><th>Iteam_Name</th><th>Price</th><th>Quantity</th><th>Unit</th><th>Action</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row["Iteam_Name"] . "</td><td>" . $row["Price"] . "</td><td>" . $row["Quantity"] . "</td><td>" . $row["Unit"] . "</td><td><form method='post' action=''><input type='hidden' name='Iteam_Name' value='" . $row["Iteam_Name"] . "'><input type='submit' name='delete' value='Delete'></form></td></tr>";
            }
            echo "</table>";
        } else {
            echo "No reservations found.";
        }

        // Close the database connection
        mysqli_close($conn);
    ?>
</body>
</html>
