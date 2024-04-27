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
                        <a href="#profile" class="sub-menu-link" onclick="showPage('profile')">
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
            <div class="content">
                <!-- ======================== Customers ======================  -->
                <div id="Customers">
                    <div class="customer-search">
                        <form action="../php/fetch_data.php" method="POST">
                            <label>
                                <input type="text" name="customerID" id="customerID" placeholder="Enter customer ID">
                            </label>
                            <div class="button-container">
                                <button type="submit" class="btn btn-primary">Enter</button>
                            </div>
                        </form>
                    </div>

                    <!-- The table to display the fetched data will be here -->
                    <?php include '../php/fetch_data.php'; ?>
                </div>

                <div class="information-container">
                    <div style="text-align: center;">
                        <h2>Information</h2>
                        <img src="..\customer_profile\icon.jpg" style="width:160px;height:220px;">
                        <!-- แปะรูปพนักงาน -->
                    </div>

                    <div class="info-group">
                        <label for="firstName"> <b>First name:</b> <input type="text" placeholder="#Customer name"></label>
                        <label for="lastName"> <b>Last name:</b> <input type="text" placeholder="#Customer lastname"></label>
                    </div>

                    <div class="info-group">
                        <label for="citizen_id"> <b>Citizen ID:</b> <input type="text" placeholder="#citizenId"></label>
                        <label for="customer_id"> <b>Customer ID:</b> <input type="text" placeholder="#customerId"></label>
                    </div>

                    <div class="info-group">
                        <label for="phone"> <b>Phone number:</b> <input type="text" placeholder="#PhoneNumber"></label>
                        <label for="balance"> <b>Balance:</b> <input type="text" placeholder="#Balance"></label>
                    </div>

                    <div class="info-group">
                        <label for="customer_type"> <b>Customer type:</b> <input type="text" placeholder="#member/not member"></label>
                    </div>

                    <div class="info-group">
                        <label for="memStart"> <b>Member start:</b> <input type="text" placeholder="#Date"></label>
                        <label for="memExp"> <b>Member end:</b> <input type="text" placeholder="#Date"></label>
                    </div>
                </div>
            </div>
            </main>
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