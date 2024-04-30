<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>"Abdul's Literary Lendings"</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="../static/css/style.css">
    <!-- ======= boxicons ====== -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <style>
        /* Additional CSS styles for table */
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
</head>

<body>
    <!-- =============== Sidebar ================ -->
    <div class="container">
        <div class="sidebar">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <img src="..\logo\CS251_Logo.png" alt="" class="logo-img">
                        </span>
                        <span class="title">"Abdul's Literary Lendings"</span>
                    </a>
                </li>

                <li>
                    <a href="index.html">
                        <span class="icon">
                            <i class="bx bx-home"></i>
                        </span>
                        <span class="title">Home</span>
                    </a>
                </li>

                <li>
                    <a href="book.php">
                        <span class="icon">
                            <i class="bx bx-book"></i>
                        </span>
                        <span class="title">Books</span>
                    </a>
                </li>

                <li>
                    <a href="lending.html">
                        <span class="icon">
                            <i class="bx bxs-book-reader"></i>
                        </span>
                        <span class="title">Lendings</span>
                    </a>
                </li>

                <li>
                    <a href="addbook.html">
                        <span class="icon">
                            <i class='bx bxs-book-add'></i>
                        </span>
                        <span class="title">Addbook</span>
                    </a>
                </li>

                <li>
                    <a href="customer.html" >
                        <span class="icon">
                            <i class="bx bx-body"></i>
                        </span>
                        <span class="title">Customers</span>
                    </a>
                </li>

                <li>
                    <a href="static.html">
                        <span class="icon">
                            <i class="bx bx-stats"></i>
                        </span>
                        <span class="title">Statics</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <i class="bx bx-menu" id="btn"></i>
                </div>

<div class="search">
    <form id="searchForm" action="searchbook.php" method="post">
        <label>
            <input id="searchInput" type="text" name="search" placeholder="Search here">
            <i class="bx bx-search"></i>
        </label>
    </form>
</div>
                <!-- ========================= Profile Dropdown  ==================== -->
                <div class="user">
                    <img src="..\Photo\Profile.png" alt="" class="profile-dropdown" onclick="toggleMenu()">
                </div>
                <div class="sub-menu-wrap" id="subMenu">
                    <div class="submenu">
                        <div class="user-info">
                            <img src="..\Photo\Profile.jpg" alt="">
                            <h3>Lio Ronaldo<br>Manager</h3>

                        </div>
                        <hr>
                        <a href="staffprofile.html" class="sub-menu-link" onclick="showPage('profile')">
                            <i class='bx bx-user'></i>
                            <p>Profile</p>
                            <span>></span>
                        </a>

                        <a href="" class="sub-menu-link">
                            <i class='bx bx-bell'></i>
                            <p> Notification</p>
                            <span>></span>
                        </a>

                        <a href="" class="sub-menu-link">
                            <i class='bx bx-message-edit'></i>
                            <p> Language</p>
                            <span>></span>
                        </a>

                        <a href="" class="sub-menu-link">
                            <i class="bx bx-log-out"></i>
                            <p> Logout</p>
                            <span>></span>
                        </a>
                    </div>
                </div>

            </div>
            <!-- ======================== Customers ======================  -->
            <div id="Customers">
                <form action="customer.php" method="POST">
                    <div class="customer-search">
                        <label>
                            <input type="text" name="customerID" id="customerID" placeholder="Enter customer ID" required>
                        </label>
                        <div class="button-container">
                            <button type="submit" class="btn btn-primary">Enter</button>
                        </div>
                    </div>
                </form>
                <div class="information-container">
                    <div style="text-align: center;">
                        <h2>Successfully added customers</h2>
                    </div>
                    <div class="check" style="display: flex; justify-content: center; align-items: center;">
    <img src="..\Photo\checked.png" alt="checked" id="checked" style="width: 50px; height: 50px;">
</div>

                    <?php
              

              if(isset($_POST['customerID']) || isset($_SESSION['customerID'])) {

           if(isset($_POST['customerID'])  ) { $customerID = $_POST['customerID'];}
           if( isset($_SESSION['customerID']) ) { $customerID = $_SESSION['customerID'];}
        require_once('../php/db_connection.php');
        // Check if the customer exists in the customer table
        $sql_customer = "SELECT * FROM customer WHERE customerID = '$customerID'";
        $result_customer = $conn->query($sql_customer);

        if ($result_customer->num_rows > 0) {
            $row = $result_customer->fetch_assoc();
?>
            <table>
                <tr>
                    <th>First Name</th>
                    <td><?php echo htmlspecialchars($row["firstName"]); ?></td>
                </tr>
                <tr>
                    <th>Last Name</th>
                    <td><?php echo htmlspecialchars($row["lastName"]); ?></td>
                </tr>
                <tr>
                    <th>Citizen ID</th>
                    <td><?php echo htmlspecialchars($row["citizenID"]); ?></td>
                </tr>
                <tr>
                    <th>Customer ID</th>
                    <td><?php echo htmlspecialchars($row["customerID"]); ?></td>
                </tr>
                <tr>
                    <th>Phone Number</th>
                    <td><?php echo htmlspecialchars($row["phoneNumber"]); ?></td>
                </tr>
        <?php
                    // Check if the customer exists in the member table
                    $sql_member = "SELECT * FROM member WHERE customerID = '$customerID'";
                    $result_member = $conn->query($sql_member);

                    if ($result_member->num_rows > 0) {
                        $row_member = $result_member->fetch_assoc();
        ?>
                        <tr>
                            <th>Customer Type</th>
                            <td>Member</td>
                        </tr>
                        <tr>
                            <th>Member Start</th>
                            <td><?php echo htmlspecialchars($row_member["memStart"]); ?></td>
                        </tr>
                        <tr>
                            <th>Member End</th>
                            <td><?php echo htmlspecialchars($row_member["memExp"]); ?></td>
                        </tr>
        <?php
                    } else {
        ?>
                        <tr>
                            <th>Customer Type</th>
                            <td>General</td>
                        </tr>
        <?php
                    }
        ?>
                    </table>
        <?php
                } else {
                    echo "<p>No customer found</p>";
                }
                $conn->close();
            }
        ?>

                </div>
                <br> <div class="button-container">
                    <a href="customer.html" class="btn btn-primary" style="text-decoration: none; color: white;">Back</a>
                </div>
            </div>
            <!-- ======================================= End =============================================  -->
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="statistics.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../static/js/main.js"></script>
    <script>
        $(function() {
            $('.bars li .bar').each(function(key, bar) {
                var percentage = $(this).data('percentage');
                $(this).animate({
                    'height': percentage + ''
                }, 1000);
            });
        });
    </script>
</body>

</html>
