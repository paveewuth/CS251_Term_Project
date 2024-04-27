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
                    <a href="book.html">
                        <span class="icon">
                            <i class="bx bx-book"></i>
                        </span>
                        <span class="title">Books</span>
                    </a>
                </li>

                <li>
                    <a href="#lending">
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
                    <a href="#" onclick="event.preventDefault();">
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
                    <label>
                        <input type="text" placeholder="Search here">
                        <i class="bx bx-search"></i>
                    </label>
                </div>
                <!-- ========================= Profile Dropdown  ==================== -->
                <div class="user">
                    <img src="..\Photo\Profile.jpg" alt="" class="profile-dropdown" onclick="toggleMenu()">
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
                        <h2>Information</h2>
                    </div>

                    <?php
                    if(isset($_POST['customerID'])) {
                        require_once('../php/db_connection.php');
                        $customerID = $_POST['customerID'];
                        $sql = "SELECT * FROM customer WHERE customerID = '$customerID'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                    ?>
                            <table>
                                <tr>
                                    <th>Attribute</th>
                                    <th>Value</th>
                                </tr>
                                <tr>
                                    <td>First Name</td>
                                    <td><?php echo htmlspecialchars($row["firstName"]); ?></td>
                                </tr>
                                <tr>
                                    <td>Last Name</td>
                                    <td><?php echo htmlspecialchars($row["lastName"]); ?></td>
                                </tr>
                                <tr>
                                    <td>Citizen ID</td>
                                    <td><?php echo htmlspecialchars($row["citizenID"]); ?></td>
                                </tr>
                                <tr>
                                    <td>Customer ID</td>
                                    <td><?php echo htmlspecialchars($row["customerID"]); ?></td>
                                </tr>
                                <tr>
                                    <td>Phone Number</td>
                                    <td><?php echo htmlspecialchars($row["phoneNumber"]); ?></td>
                                </tr>
                                <tr>
                                    <td>Customer Type</td>
                                    <td><?php echo htmlspecialchars($row["customerType"]); ?></td>
                                </tr>
                                <tr>
                                    <td>Member Start</td>
                                    <td><?php echo htmlspecialchars($row["memberStart"]); ?></td>
                                </tr>
                                <tr>
                                    <td>Member End</td>
                                    <td><?php echo htmlspecialchars($row["memberEnd"]); ?></td>
                                </tr>
                            </table>
                    <?php
                        } else {
                            echo "<p>No customer found</p>";
                        }
                        $conn->close();
                    }
                    ?>
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
