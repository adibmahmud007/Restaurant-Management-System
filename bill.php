<!DOCTYPE html>
<html>
<head>
    <title>Bill</title>
    <link rel="stylesheet" type="text/css" href="./css/bill.css">
</head>
<body>
    <form method="post">
        <?php
        require_once('db_connection.php');


        $sql = "SELECT id, item_name, price, category FROM menu";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $categories = array();

            while ($row = mysqli_fetch_assoc($result)) {
                $category = $row['category'];

                if (!isset($categories[$category])) {
                    $categories[$category] = array();
                }

                array_push($categories[$category], $row);
            }

            echo "<form method='post'>";

            foreach ($categories as $category => $menu_items) {
                echo "<h1>$category</h1>";
                echo "<table>";
                echo "<tr><th>Item Name</th><th>Price</th><th>Quantity</th></tr>";

                foreach ($menu_items as $menu_item) {
                    $item_id = $menu_item["id"];
                    $item_name = $menu_item["item_name"];
                    $price = $menu_item["price"];

                    echo "<tr><td>$item_name</td><td>$price</td>";
                    echo "<td><select name='$item_id'><option value=''>0</option>";

                    for($i=1;$i<=10;$i++){
                        echo "<option value='$i'>$i</option>";
                    }

                    echo "</select></td></tr>";
                }

                echo "</table>";
            }

            echo "<input type='submit' name='submit' value='Add to Cart'>";
            echo "</form>";
            echo "<button onclick='printBill()'>Print Bill</button>";
        } else {
            echo "No menu items found.";
        }

        
        if(isset($_POST['submit'])){
            $order_summary = "<h2>Order Summary</h2>";
            
            $order_total = 0;

            foreach ($_POST as $key => $value) {
                if($value != "" && $key != "submit"){
                    $item_id = mysqli_real_escape_string($conn, $key);
                    $quantity = mysqli_real_escape_string($conn, $value);

                    $sql = "SELECT price, item_name FROM menu WHERE id = '$item_id'";
                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) > 0){
                        $row = mysqli_fetch_assoc($result);
                        $price = $row['price'];
                        $item_name = $row['item_name'];
                        $subtotal = $quantity * $price;
                        $order_total += $subtotal;
                        $order_summary .= "<p>$item_name x $quantity - $subtotal</p>";
                    } else {
                        $order_summary .= "<p>Invalid item ID: $item_id</p>";
                    }
                }
            }

            $order_summary .= "<h3>Total: $order_total</h3>";
            echo $order_summary;
            echo "<div id='order-summary' style='display:none;'>$order_summary</div>";
        }

        mysqli_close($conn);
        ?>
    </form>
   

<script>
    function printBill() {
        var printContents = document.getElementById("order-summary").innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
</body>
</html>