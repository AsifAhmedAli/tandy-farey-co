<?php
include("./admin_header.php");
$id = $_GET['id'];
$sql = "SELECT count(*) as total FROM properties where project_id = '$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total = $row['total'];
?>

<main>
  <?php
include("./properties_sidebar.php");
  $Unconditional = "rgba(196,214,157,0.5)";
  $Available = "white";
  $Reserved = "Orange";
  $Held = "Yellow";
  $Contracted = "rgba(81,130,186, 0.5)";
  $Settled = "rgba(231,230,230, 0.5)";
  $sold = "RED";
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
    <div class="
            d-flex
            flex-sm-row flex-column
            align-items-sm-center align-items-start
            justify-content-between
          ">
      <h5 class="fs-28 fw-normal my-sm-2 mt-2 mb-0">
        Matrix
        <span class="fs-18"> (<?php echo $total; ?> properties) </span>
      </h5>
      <div class="row g-3 mt-1 mb-2">
        <!-- <div class="col-12">
          <div class="position-relative">
            <input type="text" class="form-control border border-dark rounded px-3" placeholder="Search" />
            <p class="fs-5 position-absolute mb-0 end-0 top-50" style="transform: translate(-50%, -50%)">
              <span class="material-icons"> search </span>
            </p>
          </div>
        </div> -->
        <!-- <div class="col-6">
          <select name="" id="" class="form-select border border-dark rounded px-3">
            <option value="">Filter</option>
          </select>
        </div> -->
      </div>
    </div>
    <hr />
    <?php 

$sql = "SELECT min(level1) as minlevel FROM properties where project_id = '$id'";
$result = $conn->query($sql);
// $i = 0;
if ($result->num_rows > 0) {
  // output data of each row
  $row = $result->fetch_assoc();
    $lowestlevel = $row['minlevel'];
}

?>
    <h5>Level <?php echo $lowestlevel; ?></h5>
    <div class="row mt-4 matrix">
      <div class="col-md-10">
        <div class="row g-2">
          <?php
