<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION['userID'])) {

    $userID = $_SESSION['userID'];
    $sql = "SELECT * FROM Employee WHERE UserID = '$userID';";
    $result = $conn->query($sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Information</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <style>
        body {
            background: linear-gradient(135deg, #202020, #424242);
            /* Dark gradient background */
            color: #fff;
            /* Text color */
            padding: 50px;
        }

        .employee-card {
            background-color: #2c2c2c;
            /* Card background color */
            border-radius: 15px;
            /* Rounded border */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            /* Shadow effect */
            padding: 20px;
            margin-bottom: 20px;
        }

        .employee-card h4 {
            margin-bottom: 20px;
        }

        .employee-card .label {
            font-weight: bold;
        }

        .employee-card .value {
            margin-bottom: 10px;
        }

        .employee-card .icon {
            margin-right: 10px;
        }
    </style>
</head>

<body>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="employee-card">
                    <h4>Employee Information</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="label"><i class="fas fa-user icon"></i>First Name:</p>
                            <p class="value"><?php echo $row["firstName"]; ?></p>
                            <p class="label"><i class="fas fa-user icon"></i>Last Name:</p>
                            <p class="value"><?php echo $row["lastName"]; ?></p>
                            <p class="label"><i class="fas fa-venus-mars icon"></i>Gender:</p>
                            <p class="value"><?php echo $row["gender"]; ?></p>
                            <p class="label"><i class="fas fa-calendar-alt icon"></i>Birthday:</p>
                            <p class="value"><?php echo $row["birthday"]; ?></p>
                            <p class="label"><i class="fas fa-envelope icon"></i>Email:</p>
                            <p class="value"><?php echo $row["email"]; ?></p>
                            <p class="label"><i class="fas fa-lock icon"></i>Password:</p>
                            <p class="value">********</p>
                        </div>
                        <div class="col-md-6">
                            <p class="label"><i class="fas fa-phone icon"></i>Phone Number:</p>
                            <p class="value"><?php echo $row["phoneNumber"]; ?></p>
                            <p class="label"><i class="fas fa-money-bill icon"></i>Salary:</p>
                            <p class="value">$<?php echo number_format($row["salary"], 2); ?></p>
                            <p class="label"><i class="fas fa-home icon"></i>House Number:</p>
                            <p class="value"><?php echo $row["houseNumber"]; ?></p>
                            <p class="label"><i class="fas fa-road icon"></i>Street:</p>
                            <p class="value"><?php echo $row["street"]; ?></p>
                            <p class="label"><i class="fas fa-map-marker-alt icon"></i>District:</p>
                            <p class="value"><?php echo $row["district"]; ?></p>
                            <p class="label"><i class="fas fa-map-marker-alt icon"></i>Subdistrict:</p>
                            <p class="value"><?php echo $row["subdistrict"]; ?></p>
                            <p class="label"><i class="fas fa-map-marker-alt icon"></i>Province:</p>
                            <p class="value"><?php echo $row["province"]; ?></p>
                            <p class="label"><i class="fas fa-map-marker-alt icon"></i>Zipcode:</p>
                            <p class="value"><?php echo $row["zipcode"]; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>