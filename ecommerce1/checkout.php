<?php
// order.php

session_start();
$userName = $_SESSION['username'];
include_once("register1.php");
include_once("connection.php");

// Retrieve cart items
$sql = "SELECT * FROM cart WHERE userName='$userName'";
$result = $conn->query($sql);

// Initialize total price
$totalPrice = 0;

// Validate user input
if (!isset($_POST['paymentMethod'])) {
    echo "Please select a payment method.";
    exit;
}

// Process order based on selected payment method
if ($_POST['paymentMethod'] === "creditCard") {
    // Process credit card payment
    $cardNumber = $_POST['cardNumber'];
    $bankName = $_POST['bankName'];
    $cardHolderName = $_POST['cardHolderName'];
    $expiryDate = $_POST['expiryDate'];

    // Validate credit card details
    if (!validateCreditCard($cardNumber, $bankName, $cardHolderName, $expiryDate)) {
        echo "Invalid credit card details.";
        exit;
    }

    // Process payment using a payment gateway or mock transaction
    // (Replace with your actual payment processing logic)
    echo "Processing credit card payment...";
    simulatePaymentSuccess();
} else if ($_POST['paymentMethod'] === "cashOnDelivery") {
    // Process cash on delivery order
    echo "Processing cash on delivery order...";
    simulateCashOnDeliveryOrder();
} else {
    echo "Invalid payment method selected.";
    exit;
}

// Place order in the database
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$pincode = $_POST['pincode'];

// Prepare SQL query for order insertion
$sql = "INSERT INTO orders (userName, totalPrice, address, city, state, pincode) VALUES ('$userName', '$totalPrice', '$address', '$city', '$state', '$pincode')";

// Execute the query
$conn->query($sql);

// Retrieve order ID
$orderId = $conn->insert_id;

// Clear cart
$sql = "DELETE FROM cart WHERE userName='$userName'";
$conn->query($sql);

// Redirect to order confirmation page with order ID
header("Location: order-confirmation.php?orderId=$orderId");