$sql = "SELECT * FROM properties where project_id = '$id' order by level1";
$result = $conn->query($sql);
$i = 0;
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {

    
    $idofproperty = $row['id'];
    $levelfornewline = $row['level1'];
    $statusofproperty = $row['status1'];
    $sql54 = "SELECT * FROM properties_details where property_id = '$idofproperty'";
    $result54 = $conn->query($sql54);

    if ($result54->num_rows > 0) {
      // output data of each row
      $row54 = $result54->fetch_assoc();
      $Owners_Corp = $row54['Owners_Corp'];
      $Council_Rate = $row54['Council_Rate'];
      $Water_Rate = $row54['Water_Rate'];
      $Stamp_Duty = $row54['Stamp_Duty'];
      $Dutiable_Value = $row54['Dutiable_Value'];
    }
    else{
      $Owners_Corp = "";
      $Council_Rate = "";
      $Water_Rate = "";
      $Stamp_Duty = "";
      $Dutiable_Value = "";
    }
    // echo "<script>console.log('".$idofproperty."')</script>";
    switch (trim($statusofproperty)) {
      case "available":
      case "Available":
        $selected_color = $Available;
        break;
      case "sold":
      case "Sold":
        $selected_color = $sold;
        break;
      case "held":
      case "Held":
        $selected_color = $Held;
        break;
        case "conditional":
        case "Conditional":
          $selected_color = $Unconditional;
          break;
        case "contracted":
        case "Contracted":
          $selected_color = $Contracted;
          break;
        case "settled":
        case "Settled":
          $selected_color = $Settled;
          break;
          case "reserved":
          case "Reserved":
            $selected_color = $Reserved;
            break;      
        default:
            $selected_color = "White";
        // echo "Your favorite color is neither red, blue, nor green!";
    }
    if($lowestlevel == $levelfornewline){
      ?>
          <div class="col-xxl-2 col-xl-3 col-lg-2 col-md-4 col-sm-3 col-6">
            <div class="matrix-item" type="button" style="background-color: <?php echo $selected_color; ?>;"
              data-bs-toggle="modal" data-bs-target="#showDetails<?php echo $i; ?>">
              <h6 class="id"><?php echo $row['idbyadmin']; ?></h6>
              <p class="status"><?php echo "$".number_format(intval($row['price'])); ?></p>
              <h5 class="price"><?php echo $row['Beds']; ?></h5>
              <p class="status"><?php echo $row['Baths']; ?></p>
              <p class="status"><?php echo $row['totalarea']; ?></p>
            </div>
          </div>
          <?php
    }
    else{
      ?>
        </div>
      </div>
    </div>
    <hr>
    <h5>Level <?php echo $row['level1']; ?></h5>
    <div class="row mt-4 matrix">
      <div class="col-md-10">
        <div class="row g-2">
          <div class="col-xxl-2 col-xl-3 col-lg-2 col-md-4 col-sm-3 col-6">
            <div class="matrix-item" style="background-color: <?php echo $selected_color; ?>;" type="button"
              data-bs-toggle="modal" data-bs-target="#showDetails<?php echo $i; ?>">
              <h6 class="id"><?php echo $row['idbyadmin']; ?></h6>
              <p class="status"><?php echo "$".number_format(intval($row['price'])); ?></p>
              <h5 class="price"><?php echo $row['Beds']; ?></h5>
              <p class="status"><?php echo $row['Baths']; ?></p>
              <p class="status"><?php echo $row['totalarea']; ?></p>
            </div>
          </div>
          <?php
      $lowestlevel = $row['level1'];
    }

?>

          <!-- <div class="col-xxl-2 col-xl-3 col-lg-2 col-md-4 col-sm-3 col-6">
            <div class="matrix-item" type="button" data-bs-toggle="modal" data-bs-target="#showDetails">
              <h6 class="id">101</h6>
              <h5 class="price">$1,220,000</h5>
              <p class="status">Available</p>
            </div>
          </div>
          <div class="col-xxl-2 col-xl-3 col-lg-2 col-md-4 col-sm-3 col-6">
            <div class="matrix-item" style="background-color: #c4d69d">
              <h6 class="id">104</h6>
              <h5 class="price">$1,220,000</h5>
              <p class="status">Unconditional FC</p>
            </div>
          </div>
        
    <div class="row mt-3 matrix">
      <div class="col-md-10">
        <div class="row g-2">

          <div class="col-xxl-2 col-xl-3 col-lg-2 col-md-4 col-sm-3 col-6">
            <div class="matrix-item" style="background-color: #c4d69d">
              <h6 class="id">G04</h6>
              <h5 class="price">$1,220,000</h5>
              <p class="status">Unconditional FC</p>
            </div>
          </div>
          <div class="col-xxl-2 col-xl-3 col-lg-2 col-md-4 col-sm-3 col-6">
            <div class="matrix-item" style="background-color: #fcfd38">
              <h6 class="id">G06</h6>
              <h5 class="price">$1,220,000</h5>
              <p class="status">Held</p>
            </div>
          </div>
        </div>
      </div>
    </div> -->


          <div class="modal fade" id="showDetails<?php echo $i; ?>" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-header">
                  <div class="text-center">
                    <h5 class="modal-title" id="showDetailsLabel<?php echo $i; ?>"><?php echo $row['idbyadmin']; ?></h5>
                    <p class="fs-20 mb-0"><?php echo $Title; ?></p>
                  </div>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <hr class="w-75 mx-auto my-1" />
                <div class="modal-body px-0">
                  <ul class="nav nav-pills nav-pills-sm justify-content-center mb-3" id="pills-tab<?php echo $i; ?>"
                    role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link text-decoration-underline active" id="pills-home-tab<?php echo $i; ?>"
                        data-bs-toggle="pill" data-bs-target="#pills-home<?php echo $i; ?>" type="button" role="tab"
                        aria-controls="pills-home<?php echo $i; ?>" aria-selected="true">
                        Basic Info
                      </button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link text-decoration-underline" id="pills-profile-tab<?php echo $i; ?>"
                        data-bs-toggle="pill" data-bs-target="#pills-profile<?php echo $i; ?>" type="button" role="tab"
                        aria-controls="pills-profile<?php echo $i; ?>" aria-selected="false">
                        Addt’l. Info
                      </button>
                    </li>
                  </ul>
                  <div class="tab-content" id="pills-tabContent<?php echo $i; ?>">
                    <div class="tab-pane fade show active" id="pills-home<?php echo $i; ?>" role="tabpanel"
                      aria-labelledby="pills-home-tab<?php echo $i; ?>">
                      <div class="table-responsive matrix-table">
                        <table class="table text-nowrap table-striped table-borderless">
                          <tbody>
                            <tr>
                              <td>
                                <p class="item-heading">Price:</p>
                                <h6 class="fs-18"><?php echo "$".number_format(intval($row['price'])); ?></h6>
                              </td>
                              <td>
                              <p class="item-heading">Owners Corp fee:</p>
                                <h6 class="fs-18"><?php echo "$".number_format(intval($Owners_Corp)) ?></h6>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <p class="item-heading">Config:</p>
                                <h6 class="fs-18"><?php echo $row['Beds']; ?> BEDS, <?php echo $row['Baths']; ?> BATHS,
                                  <?php echo $row['Cars']; ?> CARS</h6>
                              </td>

                              <td>
                              <p class="item-heading">Council Rates:</p>
                                <h6 class="fs-18"><?php echo "$".number_format(intval($Council_Rate)); ?></h6>
                              
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <p class="item-heading">Aspect:</p>
                                <h6 class="fs-18"><?php echo $row['aspect']; ?></h6>
                              </td>
                              <td>
                              <p class="item-heading">Water Rates:</p>
                                <h6 class="fs-18"><?php echo "$".number_format(intval($Water_Rate)); ?></h6>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <p class="item-heading">Internal Area:</p>
                                <h6 class="fs-18"><?php echo $row['internalarea']; ?></h6>
                              </td>
                              <td>
                              <p class="item-heading">Stamp Duty:</p>
                                <h6 class="fs-18"><?php echo "$".number_format(intval($Stamp_Duty)); ?></h6>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <p class="item-heading">External Area:</p>
                                <h6 class="fs-18"><?php echo $row['externalarea']; ?></h6>
                              </td>
                              <td>
                              <p class="item-heading">Dutiable Value:</p>
                                <h6 class="fs-18"><?php echo "$".number_format(intval($Dutiable_Value)); ?></h6>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <p class="item-heading">Total Area:</p>
                                <h6 class="fs-18"><?php echo $row['totalarea']; ?></h6>
                              </td>
                              <td>
                                <?php
                                $sql502 = "SELECT * FROM property_reserved_by where property_id = '$idofproperty'";
                                $result502 = $conn->query($sql502);
                                
                                if ($result502->num_rows > 0) {
                                  // output data of each row
                                  $row502 = $result502->fetch_assoc();
                                  $reserved_by = $row502['reserved_by'];
                                  $buyername = $row502['buyername'];
                                  $advance_paid = $row502['advance_paid'];
                                }
                                else{
                                  $reserved_by = '';
                                  $buyername = '';
                                  $advance_paid = '';
                                }
                                if($row['status1'] == 'Reserved'){
                                  ?>
                                <p class="item-heading">Buyer Name:</p>
                                <h6 class="fs-18"><?php echo $buyername; ?></h6>
                                  <?php
                                }
                                ?>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <p class="item-heading">Storage Lots:</p>
                                <h6 class="fs-18"><?php echo $row['Storage_lots']; ?></h6>
                              </td>
                              <td>
                              <?php
                                if($row['status1'] == 'Reserved'){
                                  ?>
                                <p class="item-heading">Deposit Paid:</p>
                                <h6 class="fs-18"><?php echo $advance_paid; ?></h6>
                                  <?php
                                }
                                ?>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <p class="item-heading">Status:</p>
                                <h6 class="fs-18"><?php echo $row['status1']; ?></h6>
                              </td>
                              <td>
                              <?php
                                if($row['status1'] == 'Reserved'){
                                  ?>
                                <p class="item-heading">Reserved By:</p>
                                <?php 
                                // $msdf = "SELECT firstname FROM users where email1 = '$reserved_by'";
                                // $result2324 = $conn->query($msdf);
                                
                                // if ($result2324->num_rows > 0) {
                                //   // output data of each row
                                //   while($row54234 = $result2324->fetch_assoc()) {
                                // $first_name = $row54234['firstname'];
                                //   }
                                // }
                                ?>
                                <h6 class="fs-18"><?php echo $reserved_by; ?></h6>
                                  <?php
                                }
                                ?>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <h3 class="text-center">
                        Floor Plans
                      </h3>
                      <?php
                        $sql55 = "SELECT * FROM property_floorplans where property_id = '$idofproperty'";
                        $result55 = $conn->query($sql55);

                        if ($result55->num_rows > 0) {
                          // output data of each row
                          while($row55 = $result55->fetch_assoc()){
                            $imagename = $row55['document_name'];
                            ?>
                            <hr>
                            <div class="col-12 my-2 text-center">
                              <img data-enlargeable style="cursor: zoom-in" src="<?php echo "../../uploads/".$imagename; ?>" width="50%" alt="">
                              <div><button class="btn btn-outline-dark mt-3" onclick="deleteksd('<?php echo $imagename; ?>')">Delete</button></div>
                            </div>
                            <hr>
                            <?php
                          }
                        }
                        else{
                        }
                      ?>
                    </div>
                    <div class="tab-pane fade" id="pills-profile<?php echo $i; ?>" role="tabpanel"
                      aria-labelledby="pills-profile-tab<?php echo $i; ?>">
                      <div class="col-12 text-center mb-4">
                        <button class="btn btn-primary me-3"
                          onclick="showadditionaldetails('showdetailshere<?php echo $i; ?>','<?php echo $id; ?>', '<?php echo $idofproperty; ?>')">
                          Show Details
                        </button>
                        <button class="btn btn-primary me-3"
                          onclick="showdocuments('showdetailshere<?php echo $i; ?>','<?php echo $id; ?>', '<?php echo $idofproperty; ?>')">
                          Show Documents
                        </button>
                      </div>
                      <div class="col-12 text-center" id="showdetailshere<?php echo $i; ?>">

                      </div>

                    </div>
                  </div>
                </div>
                <div class="modal-footer"></div>
              </div>
            </div>
          </div>

          <?php
    $i++;
  }
}

