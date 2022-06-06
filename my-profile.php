
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
        <!-- <a href="./projects.php" class="btn fs-18" id="back_to_page">
          <span class="material-icons">arrow_back</span>
          Back
        </a> -->
        <ul class="list-unstyled mb-0 ps-0 sidebar-items">
          <li class="active">
            <a href="my-profile.php" class="sidebar-item"> My Preferences </a>
          </li>
          <!-- <li>
            <a href="my-profile-status.php" class="sidebar-item"> Status Management </a>
          </li> -->
        </ul>
      </aside>
      <div class="content">
        <h1 class="mainUserText">My Profile</h1>
        <hr />
        <h5 class="fs-28 fw-normal my-4">Account</h5>
        <form id="profileupdateform">
          <div class="row g-4">
            <div class="col-md-6">
              <label for="" class="form-label2">First Name</label>
              <input type="text" value="<?php echo $first_name; ?>" name="firstname" class="form-control form-control2" required/>
            </div>
            <div class="col-md-6">
              <label for="" class="form-label2">Last Name</label>
              <input type="text" value="<?php echo $last_name; ?>" name="lastname" class="form-control form-control2" required/>
            </div>
            <div class="col-md-6">
              <label for="" class="form-label2">Mobile</label>
              <input type="tel" name="phone" value="<?php echo $pjoone; ?>" class="form-control form-control2" required/>
            </div>
            <div class="col-md-6">
              <label for="" class="form-label2">Email</label>
              <input type="email" name="email" value="<?php echo $employee_username; ?>" class="form-control form-control2" disabled/>
            </div>
            <input type="text" value="<?php echo $employee_username; ?>" name="editprofileagent" style="visibility:hidden;">
          </div>
          <h5 class="fs-28 fw-normal mt-5 mb-4">Security & Access</h5>
          <div class="row g-4">
            <div class="col-md-6">
              <div class="d-flex align-items-start justify-content-between">
                <label for="" class="form-label2">Password</label>
                <button
                  type="button"
                  class="btn btn-link p-0 text-decoration-none"
                  data-bs-toggle="modal"
                  data-bs-target="#changePasswordModal"
                >
                  Change Password
                </button>
              </div>
              <input type="text" value="<?php echo $pasdf; ?>" disabled class="form-control form-control2" />
            </div>
            <!-- <div class="col-md-6">
              <label for="" class="form-label2">Access</label>
              <input
                type="text"
                class="form-control form-control2"
                placeholder="Internal Agent"
              />
            </div> -->
            <!-- <div class="col-12 text-end">
              <button class="btn btn-primary btn-lg px-5 py-2">Save</button>
            </div> -->
          </div>
<!-- 
          <h5 class="fs-28 fw-normal mt-5 mb-4">Notifications</h5>
          <div class="row g-4">
            <div class="col-md-6">
              <label for="" class="form-label2"
                >Options to Recieve Notifications</label
              >
              <div class="form-check p-0 mb-2">
                <input
                  class="form-check-input float-none mx-2"
                  type="checkbox"
                  value=""
                  id="flexCheckChecked"
                />
                <label class="form-check-label" for="flexCheckChecked">
                  SMS
                </label>
              </div>
              <div class="form-check p-0 mb-0">
                <input
                  class="form-check-input float-none mx-2"
                  type="checkbox"
                  value=""
                  id="flexCheckChecked2"
                />
                <label class="form-check-label" for="flexCheckChecked2">
                  Email
                </label>
              </div>
            </div>
-->            
          <div class="col-12 text-center mt-3 text-md-end">
              <button type="submit" class="btn btn-primary btn-lg px-5 py-2">Save</button>
            </div>
          <!-- </div>  -->
        </form>
      </div>
    </main>

    <footer></footer>

    <!-- Modal -->
    <div
      class="modal fade"
      id="changePasswordModal"
      tabindex="-1"
      aria-labelledby="changePasswordModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title fs-28" id="changePasswordModalLabel">
              Change Password
            </h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <form id="changepasswordform">
              <div class="row g-4">
                <div class="col-12">
                  <label for="" class="form-label2">Current Password</label>
                  <input type="password" class="form-control form-control2" required  name="current"/>
                </div>
                <div class="col-12">
                  <label for="" class="form-label2">New Password</label>
                  <input type="password" class="form-control form-control2" name="pasasa" required/>
                </div>
                <div class="col-12">
                  <label for="" class="form-label2">Retype Password</label>
                  <input type="password" class="form-control form-control2" name="retype" required/>
                </div>
              </div>
              <div class="col-12 text-center mt-3 text-md-end">
              <button type="submit" class="btn btn-primary btn-lg px-5 py-2">Save</button>
            </div>
            </form>
          </div>
          <!-- <div class="modal-footer">
            <button type="button" class="btn flex-fill" data-bs-dismiss="modal">
              Back
            </button>
            <button type="button" class="btn btn-primary flex-fill">
              Save
            </button>
          </div> -->
        </div>
      </div>
    </div>
    <div class="loading" id="loader1" style="visibility: hidden;">Loading&#8230;</div>
    <div id="div11" class="d-none"></div>
<script>
    var request;

$("#profileupdateform").submit(function (event) {

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





$("#changepasswordform").submit(function (event) {

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
