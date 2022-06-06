<?php
include("./admin_header.php");
$id = $_GET['id'];
require_once ('./vendor/autoload.php');
use Phppot\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;


// require_once 'DataSource.php';
// require '../vendor/autoload.php';

// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// $spreadsheet = new Spreadsheet();
// $sheet = $spreadsheet->getActiveSheet();
// $sheet->setCellValue('A1', 'Hello World !');

// $writer = new Xlsx($spreadsheet);
// $writer->save('hello world.xlsx');



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
    <div class="d-flex align-items-center justify-content-between flex-wrap">
      <h5 class="fs-28 fw-normal mt-3">
        Properties
</h5>
    </div>
    <hr />
    <div class="table-responsive">
      <table class="table text-nowrap custom-table">
        <thead class="text-uppercase">
          <tr>
            <th scope="col">ID</th>
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
        $sql = "SELECT * FROM properties where project_id = '$id'";
        $result = $conn->query($sql);
        $i = 0;
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            $idofproperty  = $row['id'];
?>

          <tr>
            <td><?php echo $row['idbyadmin']; ?></td>
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
            <!-- <td>
              <div class="dropdown">
                <button class="btn py-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <span class="material-icons">edit_note</span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li>
                    <a href="./edit-property.php?id=<?php //echo $id ?>&propertyid=<?php //echo $idofproperty ?>" class="dropdown-item">
                      Edit
                    </a>
                  </li>
                  <li>
                    <hr class="dropdown-divider" />
                  </li>
                  <li>
                    <button class="dropdown-item" onclick="deleteproperty('<?php //echo $idofproperty; ?>')">
                      Delete
                    </button>
                  </li>
                </ul>
              </div>
            </td> -->
          </tr>
          <div class="modal fade" id="editRow<?php echo $i; ?>" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title fs-28" id="editRowLabel<?php echo $i; ?>">Properties</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">

                  </div>
                </div>
              </div>
        </div>
<?php
$i++;
          }
        }
        ?>

        </tbody>
      </table>
    </div>
    <!-- <div class="col-12">
      <button class="btn btn-primary col-12" data-bs-toggle="modal" data-bs-target="#addnewpropoertyyes">+ Add New Property</button>
    </div> -->
  </div>
</main>


<!-- <div class="modal fade" id="addnewpropoertyyes" tabindex="-1" aria-labelledby="editRowLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-28">Properties</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="addnewpropertyform">
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr class="text-uppercase" style="border-top: none">
                  <th class="border-0">ID</th>
                  <th class="border-0">PRICE</th>
                  <th class="border-0">BEDS</th>
                  <th class="border-0">BATHS</th>
                  <th class="border-0">CARS</th>
                  <th class="border-0 text-nowrap">CAR LOTS</th>
                  <th class="border-0 text-nowrap">Storage Lots</th>
                  <th class="border-0">Level</th>
                  <th class="border-0">Aspect</th>
                  <th class="border-0 text-nowrap">Total Area</th>
                  <th class="border-0">Internal Area</th>
                  <th class="border-0">External Area</th>
                  <th class="border-0">Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th><input type="text" name="propertyidbyadmin" class="border-0 py-0 form-control" placeholder="1.1" /></th>
                  <td>
                    <input type="text" name="price" class="border-0 py-0 form-control" placeholder="$1,490,000" />
                  </td>
                  <td>
                    <input type="text" name="beds" class="border-0 py-0 form-control" placeholder="3 BED" />
                  </td>
                  <td>
                    <input type="text" name="baths" class="border-0 py-0 form-control" placeholder="2 BATH" />
                  </td>
                  <td>
                    <input type="text" name="cars" class="border-0 py-0 form-control" placeholder="1" />
                  </td>
                  <td>
                    <input type="text" name="car_lots" class="border-0 py-0 form-control" placeholder="1" />
                  </td>
                  <td>
                    <input type="text" name="storage_lots" class="border-0 py-0 form-control" placeholder="1" />
                  </td>
                  <td>
                    <input type="text" name="level1" class="border-0 py-0 form-control" placeholder="1" />
                  </td>
                  <td>
                    <input type="text" name="aspect" class="border-0 py-0 form-control" placeholder="" />
                  </td>
                  <td>
                    <input type="text" name="total_area" class="border-0 py-0 form-control" placeholder="184m2" />
                  </td>
                  <td>
                    <input type="text" name="internal_area" class="border-0 py-0 form-control" placeholder="184m2" />
                  </td>
                  <td>
                    <input type="text" name="external_area" class="border-0 py-0 form-control" placeholder="184m2" />
                  </td>
                  <td>
                    <select name="status1" id="" class="border-0 py-0 form-select">
                      <option value="Available" selected>Available</option>
                      <option value="Sold">Sold</option>
                      <option value="Held">Held</option>
                      <option value="Unconditional">Unconditional</option>
                      <option value="Contracted">Contracted</option>
                      <option value="Settled">Settled</option>
                      <option value="Reserved">Reserved</option>
                    </select>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="col-12 text-center">
            <input type="text" style="visibility: hidden;" name="addnewproperty" value="<?php  //echo $id; ?>">
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div> -->


