<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'root', 'root', 'products');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get search term from the user
$searchTerm = $_GET['searchTerm'];

// Prepare SQL query to search products
$sql = "SELECT * FROM men WHERE pname LIKE '%$searchTerm%' OR pdescript LIKE '%$searchTerm%' union SELECT * FROM men WHERE pname LIKE '%$searchTerm%' OR pdescript LIKE '%$searchTerm%'";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if any products were found
if (mysqli_num_rows($result) > 0) {
    // Display search results
    echo "<div class='search-results'>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='product-item'>";
        echo "<img src='" . $row['pimg'] . "' alt='" . $row['pname'] . "'>";
        echo "<a href='product-details.php?id=" . $row['pid'] . "'>" . $row['pname'] . "</a>";
        echo "<p>" . $row['pdescript'] . "</p>";
        echo "<span class='Price'>$" . $row['pPe'] . "</span>";
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "No products found matching your search.";
}

// Close database connection
mysqli_close($conn);
?>
