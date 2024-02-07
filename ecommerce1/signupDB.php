<?php
// Database connection settings (You can add your database connection code here)

$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];

try {
    $conn = new mysqli("localhost", "root", "root", "register");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO signup (username, password, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $password, $email);

    if ($stmt->execute()) {
        // Registration successful, set a session variable
        session_start();
        $_SESSION['username'] = $username;

        // Redirect the user to another page after registration
        header("Location: index.php");
        exit();
    } else {
        echo "<html><body>";
        echo "<script>";
        echo "alert('Registration failed');";
        echo "window.location.href = 'signup.php';";
        echo "</script>";
        echo "</body></html>";
    }

    $stmt->close();
    $conn->close();
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

//<?php
//
///* 
//// put your code here
//                $servername = "localhost";
//                $username = "root";
//                $password = "root";
////               mysqli_query($conn,"Create database php1");
//                $database='php1';
//                $conn1 = mysqli_connect($servername, $username, $password,$database);
//                if (!$conn1) {
//                  die("Connection failed: " . mysqli_connect_error());
//                }
//                echo '<br>Connected successfully<br>';
//                
////                if (mysqli_query($conn1, "create table form(user varchar(30),password varchar(30))")) {
////                    echo ("table created sucessfully<br>");
////                }
//                
//                $user = $_POST['username'];
//                $pass = $_POST['password'];
//                if (mysqli_query($conn1, "insert into form values('$user','$pass')")) {
//                    echo("added sucessfully");
//                }