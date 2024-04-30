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
                            <i class="bx bxs-home"></i>
                        </span>
                        <span class="title">Home</span>
                    </a>
                </li>

                <li>
                    <a href="book.php">
                        <span class="icon">
                            <i class="bx bxs-book"></i>
                        </span>
                        <span class="title">book</span>
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
                            <!-- ======================== Book ======================  -->
                            <div class="content-book">
    <div class="list" id="bookList">
        <h1>Book List</h1>
        <div class="container">
            <?php
            require_once('../php/db_connection.php');
            
            // ทำการส่งคำสั่ง SQL แยกกัน
            $sql_books_authors = "SELECT cartoonbook.*, author.Author
                                  FROM cartoonbook
                                  CROSS JOIN author
                                  WHERE cartoonbook.bookID = author.bookID";

            $sql_books_categories = "SELECT cartoonbook.*, category.Category
                                     FROM cartoonbook
                                     CROSS JOIN category
                                     WHERE cartoonbook.bookID = category.bookID";
            
            // คิวรีและดึงข้อมูลหนังสือร่วมกับผู้เขียน
            $result_books_authors = $conn->query($sql_books_authors);

            if ($result_books_authors->num_rows > 0) {
                while($row = $result_books_authors->fetch_assoc()) {
            ?>
                    <div class="book">
                        <img src="<?php echo $row["bookcover"]; ?>" >
                        <div class="book-info">
                            <h2><?php echo $row["bookName"]; ?></h2>
                            <p>Writer: <?php echo $row["Author"]; ?></p>
                            <p>Rental: <?php echo $row["price"]; ?> Bath</p>
                            <a href="book.php" class="more-info-btn">Status</a><br>
                            <a href="lending.html" class="more-info-btn">lending</a>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "0 results";
            }

            // คิวรีและดึงข้อมูลหนังสือร่วมกับประเภท
            $result_books_categories = $conn->query($sql_books_categories);

            if ($result_books_categories->num_rows > 0) {
                while($row = $result_books_categories->fetch_assoc()) {
            ?>
                    <div class="book">
                        <img src="<?php echo $row["bookcover"]; ?>" >
                        <div class="book-info">
                            <h2><?php echo $row["bookName"]; ?></h2>
                            <p>Type: <?php echo $row["Category"]; ?></p>
                            <p>Rental: <?php echo $row["price"]; ?> Bath</p>
                            <a href="book.php" class="more-info-btn">Status</a><br>
                            <a href="lending.html" class="more-info-btn">lending</a>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "0 results";
            }
            ?>
        </div>
        <div class="pagination">
            <a href="#" class="prev-page">หน้าก่อนหน้า</a>
            <span class="current-page">หน้า 1</span>
            <a href="#" class="next-page">หน้าถัดไป</a>
        </div>
    </div>
</div>



            <!-- ======================== Addbook ======================  -->
            <div id="Addbook">
            </div>
            <!-- ======================================= End =============================================  -->
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
    </script>
</body>

</html>