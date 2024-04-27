<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>"Abdul's Literary Lendings"</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="..\static\css\style.css">
    <!-- ======= boxicons ====== -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>
<style>
    .transparent-button {
        background-color: transparent;
        border: none;
        position: relative;
        display: block;
        width: 100%;
        display: flex;
        text-decoration: none;
        color: var(--color-orange);
        /* สีของ text */
        font-size: 16px;
        /* ขนาดของตัวอักษร */
    }

      /* Style for table */
      table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    th {
        background-color: #f2f2f2;
    }
</style>
<div class="information-container">
    <div style="text-align: center;">
        <h2>Information</h2>
    </div>

    <?php
    if(isset($_POST['customerID'])) {
        require_once('db_connection.php');
        $customerID = $_POST['customerID'];
        $sql = "SELECT * FROM customer WHERE customerID = '$customerID'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
    ?>
    <div class="info-group">
        <label for="firstName"><b>First name:</b></label>
        <input type="text" value="<?php echo $row["firstName"]; ?>" readonly>
    </div>
    <div class="info-group">
        <label for="lastName"><b>Last name:</b></label>
        <input type="text" value="<?php echo $row["lastName"]; ?>" readonly>
    </div>
    <div class="info-group">
        <label for="citizen_id"><b>Citizen ID:</b></label>
        <input type="text" value="<?php echo $row["citizenID"]; ?>" readonly>
    </div>
    <div class="info-group">
        <label for="customer_id"><b>Customer ID:</b></label>
        <input type="text" value="<?php echo $row["customerID"]; ?>" readonly>
    </div>
    <div class="info-group">
        <label for="phone"><b>Phone number:</b></label>
        <input type="text" value="<?php echo $row["phoneNumber"]; ?>" readonly>
    </div>

    
    <div class="info-group">
        <label for="customer_type"><b>Customer type:</b></label>
        <input type="text" value="<?php echo $row["customerType"]; ?>" readonly>
    </div>
    <div class="info-group">
        <label for="memStart"><b>Member start:</b></label>
        <input type="text" value="<?php echo $row["memberStart"]; ?>" readonly>
    </div>
    <div class="info-group">
        <label for="memExp"><b>Member end:</b></label>
        <input type="text" value="<?php echo $row["memberEnd"]; ?>" readonly>
    </div>
    <?php
        
    } else {
            echo "<p>No customer found</p>";
        }
        $conn->close();
    }
    ?>
</div>