?>


        </div>
</main>

<footer></footer>

<div id="div12"></div>
<div class="loading" id="loader1" style="visibility: hidden;">Loading&#8230;</div>

<script>

function showdocuments(x13, x14, x15){
  document.getElementById("loader1").style.visibility = "visible";
  x13 = "#"+x13;
  $.ajax({
      type: "post",
      data: {
        x13: x13,
        x14: x14,
        x15: x15
      },
      url: "controllers.php",
      success: function (result) {
        $(x13).html(result);
        document.getElementById("loader1").style.visibility = "hidden";
      }
    });
}


  function showadditionaldetails(x8, x9, x10) {
    x8 = "#" + x8;
    // alert(x9);
    // alert(x10);
    document.getElementById("loader1").style.visibility = "visible";
    $.ajax({
      type: "post",
      data: {
        x8: x8,
        x9: x9,
        x10: x10
      },
      url: "controllers.php",
      success: function (result) {
        $(x8).html(result);
        document.getElementById("loader1").style.visibility = "hidden";
      }
    });
  }
  function deleteksd(x40){
    document.getElementById("loader1").style.visibility = "visible";
    $.ajax({
      type: "post",
      data: {
        x40: x40
      },
      url: "controllers.php",
      success: function (result) {
        $("#div12").html(result);
        document.getElementById("loader1").style.visibility = "hidden";
      }
    });
  }
  $('img[data-enlargeable]').addClass('img-enlargeable').click(function() {
  var src = $(this).attr('src');
  var modal;

  function removeModal() {
    modal.remove();
    $('body').off('keyup.modal-close');
  }
  modal = $('<div>').css({
    background: 'RGBA(0,0,0,.5) url(' + src + ') no-repeat center',
    backgroundSize: 'contain',
    width: '100%',
    height: '100%',
    position: 'fixed',
    zIndex: '10000',
    top: '0',
    left: '0',
    cursor: 'zoom-out'
  }).click(function() {
    removeModal();
  }).appendTo('body');
  //handling ESC
  $('body').on('keyup.modal-close', function(e) {
    if (e.key === 'Escape') {
      removeModal();
    }
  });
});
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
  integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
  integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="./assets/js/script.js"></script>
</body>

</html>