<!-- Modal -->
<!-- <div class="modal fade" id="archived" tabindex="-1" aria-labelledby="deleteRowLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-body text-center">
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr class="text-uppercase" style="border-top: none">
                  <th class="border-0">ID</th>
                  <th class="border-0">PRICE</th>
                  <th class="border-0">BEDS</th>
                  <th class="border-0">BATHS</th>
                  <th class="border-0">CARS</th>
                  <th class="border-0 text-nowrap">CAR LOTS</th>
                  <th class="border-0 text-nowrap">Storage Lots</th>
                  <th class="border-0">Level</th>
                  <th class="border-0">Aspect</th>
                  <th class="border-0 text-nowrap">Total Area</th>
                  <th class="border-0">Internal Area</th>
                  <th class="border-0">External Area</th>
                  <th class="border-0">Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                        // $sql = "SELECT * FROM properties_archived where project_id = '$id'";
                        // $result = $conn->query($sql);
                        
                        // if ($result->num_rows > 0) {
                        //   // output data of each row
                        //   while($row = $result->fetch_assoc()) {
                        //     $idofproperty  = $row['id'];
                ?>
                          <tr>
            <td><?php //echo $row['idbyadmin']; ?></td>
            <td><?php //echo $row['price']; ?></td>
            <td><?php //echo $row['Beds']; ?></td>
            <td><?php //echo $row['Baths']; ?></td>
            <td><?php //echo $row['Cars']; ?></td>
            <td><?php //echo $row['Car_lots']; ?></td>
            <td><?php //echo $row['Storage_lots']; ?></td>
            <td><?php //echo $row['level1']; ?></td>
            <td><?php //echo $row['aspect']; ?></td>
            <td><?php //echo $row['totalarea']; ?></td>
            <td><?php //echo $row['internalarea']; ?></td>
            <td><?php //echo $row['externalarea']; ?></td>
            <td><?php //echo $row['status1']; ?></td>
            
            <td>
              <div class="dropdown">
                <button class="btn btn-primary" onclick="recoverproperty('<?php //echo $idofproperty; ?>')">
                  Recover
                </button>
              </div>
            </td>
          </tr>

            <?php
                        //   }
                        // }
                ?>
              </tbody>
            </table>
          </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div> -->










<!-- Modal -->

<div id="div12"></div>
<div class="loading" id="loader1" style="visibility: hidden;">Loading&#8230;</div>
<script>
  function recoverproperty(x7){
    document.getElementById("loader1").style.visibility = "visible";
    // alert(x7);
    $.ajax({
        type: "post",
        data: {x7:x7},
        url: "controllers.php",
        success: function (result) {
            $("#div12").html(result);
            document.getElementById("loader1").style.visibility = "hidden";
        },
    });
  }
function deleteproperty(x6){
  document.getElementById("loader1").style.visibility = "visible";
    $.ajax({
        type: "post",
        data: {x6:x6},
        url: "controllers.php",
        success: function (result) {
            $("#div12").html(result);
            document.getElementById("loader1").style.visibility = "hidden";
        },
    });
}
            var request;

$("#exceluploadform").submit(function (event) {
// alert(document.getElementById("imagesuploadform").value);
    // Prevent default posting of form - put here to work in case of errors
    event.preventDefault();

    // Abort any pending request
    if (request) {
        request.abort();
    }
    // setup some local variables
    var formData = new FormData(this);
    document.getElementById("loader1").style.visibility = "visible";
    $.ajax({
        type: "post",
        data: formData,
        url: "controllers.php",
        success: function (result) {
            $("#div12").html(result);
            document.getElementById("loader1").style.visibility = "hidden";
        },
cache: false,
contentType: false,
processData: false
    });
});



$("#addnewpropertyform").submit(function (event) {
// alert(document.getElementById("imagesuploadform").value);
    // Prevent default posting of form - put here to work in case of errors
    event.preventDefault();

    // Abort any pending request
    if (request) {
        request.abort();
    }
    // setup some local variables
    var formData = new FormData(this);
    document.getElementById("loader1").style.visibility = "visible";
    $.ajax({
        type: "post",
        data: formData,
        url: "controllers.php",
        success: function (result) {
            $("#div12").html(result);
            document.getElementById("loader1").style.visibility = "hidden";
        },
cache: false,
contentType: false,
processData: false
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