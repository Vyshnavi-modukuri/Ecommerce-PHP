<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "root";
$database = "register";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    // Perform a SQL query to check the user's credentials
    $sql = "SELECT * FROM signup WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) == 1) {
        session_start();
            $_SESSION['username'] = $username;

            // Redirect the user to another page after successful login
            header("Location: index.php");
            exit();
    } else {
        echo "<html><body>";
            echo "<script>";
            echo "alert('Invalid username or password');";
            echo "window.location.href = 'login.php';"; // Redirect back to the sign-in page
            echo "</script>";
            echo "</body></html>";
    }
}

// Close the database connection
mysqli_close($conn);
?>