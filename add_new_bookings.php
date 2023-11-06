

<!DOCTYPE html>
<html>
<head>
    <title>Book Table</title>
    <link rel="stylesheet" type="text/css" href="./css/add_bookings.css ">
</head>
<body>

<?php
require_once "db_connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $booking_date = $_POST["booking_date"];

    // Check if all tables are booked for the given date
    $sql = "SELECT COUNT(*) AS total_booked_tables FROM reservation WHERE Booking_Date = '$booking_date'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $total_booked_tables = $row['total_booked_tables'];

        // Assuming 10 tables in the restaurant
        $total_tables = 3;

        if ($total_booked_tables >= $total_tables) {
            echo "Sorry, all tables are booked for the selected date. Please choose another date.";
        } else {
            // Process the reservation
            $first_name = $_POST["first_name"];
            $last_name = $_POST["last_name"];
            $email = $_POST["email"];
            $guests = $_POST["guests"];
            $table_type = $_POST["table_type"];
            $booking_time = $_POST["booking_time"];

            // Prepare SQL statement for insertion
            $insert_sql = "INSERT INTO reservation (First_Name, Last_Name, Email, Number_of_Guest, Type_of_Table, Booking_Date, Booking_Time) VALUES ('$first_name', '$last_name', '$email', '$guests', '$table_type', '$booking_date', '$booking_time')";

            // Execute SQL statement for insertion
            if (mysqli_query($conn, $insert_sql)) {
                echo "Reservation added successfully.";
            } else {
                echo "Error: " . $insert_sql . "<br>" . mysqli_error($conn);
            }
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
 <h1><center>Book Table</center></h1>

<form method="post">
    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" required><br>

    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" required><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>

    <label for="guests">Number of Guests:</label>
    <input type="number" id="guests" name="guests" min="1" max="10" required><br>

    <label for="table_type">Type of Table:</label>
    <select id="table_type" name="table_type" required>
        <option value="indoor">Indoor</option>
        <option value="outdoor">Outdoor</option>
    </select><br>

    <label for="booking_date">Booking Date:</label>
    <input type="date" id="booking_date" name="booking_date" required><br>

    <label for="booking_time">Booking Time:</label>
    <input type="time" id="booking_time" name="booking_time" required><br>
    
</br>
<input type="submit" value="Book Table">
    </form>
</body>
</html>