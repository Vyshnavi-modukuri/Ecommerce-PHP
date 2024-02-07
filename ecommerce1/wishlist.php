<?php
session_start();
$userName = $_SESSION['username'];
include_once("connection.php");
$sql = "SELECT * FROM wishlist where userName='$userName'";
$result = $conn->query($sql);

// Initialize total price
$totalPrice = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <style>
        /* Menu section styles */
        .menu {
            padding: 30px;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 100px;
        }

        .menu-item {
            border: 2px solid #e7694d;
            padding: 10px;
            background-color: #ebf5f5d4;
            border-radius: 7px;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
            width: 100%;
        }

        .menu-item:hover {
            transform: translateY(-5px);
            box-shadow: 8px 8px 15px rgba(0, 0, 0, 0.3);
        }

        .menu-item img {
            width: 50%;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .menu-item h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333333;
        }

        .menu-item p {
            font-size: 16px;
            color: #777777;
            margin-bottom: 10px;
        }

        .menu-item .price {
            display: block;
            font-size: 20px;
            color: #ff6600;
            font-weight: bold;
            margin-top: 15px;
        }

        /* Total price styles */
        .total-price {
            margin-top: 20px;
            font-size: 24px;
            font-weight: bold;
            color: #333333;
            border-top: 2px solid #e7694d;
            padding-top: 10px;
            text-align: right;
        }
        .total-section {
            margin-top: 20px;
            font-size: 18px;
            text-align: right;
        }

        /* Summary table styles */
        .summary-table {
            width: 50%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        .summary-table th,
        .summary-table td {
            border: 1px solid #e7694d;
            padding: 10px;
            text-align: center;
        }

        .buy-btn {
            margin-top: 20px;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }
        .empty-cart-message{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 50vh;
            margin: 0;
            text-align: center;
            font-size: 50px;
            font-family: sans-serif,antasy;
            font-style: oblique;
            margin-top: 20px;
            color: orangered;
        }
        .empty-cart-container {
            border-radius: 19px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            position:absolute;
            top: 20%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            backdrop-filter: blur(10px);
            width: 40%;
            max-width: 300px; /* Set a maximum width for larger screens */
            display:flex;
            flex-direction: column;
            align-items: center;
            margin-top: 200px; /* Adjust the top margin as needed */
            margin-bottom: 100px; 
           border: 2px solid orangered;
            
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }


    </style>
</head>

<body>

    <?php if ($result->num_rows > 0) : ?>

        <div class="menu">
            <?php while ($row = $result->fetch_assoc()) : ?>
                <div class="menu-item">
                    <img src="<?php echo $row['pimg']; ?>" alt="<?php echo $row['pname']; ?>">
                    <h2><?php echo $row['pname']; ?></h2>
                    <p><?php echo $row['pdescript']; ?></p>
                    <span class="price">$<?php echo $row['pPrice']; ?></span>
                    <form action="db.php" method="post">
                        <input type="hidden" name="pID" value="<?php echo $row["pid"]; ?>">
                        <input type="hidden" name="userName" value="<?php echo $row["userName"]; ?>">
                        <button name="removeFromWishlist">Remove</button>
                    </form>
                </div>
            <?php endwhile; ?>
        </div>


    <?php else : ?>
        <!-- Display message when the cart is empty -->
        <div class="empty-cart-message empty-cart-container">
            Your Wishlist is empty.
            <br><br> 
            <a href="index.php"><button>Go Back for Shopping</button></a>
        </div>
    <?php endif; ?>

</body>

</html>
