<?php
include("db.php");
session_start();
if(empty($_SESSION['employee_username1'])){
  echo "<script>window.location.replace('login.php');</script>";
}
$employee_username = $_SESSION['employee_username1'];
$msdf = "SELECT * FROM users where email1 = '$employee_username'";
$result2324 = $conn->query($msdf);

if ($result2324->num_rows > 0) {
  // output data of each row
  while($row54234 = $result2324->fetch_assoc()) {
    $first_name = $row54234['firstname'];
    $statusas = $row54234['status'];
    $pasdf = $row54234['pass1'];
    $last_name = $row54234['lastname'];
    $pjoone = $row54234['phone'];
  }
}
if($statusas == 'inactive'){
  echo "<script>window.location.replace('logout.php');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Agents Panel</title>

    <link rel="stylesheet" href="./assets/css/bootstrap.css" />
    <link rel="stylesheet" href="./assets/css/style.css" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Icons -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined"
      rel="stylesheet"
    />
    
  </head>
  <body>
    <header>
      <a href="./index.php" class="brand-icon">
        <img src="../assets/images/logo.svg" alt="" />
      </a>
      <div class="d-flex justify-content-between align-items-center">
        <div class="toggle-menu">
          <button class="btn fs-28 p-0" id="show-sidebar-btn">
            <span class="material-icons">menu</span>
          </button>
          <a href="./index.php" class="toggle-brand-icon">
            <img
              src="./assets/images/logo.svg"
              width="220px"
              class="img-fluid"
              alt=""
            />
          </a>
        </div>
        <nav class="main-nav">
          <ul class="ps-0 mb-0 list-unstyled">
            <!-- <li>
              <a href="agents.php">
                <span class="material-icons navbar-icon">people_alt</span>
                <span class="navbar-label">Agents</span>
              </a>
            </li> -->
            <li class="">
              <a href="index.php">
                <span class="material-icons navbar-icon">dashboard</span>
                <span class="navbar-label">Dashboard</span>
              </a>
            </li>
            <li class="">
              <a href="projects_active.php">
            <span class="material-icons navbar-icon">apartment</span>
                <span class="navbar-label">Projects</span></a
              >
            </li>
            <li>
            <div class="btn-group">
            <?php
            $counter1 = 0;
                  $sql = "SELECT count(*) as counter1 FROM notification where by_user = '$employee_username' and is_read = 'false'";
                  $result = $conn->query($sql);
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                      $counter1 = $row['counter1'];
                      // echo "<script>alert('".$counter1."')</script>";
                    }
                      ?>
              <button class="btn fs-25 p-0 text-secondary" type="button" id="manualClose" data-bs-toggle="dropdown"
                data-bs-auto-close="false" aria-expanded="false">
                <span class="material-icons">notifications</span><span class="badge bg-danger px-1" style="font-size:x-small;border-radius:10px;"><?php echo $counter1; ?></span>
              </button>
              <div class="dropdown-menu notifications-container" aria-labelledby="manualClose">
                <div class="d-flex align-items-center justify-content-between">
                  <p class="mb-0 mt-2 fs-15">Notifications</p>
                  <button class="btn mt-2 text-info fs-15" onclick="makeread('<?php echo $employee_username ?>')">
                    Mark all as read
                  </button>
                </div>
                <hr />
                <ul class="list-unstyled">
                  <?php
                  $sql = "SELECT * FROM notification where by_user = '$employee_username' and is_read = 'false' order by timeanddate desc limit 15";
                  $result = $conn->query($sql);
                  
                  if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                      ?>
                                        <li>
                    <a class="dropdown-item" href="#">
                      <div class="notification">
                        <img src="./assets/images/icons/building.png" width="44" height="44" alt="" />
                        <div class="flex-fill mx-3">
                          <p class="title"><?php echo $row['project_name']; ?></p>
                          <p class="summary">
                            <?php echo $row['notification_text']; ?>
                          </p>
                          <p class="time"><?php echo $row['timeanddate']; ?></p>
                        </div>
                        <!-- <img src="./assets/images/icons/building.png" width="49" height="47" alt="" /> -->
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                      <?php
                    }
                  }
                  ?>


                </ul>
              </div>
            </div>
          </li>
            <li>
              <div class="dropdown">
                <button
                  class="btn fs-25 p-0 text-secondary"
                  type="button"
                  id="dropdownMenuButton1"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  <span class="material-icons">account_box</span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="my-profile.php">My Profile</a></li>
                   <li><hr class="dropdown-divider" /></li>
                  <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
              </div>
            </li>
          </ul>
        </nav>
      </div>
      <div id="div12544" style="display: none;"></div>
    </header>
