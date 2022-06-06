<?php
include("./admin_header.php");
?>

<main>
  <aside>
    <div class="
            d-xl-none d-flex
            align-items-center
            justify-content-between
            py-1
            border-bottom
          ">
      <h5 class="fs-28 text-primary">Menu</h5>
      <button class="btn fs-28 p-0 text-primary" id="hide-sidebar-btn">
        <span class="material-icons">arrow_back</span>
      </button>
    </div>
    <ul class="list-unstyled mb-0 ps-0 sidebar-items">
      <li class="active">
        <div class="dropdown active">
          <button class="sidebar-item">
            <span class="material-icons">people_outline</span>
            Members List
          </button>
          <ul class="list-unstyled ps-0 mb-0 sidebar-dropdown-list">
            <li>
              <a href="./agents_active.php">Active</a>
            </li>
            <li class="active">
              <a href="./agents_inactive.php">Inactive</a>
            </li>
            <li>
              <a href="./agents.php">All Agents</a>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </aside>
  <div class="content">
    <div class="d-flex align-items-center justify-content-between flex-wrap">
      <h1 class="mainUserText">Inactive Agents</h1>
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
          <button class="btn btn-primary d-block w-100" data-bs-toggle="modal" data-bs-target="#addNewAgent">
            Add Now
          </button>
        </div>
      </div>
    </div>
    <hr />
    <div class="loading" id="loader1" style="visibility: hidden;">Loading&#8230;</div>
    <div class="table-responsive">
      <table class="table align-middle">
        <thead class="text-uppercase">
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Mail</th>
            <th scope="col">Contact Number</th>
            <th scope="col" class="text-end">Actions</th>
          </tr>
        </thead>
        <tbody class="fs-14">
          <?php

          $sql = "SELECT * FROM users where role1='agent'  and status = 'inactive'";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              $idofagent = $row['id'];
              ?>
          <tr>
            <td>
              <img src="./assets/images/icons/user-icon.png" width="52" height="52" class="d-inline-block me-3"
                alt="Image" />
              <?php echo $row['firstname']." ".$row['lastname']; ?>
            </td>
            <td><?php echo $row['email1']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td class="text-end">
            <!-- <div class="spinner-border"  ></div> -->
              <div class="dropdown">
                <button class="btn btn-lg opacity-50" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <span class="material-icons"> more_vert </span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <!-- <li>
                    <a class="dropdown-item" href="./project-access.php">Manage Access</a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li> -->
                  <li>
                    <button onclick="activateagent('<?php echo $idofagent; ?>')" class="dropdown-item">
                      Activate
                    </button>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <button onclick="deleteagent('<?php echo $idofagent; ?>')" class="dropdown-item">
                      Delete Permanently
                    </button>
                  </li>
                </ul>
              </div>
            </td>
          </tr>
          <?php 
            }
          }
              ?>
        </tbody>
      </table>
    </div>
  </div>
</main>



<!-- Modal -->
<div class="modal fade" id="addNewAgent" tabindex="-1" aria-labelledby="addNewAgentLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="addagentform">
        <div class="modal-body">
          <h5 class="fs-28 mb-4">New Agent</h5>

          <div class="row g-4">
            <div class="col-sm-6">
              <label for="" class="form-label2">First Name</label>
              <input name="fname" type="text" class="form-control form-control2" />
            </div>
            <div class="col-sm-6">
              <label for="" class="form-label2">Last Name</label>
              <input name="lname" type="text" class="form-control form-control2" />
            </div>
            <div class="col-sm-6">
              <label for="" class="form-label2">Email</label>
              <input name="email" type="email" class="form-control form-control2" />
            </div>
            <div class="col-sm-6">
              <label for="" class="form-label2">Contact Number</label>
              <input name="phone" type="tel" class="form-control form-control2" />
            </div>
            <div class="col-sm-6">
              <label for="" class="form-label2">Password</label>
              <input name="pass" type="password" class="form-control form-control2" />
            </div>
            <div class="col-sm-6">
              <label for="" class="form-label2">Retype Password</label>
              <input name="cpass" type="password" class="form-control form-control2" />
            </div>
            <div class="col-sm-12" style="visibility: hidden;">
              <label for="" class="form-label2">Retype Password</label>
              <input name="addagent" type="text" class="form-control form-control2" />
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-lg" data-bs-dismiss="modal">
            Back
          </button>
          <button type="submit" id="addagentbutton" class="btn btn-lg btn-primary px-md-5">
            Save
          </button>
          <div class="spinner-border" style="visibility: hidden;" id="loader"></div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="div11" class="d-none"></div>
<script>
  var request;

  $("#addagentform").submit(function (event) {

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
    document.getElementById("loader").style.visibility = "visible";
    document.getElementById("addagentbutton").disabled = true;
    $.ajax({
      type: "post",
      data: serializedData,
      url: "controllers.php",
      success: function (result) {
        $("#div11").html(result);
        document.getElementById("loader").style.visibility = "hidden";
        document.getElementById("addagentbutton").disabled = false;
      }
    });
  });
  function disableagent(x){
    // console.log(x);    
    document.getElementById("loader1").style.visibility = "visible";
    // document.getElementById("addagentbutton").disabled = true;
    $.ajax({
      type: "post",
      data: {x:x},
      url: "controllers.php",
      success: function (result) {
        $("#div11").html(result);
        document.getElementById("loader1").style.visibility = "hidden";
        // document.getElementById("addagentbutton").disabled = false;
      }
    });

  }
  function activateagent(x1){
    // alert(x);
    document.getElementById("loader1").style.visibility = "visible";
    // document.getElementById("addagentbutton").disabled = true;
    $.ajax({
      type: "post",
      data: {x1:x1},
      url: "controllers.php",
      success: function (result) {
        $("#div11").html(result);
        document.getElementById("loader1").style.visibility = "hidden";
        // document.getElementById("addagentbutton").disabled = false;
      }
    });

  }
  function deleteagent(x20){
    // alert(x);
    document.getElementById("loader1").style.visibility = "visible";
    // document.getElementById("addagentbutton").disabled = true;
    $.ajax({
      type: "post",
      data: {x20:x20},
      url: "controllers.php",
      success: function (result) {
        $("#div11").html(result);
        document.getElementById("loader1").style.visibility = "hidden";
        // document.getElementById("addagentbutton").disabled = false;
      }
    });

  }

  
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