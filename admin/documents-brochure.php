<?php
include("./admin_header.php");
$id = $_GET['id'];
// echo "<script>alert('".$id."')</script>";
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
    <div class="d-flex align-items-center justify-content-between flex-wrap">
      <h5 class="fs-28 fw-normal mt-4 mb-3">
          Brochures
      </h5>
      <div class="row g-3">
        <div class="col-6" style="visibility: hidden;">
          <div class="position-relative">
            <input type="text" class="form-control border border-dark rounded px-3" placeholder="Search" />
            <p class="fs-5 position-absolute mb-0 end-0 top-50" style="transform: translate(-50%, -50%)">
              <span class="material-icons"> search </span>
            </p>
          </div>
        </div>
        <div class="col-6">
          <button class="btn btn-primary d-block w-100" data-bs-toggle="modal" data-bs-target="#fileUpload">
            Add Now
          </button>
        </div>
      </div>
    </div>
    <hr />
    <div class="table-responsive">
      <table class="table" style="min-height: 300px;">
        <thead class="text-uppercase">
          <tr>
            <th scope="col">Document Name</th>
            <th scope="col" class="text-end">Actions</th>
          </tr>
        </thead>
        <tbody class="fs-14">
<?php
$sql = "SELECT * FROM project_documents where file_type = 'Brochure' and project_id = '$id'";
$result = $conn->query($sql);
$i = 0;
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $address = '../../photo_gallery/'.$row['document_name'];
    $idofimage = $row['id'];
    $thumbnail  = $row['thumbnail'];
?>
          <tr>
            <td>
              <img src="https://icons.iconarchive.com/icons/papirus-team/papirus-mimetypes/512/x-office-document-icon.png" width="52" height="52" class="d-inline-block me-3"
                alt="Image" />
               <a href="<?php echo $address; ?>" target="_blank"> <?php echo $row['document_name']; ?></a>
            </td>
            <td class="text-end">
              <div class="btn-group">
                <button class="btn btn-lg opacity-50" type="button" id="dropdownMenuClickableInside"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                  <span class="material-icons"> more_vert </span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuClickableInside">

                  <!-- <li>
                    <a class="dropdown-item">
                      <div class="form-check ps-0 pe-4">
                        <label class="form-check-label" for="invalidCheck<?php echo $i; ?>">
                          Set as Thumbnail
                        </label>
                        <input onchange="changethumbnail('<?php //echo $idofimage; ?>')" class="form-check-input float-end ms-auto" style="margin-right: -1.5rem" type="checkbox"
                          value="" id="invalidCheck<?php //echo $i; ?>" />
                      </div>
                    </a>
                  </li>
                  <li>
                    <hr class="dropdown-divider" />
                  </li> -->
                  <li>
                    <button onclick="deleteimage('<?php echo $idofimage; ?>')"  class="dropdown-item" >
                      Delete
                    </button>
                  </li>
                </ul>
              </div>
            </td>
          </tr>
<?php
$i++;
  }
}
?>

        </tbody>
      </table>
    </div>
  </div>
</main>

<footer></footer>

<!-- Modal -->
<div class="modal fade" id="fileUpload" tabindex="-1" aria-labelledby="fileUploadLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
 	      <form id="fileuploadform">
              <div class="form-group files text-center">
                <label>Upload Your File </label>
                <input type="file" style="border-bottom: none !important;" name="files[]" class="form-control" multiple>
              </div>
              <input type="text" style="visibility: hidden;" id="Brochure" name="Brochure" value="<?php echo $id; ?>">
              <button type="submit" class="px-4 btn btn-outline-primary">Submit</button>
          </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<!-- <div class="modal fade" id="deleteThisRow" tabindex="-1" aria-labelledby="deleteThisRowLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-body text-center">
        <h1 class="opacity-25">
          <span class="material-icons">delete_outline</span>
        </h1>
        <p class="fs-15 fw-medium mb-2">Deleting File</p>
        <p class="fs-12 opacity-75">
          Are you sure you want to delete this file? Once deleted, it cannot
          be recovered.
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary flex-fill me-3" data-bs-dismiss="modal">
          Cancel
        </button>
        <button type="button" class="btn btn-primary flex-fill">
          Yes! Delete
        </button>
      </div>
    </div>
  </div>
</div> -->
<div id="div12"></div>
<div class="loading" id="loader1" style="visibility: hidden;">Loading&#8230;</div>
<script>
  // function changethumbnail(x4){
  //   var xaa = document.getElementById("imagesuploadform").value;
  //   // alert(x);
  //   document.getElementById("loader1").style.visibility = "visible";
  //   $.ajax({
  //       type: "post",
  //       data: {x4:x4,xaa:xaa},
  //       url: "controllers.php",
  //       success: function (result) {
  //           $("#div12").html(result);
  //           document.getElementById("loader1").style.visibility = "hidden";
  //       }
  //   });
  // }
  function deleteimage(x18){
    var xaa = document.getElementById("Brochure").value;
    // alert(x);
    document.getElementById("loader1").style.visibility = "visible";
    $.ajax({
        type: "post",
        data: {x18:x18,xaa:xaa},
        url: "controllers.php",
        success: function (result) {
            $("#div12").html(result);
            document.getElementById("loader1").style.visibility = "hidden";
        }
    });
  }
          var request;

$("#fileuploadform").submit(function (event) {
// alert(document.getElementById("imagesuploadform").value);
    // Prevent default posting of form - put here to work in case of errors
    event.preventDefault();

    // Abort any pending request
    if (request) {
        request.abort();
    }
    // setup some local variables
    var formData = new FormData(this);
    $('#fileUpload').modal('hide');
    // alert("ishidder?");
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