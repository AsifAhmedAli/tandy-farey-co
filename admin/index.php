<style>
    @media screen and (min-width: 1250px){
        .modal-dialog.modal-xl{
            max-width:1249px !important;
        }
    }
    
</style>

<?php
include("./admin_header.php");

$sql = "SELECT count(*) as total FROM projects where status1 = 'active'";
$result=mysqli_query($conn,$sql);
$data=mysqli_fetch_assoc($result);
$total_active = $data['total'];
// echo "<script>alert('".$total_active."');</script>";
$sql = "SELECT count(*) as total FROM projects where status1 = 'inactive'";
$result=mysqli_query($conn,$sql);
$data=mysqli_fetch_assoc($result);
$total_inactive = $data['total'];
$sql = "SELECT count(*) as total, sum(price) as ojsd FROM properties";
$result=mysqli_query($conn,$sql);
$data=mysqli_fetch_assoc($result);
$total_properties = $data['total'];
$totalpriceforallproperties = $data['ojsd'];
$sql = "SELECT count(*) as total, sum(price) as ojsd FROM properties where status1 = 'Available'";
$result=mysqli_query($conn,$sql);
$data=mysqli_fetch_assoc($result);
$total_avialable_properties = $data['total'];
$totalpriceforavailable = $data['ojsd'];
$sql = "SELECT count(*) as total, sum(price) as ojsd FROM properties where status1 = 'Held'";
$result=mysqli_query($conn,$sql);
$data=mysqli_fetch_assoc($result);
$total_Held_properties = $data['total'];
$totalpriceforheld = $data['ojsd'];
// $sql = "SELECT count(*) as total, sum(price) as ojsd FROM properties where status1 = 'Conditional'";
// $result=mysqli_query($conn,$sql);
// $data=mysqli_fetch_assoc($result);
// $total_Conditional_properties = $data['total'];

$sql = "SELECT count(*) as total, sum(price) as ojsd FROM properties where status1 = 'Contracted'";
$result=mysqli_query($conn,$sql);
$data=mysqli_fetch_assoc($result);
$total_Contracted_properties = $data['total'];
$totalpriceforcontracted = $data['ojsd'];
$sql = "SELECT count(*) as total, sum(price) as ojsd FROM properties where status1 = 'Settled'";
$result=mysqli_query($conn,$sql);
$data=mysqli_fetch_assoc($result);
$total_Settled_properties = $data['total'];
$totalpriceforsettled = $data['ojsd'];
$sql = "SELECT count(*) as total, sum(price) as ojsd FROM properties where status1 = 'Reserved'";
$result=mysqli_query($conn,$sql);
$data=mysqli_fetch_assoc($result);
$total_Reserved_properties = $data['total'];
$totalpriceforreserved = $data['ojsd'];
$sql = "SELECT count(*) as total, sum(price) as ojsd FROM properties where status1 = 'Sold'";
$result=mysqli_query($conn,$sql);
$data=mysqli_fetch_assoc($result);
$total_Sold_properties = $data['total'];
$totalpriceforsold = $data['ojsd'];

