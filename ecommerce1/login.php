<?php session_start();

// Check if the user is already logged in, redirect to home.php if so
if (isset($_SESSION['username'])) {
    echo 'alert("Already signed in!!")';
    header("Location: index.php");
    exit;
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index1.css">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <link rel="stylesheet" 
        href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        crossorigin="anonymous">
        <link rel="stylesheet"
        href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
    <title>Sign Up and Sign In</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image:url("photos/signup.jpg");
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;
        }

        .container2 {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 75vh;
            padding:20px;
        }

        .form-container {
            border-radius: 19px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin: 10px;
            text-align: center;
            margin-bottom: 10px;
            backdrop-filter:blur(10px);
            width:20%;
           
        }

        .form-container h1,.header h1 {
            margin-bottom: 5px;
            /*text-shadow: 2px 2px #e3d105;*/
            color:orangered;
        }

        .form-container form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-container input {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: orangered;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-container button:hover {
            background-color:#ff6600;
        }

        .header {
            height: 80px;
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
          <div class="profile mx-2"><a href="login.php">Sign-in</a></div>
          <a href="login.php"><button onclick="wish()"><span class="fa fa-heart"></span></button></a>
        </div>
      </div>
    </nav>
  </header>
    <div class="container2" ng-app="myApp" ng-controller="UserController">
        <div class="form-container">
            <h1>Sign-in</h1><br>
            <form ng-submit="submitForm()" id="myForm" action="signinDB.php" method="post">
                <input type="text" name="username" placeholder="Username" ng-model="name" ng-model-options="{ updateOn: 'default blur', debounce: { default: 300, blur: 0 } }" ng-change="validateName()" required>
                <input type="password" name="password" placeholder="Password" ng-model="password" ng-model-options="{ updateOn: 'default blur', debounce: { default: 300, blur: 0 } }" ng-change="validatePassword()" required><br>
                <button type="submit" id="sub">Login</button><br>
                Don't have an account? <a href="signup.php">Sign Up</a>
            </form>
        </div>
    </div>
    <script src="signup.js"></script>
    <?php if (isset($login_error)) {
        echo "<p>$login_error</p>";
    } ?>
</body>
</html>