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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        h1, h2 {
            color: #333;
            text-align: center;
        }

        .order-details {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .order-item {
            border: 2px solid #e7694d;
            padding: 10px;
            background-color: #ebf5f5d4;
            border-radius: 7px;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2);
            margin-bottom: 10px;
        }

        .order-item img {
            width: 30%;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .order-item h3 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .order-item p {
            font-size: 16px;
            color: #777777;
            margin-bottom: 10px;
        }

        .order-item .price {
            display: block;
            font-size: 20px;
            color: #ff6600;
            font-weight: bold;
            margin-top: 15px;
        }

        .total-section {
            margin-top: 20px;
            font-size: 18px;
            text-align: right;
        }

        .summary-table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        .summary-table th,
        .summary-table td {
            border: 1px solid #e7694d;
            padding: 10px;
            text-align: center;
        }

        .summary-table th {
            background-color: #e7694d;
            color: white;
        }

        .payment-container {
            margin-top: 20px;
        }

        .payment-container label {
            margin-right: 10px;
        }

        .billing-address-container,
        .payment-options-container {
            margin:10px;
            border: 2px solid #e7694d;
            padding: 10px;
            background-color: #ebf5f5d4;
            border-radius: 7px;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
        }

        .billing-address-container h2,
        .payment-options-container h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .billing-address-container .inputBox,
        .payment-options-container .inputBox {
            margin-bottom: 10px;
        }

        .billing-address-container .inputBox span,
        .payment-options-container .inputBox span {
            display: inline-block;
            width: 150px;
        }

        .flex {
            display: flex;
            justify-content: space-between;
        }

        button {
            padding: 15px 30px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <h1>Order Confirmation</h1>

    <div class="order-details">
        <h2>Your Order:</h2>

        <?php while ($row = $result->fetch_assoc()) : ?>
            <div class="order-item">
                <img src="<?php echo $row['pimg']; ?>" alt="<?php echo $row['pname']; ?>">
                <h3><?php echo $row['pname']; ?></h3>
                <p><?php echo $row['pdescript']; ?></p>
                <span class="price">$<?php echo $row['pPrice'];  ?></span>
            </div>
            <?php
            // Accumulate total price
            $totalPrice += $row['pPrice'];
            endwhile;
            ?>

      

            <!-- Display summary table -->
            <table class="summary-table">
                <tr>
                    <th>Products Price</th>
                    <th>GST</th>
                    <th>Delivery Charges</th>
                    <th>Total Price</th>
                    
                </tr>
                <tr>
                    <td>$<?php echo $totalPrice; ?></td>
                    <td>$36.00</td> <!-- Replace with your actual GST calculation -->
                    <td>$99.00</td>
                    <!-- Replace with your actual delivery charges -->
                    <td>$<?php echo $totalPrice + 36 + 99; ?></td>
                     
                </tr>
            </table>
            <form action="checkout.php" method="POST">
            <div class="billing-address-container">
                <h2>Shipping Address</h2>
                <div class="inputBox">
                    <span>Full Name :</span>
                    <input type="text" placeholder="name">
                </div>
                <div class="inputBox">
                    <span>Email :</span>
                    <input type="email" placeholder="Email">
                </div>
                <div class="inputBox">
                    <span>Address :</span>
                    <input type="text" placeholder="Door.no-Street-LandMark">
                </div>
                <div class="inputBox">
                    <span>State :</span>
                    <select id="state" name="state">
                            <option value="SC">Select </option>
                            <option value="AP">Andhra Pradesh</option>
                            <option value="AR">Arunachal Pradesh</option>
                            <option value="AS">Assam</option>
                            <option value="BR">Bihar</option>
                            <option value="CG">Chattisgarh</option>
                            <option value="DL">Delhi</option>
                            <option value="GA">Goa</option>
                            <option value="GJ">Gujarat</option>
                            <option value="HR">Haryana</option>
                            <option value="HP">Himachal Pradesh</option>
                            <option value="JK">Jammu and Kashmir</option>
                            <option value="JH">Jharkhand</option>
                            <option value="KA">Karnataka</option>
                            <option value="KL">Kerala</option>
                            <option value="MP">Madhya Pradesh</option>
                            <option value="MH">Maharashtra</option>
                            <option value="MN">Manipur</option>
                            <option value="ML">Meghalaya</option>
                            <option value="NL">Nagaland</option>
                            <option value="OR">Odisha</option>
                            <option value="PB">Punjab</option>
                            <option value="RJ">Rajasthan</option>
                            <option value="TN">Tamil Nadu</option>
                            <option value="TG">Telangana</option>
                            <option value="TR">Tripura</option>
                            <option value="UP">Uttar Pradesh</option>
                            <option value="UT">Uttarakhand</option>
                            <option value="WB">West Bengal</option>
                        </select>
                </div>
                <div class="flex">
                    <div class="inputBox">
                        <span>City :</span>
                        <select id="city" name="city">
                            <!-- This will initially be empty, and JavaScript will populate it. -->
                            <option value="SC">Select</option>
                        </select>
                    </div><br>
                    <div class="inputBox">
                        <span>Pin Code :</span>
                        <input type="text" placeholder="123 456">
                    </div>
                </div>
            </div>

             <!-- Payment Options -->
        <div class="payment-options-container">
            <h2>Payment Options</h2>
            <div class="inputBox">
                <label for="creditCard">Credit Card/Debit Card</label>
                <input type="radio" id="creditCard" name="paymentMethod" value="creditCard" required>
            </div>
            <div class="inputBox">
                <label for="cashOnDelivery">Cash on Delivery</label>
                <input type="radio" id="cashOnDelivery" name="paymentMethod" value="cashOnDelivery" required>
            </div>

            <!-- Credit Card Details -->
            <div id="cardDetails" style="display: none;">
                <div class="inputBox">
                    <label for="cardNumber">Card Number:</label>
                    <input type="text" id="cardNumber" name="cardNumber" placeholder="1111-2222-3333-4444" required>
                </div>
                <div class="inputBox">
                    <label for="bankName">Bank Name:</label>
                    <input type="text" id="bankName" name="bankName" placeholder="Bank Name" required>
                </div>
                <div class="inputBox">
                    <label for="cardHolderName">Card Holder's Name:</label>
                    <input type="text" id="cardHolderName" name="cardHolderName" placeholder="Card Holder's Name" required>
                </div>
                <div class="inputBox">
                    <label for="expiryDate">Expiry Date:</label>
                    <input type="text" id="expiryDate" name="expiryDate" placeholder="MM/YY" required>
                </div>
            </div>
        </div>

        <!-- Place order button or form submission -->
        <button type="submit" name="placeOrder">Place Order</button>
            </form>
    </div>

    <script>
        
        // JavaScript to populate the city dropdown based on the selected state
        const stateCityMap = {
            "AP": ["Select","Tirupathi", "Visakhapatnam", "Vijayawada", "Guntur"],
            "AR": ["Itanagar", "Naharlagun", "Pasighat"],
            "AS": ["Guwahati", "Dibrugarh", "Silchar", "Jorhat"],
            "BR": ["Patna", "Gaya", "Bhagalpur", "Muzaffarpur"],
            "CG": ["Raipur", "Bhilai", "Bilaspur", "Korba"],
            "GA": ["Panaji", "Margaon", "Vasco Da Gama"],
            "GJ": ["Ahmedabad", "Surat", "Vadodara", "Rajkot"],
            "HR": ["Chandigarh", "Faridabad", "Gurgaon", "Rohtak"],
            "HP": ["Shimla", "Mandi", "Dharamshala", "Solan"],
            "JH": ["Ranchi", "Dhanbad", "Jamshedpur", "Bokaro Steel City"],
            "KA": ["Bangalore", "Mysore", "Hubli", "Mangalore"],
            "KL": ["Thiruvananthapuram", "Kochi", "Kozhikode", "Thrissur"],
            "MP": ["Bhopal", "Indore", "Jabalpur", "Gwalior"],
            "MH": ["Mumbai", "Pune", "Nagpur", "Nashik"],
            "MN": ["Imphal", "Bishnupur", "Thoubal", "Churachandpur"],
            "ML": ["Shillong", "Tura", "Jowai", "Nongpoh"],
            "MZ": ["Aizawl", "Lunglei", "Saiha", "Champhai"],
            "NL": ["Kohima", "Dimapur", "Mokokchung", "Tuensang"],
            "OR": ["Bhubaneswar", "Cuttack", "Rourkela", "Sambalpur"],
            "PB": ["Chandigarh", "Ludhiana", "Amritsar", "Jalandhar"],
            "RJ": ["Jaipur", "Jodhpur", "Udaipur", "Kota"],
            "SK": ["Gangtok", "Namchi", "Mangan", "Singtam"],
            "TN": ["Chennai", "Coimbatore", "Madurai", "Salem"],
            "TG": ["Hyderabad", "Warangal", "Nizamabad", "Karimnagar"],
            "TR": ["Agartala", "Udaipur", "Dharmanagar", "Kailasahar"],
            "UP": ["Lucknow", "Kanpur", "Agra", "Varanasi"],
            "UT": ["Dehradun", "Haridwar", "Rishikesh", "Haldwani"],
            "WB": ["Kolkata", "Asansol", "Siliguri", "Durgapur"],
            "AN": ["Port Blair", "Diglipur", "Mayabunder", "Rangat"],
            "CH": ["Chandigarh", "Panchkula", "Mohali", "Zirakpur"],
            "DN": ["Daman", "Diu", "Dadra", "Silvassa"],
            "DL": ["New Delhi", "Delhi", "Noida", "Gurgaon"],
            "JK": ["Srinagar", "Jammu", "Anantnag", "Udhampur"],
        };

        const stateSelect = document.getElementById("state");
        const citySelect = document.getElementById("city");

        // Add an event listener to the state dropdown
        stateSelect.addEventListener("change", function() {
            const selectedState = stateSelect.value;
            const cities = stateCityMap[selectedState] || [];
            
            // Clear the current city options
            citySelect.innerHTML = "";

            // Add the new city options based on the selected state
            cities.forEach(city => {
                const option = document.createElement("option");
                option.value = city;
                option.text = city;
                citySelect.appendChild(option);
            });
        });
        
        document.addEventListener("DOMContentLoaded", function () {
    const cardDetails = document.getElementById("cardDetails");
    const cashOnDelivery = document.getElementById("cashOnDelivery");

    document.querySelector('input[name="paymentMethod"]').addEventListener("change", function () {
        if (this.value === "creditCard") {
            cardDetails.style.display = "block";
        } else {
            cardDetails.style.display = "none";
        }
    });

    // Additional logic to hide credit card details if "Cash on Delivery" is selected
    cashOnDelivery.addEventListener("change", function () {
        cardDetails.style.display = "none";
    });
});
    </script>
</body>

</html>