// echo "<script>alert('".$total_inactive."');</script>";
?>
<input style="visibility: hidden;" id="available" value='<?php echo $total_avialable_properties; ?>'>
<input style="visibility: hidden;" id="Held" value='<?php echo $total_Held_properties; ?>'>
<input style="visibility: hidden;" id="Sold" value='<?php echo $total_Sold_properties; ?>'>
<input style="visibility: hidden;" id="Contracted" value='<?php echo $total_Contracted_properties; ?>'>
<input style="visibility: hidden;" id="Settled" value='<?php echo $total_Settled_properties; ?>'>
<input style="visibility: hidden;" id="Reserved" value='<?php echo $total_Reserved_properties; ?>'>

    <script
      type="text/javascript"
      src="https://www.gstatic.com/charts/loader.js"
    ></script>
    <script type="text/javascript">
      google.charts.load("current", { packages: ["corechart"] });
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var available = document.getElementById("available").value;
        var Held = document.getElementById("Held").value;
        var Sold = document.getElementById("Sold").value;
        var Contracted = document.getElementById("Contracted").value;
        var Settled = document.getElementById("Settled").value;
        var Reserved = document.getElementById("Reserved").value;
        available = parseInt(available);
        Held = parseInt(Held);
        Sold = parseInt(Sold);
        Contracted = parseInt(Contracted);
        Settled = parseInt(Settled);
        Reserved = parseInt(Reserved);
        var data = google.visualization.arrayToDataTable([
          ["Task", "Hours per Day"],
          ["Available", available],
          ["Held", Held],
          ["Sold", Sold],
          ["Contracted", Contracted],
          ["Settled", Settled],
          ["Reserved", Reserved],
        ]);

        var options = {
          title: "",
          sliceVisibilityThreshold: 0,
          legend: {
            position: "bottom",
            labeledValueText: "both",
            textStyle: { color: "black", fontSize: 15, fontName: "Poppins" },
          },
          slices: {
            0: { color: "green" },
            1: { color: "pink" },
            2: { color: "#d97272" },
            3: { color: "#a4bedb" },
            4: { color: "black" },
            5: { color: "Orange" },
            // 6: { color: "pink" },
          },
        };

        var chart = new google.visualization.PieChart(
          document.getElementById("piechart")
        );

        chart.draw(data, options);
      }
    </script>
    <main>
    <aside>
        <div
          class="
            d-xl-none d-flex
            align-items-center
            justify-content-between
            py-1
            border-bottom
          "
        >
          <h5 class="fs-28 text-primary">Menu</h5>
          <button class="btn fs-28 p-0 text-primary" id="hide-sidebar-btn">
            <span class="material-icons">arrow_back</span>
          </button>
        </div>
        <ul class="list-unstyled mb-0 ps-0 sidebar-items">
          <li class="active">
            <div class="dropdown active">
              <a type="button" href="index.php" class="sidebar-item">
                <span class="material-icons">dashboard</span>
                Dashboard
              </a>
              <ul class="list-unstyled ps-0 mb-0 sidebar-dropdown-list">
                <li class="active">
                  <a href="index.php">Overview</a>
                </li>
                <li>
                  <a href="index1.php">Agents Graph</a>
                </li>
                <!-- <li>
                  <a href="properties.php">Properties</a>
                </li> -->
              </ul>
            </div>
          </li>
        </ul>
      </aside>
      <div class="content">
        <h1 class="mainUserText">Hello, Admin</h1>
        <!-- <p class="fs-20 mb-0">Welcome back</p> -->
        <hr class="my-0" />
        <h5 class="fs-28 my-4">Properties Overview</h5>
        <div class="row align-items-stretch g-3">
          <div class="col-lg-4">
            <div class="row g-3">
              <div class="col-md-6" onclick="myfunction('Available')">
                <div
                  class="rounded border border-1 px-auto text-center py-5"
                  style="background-color: white"
                >
                  <h2 class="fs-1"><?php  echo $total_avialable_properties; ?></h2>
                  <p class="mb-0 fs-18">Available</p>
                  <?php
                  if($total_avialable_properties != 0){
                    ?>
                  <p class="mb-0 fs-18">GR: <?php echo "$".number_format(intval($totalpriceforavailable)); ?></p>
                    <?php
                  }
                  else{
                    ?>
                      &nbsp;
                    <?php
                  }
                  ?>
                </div>
              </div>
              <div class="col-md-6"  onclick="myfunction('Contracted')">
                <div
                  class="rounded border border-1 px-auto text-center py-5"
                  style="background-color: #a4bedb"
                >
                  <h2 class="fs-1"><?php  echo $total_Contracted_properties; ?></h2>
                  <p class="mb-0 fs-18">Contracted</p>
                  <?php
                  if($total_Contracted_properties != 0){
                    ?>
                  <p class="mb-0 fs-18">GR: <?php echo "$".number_format(intval($totalpriceforcontracted)); ?></p>
                    <?php
                  }
                  else{
                    ?>
                      &nbsp;
                    <?php
                  }
                  ?>

                </div>
              </div>
              <div class="col-md-6" onclick="myfunction('Sold')">
                <div
                  class="rounded border border-1 px-auto text-center py-5"
                  style="background-color: #d97272"
                >
                  <h2 class="fs-1"><?php  echo $total_Sold_properties; ?></h2>
                  <p class="mb-0 fs-18">Sold</p>
                  <?php
                  if($total_Sold_properties != 0){
                    ?>
                  <p class="mb-0 fs-18">GR: <?php echo "$".number_format(intval($totalpriceforsold)); ?></p>
                    <?php
                  }
                  else{
                    ?>
                      &nbsp;
                    <?php
                  }
                  ?>
                </div>
              </div>
              <div class="col-md-6" onclick="myfunction('Settled')">
                <div
                  class="rounded border border-1 px-auto text-center py-5"
                  style="background-color: #f0f0f1"
                >
                  <h2 class="fs-1"><?php  echo $total_Settled_properties; ?></h2>
                  <p class="mb-0 fs-18">Settled</p>
                  <?php
                  if($total_Settled_properties != 0){
                    ?>
                  <p class="mb-0 fs-18">GR: <?php echo "$".number_format(intval($totalpriceforsettled)); ?></p>
                    <?php
                  }
                  else{
                    ?>
                      &nbsp;
                    <?php
                  }
                  ?>
                </div>
              </div>
              <div class="col-md-6" onclick="myfunction('Held')">
                <div
                  class="rounded border border-1 px-auto text-center py-5"
                  style="background-color: #fafc9a"
                >
                  <h2 class="fs-1"><?php  echo $total_Held_properties; ?></h2>
                  <p class="mb-0 fs-18">Held</p>
                  <?php
                  if($total_Held_properties != 0){
                    ?>
                  <p class="mb-0 fs-18">GR: <?php echo "$".number_format(intval($totalpriceforheld)); ?></p>
                    <?php
                  }
                  else{
                    ?>
                      &nbsp;
                    <?php
                  }
                  ?>

                </div>
              </div>
              <div class="col-md-6" onclick="myfunction('Reserved')">
                <div
                  class="rounded border border-1 px-auto text-center py-5"
                  style="background-color: #f8e8d9"
                >
                  <h2 class="fs-1"><?php  echo $total_Reserved_properties; ?></h2>
                  <p class="mb-0 fs-18">Reserved</p>
                  <?php
                  if($total_Reserved_properties != 0){
                    ?>
                  <p class="mb-0 fs-18">GR: <?php echo "$".number_format(intval($totalpriceforreserved)); ?></p>
                    <?php
                  }
                  else{
                    ?>
                      &nbsp;
                    <?php
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-8 order-lg-0 order-1">
            <div class="border border-1 py-4 px-5 h-100">
              <h6 class="fs-18 fw-semibold">Properties</h6>
              <div
                class="d-flex align-items-center justify-content-center h-100"
              >
                <div id="piechart" style="width: 900px; height: 480px"></div>
              </div>
            </div>
          </div>
          <!-- <div class="col-12 order-lg-1 order-0" onclick="myfunction('Sold')">
            <div
              class="rounded border border-1 p-4 text-center"
              style="background-color: #69d2e7"
            >
              <h2 class="fs-1"><?php  //echo $total_Sold_properties; ?></h2>
              <p class="mb-0 fs-18">Sold Properties</p>
              <?php
                  // if($total_Sold_properties != 0){
                    ?>
                  <p class="mb-0 fs-18">GR: <?php //echo "$".number_format(intval($total_price_ofSoldproperties; ?></p>
                    <?php
                  // }
                  // else{
                    ?>
                      &nbsp;
                    <?php
                  // }
                  ?>
            </div>
          </div> -->
          <div class="col-12 order-lg-1 order-0">
            <div
              class="rounded border border-1 p-4 text-center"
              style="background-color: #69d2e7"
            >
              <h2 class="fs-1"><?php  echo $total_properties; ?></h2>
              <p class="mb-0 fs-18">Total No. of Properties</p>
              <?php
                  if($total_properties != 0){
                    ?>
                  <p class="mb-0 fs-18">GR: <?php echo "$".number_format(intval($totalpriceforallproperties)); ?></p>
                    <?php
                  }
                  else{
                    ?>
                      &nbsp;
                    <?php
                  }
                  ?>
            </div>
          </div>
        </div>
      </div>
    </main>
    <div class="row" style="display: none;">
      <button type="button" class="btn btn-primary" id="btn1" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
      </button>
      <button type="button" class="btn btn-primary" id="btn2" data-bs-toggle="modal" data-bs-target="#exampleModal1">
        Launch demo modal
      </button>
      <button type="button" class="btn btn-primary" id="btn3" data-bs-toggle="modal" data-bs-target="#exampleModal2">
        Launch demo modal
      </button>
      <button type="button" class="btn btn-primary" id="btn4" data-bs-toggle="modal" data-bs-target="#exampleModal3">
        Launch demo modal
      </button>
      <button type="button" class="btn btn-primary" id="btn5" data-bs-toggle="modal" data-bs-target="#exampleModal4">
        Launch demo modal
      </button>
      <button type="button" class="btn btn-primary" id="btn6" data-bs-toggle="modal" data-bs-target="#exampleModal5">
        Launch demo modal
      </button>
    </div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="btn-close py-0" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body mt-3 " style="overflow-x: auto;padding-top:0px;">
      <table class="table text-nowrap custom-table text-nowrap">
        <thead class="text-uppercase">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Project</th>
            <th scope="col">Price</th>
            <th scope="col">Beds</th>
            <th scope="col">Baths</th>
            <th scope="col">Cars</th>
            <th scope="col">Car Lots</th>
            <th scope="col">Storage Lots</th>
            <th scope="col">Level</th>
            <th scope="col">Aspect</th>
            <th scope="col">Total Area</th>
            <th scope="col">Status</th>
            <!-- <th scope="col">Agents</th> -->
            <!-- <th scope="col"></th> -->
          </tr>
        </thead>

        <tbody>
        <?php 
        $total_price_Available = 0;
            $sql = "SELECT p.* , p1.Title FROM properties p join projects p1 on p.project_id = p1.id where p.status1 = 'Available'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                $total_price_Available = $total_price_Available + intval($row['price']);
                ?>
          <tr>
            <td><?php echo $row['idbyadmin']; ?></td>
            <td><?php echo $row['Title']; ?></td>
            <td><?php echo "$".number_format(intval($row['price'])); ?></td>
            <td><?php echo $row['Beds']; ?></td>
            <td><?php echo $row['Baths']; ?></td>
            <td><?php echo $row['Cars']; ?></td>
            <td><?php echo $row['Car_lots']; ?></td>
            <td><?php echo $row['Storage_lots']; ?></td>
            <td><?php echo $row['level1']; ?></td>
            <td><?php echo $row['aspect']; ?></td>
            <td><?php echo $row['totalarea']; ?></td>
            <td><?php echo $row['status1']; ?></td>

            <!-- <td></td> -->
          </tr>
                <?php
              }?>
              <tr>
              <td></td>
                <td></td>
                <td><?php echo "$".number_format($total_price_Available); ?></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <?php
            }
        ?>
        </tbody>
      </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1"></h5>
        <button type="button" class="btn-close py-0" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body mt-3 " style="overflow-x: auto;padding-top:0px;">
      <table class="table text-nowrap custom-table text-nowrap">
        <thead class="text-uppercase">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Project</th>
            <th scope="col">Price</th>
            <th scope="col">Beds</th>
            <th scope="col">Baths</th>
            <th scope="col">Cars</th>
            <th scope="col">Car Lots</th>
            <th scope="col">Storage Lots</th>
            <th scope="col">Level</th>
            <th scope="col">Aspect</th>
            <th scope="col">Total Area</th>
            <th scope="col">Status</th>
            <!-- <th scope="col">Agents</th> -->
            <!-- <th scope="col"></th> -->
          </tr>
        </thead>
        <tbody>

        <?php 
        $total_price_held = 0;
            $sql = "SELECT p.* , p1.Title FROM properties p join projects p1 on p.project_id = p1.id where p.status1 = 'Held'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                $total_price_held = $total_price_held + intval($row['price']);
                ?>
          <tr>
            <td><?php echo $row['idbyadmin']; ?></td>
            <td><?php echo $row['Title']; ?></td>
            <td><?php echo "$".number_format(intval($row['price'])); ?></td>
            <td><?php echo $row['Beds']; ?></td>
            <td><?php echo $row['Baths']; ?></td>
            <td><?php echo $row['Cars']; ?></td>
            <td><?php echo $row['Car_lots']; ?></td>
            <td><?php echo $row['Storage_lots']; ?></td>
            <td><?php echo $row['level1']; ?></td>
            <td><?php echo $row['aspect']; ?></td>
            <td><?php echo $row['totalarea']; ?></td>
            <td><?php echo $row['status1']; ?></td>
            <!-- <td></td> -->
          </tr>
          <?php
              }?>
              <tr>
              <td></td>
            <td></td>
            <td><?php echo "$".number_format($total_price_held); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
              </tr>
              <?php
            }
        ?>
        </tbody>
      </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel2"></h5>
        <button type="button" class="btn-close py-0" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body mt-3 " style="overflow-x: auto;padding-top:0px;">
      <table class="table text-nowrap custom-table text-nowrap">
        <thead class="text-uppercase">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Project</th>
            <th scope="col">Price</th>
            <th scope="col">Beds</th>
            <th scope="col">Baths</th>
            <th scope="col">Cars</th>
            <th scope="col">Car Lots</th>
            <th scope="col">Storage Lots</th>
            <th scope="col">Level</th>
            <th scope="col">Aspect</th>
            <th scope="col">Total Area</th>
            <th scope="col">Status</th>
            <th scope="col">Sold By</th>
            <th scope="col"></th>
            <!-- <th scope="col"></th> -->
          </tr>
        </thead>
        <tr>
                <td></td>
                <td>
                <select id="selectprojectname" class="form-select" aria-label="Default select example">

                <option selected disabled>Project Title</option>
                  <?php
                    $sql = "SELECT id,Title FROM projects";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                      // output data of each row
                      while($row = $result->fetch_assoc()) {
                        ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['Title']; ?></option>
                        <?php
                      }
                    }
                  ?>
                  </select>

                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>                
                  <select id="selectagentname" class="form-select">

                    <option selected disabled>Agent Name</option>
                      <?php
                        $sql = "SELECT email1, firstname FROM users";
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {
                          // output data of each row
                          while($row = $result->fetch_assoc()) {
                            ?>
                            <option value="<?php echo $row['email1']; ?>"><?php echo $row['firstname']; ?></option>
                            <?php
                          }
                        }
                      ?>
                  </select>
                </td>
                <td><button onclick="fetchfilterApiCall()" class="btn btn-primary btn-sm">Apply</button></td>
      </tr>
        <tbody id="filterresponse">
        <?php 
            $sql = "SELECT p.*, r.*, p1.Title  FROM properties p  join property_sold_by r on r.property_id = p.id join projects p1 on p.project_id = p1.id where p.status1 = 'Sold'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                $email1 = $row['sold_by'];
                ?>
          <tr>
            <td><?php echo $row['idbyadmin']; ?></td>
            <td><?php echo $row['Title']; ?></td>
            <td><?php echo "$".number_format(intval($row['price'])); ?></td>
            <td><?php echo $row['Beds']; ?></td>
            <td><?php echo $row['Baths']; ?></td>
            <td><?php echo $row['Cars']; ?></td>
            <td><?php echo $row['Car_lots']; ?></td>
            <td><?php echo $row['Storage_lots']; ?></td>
            <td><?php echo $row['level1']; ?></td>
            <td><?php echo $row['aspect']; ?></td>
            <td><?php echo $row['totalarea']; ?></td>
            <td><?php echo $row['status1']; ?></td>
            
            <?php
              $sql433 = "SELECT * FROM users where email1 = '$email1'";
              $result433 = $conn->query($sql433);

              if ($result433->num_rows > 0) {
                // output data of each row
                while($row433 = $result433->fetch_assoc()) {
                  $first_name1 = $row433['firstname'];
                  $lastnaem = $row433['lastname'];
                  ?>
            <td><?php echo $first_name1." ".$lastnaem; ?></td>
                  <?php
                }
              }
              else{
                ?>
                            <td><?php echo $email1; ?></td>
                <?php
              }
            ?>
            <td></td>
          </tr>
          <?php
              }?>
              <tr>
              <td></td>
            <td></td>
            <td><?php echo "$".number_format(intval($totalpriceforsold)); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
              </tr>
              <?php
            }
        ?>
        </tbody>
      </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel3"></h5>
        <button type="button" class="btn-close py-0" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body mt-3 " style="overflow-x: auto;padding-top:0px;">
      <table class="table text-nowrap custom-table text-nowrap">
        <thead class="text-uppercase">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Project</th>
            <th scope="col">Price</th>
            <th scope="col">Beds</th>
            <th scope="col">Baths</th>
            <th scope="col">Cars</th>
            <th scope="col">Car Lots</th>
            <th scope="col">Storage Lots</th>
            <th scope="col">Level</th>
            <th scope="col">Aspect</th>
            <th scope="col">Total Area</th>
            <th scope="col">Status</th>
            <!-- <th scope="col">Agents</th> -->
            <!-- <th scope="col"></th> -->
          </tr>
        </thead>
        <tbody>

        <?php 
            $sql = "SELECT p.* , p1.Title FROM properties p join projects p1 on p.project_id = p1.id where p.status1 = 'Contracted'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                ?>
          <tr>
            <td><?php echo $row['idbyadmin']; ?></td>
            <td><?php echo $row['Title']; ?></td>
            <td><?php echo "$".number_format(intval($row['price'])); ?></td>
            <td><?php echo $row['Beds']; ?></td>
            <td><?php echo $row['Baths']; ?></td>
            <td><?php echo $row['Cars']; ?></td>
            <td><?php echo $row['Car_lots']; ?></td>
            <td><?php echo $row['Storage_lots']; ?></td>
            <td><?php echo $row['level1']; ?></td>
            <td><?php echo $row['aspect']; ?></td>
            <td><?php echo $row['totalarea']; ?></td>
            <td><?php echo $row['status1']; ?></td>
            <!-- <td></td> -->
          </tr>
          <?php
              }?>
              <tr>
              <td></td>
            <td></td>
            <td><?php echo "$".number_format(intval($totalpriceforcontracted)); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
              </tr>
              <?php
            }
        ?>
        </tbody>
      </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel4" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel4"></h5>
        <button type="button" class="btn-close py-0" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body mt-3 " style="overflow-x: auto;padding-top:0px;">
      <table class="table text-nowrap custom-table text-nowrap">
        <thead class="text-uppercase">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Project</th>
            <th scope="col">Price</th>
            <th scope="col">Beds</th>
            <th scope="col">Baths</th>
            <th scope="col">Cars</th>
            <th scope="col">Car Lots</th>
            <th scope="col">Storage Lots</th>
            <th scope="col">Level</th>
            <th scope="col">Aspect</th>
            <th scope="col">Total Area</th>
            <th scope="col">Status</th>
            <!-- <th scope="col">Agents</th> -->
            <!-- <th scope="col"></th> -->
          </tr>
        </thead>
        <tbody>

        <?php 
            $sql = "SELECT p.* , p1.Title FROM properties p join projects p1 on p.project_id = p1.id where p.status1 = 'Settled'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                ?>
          <tr>
            <td><?php echo $row['idbyadmin']; ?></td>
            <td><?php echo $row['Title']; ?></td>
            <td><?php echo "$".number_format(intval($row['price'])); ?></td>
            <td><?php echo $row['Beds']; ?></td>
            <td><?php echo $row['Baths']; ?></td>
            <td><?php echo $row['Cars']; ?></td>
            <td><?php echo $row['Car_lots']; ?></td>
            <td><?php echo $row['Storage_lots']; ?></td>
            <td><?php echo $row['level1']; ?></td>
            <td><?php echo $row['aspect']; ?></td>
            <td><?php echo $row['totalarea']; ?></td>
            <td><?php echo $row['status1']; ?></td>
            <!-- <td></td> -->
          </tr>
          <?php
              }?>
              <tr>
              <td></td>
            <td></td>
            <td><?php echo "$".number_format(intval($totalpriceforsettled)); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
              </tr>
              <?php
            }
        ?>
        </tbody>
      </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel5" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel5"></h5>
        <button type="button" class="btn-close py-0" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body mt-3 " style="overflow-x: auto;padding-top:0px;">
      <table class="table text-nowrap custom-table text-nowrap">
        <thead class="text-uppercase">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Project</th>
            <th scope="col">Price</th>
            <th scope="col">Beds</th>
            <th scope="col">Baths</th>
            <th scope="col">Cars</th>
            <th scope="col">Car Lots</th>
            <th scope="col">Storage Lots</th>
            <th scope="col">Level</th>
            <th scope="col">Aspect</th>
            <th scope="col">Total Area</th>
            <th scope="col">Status</th>
            <th scope="col">Reserved By</th>
            <!-- <th scope="col"></th> -->
          </tr>
        </thead>
        <tr>
                <td></td>
                <td>
                <select id="selectprojectname1" class="form-select" aria-label="Default select example">

                <option selected disabled>Project Title</option>
                  <?php
                    $sql = "SELECT id,Title FROM projects";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                      // output data of each row
                      while($row = $result->fetch_assoc()) {
                        ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['Title']; ?></option>
                        <?php
                      }
                    }
                  ?>
                  </select>

                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>                
                  <select id="selectagentname1" class="form-select">

                    <option selected disabled>Agent Name</option>
                      <?php
                        $sql = "SELECT email1, firstname FROM users";
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {
                          // output data of each row
                          while($row = $result->fetch_assoc()) {
                            ?>
                            <option value="<?php echo $row['email1']; ?>"><?php echo $row['firstname']; ?></option>
                            <?php
                          }
                        }
                      ?>
                  </select>
                </td>
                <td><button onclick="fetchfilterApiCall1()" class="btn btn-primary btn-sm">Apply</button></td>
      </tr>
        <tbody id="filterreserved">

        <?php 
            $sql = "SELECT *  FROM properties where status1 = 'Reserved'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                  $pid = $row['project_id'];
                  $pid1 = $row['id'];
                //   echo "<script>console.log('".$pid1."')</script>";
                //   echo "<script>console.log('".$pid."')</script>";
                
                $sql32 = "SELECT Title FROM projects where id = '$pid'";
                    $result32 = $conn->query($sql32);
                    
                    if ($result32->num_rows > 0) {
                      // output data of each row
                      while($row32 = $result32->fetch_assoc()) {
                          $projecttitle = $row32['Title'];
                      }
                    }
                $sql321 = "SELECT * FROM property_reserved_by where property_id = '$pid1'";
                    $result321 = $conn->query($sql321);
                    
                    if ($result321->num_rows > 0) {
                      // output data of each row
                      while($row321 = $result321->fetch_assoc()) {
                          $email1 = $row321['reserved_by'];
                      }
                    }
                    else{
                        $email1 = "";
                    }
                ?>
          <tr>
            <td><?php echo $row['idbyadmin']; ?></td>
            <td><?php echo $projecttitle; ?></td>
            <td><?php echo "$".number_format(intval($row['price'])); ?></td>
            <td><?php echo $row['Beds']; ?></td>
            <td><?php echo $row['Baths']; ?></td>
            <td><?php echo $row['Cars']; ?></td>
            <td><?php echo $row['Car_lots']; ?></td>
            <td><?php echo $row['Storage_lots']; ?></td>
            <td><?php echo $row['level1']; ?></td>
            <td><?php echo $row['aspect']; ?></td>
            <td><?php echo $row['totalarea']; ?></td>
            <td><?php echo $row['status1']; ?></td>
            <?php
              $sql433 = "SELECT * FROM users where email1 = '$email1'";
              $result433 = $conn->query($sql433);

              if ($result433->num_rows > 0) {
                // output data of each row
                while($row433 = $result433->fetch_assoc()) {
                  $first_name1 = $row433['firstname'];
                  $lastnaem = $row433['lastname'];
                  ?>
            <td><?php echo $first_name1." ".$lastnaem; ?></td>
                  <?php
                }
              }
            ?>
            <!-- <td></td> -->
          </tr>
          <?php
              }?>
              <tr>
              <td></td>
            <td></td>
            <td><?php echo "$".number_format(intval($totalpriceforreserved)); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
              </tr>
              <?php
            }
        ?>
        </tbody>
      </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="loading" id="loader1" style="visibility: hidden;">Loading&#8230;</div>

