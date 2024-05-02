<?php
session_start();
// Include the database connection file
require_once('db_connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $book_id = $_POST['bookID'];
    $customerID = $_POST['customerID'];
    $start_date = $_POST['start_date']; 
    $return_date = $_POST['return_date'];

    // Prepare the SQL statement to insert into the borrowing table
    $sql_borrowing = "INSERT INTO borrowing (customerID, bookID, startDate, returnDate) VALUES ('$customerID', '$book_id', '$start_date', '$return_date')";

    // Execute the SQL statement
    if ($conn->query($sql_borrowing) === TRUE) {
        // Update the borrowCount in cartoonbook table
        $sql_update_borrowCount = "UPDATE cartoonbook SET borrowCount = borrowCount + 1 WHERE bookID = '$book_id'";
        $conn->query($sql_update_borrowCount);

        // Success message
        echo "Book lending information added successfully.";
        // Redirect back to the referrer page
        $_SESSION['bookID'] = $book_id;
        $_SESSION['customerID'] = $customerID;
            header("Location: ../html/addlendingsuccess.php");
            exit();
    } else {
        // Error message
        echo "Error: " . $sql_borrowing . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
