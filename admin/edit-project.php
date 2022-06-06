<?php
include("./db.php");
              $id = $_POST['x'];
?>
<?php
$sql121 = "SELECT * FROM projects where id = '$id'";
$result121 = $conn->query($sql121);

if ($result121->num_rows > 0) {
  // output data of each row
  $row121 = $result121->fetch_assoc();
  $Type = $row121['Type1'];
  $Developer = $row121['Developer'];
  $Title = $row121['Title'];
  $Enquiry_Only_Email = $row121['Enquiry_Only_Email'];
  $Websites = $row121['Websites'];
  $Name_Sales_Request_Recipient = $row121['Name_Sales_Request_Recipient'];
  $phone_Sales_Request_Recipient = $row121['phone_Sales_Request_Recipient'];
  $email_Sales_Request_Recipient = $row121['email_Sales_Request_Recipient'];
  $Architect = $row121['Architect'];
  $Levels = $row121['Levels'];
  $Builder = $row121['Builder'];
  $Completion_Date = $row121['Expected_Completion_Date'];
  $Introduction = $row121['Introduction'];
  $Features = $row121['Features'];
  $Reservation_no = $row121['Reservation_no'];
  $Street_Number = $row121['Street_Number'];
  $Street_Name = $row121['Street_Name'];
  $Suburb = $row121['Suburb'];
  $State = $row121['State1'];
  $Postal_Code = $row121['Postal_Code'];
  $Country = $row121['Country'];
  $Latitude = $row121['Latitude'];
  $Longitude = $row121['Longitude'];
  $Retail_Sales_Commission = $row121['Retail_Sales_Commission_percentage'];
  $Developer_Sales_Commission = $row121['Developer_Sales_Commission_percentage'];
  $Partner_Sales_Commission = $row121['Partner_Sales_Commission_percentage'];
  $Offshore_Commission = $row121['Offshore_Commission_percentage'];
  $Other_Offshore_Commission = $row121['other_Offshore_Commission_percentage'];
  $Other_Developer_Sales_Commission = $row121['other_Developer_Sales_Commission_percentage'];
  $other_Partner_Sales_Commission = $row121['other_Partner_Sales_Commission_percentage'];
  $Currency = $row121['Currency'];
  //   echo "<script>console.log('".$Type."')</script>";
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
        <a href="./projects.php" class="btn fs-18" id="back_to_page">
          <span class="material-icons">arrow_back</span>
          Back
        </a>
        <ul class="list-unstyled mb-0 ps-0 sidebar-items">
          <li onclick="backcall()" class="active" id="Project_Details">
            <a class="sidebar-item"> Project Details </a>
          </li>
          <li onclick="myasdf()" class="" id="Financials">
            <a class="sidebar-item"> Financials </a>
          </li>
        </ul>
      </aside>
      <div class="content">
        <h1 class="mainUserText">New Project</h1>
        <hr />
        <h5 class="fs-28 fw-normal my-4">Project Details</h5>
        <form id="editprojectform">
          <div id="firsthalf"> 
            <div class="row g-4">
              <div class="col-md-6">
                <label for="" class="form-label2">Type</label>
                <select name="Type" id="" class="form-select form-select2">
                  <option value="Apartments">Apartments</option>
                  <option value="Townhomes">Townhomes</option>
                </select>
              </div>
              <div class="col-md-6">
                <label for="" class="form-label2">Developer</label>
                <input value="<?php echo $Developer ; ?>" type="text" name="Developer" class="form-control form-control2" />
              </div>
              <div class="col-md-6">
                <label for="" class="form-label2">Title</label>
                <input value="<?php echo $Title ; ?>" type="text" name="Title" class="form-control form-control2" />
              </div>
              <div class="col-md-6">
                <label for="" class="form-label2">Enquiry Only Email</label>
                <input value="<?php echo $Enquiry_Only_Email ;?>" type="email" name="Enquiry_Only_Email" class="form-control form-control2" />
              </div>
              <div class="col-md-6">
                <label for="" class="form-label2">Websites</label>
                <input value="<?php echo $Websites ;?>" type="url" name="Websites" class="form-control form-control2" />
              </div>
              <div class="col-md-6">
                <div class="d-flex align-items-center justify-content-between">
                  <label for="" class="form-label2"
                    >Sales Request Recipient</label
                  >
                  <!-- <button class="btn btn-sm">+ Add New</button> -->
                </div>
                <div class="row g-3">
                  <div class="col-4">
                    <input value="<?php echo $Name_Sales_Request_Recipient ; ?>"
                      type="text"
                      class="form-control form-control2"
                      placeholder="Name"
                      name="Name_Sales_Request_Recipient"
                    />
                  </div>
                  <div class="col-4">
                    <input value="<?php echo $phone_Sales_Request_Recipient ; ?>"
                      type="tel"
                      class="form-control form-control2"
                      placeholder="Phone"
                      name="phone_Sales_Request_Recipient"
                    />
                  </div>
                  <div class="col-4">
                    <input value="<?php echo $email_Sales_Request_Recipient; ?>"
                      type="email"
                      class="form-control form-control2"
                      placeholder="Email"
                      name="email_Sales_Request_Recipient"
                    />
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <label for="" class="form-label2">Architect</label>
                <input value="<?php echo $Architect ; ?>" type="text" name="Architect" class="form-control form-control2" />
              </div>
              <!-- <div class="col-md-6">
                <label for="" class="form-label2">Enquiry Only Email</label>
                <input type="email" class="form-control form-control2" />
              </div> -->
              <div class="col-md-6">
                <label for="" class="form-label2">Levels</label>
                <input value="<?php echo $Levels ; ?>" type="number" name="Levels" class="form-control form-control2" />
              </div>
              <div class="col-md-6">
                <label for="" class="form-label2">Builder</label>
                <input value="<?php echo $Builder ; ?>" type="text" name="Builder" class="form-control form-control2" />
              </div>
              <div class="col-md-6">
                <label for="" class="form-label2">Completion Date</label>
                <input type="date" value="<?php echo $Completion_Date; ?>" name="Completion_Date" class="form-control form-control2" />
              </div>
              <!-- <div class="col-md-6"></div> -->
              <div class="col-md-6">
                <label for="" class="form-label2">Introduction</label>
                <textarea 
                  name="Introduction"
                  id=""
                  cols="30"
                  rows="10"
                  class="form-control form-control2"
                ><?php echo $Introduction; ?></textarea>
              </div>
              <div class="col-md-6">
                <label for="" class="form-label2">Features</label>
                <textarea
                  name="Features"
                  id=""
                  cols="30"
                  rows="10"
                  class="form-control form-control2"
                ><?php echo $Features; ?></textarea>
              </div>
              <div class="col-md-6">
                <label for="" class="form-label2"
                  >Reservation no. (incl. country code)</label
                >
                <input value="<?php echo $Reservation_no; ?>" type="number" name="Reservation_no" class="form-control form-control2" />
              </div>
            </div>
            <h5 class="fs-28 fw-normal mt-5 mb-4">Address</h5>
            <div class="row g-4">
              <div class="col-md-6">
                <label for="" class="form-label2">Street Number</label>
                <input value="<?php echo $Street_Number; ?>" type="number" name="Street_Number" class="form-control form-control2" />
              </div>
              <div class="col-md-6">
                <label for="" class="form-label2">Street Name</label>
                <input value="<?php echo $Street_Name ; ?>" type="text" name="Street_Name" class="form-control form-control2" />
              </div>
              <div class="col-md-6">
                <label for="" class="form-label2">Suburb</label>
                <input value="<?php echo $Suburb ; ?>" type="text" name="Suburb" class="form-control form-control2" />
              </div>
              <div class="col-md-6">
                <label for="" class="form-label2">State</label>
                <input value="<?php echo $State ; ?>" type="text" name="State" class="form-control form-control2" />
              </div>
              <div class="col-md-6">
                <label for="" class="form-label2">Postal Code</label>
                <input value="<?php echo $Postal_Code ; ?>" type="text" name="Postal_Code" class="form-control form-control2" />
              </div>
              <div class="col-md-6">
                <label for="" class="form-label2">Country</label>
                <input value="<?php echo $Country ; ?>" name="Country" id="" class="form-control form-control2">
              </div>
              <div class="col-md-6">
                <label for="" class="form-label2">Latitude</label>
                <input value="<?php echo $Latitude ; ?>" type="text" name="Latitude" class="form-control form-control2" />
              </div>
              <div class="col-md-6">
                <label for="" class="form-label2">Longitude</label>
                <div class="d-flex">
                  <input value="<?php echo $Longitude ; ?>" type="text" name="Longitude" class="form-control form-control2" />
                  <!-- <button class="btn btn-outline-secondary px-4" type="button">
                    <span class="material-icons">
                      autorenew
                    </span>
                  </button> -->
                </div>
              </div>
              <div class="col-12 text-end">
                <button type="button" id="nextbutton" class="btn btn-primary btn-lg px-5 py-2" onclick="myasdf()">Next</button>
              </div>
            </div>
          </div>
          <div id="second_half" class="d-none">
            <div class="row g-4">
              <div class="col-md-6">
                <label for="" class="form-label2"
                  >Project Gross Price</label
                >
                <input type="text" name="Retail_Sales_Commission" value="<?php echo $Retail_Sales_Commission ; ?>" class="form-control form-control2" >
              </div>
              <div class="col-md-6">
                <label for="" class="form-label2"
                  >Developer Sales Commission %</label
                >
                <input type="text" value="<?php echo $Developer_Sales_Commission; ?>" name="Developer_Sales_Commission" class="form-control form-control2" />
              </div>
              <div class="col-md-6">
                <label for="" class="form-label2"
                  >Partner Sales Commission %</label
                >
                <input type="text" value="<?php echo $Partner_Sales_Commission; ?>" name="Partner_Sales_Commission" class="form-control form-control2" />
              </div>
              <div class="col-md-6">
                <label for="" class="form-label2">Offshore Commission %</label>
                <input type="text" value="<?php echo $Offshore_Commission; ?>" name="Offshore_Commission" class="form-control form-control2" />
              </div>
            </div>

            <h5 class="fs-28 fw-normal mt-5 mb-4">Other Commission</h5>
            <div class="row g-4">
              <div class="col-md-6">
                <label for="" class="form-label2">Offshore Commission %</label>
                <input type="text" value="<?php echo $Other_Offshore_Commission; ?>" name="Other_Offshore_Commission" class="form-control form-control2" />
              </div>
              <div class="col-md-6">
                <label for="" class="form-label2"
                  >Developer Sales Commission %</label
                >
                <input type="text" value="<?php echo $Other_Developer_Sales_Commission ; ?>" name="Other_Developer_Sales_Commission" class="form-control form-control2" />
              </div>
              <div class="col-md-6">
                <label for="" class="form-label2"
                  >Partner Sales Commission %</label
                >
                <input type="text" value="<?php echo $other_Partner_Sales_Commission ; ?>" name="other_Partner_Sales_Commission" class="form-control form-control2" />
              </div>
            </div>

            <h5 class="fs-28 fw-normal mt-5 mb-4">Currency</h5>
            <div class="row g-4">
              <div class="col-md-6">
                <label for="" class="form-label2">Currency</label>
                <select name="Currency" id="" class="form-select form-select2">
                  <option value="first">first</option>
                  <option value="second">second</option>
                </select>
              </div>
              <div style="visibility: hidden;">
              
              <input type="text" name="editproject" value="<?php echo $id; ?>">
              </div>
              <div class="col-12 row">
                <div class="col-6 text-start">
                  <button class="btn btn-outline-primary btn-lg px-5 py-2" type="button" onclick="backcall()">Back</button>
                </div>
                <div class="col-6 text-end">
                  <button type="submit" class="btn btn-primary btn-lg px-5 py-2">Save</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    


</div>
<div class="loading" id="loader2" style="visibility: hidden;">Loading&#8230;</div>
<div id="div12">

</div>
<script>
    var request;

$("#editprojectform").submit(function (event) {

  // Prevent default posting of form - put here to work in case of errors
  event.preventDefault();

  // Abort any pending request
  if (request) {
    request.abort();
  }
  // setup some local variables
  var $form = $(this);

  // Let's select and cache all the fields
  var $inputs = $form.find("input, select, button, textarea");

  // Serialize the data in the form
  var serializedData = $form.serialize();
  document.getElementById("loader2").style.visibility = "visible";
  // document.getElementById("newprojectform").disabled = true;
  $.ajax({
    type: "post",
    data: serializedData,
    url: "controllers.php",
    success: function (result) {
      $("#div12").html(result);
      document.getElementById("loader2").style.visibility = "hidden";
      // document.getElementById("newprojectform").disabled = false;
    }
  });
});

function myasdf(){
  // alert("aasd");
  document.getElementById("Project_Details").classList.remove("active");
  document.getElementById("Project_Details").style.color = "black";
  document.getElementById("Financials").classList.add("active");
  document.getElementById("second_half").classList.remove("d-none");
  document.getElementById("firsthalf").classList.add("d-none");
}
function backcall(){
  document.getElementById("Project_Details").classList.add("active");
  document.getElementById("Project_Details").style.color = "white";
  document.getElementById("Financials").classList.remove("active");
  document.getElementById("second_half").classList.add("d-none");
  document.getElementById("firsthalf").classList.remove("d-none");
}




</script>

