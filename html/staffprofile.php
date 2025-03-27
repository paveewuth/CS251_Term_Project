<?php
session_start();
require_once('../php/db_connection.php');
if (isset($_SESSION['userID'])) {

    $userID = $_SESSION['userID'];
    $sql = "SELECT * FROM employee WHERE userID = '$userID';";
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
            <h1>Staff Profile</h1>
          </header>
          <div class="profilePicture">
            <img src="..\Photo\Profile.png" alt="Profile Picture" id="profile-image" /><br>
          </div>
          <main>
            <div class="information-group">
              <label for="userID" class="bold-text">Staff ID:</label>
              <span class="dataProfile"><?php echo $row['userID']; ?></span>
            </div>
            <div class="information-group">
              <label for="firstName" class="bold-text">First Name:</label>
              <span class="dataProfile"><?php echo $row['firstName']; ?></span>
              <label for="lastName" class="bold-text">Last Name:</label>
              <span class="dataProfile"><?php echo $row['lastName']; ?></span>
            </div>
            <div class="information-group">
              <label for="gender" class="bold-text">Sex:</label>
              <span class="dataProfile"><?php echo $row['sex'] == 'M' ? 'Male' : 'Female'; ?></span>
              <label for="birthday" class="bold-text">Birthday:</label>
              <span class="dataProfile"><?php echo $row['birthday']; ?></span>
            </div>
            <div class="information-group">
              <label for="phoneNumber" class="bold-text">Phone Number:</label>
              <span class="dataProfile"><?php echo $row['phoneNumber']; ?></span>
              <label for="e-mail" class="bold-text">Email:</label>
              <span class="dataProfile"><?php echo $row['email']; ?></span>
            </div>
            <div class="information-group">
              <label for="houseNumber" class="bold-text">House Number:</label>
              <span class="dataProfile"><?php echo $row['houseNumber']; ?></span>
              <label for="street" class="bold-text">Street:</label>
              <span class="dataProfile"><?php echo $row['street']; ?></span>
            </div>
            <div class="information-group">
              <label for="subdistrict" class="bold-text">Subdistrict:</label>
              <span class="dataProfile"><?php echo $row['subdistrict']; ?></span>
              <label for="district" class="bold-text">District:</label>
              <span class="dataProfile"><?php echo $row['district']; ?></span>
            </div>
            <div class="information-group">
              <label for="province" class="bold-text">Province:</label>
              <span class="dataProfile"><?php echo $row['province']; ?></span>
              <label for="zipcode" class="bold-text">Zipcode:</label>
              <span class="dataProfile"><?php echo $row['zipcode']; ?></span>
            </div>
            <div class="profile-actions">
              <br /> <br />
              <a href="editstaffprofile.php" class="editProfile-botton">Edit</a> 
            </div>
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
