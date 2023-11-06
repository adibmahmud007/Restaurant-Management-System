<?php
require_once('db_connection.php');

$Iteam_Name = $Price = $Quantity = $Unit = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Iteam_Name = mysqli_real_escape_string($conn, $_POST["Iteam_Name"]);
    $Price = mysqli_real_escape_string($conn, $_POST["Price"]);
    $Quantity = mysqli_real_escape_string($conn, $_POST["Quantity"]);
    $Unit = mysqli_real_escape_string($conn, $_POST["Unit"]);

    $sql_check = "SELECT * FROM inventory WHERE Iteam_Name = ?";
    $stmt_check = mysqli_prepare($conn, $sql_check);
    mysqli_stmt_bind_param($stmt_check, "s", $Iteam_Name);
    mysqli_stmt_execute($stmt_check);
    $result = mysqli_stmt_get_result($stmt_check);

    // test

    if (mysqli_num_rows($result) > 0) {
        // If the item already exists, update the quantity and price
        $row = mysqli_fetch_assoc($result);
        $existingQuantity = $row['Quantity'];
        $existingPrice = $row['Price'];

        $newQuantity = $existingQuantity + $Quantity;
        $newPrice = $existingPrice + $Price;

        $sql_update = "UPDATE inventory SET Quantity = ?, Price = ? WHERE Iteam_Name = ?";
        $stmt_update = mysqli_prepare($conn, $sql_update);
        mysqli_stmt_bind_param($stmt_update, "dds", $newQuantity, $newPrice, $Iteam_Name);
        if (mysqli_stmt_execute($stmt_update)) {
            echo "Item updated successfully.";
        } else {
            $error = "Error: " . mysqli_error($conn);
        }
    } else {
        // If the item does not exist, insert a new record
        $sql_insert = "INSERT INTO inventory (Iteam_Name, Price, Quantity, Unit) VALUES (?, ?, ?, ?)";
        $stmt_insert = mysqli_prepare($conn, $sql_insert);
        mysqli_stmt_bind_param($stmt_insert, "sdds", $Iteam_Name, $Price, $Quantity, $Unit);
        if (mysqli_stmt_execute($stmt_insert)) {
            echo "New item added successfully.";
        } else {
            $error = "Error: " . mysqli_error($conn);
        }
    }

    
}

mysqli_close($conn);
?>


<!DOCTYPE html>
<html>
<head>
    <title>Inventory Form</title>
    <link rel="stylesheet" type="text/css" href="./css/add_inventory.css">
</head>
<body>
    <h1><center>Inventory Form</center></h1>

    <?php if (!empty($error)) { echo $error; } ?>

    <form method="post">
        <label for="Iteam_name">Iteam_Name:</label>
        <input type="text" id="Iteam_Name" name="Iteam_Name" required><br>
        <label for="Price">Price:</label>
        <input type="text" id="Price" name="Price" required><br>
        <label for="Quantity">Quantity:</label>
        <input type="number" id="Quantity" name="Quantity" required><br><br>
        <label for="Unit">Unit:</label>
        <select id="Unit" name="Unit" required>
            <option value="kg">Kg</option>
            <option value="gram">gram</option>
            <option value="Liter">Liter</option>
            <option value="Piece">Piece</option>
        </select><br>
        <br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>