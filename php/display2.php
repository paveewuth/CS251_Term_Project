<?php
session_start();

require_once('db_connection.php');

if (isset($_SESSION['userID'])) {

    $userID = $_SESSION['userID'];
    $sql = "SELECT * FROM employee WHERE UserID = '$userID';";
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
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-color: #E6E1DD; /* Primary background color */
        }

        .employee-card {
            background-color: #fff;
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
            color: #304F6D;
            font-weight: bold;
        }

        .employee-card .value {
            margin-bottom: 10px;
        }

        .employee-card .icon {
            margin-right: 10px;
        }
        h4 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 24px;
    color: #E07D54; /* Title color */
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
                            <p class="label"><i class="fas fa-venus-mars icon"></i>sex:</p>
                            <p class="value"><?php echo $row["sex"]; ?></p>
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
                            <a href="..\html\signin.html" class="btn btn-primary btn-block">Back to Login</a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
 

</body>

</html>