<script>
  function myfunction(x){
    // alert(x);
    switch(x) {
  case "Available":
    // code block
    document.querySelector('#btn1').click();
    break;
  case "Held":
    // code block
    document.querySelector('#btn2').click();
    break;
    case "Sold":
    // code block
    document.querySelector('#btn3').click();
    break;
    case "Contracted":
      document.querySelector('#btn4').click();
    // code block
    break;
    case "Settled":
      document.querySelector('#btn5').click();
    // code block
    break;
    case "Reserved":
      document.querySelector('#btn6').click();
    // code block
    break;
  default:
    // code block
}
  }

  function fetchfilterApiCall1(){
    // var x51 = parseInt(x50);
    var x53 = document.getElementById("selectprojectname1").value;
    var x54 = document.getElementById("selectagentname1").value;
    document.getElementById("loader1").style.visibility = "visible";
    // console.log(x51);
    // console.log(x52);
    $.ajax({
            type: "post",
            data: {x53 : x53, x54: x54},
            url: "controllers.php",
            success: function (result) {
                $("#filterreserved").html(result);
                document.getElementById("loader1").style.visibility = "hidden";
            }
            });
  }


  function fetchfilterApiCall(){
    // var x51 = parseInt(x50);
    var x51 = document.getElementById("selectprojectname").value;
    var x52 = document.getElementById("selectagentname").value;
    document.getElementById("loader1").style.visibility = "visible";
    // console.log(x51);
    // console.log(x52);
    $.ajax({
            type: "post",
            data: {x52 : x52, x51: x51},
            url: "controllers.php",
            success: function (result) {
                $("#filterresponse").html(result);
                document.getElementById("loader1").style.visibility = "hidden";
            }
            });
  }
</script>
    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
      integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
      integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
      crossorigin="anonymous"
    ></script>

    <script src="./assets/js/script.js"></script>
  </body>
</html>
