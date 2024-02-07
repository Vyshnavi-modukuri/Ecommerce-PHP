<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

$servername = "localhost";
$username = "root";
$password = "root";
$database = "products";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}




//Cart
if (isset($_POST['addToCart'])) {
    session_start();
    $session=$_SESSION['username'];
    echo "$session";
            // Your existing code for adding items to the cart here
            $productId = $_POST['pID'];
            $productDescript = $_POST['productDescription'];
            $userName = "$session";
            $tableName = $_POST['tableName'];
            $productPrice = $_POST['productPrice'];
            $productName = $_POST['productName'];
            $productImage = $_POST['productImage'];  
            // if not product exists then we are newly inserting data into the "cart" table
            $sql = "INSERT INTO cart (pid, userName,pname , pdescript, pPrice,pimg, tableName) VALUES ('$productId', '$userName', '$productName','$productDescript','$productPrice',  '$productImage', '$tableName')";
            if (mysqli_query($conn, $sql)) {
                echo '<script type="text/javascript">';
                echo 'alert("Item added to bag!");';
                echo 'window.history.back();'; // Redirect to previous_page
                echo '</script>';
            } else {
                echo "Error adding record: " . mysqli_error($conn);
            }

//    } else {
//        echo "Error:" . $conn->error;
    }


if (isset($_POST['removeCart'])) {
    // Your existing code for removing items from the cart here
    $productId = $_POST['pID'];
    $userName = $_POST['userName'];
    // Construct the SQL DELETE query
    $sql = "DELETE FROM cart WHERE pid = '$productId' and userName = '$userName'";
    // Execute the DELETE query
    if ($conn->query($sql) === TRUE) {
        echo '<script type="text/javascript">';
        echo 'alert("Item deleted from bag!");';
        echo 'window.history.back();'; // Redirect to previous_page
        echo '</script>';
    } else {
        echo "Error deleting row: " . $conn->error;
    }
}
//end of cart

//wishlist
if (isset($_POST['addToWishlist'])) {
    session_start();
    $session=$_SESSION['username'];
    echo "$session";
            // Your existing code for adding items to the cart here
            $productId = $_POST['pID'];
            $productDescript = $_POST['productDescription'];
            $userName = "$session";
            $tableName = $_POST['tableName'];
            $productPrice = $_POST['productPrice'];
            $productName = $_POST['productName'];
            $productImage = $_POST['productImage'];  
            // if not product exists then we are newly inserting data into the "cart" table
            $sql = "INSERT INTO wishlist(pid, userName,pname , pdescript, pPrice,pimg, tableName) VALUES ('$productId', '$userName', '$productName','$productDescript','$productPrice',  '$productImage', '$tableName')";
            if (mysqli_query($conn, $sql)) {
                echo '<script type="text/javascript">';
                echo 'alert("Item added to your Wishlist!");';
                echo 'window.history.back();'; // Redirect to previous_page
                echo '</script>';
            } else {
                echo "Error adding record: " . mysqli_error($conn);
            }
    }

    
if (isset($_POST['removeFromWishlist'])) {
    $productId = $_POST['pID'];
    $userName = $_POST['userName'];
    $sql = "DELETE FROM wishlist WHERE pid = '$productId' and userName = '$userName'";
    if ($conn->query($sql) === TRUE) {
        echo '<script type="text/javascript">';
        echo 'alert("Item removed from wshlist!");';
        echo 'window.history.back();'; // Redirect to previous_page
        echo '</script>';
    } else {
        echo "Error deleting row: " . $conn->error;
    }
}

//end of wishlist


//buy now
if (isset($_POST['buyNow'])) {
    // Calculate total price based on the items in the user's cart
    $userName = $_SESSION['username'];
    $totalPrice = calculateTotalPrice($conn, $userName); // Replace with your logic to calculate total price

    // Insert order details into the 'orders' table
    $orderSql = "INSERT INTO orders (userName, total_price) VALUES ('$userName', '$totalPrice')";
    
    if (mysqli_query($conn, $orderSql)) {
        // Order details inserted successfully
        // Clear the user's cart (optional)
        clearCart($conn, $userName);

        // Redirect to order confirmation page
        header("Location: place_order.php");
        exit();
    } else {
        echo "Error adding order record: " . mysqli_error($conn);
    }
}

// ... (the rest of your existing code)

//function calculateTotalPrice($conn, $userName) {
//    $totalPrice = 0;
//
//    // Query the cart table to get the items for the specified user
//    $cartQuery = "SELECT pPrice FROM cart WHERE userName = '$userName'";
//    $cartResult = mysqli_query($conn, $cartQuery);
//
//    if ($cartResult) {
//        // Calculate the total price based on the items in the cart
//        while ($row = mysqli_fetch_assoc($cartResult)) {
//            $totalPrice += $row['pPrice'];
//        }
//    } else {
//        echo "Error calculating total price: " . mysqli_error($conn);
//    }
//
//    return $totalPrice;
//}

function clearCart($conn, $userName) {
    // Delete items from the cart table for the specified user
    $clearCartQuery = "DELETE FROM cart WHERE userName = '$userName'";
    $clearCartResult = mysqli_query($conn, $clearCartQuery);

    if (!$clearCartResult) {
        echo "Error clearing cart: " . mysqli_error($conn);
    }
}

?>
