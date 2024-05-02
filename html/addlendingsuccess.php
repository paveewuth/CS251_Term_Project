<?php
session_start();
$bookID = $_SESSION['bookID'];
$customerID = $_SESSION['customerID'];
?>
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
</style>

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
                    <a href="lending.php" >
                        <span class="icon">
                            <i class="bx bx-book-reader"></i>
                        </span>
                        <span class="title">Lendings</span>
                    </a>
                </li>

                <li>
                    <a href="addbook.html">
                        <span class="icon">
                            <i class='bx bx-book-add'></i>
                        </span>
                        <span class="title">Addbook</span>
                    </a>
                </li>

                <li>
                    <a href="customer.html">
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
                            <img src="..\Photo\Profile.png" alt="">
                            <h3>Lio Ronaldo<br>Manager</h3>

                        </div>
                        <hr>
                        <a href="staffprofile.php" class="sub-menu-link" onclick="showPage('profile')">
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

                        <a href="signin.html" class="sub-menu-link">
                            <i class="bx bx-log-out"></i>
                            <p> Logout</p>
                            <span>></span>
                        </a>
                    </div>
                </div>

            </div>

                <!-- ======================== Lendings ======================  -->
             <div class="content">
                    <div class="Lending" id="Lendings">
                        <h2>Payment </h2><br>
                        <div class="form-group">
                        <?php
require_once('../php/db_connection.php');

    // Prepare SQL query to fetch book details along with author and category
// คิวรีเพื่อดึงข้อมูลหนังสือพร้อมผู้เขียนและประเภท
$sql_books_info = "SELECT cb.*, a.Author, c.Category,
                   CASE
                       WHEN l.bookID IS NOT NULL THEN 'red'
                       ELSE 'green'
                   END AS status_color
                   FROM cartoonbook cb
                   LEFT JOIN author a ON cb.bookID = a.bookID
                   LEFT JOIN category c ON cb.bookID = c.bookID
                   LEFT JOIN borrowing l ON cb.bookID = l.bookID
                   WHERE cb.bookID = '$bookID'";


    // Execute the query
    $result = $conn->query($sql_books_info);

    // Check if any matching books found
    if ($result->num_rows > 0) {
        // Loop through the results
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="addbook">
            
                
                
                <div class="book-info">
                <h2><?php echo $row["bookName"]; ?></h2> 
                    <img src="<?php echo $row["bookcover"]; ?>" style="width: 150px; height: auto; margin-bottom: 40px">
                    <img src="../photo/qr.jpg" alt="Book Cover"style="width: 250px; height: auto; margin-bottom: 20px"><br>
                    <div style="text-align: center;">
                    <?php
        // Check if customerId exists in member table
        $sql_check_customer = "SELECT * FROM member WHERE customerID = '$customerID'";
        $result_check_customer = $conn->query($sql_check_customer);

        if ($result_check_customer->num_rows > 0) {
            // Customer is a member, reduce rental price by 10%
            $price = $row["price"] * 0.9; // 10% discount
            echo "<p style='text-align: center;'>Rental: $price Bath (10% discount for members)</p>";
        } else {
            // Customer is not a member, display regular rental price
            echo "<p style='text-align: center;'>Rental: " . $row["price"] . " Bath</p>";
        }
        ?>
                    </div>
                </div>
        
            </div>
            
             <?php
        }
    } else {
        // Display a message if no matching books found
        echo "No books found with the given search term.";
    }

?></div>


                        <div class="button-container">
                            <button type="submit" class="btn" onclick="openPopup('success')">completed</button>
                            <div id="successPopup" class="popup">
                                <img src="../logo/checkmark.png" alt="">
                                <h2>Payment Successful</h2>
                                <p>Money transfer has been completed!</p>
                                <button type="button" class="btn1" onclick="closePopup()">OK</button>
                            </div>
                            <div id="failurePopup" class="popup">
                                <h2>Payment Failed</h2>
                                <p>Something went wrong!</p>
                                <button type="button" class="btn1" onclick="closePopup()">OK</button>
                            </div>
                            <div id="overlay" class="overlay"></div>
                        </div>

                        <div class="container" id="bookDetails" >

                    </div>
                </main>
            </div>


            <!-- ======================== Addbook ======================  -->
            <div id="Addbook">
            </div>
            <!-- ======================================= End =============================================  -->
        </div>
    </div>



 


        </div>
    <!-- =========== Scripts =========  -->
    <script src="statistics.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="..\static\js\main.js"></script>
    <script>
        $(function () {
            $('.bars li .bar').each(function (key, bar) {
                var percentage = $(this).data('percentage');
                $(this).animate({
                    'height': percentage + ''
                }, 1000);
            });
        });

    function showBookDetails(book_id) {
        // แสดงส่วนของ HTML ที่ต้องการเมื่อคลิกปุ่ม "Show Book Details"
        document.getElementById('bookDetails').style.display = 'block';
    }
</script>

    </script>
</body>

</html>