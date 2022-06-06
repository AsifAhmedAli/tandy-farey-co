
<?php
include("./admin_header.php");
?>

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
        <a href="./projects.php" class="btn fs-18" id="back_to_page">
          <span class="material-icons">arrow_back</span>
          Back
        </a>
        <ul class="list-unstyled mb-0 ps-0 sidebar-items">
          <li class="active" id="Project_Details">
            <a class="sidebar-item"> Project Details </a>
          </li>
          <li class="" id="Financials">
            <a class="sidebar-item"> Financials </a>
          </li>
        </ul>
      </aside>
      <div class="content">
      <div class="loading" id="loader1" style="visibility: hidden;">Loading&#8230;</div>
        <h1 class="mainUserText">New Project</h1>
        <hr />
        <h5 class="fs-28 fw-normal my-4">Project Details</h5>
        <form id="newprojectform">
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
                <input  type="text" name="Developer" class="form-control form-control2" />
              </div>
              <div class="col-md-6">
                <label for="" class="form-label2">Title</label>
                <input  type="text" name="Title" class="form-control form-control2" />
              </div>
              <div class="col-md-6">
                <label for="" class="form-label2">Enquiry Only Email</label>
                <input type="email" name="Enquiry_Only_Email" class="form-control form-control2" />
              </div>
              <div class="col-md-6">
                <label for="" class="form-label2">Websites</label>
                <input type="url" name="Websites" class="form-control form-control2" />
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
                    <input 
                      type="text"
                      class="form-control form-control2"
                      placeholder="Name"
                      name="Name_Sales_Request_Recipient"
                    />
                  </div>
                  <div class="col-4">
                    <input 
                      type="tel"
                      class="form-control form-control2"
                      placeholder="Phone"
                      name="phone_Sales_Request_Recipient"
                    />
                  </div>
                  <div class="col-4">
                    <input
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
                <input  type="text" name="Architect" class="form-control form-control2" />
              </div>
              <!-- <div class="col-md-6">
                <label for="" class="form-label2">Enquiry Only Email</label>
                <input type="email" class="form-control form-control2" />
              </div> -->
              <div class="col-md-6">
                <label for="" class="form-label2">Levels</label>
                <input type="number" name="Levels" class="form-control form-control2" />
              </div>
              <div class="col-md-6">
                <label for="" class="form-label2">Builder</label>
                <input  type="text" name="Builder" class="form-control form-control2" />
              </div>
              <div class="col-md-6">
                <label for="" class="form-label2">Completion Date</label>
                <input type="date" name="Completion_Date" class="form-control form-control2" />
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
                ></textarea>
              </div>
              <div class="col-md-6">
                <label for="" class="form-label2">Features</label>
                <textarea 
                  name="Features"
                  id=""
                  cols="30"
                  rows="10"
                  class="form-control form-control2"
                ></textarea>
              </div>
              <div class="col-md-6">
                <label for="" class="form-label2"
                  >Reservation no. (incl. country code)</label
                >
                <input type="number" name="Reservation_no" class="form-control form-control2" />
              </div>
            </div>
            <h5 class="fs-28 fw-normal mt-5 mb-4">Address</h5>
            <div class="row g-4">
              <div class="col-md-6">
                <label for="" class="form-label2">Street Number</label>
                <input  type="text" name="Street_Number" class="form-control form-control2" />
              </div>
              <div class="col-md-6">
                <label for="" class="form-label2">Street Name</label>
                <input  type="text" name="Street_Name" class="form-control form-control2" />
              </div>
              <div class="col-md-6">
                <label for="" class="form-label2">Suburb</label>
                <input  type="text" name="Suburb" class="form-control form-control2" />
              </div>
              <div class="col-md-6">
                <label for="" class="form-label2">State</label>
                <input  type="text" name="State" class="form-control form-control2" />
              </div>
              <div class="col-md-6">
                <label for="" class="form-label2">Postal Code</label>
                <input  type="text" name="Postal_Code" class="form-control form-control2" />
              </div>
              <div class="col-md-6">
                <label for="" class="form-label2">Country</label>
                <input  name="Country" id="" class="form-control form-control2">
              </div>
              <div class="col-md-6">
                <label for="" class="form-label2">Latitude</label>
                <input  type="text" name="Latitude" class="form-control form-control2" />
              </div>
              <div class="col-md-6">
                <label for="" class="form-label2">Longitude</label>
                <div class="d-flex">
                  <input  type="text" name="Longitude" class="form-control form-control2" />
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
                <input type="text" name="Retail_Sales_Commission" class="form-control form-control2" />
              </div>
              <div class="col-md-6">
                <label for="" class="form-label2"
                  >Developer Sales Commission %</label
                >
                <input type="text"  name="Developer_Sales_Commission" class="form-control form-control2" />
              </div>
              <div class="col-md-6">
                <label for="" class="form-label2"
                  >Partner Sales Commission %</label
                >
                <input type="text"  name="Partner_Sales_Commission" class="form-control form-control2" />
              </div>
              <div class="col-md-6">
                <label for="" class="form-label2">Offshore Commission %</label>
                <input type="text"  name="Offshore_Commission" class="form-control form-control2" />
              </div>
            </div>

            <h5 class="fs-28 fw-normal mt-5 mb-4">Other Commission</h5>
            <div class="row g-4">
              <div class="col-md-6">
                <label for="" class="form-label2">Offshore Commission %</label>
                <input type="text"  name="Other_Offshore_Commission" class="form-control form-control2" />
              </div>
              <div class="col-md-6">
                <label for="" class="form-label2"
                  >Developer Sales Commission %</label
                >
                <input type="text" name="Other_Developer_Sales_Commission" class="form-control form-control2" />
              </div>
              <div class="col-md-6">
                <label for="" class="form-label2"
                  >Partner Sales Commission %</label
                >
                <input type="text" name="other_Partner_Sales_Commission" class="form-control form-control2" />
              </div>
            </div>

            <h5 class="fs-28 fw-normal mt-5 mb-4">Currency</h5>
            <div class="row g-4">
              <div class="col-md-6">
                <label for="" class="form-label2">Currency</label>
                <select name="Currency" id="" class="form-select form-select2">
                  <option value="AUD">AUD</option>
                </select>
              </div>
              <div style="visibility: hidden;">
              <input type="text" name="newproject">
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
    </main>

<div id="div11">

</div>
<script>
    var request;

$("#newprojectform").submit(function (event) {

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
  document.getElementById("loader1").style.visibility = "visible";
  // document.getElementById("newprojectform").disabled = true;
  $.ajax({
    type: "post",
    data: serializedData,
    url: "controllers.php",
    success: function (result) {
      $("#div11").html(result);
      document.getElementById("loader1").style.visibility = "hidden";
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
