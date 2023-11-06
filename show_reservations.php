<!DOCTYPE html>
<html>
<head> 
    <title>Book Table</title>
    <link rel="stylesheet" type="text/css" href="./css/show_reservation.css">
</head>
<body>
    <?php
       require_once('db_connection.php');
        // Delete record when delete button is clicked
        if (isset($_POST['delete'])) {
            $email = $_POST['email'];
            $sql = "DELETE FROM reservation WHERE Email='$email'";
            mysqli_query($conn, $sql);
        }

        $sql = "SELECT First_Name, Last_Name, Email, Number_of_Guest, Type_of_Table, Booking_Date, Booking_Time FROM reservation";
        $result = mysqli_query($conn, $sql);

        // Display the table data on the webpage
        if (mysqli_num_rows($result) > 0) {
            echo "<h1>Book Table</h1>";
            echo "<table>";
            echo "<tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Number of Guests</th><th>Type of Table</th><th>Booking Date</th><th>Booking Time</th><th>Action</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row["First_Name"] . "</td><td>" . $row["Last_Name"] . "</td><td>" . $row["Email"] . "</td><td>" . $row["Number_of_Guest"] . "</td><td>" . $row["Type_of_Table"] . "</td><td>" . $row["Booking_Date"] . "</td><td>" . $row["Booking_Time"] . "</td><td><form method='post' action=''><input type='hidden' name='email' value='" . $row["Email"] . "'><input type='submit' name='delete' value='Delete'></form></td></tr>";
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
