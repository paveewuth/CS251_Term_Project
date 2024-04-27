<?php

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if customer ID is provided
    if (isset($_POST['customerID'])) {
        $customerID = $_POST['customerID'];

        // Include the database connection script
        require_once('db_connection.php');

        // Retrieve data from the database based on the provided customer ID
        $sql = "SELECT * FROM Borrowing WHERE customerID = '$customerID';";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Start generating the table
            echo "<div class='information-container'>";
            echo "<div style='text-align: center;'>";
            echo "<h2>Information</h2>";
            echo "<img src='..\customer_profile\icon.jpg' style='width:160px;height:220px;'>"; // Placeholder image
            echo "</div>";
            echo "<table class='info-table'>";
            echo "<tr><th>Customer ID</th><th>Book ID</th><th>Borrowing ID</th><th>Start Date</th><th>Return Date</th></tr>";
            // Fetch and display each row of data
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['customerID'] . "</td>";
                echo "<td>" . $row['bookID'] . "</td>";
                echo "<td>" . $row['borrowingID'] . "</td>";
                echo "<td>" . $row['startDate'] . "</td>";
                echo "<td>" . $row['returnDate'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "</div>"; // Close the information-container div
        } else {
            echo "No data found for the provided customer ID.";
        }

        // Close the database connection
        $conn->close();
    } else {
        echo "Please enter a customer ID.";
    }
}
?>
