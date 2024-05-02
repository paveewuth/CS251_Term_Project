
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
    <link rel="stylesheet" href="..\static\css\addbook.css">
    <link rel="stylesheet" href="..\static\css\style.css">
 
    <!-- ======= boxicons ====== -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
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
                    <a href="lending.php">
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

            <!-- ========================= Add book  ==================== -->
          

            <div class="content">
    <div class="check" style="display: flex; justify-content: center; align-items: center;">
        <img src="..\Photo\checked.png" alt="checked" id="checked" style="width: 50px; height: 50px;">
    </div><br>
    <h1>Add Book Successfully</h1><br>
    <div style="display: flex; justify-content: center; align-items: center; width: 100%; height: 100%;">
    <img src="<?php echo $_SESSION['bookCover']; ?>" style="width: 200px; height: 280px;">
    </div><br>
    <table>
    <tr>
        <th>Book Name</th>
        <td><?php echo $_SESSION['bookName']; ?></td>
    </tr>
    <tr>
        <th>Book ID</th>
        <td><?php echo $_SESSION['bookID']; ?></td>
    </tr>
    <tr>
        <th>Book Price</th>
        <td><?php echo $_SESSION['bookPrice']; ?></td>
    </tr>
    <tr>
        <th>Author</th>
        <td><?php echo $_SESSION['author']; ?></td>
    </tr>
    <tr>
        <th>Category</th>
        <td><?php echo  $_SESSION['category']; ?></td>
    </tr>
</table>

</div>
                <div class="button-container">
                    <a href="addbook.html" class="btn btn-primary" style="text-decoration: none; color: white;">Back</a>
                </div>

            <!-- ======================== Addbook ======================  -->
            <div id="Addbook">
            </div>
            <!-- ======================================= End =============================================  -->
        </div>
    </div>


    <!-- =========== Scripts =========  -->
    <script>
        function validateForm() {
            var bookId = document.getElementById("bookid").value;
            var bookPrice = document.getElementById("bookprice").value;
            var number = document.getElementById("number").value;
            var description = document.getElementById("description").value;
            var date = document.getElementById("date").value;
            var author = document.getElementById("author").value;
    
            if (bookId == "" || bookPrice == "" || number == "" || description == "" || date == "" || author == "") {
                alert("Please fill in all fields");
                return false;
            }
    
            return true;
        }
    </script>
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