<?php
session_start();
require_once('../php/db_connection.php');

if (isset($_SESSION['userID'])) {
    $userID = $_SESSION['userID'];
    $sql = "SELECT * FROM employee WHERE UserID = '$userID';";
    $result = $conn->query($sql);
}
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
    <link rel="stylesheet"href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
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
        color: var(--color-orange); /* สีของ text */
        font-size: 16px; /* ขนาดของตัวอักษร */
    }
</style>
<body >
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
                      <button class="title transparent-button">Home</button>
                    </a>
                  </li>
                  <li>
                    <a href="book.php">
                      <span class="icon">
                        <i class="bx bx-book"></i>
                      </span>
                      <button class="title transparent-button">Books</button>
                    </a>
                  </li>
                  <li>
                    <a href="lending.php">
                      <span class="icon">
                        <i class="bx bx-book-reader"></i>
                      </span>
                      <button class="title transparent-button">Lendings</button>
                    </a>
                  </li>
                  <li>
                    <a href="addbook.html">
                        <span class="icon">
                          <i class='bx bx-book-add'></i>
                        </span>
                        <button class="title transparent-button">Addbook</button>
                    </a>
                </li>
                  <li>
                    <a href="customer.html">
                      <span class="icon">
                        <i class="bx bx-body"></i>
                      </span>
                      <button class="title transparent-button">Customers</button>
                    </a>
                  </li>
                  <li>
                    <a href="static.html">
                      <span class="icon">
                        <i class="bx bx-stats"></i>
                      </span>
                      <button class="title transparent-button">Statics</button>
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
                            <i class="bx bx-profile"></i>
                            <p>Profile</p>
                            <span>></span>
                        </a>
                        <a href="#addbook" class="sub-menu-link" onclick="showPage('Addbook')">
                            <i class="bx bx-book"></i>
                            <p>Addbook</p>
                            <span>></span>
                        </a>
                        <a href="signin.html" class="sub-menu-link" >
                            <i class="bx bx-log-out"></i>
                            <p>Logout</p>
                            <span>></span>
                        </a>
                    </div>
                </div>
                
            </div>
            <!-- ======================== Profile of Account ======================  -->
        <?php
            if ($result->num_rows > 0) {
              // Output data of each row
              $row = $result->fetch_assoc();
            ?>
            
            <div class="content">
  <div class="profile" id="profile">
    <header>
      <h1>Edit Staff Profile</h1>
    </header>
    <div class="profilePicture">
      <img src="..\Photo\Profile.png" alt="Profile Picture" id="profile-image" /><br>
    </div>
    <main>
      <form action="../php/update_employee.php" method="post">
        <input type="hidden" name="userID" value="<?php echo $row['userID']; ?>">
        <div class="information-group">
            <label for="firstName" class="bold-text">First Name:</label>
            <input class="dataProfile" type="text" id="firstName" name="firstName" value="<?php echo $row['firstName']; ?>" />
        </div>
        <div class="information-group">
            <label for="lastName" class="bold-text">Last Name:</label>
            <input class="dataProfile" type="text" id="lastName" name="lastName" value="<?php echo $row['lastName']; ?>" />
        </div>
        <div class="information-group">
            <label for="sex" class="bold-text">Sex:</label>
            <select class="dataProfile" id="sex" name="sex">
                <option value="M" <?php if ($row['sex'] == 'M') echo 'selected'; ?>>Male</option>
                <option value="F" <?php if ($row['sex'] == 'F') echo 'selected'; ?>>Female</option>
            </select>
        </div>

        <div class="information-group">
            <label for="birthday" class="bold-text">Birthday:</label>
            <input class="dataProfile" type="date" id="birthday" name="birthday" value="<?php echo $row['birthday']; ?>" />
        </div>
        <div class="information-group">
            <label for="phoneNumber" class="bold-text">Phone Number:</label>
            <input class="dataProfile" type="text" id="phoneNumber" name="phoneNumber" value="<?php echo $row['phoneNumber']; ?>" />
        </div>
        <div class="information-group">
            <label for="email" class="bold-text">Email:</label>
            <input class="dataProfile" type="email" id="email" name="email" value="<?php echo $row['email']; ?>" />
        </div>
        <div class="information-group">
            <label for="houseNumber" class="bold-text">House Number:</label>
            <input class="dataProfile" type="text" id="houseNumber" name="houseNumber" value="<?php echo $row['houseNumber']; ?>" />
        </div>
        <div class="information-group">
            <label for="street" class="bold-text">Street:</label>
            <input class="dataProfile" type="text" id="street" name="street" value="<?php echo $row['street']; ?>" />
        </div>
        <div class="information-group">
            <label for="subdistrict" class="bold-text">Subdistrict:</label>
            <input class="dataProfile" type="text" id="subdistrict" name="subdistrict" value="<?php echo $row['subdistrict']; ?>" />
        </div>
        <div class="information-group">
            <label for="district" class="bold-text">District:</label>
            <input class="dataProfile" type="text" id="district" name="district" value="<?php echo $row['district']; ?>" />
        </div>
        <div class="information-group">
            <label for="province" class="bold-text">Province:</label>
            <input class="dataProfile" type="text" id="province" name="province" value="<?php echo $row['province']; ?>" />
        </div>
        <div class="information-group">
            <label for="zipcode" class="bold-text">Zipcode:</label>
            <input class="dataProfile" type="text" id="zipcode" name="zipcode" value="<?php echo $row['zipcode']; ?>" />
        </div>
        <div class="profile-actions">
            <input type="submit" class="editProfile-botton" value="Save">
        </div>
      </form>
    </main>
  </div>
</div>
            
            <?php
            } else {
              echo "0 results";
            }
            $conn->close();
            ?>
            
            


    <!-- =========== Scripts =========  -->
    <script src="statistics.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="..\static\js\main.js"></script>
    <script>
        $(function(){
            $('.bars li .bar').each(function(key,bar){
                var percentage = $(this).data('percentage');
                $(this).animate({
                    'height' : percentage + ''
                },1000);
            });
        });
    </script>
</body>

</html>
