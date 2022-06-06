<?php
include("./admin_header.php");
$id = $_GET['id'];
// echo "<script>alert('".$id."');</script>";
$sql = "SELECT count(*) as sold FROM properties where project_id = '$id' and status1 = 'Sold'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$sold = $row['sold'];
$sql = "SELECT count(*) as available FROM properties where project_id = '$id' and status1 = 'Available'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$available = $row['available'];
$sql = "SELECT count(*) as total FROM properties where project_id = '$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total = $row['total'];
?>
<input type="text" id="sold" style="visibility: hidden;" value="<?php echo $sold; ?>">
<input type="text" id="available" style="visibility: hidden;" value="<?php echo $available; ?>">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load("current", {
    packages: ["corechart"]
  });
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var sold = document.getElementById("sold").value;
    var available = document.getElementById("available").value;
    sold = parseInt(sold);
    available = parseInt(available);
    var data = google.visualization.arrayToDataTable([
      ["Task", "Hours per Day"],
      ["Sold", sold],
      ["Available", available],
    ]);

    var options = {
      title: "",
      sliceVisibilityThreshold: 0,
      legend: {
        position: "bottom",
        labeledValueText: "both",
        textStyle: {
          color: "black",
          fontSize: 15,
          fontName: "Poppins"
        },
      },
      slices: {
        0: {
          color: "#008FFB"
        },
        1: {
          color: "#FEB019"
        },
      },
    };

    var chart = new google.visualization.PieChart(
      document.getElementById("piechart")
    );

    chart.draw(data, options);
  }
</script>
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
    <div id="carouselExampleControls" class="carousel slide"  data-bs-interval="false">
      <div class="carousel-inner">
    <?php
$sql = "SELECT * FROM project_documents where file_type = 'image' and project_id = '$id'";
$result = $conn->query($sql);
$i = 0;
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $address = '../photo_gallery/'.$row['document_name'];
    if($i == 0){
?>
        
        <div class="carousel-item active">
          <img src="<?php echo $address; ?>" class="d-block w-100" alt="" />
        </div>
<?php
    }
    else{
      ?>
        <div class="carousel-item">
          <img src="<?php echo $address; ?>" class="d-block w-100" alt="" />
        </div>
      <?php
    }
    $i++;
  }
}
  ?>

        <!-- <div class="carousel-item active">
          <img src="./assets/images/pictures/carousel-img.png" class="d-block w-100" alt="" />
        </div>
        <div class="carousel-item">
          <img src="./assets/images/pictures/carousel-img.png" class="d-block w-100" alt="" />
        </div>
        <div class="carousel-item">
          <img src="./assets/images/pictures/carousel-img.png" class="d-block w-100" alt="" />
        </div> -->
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
    </div>

    <h5 class="fs-28 fw-normal mt-4 mb-3">Overview</h5>
    <div class="row align-items-stretch g-3">
      <div class="col-md-10">
        <div class="border border-1 py-4 px-5 h-100">
          <h6 class="fs-18 fw-semibold">Apartments</h6>
          <div class="d-flex align-items-center justify-content-center h-100">
            <div id="piechart" style="width: 900px; height: 480px"></div>
          </div>
        </div>
      </div>
      <div class="col-md-2">
        <div class="row g-3">
          <div class="col-12">
            <div class="rounded border border-1 px-2 py-5" style="background-color: white">
              <h2 class="fs-1"><?php echo $total ?></h2>
              <p class="mb-0 fs-18">Total Apartments</p>
            </div>
          </div>
          <div class="col-12">
            <div class="rounded border border-1 px-2 py-5" style="background-color: #FAFC9A">
              <h2 class="fs-1"><?php echo $available ?></h2>
              <p class="mb-0 fs-18">Available Apartments</p>
            </div>
          </div>
          <div class="col-12">
            <div class="rounded border border-1 px-2 py-5" style="background-color: #a4bedb">
              <h2 class="fs-1"><?php echo $sold ?></h2>
              <p class="mb-0 fs-18">Sold</p>
            </div>
          </div>
        </div>
      </div>
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