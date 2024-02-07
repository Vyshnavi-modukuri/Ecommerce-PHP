<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<?php
session_start();



include_once("db.php");
$sql = "SELECT * FROM kids";
$result = $conn->query($sql);

?>
<head>
    <title>Products</title>
    <link rel="stylesheet" href="index1.css">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <link rel="stylesheet" 
        href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        crossorigin="anonymous">
        <link rel="stylesheet"
        href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <style>
        /* Menu section styles */
        .menu {
            padding: 50px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
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
            width: 100%;
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
        .button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white; /* Text color */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #45a049;
            color: #fff; /* Change text color on hover if needed */
        }
    </style>
</head>

<body> 
    <header class="containerHeader">
        <nav class="flex space-between text-size fixed-top nav-links">
            <div class="left flex items-center">
                <img style="height:28px;width: 35px;" src="products/T.jpg"/>
                <ul class="flex items-center justify-center uppercase semibold">
                    <li><a href="men.php">Men</a></li>
                    <li><a href="women.php">Women</a></li>
                    <li><a href="kids.php">Kids</a></li>
                    <li><a href="living.php">Home and Living</a></li>
                    <li><a href="beauty.php">Beauty</a></li>
                    <li><a href="foot.php">Footwear</a></li>
        
                </ul>
            </div>
            <div class="right flex items-center">
                <input class="search" placeholder="Search for products, brands and more" class="desktop-searchBar" value="" data-reactid="904">
                <div class="rightBox">
                    <?php
                    
                    if(isset($_SESSION['username'])) {
                        // If the user is signed in, display "Profile," "Bag," and "Logout"
                        echo '<div class="profile mx-2"><a href="profile.php">Profile</a></div>';
                        echo '<a href="cart.php"><span class="fa fa-shopping-cart">&nbsp&nbsp</span></button>';
                        echo '<a href="wishlist.php"><span class="fa fa-heart">&nbsp&nbsp</span></button>';
                        echo '<a href="logout.php"><button>Logout</button></a>';
                    } else {
                        // If the user is not signed in, display "Sign In"
                        echo '<div class="profile mx-2"><a href="login.php">Sign-in</a></div>';
                        echo '<a href="login.php"><button onclick="wish()"><span class="fa fa-heart"></span></button></a>';
                    }   
                    ?>
                </div>
            </div>
        </nav>
    </header>
    <div class="menu">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="menu-item">
                <img src="<?php echo $row['pimg']; ?>" alt="<?php echo $row['pname']; ?>">
                <h2><?php echo $row['pname']; ?></h2>
                <p><?php echo $row['pdescript']; ?></p>
                <span class="price">$<?php echo $row['pPrice']; ?></span>
                <form action="db.php" method="post">
                    <input type="hidden" name="productDescription" value="<?php echo $row["pdescript"]; ?>">
                    <input type="hidden" name="tableName" value="kids">
                    <input type="hidden" name="pID" value="<?php echo $row["pid"]; ?>">
                    <input type="hidden" name="productPrice" value="<?php echo $row["pPrice"]; ?>">
                    <input type="hidden" name="productName" value="<?php echo $row["pname"]; ?>">
                    <input type="hidden" name="productImage" value="<?php echo $row["pimg"]; ?>"><br>
                    <button class="button" name="addToCart">Add To Cart</button>
                    <button class="button" name="addToWishlist"><span class="fa fa-heart"></span></button>
                 
                </form>
                
            </div>
        <?php endwhile; ?>
    </div>
</body>

</html>