<?php
// header("Set-Cookie: cross-site-cookie=whatever; SameSite=None; Secure");
include("./admin_header.php");
$id = $_GET['id'];
?>

<main>
  <?php
include("./properties_sidebar.php");
?>
  <?php
$sql = "SELECT * FROM projects where id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
    $row = $result->fetch_assoc();
    $Type = $row['Type1'];
    $Developer = $row['Developer'];
    $Title = $row['Title'];
    $Enquiry_Only_Email = $row['Enquiry_Only_Email'];
    $Websites = $row['Websites'];
    $Name_Sales_Request_Recipient = $row['Name_Sales_Request_Recipient'];
    $phone_Sales_Request_Recipient = $row['phone_Sales_Request_Recipient'];
    $email_Sales_Request_Recipient = $row['email_Sales_Request_Recipient'];
    $Architect = $row['Architect'];
    $Levels = $row['Levels'];
    $Builder = $row['Builder'];
    $Completion_Date = $row['Expected_Completion_Date'];
    $Introduction = $row['Introduction'];
    $Features = $row['Features'];
    $Reservation_no = $row['Reservation_no'];
    $Street_Number = $row['Street_Number'];
    $Street_Name = $row['Street_Name'];
    $Suburb = $row['Suburb'];
    $State = $row['State1'];
    $Postal_Code = $row['Postal_Code'];
    $Country = $row['Country'];
    $Latitude = $row['Latitude'];
    $Longitude = $row['Longitude'];
    $Retail_Sales_Commission = $row['Retail_Sales_Commission_percentage'];
    $Developer_Sales_Commission = $row['Developer_Sales_Commission_percentage'];
    $Partner_Sales_Commission = $row['Partner_Sales_Commission_percentage'];
    $Offshore_Commission = $row['Offshore_Commission_percentage'];
    $Other_Offshore_Commission = $row['other_Offshore_Commission_percentage'];
    $Other_Developer_Sales_Commission = $row['other_Developer_Sales_Commission_percentage'];
    $other_Partner_Sales_Commission = $row['other_Partner_Sales_Commission_percentage'];
    $Currency = $row['Currency'];
  //       echo "<script>console.log('".$Type."')</script>";
  // echo "<script>console.log('".$Developer."')</script>";
  // echo "<script>console.log('".$Title."')</script>";
  // echo "<script>console.log('".$Enquiry_Only_Email."')</script>";
  // echo "<script>console.log('".$Websites."')</script>";
  // echo "<script>console.log('".$Name_Sales_Request_Recipient."')</script>";
  // echo "<script>console.log('".$phone_Sales_Request_Recipient."')</script>";
  // echo "<script>console.log('".$email_Sales_Request_Recipient."')</script>";
  // echo "<script>console.log('".$Architect."')</script>";
  // echo "<script>console.log('".$Levels."')</script>";
  // echo "<script>console.log('".$Builder."')</script>";
  // echo "<script>console.log('".$Completion_Date."')</script>";
  // echo "<script>console.log('".$Introduction."')</script>";
  // echo "<script>console.log('".$Features."')</script>";
  // echo "<script>console.log('".$Reservation_no."')</script>";
  // echo "<script>console.log('".$Street_Number."')</script>";
  // echo "<script>console.log('".$Street_Name."')</script>";
  // echo "<script>console.log('".$Suburb."')</script>";
  // echo "<script>console.log('".$State."')</script>";
  // echo "<script>console.log('".$Postal_Code."')</script>";
  // echo "<script>console.log('".$Country."')</script>";
  // echo "<script>console.log('".$Latitude."')</script>";
  // echo "<script>console.log('".$Longitude."')</script>";
  // echo "<script>console.log('".$Retail_Sales_Commission."')</script>";
  // echo "<script>console.log('".$Developer_Sales_Commission."')</script>";
  // echo "<script>console.log('".$Partner_Sales_Commission."')</script>";
  // echo "<script>console.log('".$Offshore_Commission."')</script>";
  // echo "<script>console.log('".$Other_Offshore_Commission."')</script>";
  // echo "<script>console.log('".$Other_Developer_Sales_Commission."')</script>";
  // echo "<script>console.log('".$other_Partner_Sales_Commission."')</script>";
  // echo "<script>console.log('".$Currency."')</script>";
  }
?>
  <div class="content">
  <h1 class="mainUserText"><?php echo $Title; ?></h1>
    <p class="fs-20 mb-3"><?php echo $Street_Number." ".$Street_Name." ".$State; ?></p>

    <!-- <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="./assets/images/pictures/matrix-default-carousel-img.png" class="d-block w-100" alt="" />
        </div>
        <div class="carousel-item">
          <img src="./assets/images/pictures/matrix-default-carousel-img.png" class="d-block w-100" alt="" />
        </div>
        <div class="carousel-item">
          <img src="./assets/images/pictures/matrix-default-carousel-img.png" class="d-block w-100" alt="" />
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div> -->
    <h5 class="fs-28 fw-normal mt-4 mb-3">Location Map</h5>
    <hr />
    <div class="my-5">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3149.687123077239!2d145.00189611492695!3d-37.86761064489879!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad6684b3e9b0a05%3A0x561a80fd2ecf26b9!2sKimberley%20Gardens%20Hotel!5e0!3m2!1sen!2s!4v1638107604033!5m2!1sen!2s"
        width="100%" height="300" style="border: 0" allowfullscreen="" loading="lazy"></iframe>
    </div>
  </div>
</main>

<footer></footer>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
  integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
  integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="./assets/js/script.js"></script>
</body>

</html>