<?php
include("./admin_header.php");
?>

    <main id="projectsmain">
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
        <!-- <a class="btn btn-primary btn-lg sidebar-cta" href="new-project.php">
          <span class="material-icons">add</span>
          Add New Project
</a> -->
        <ul class="list-unstyled mb-0 ps-0 sidebar-items">
          <li class="active">
            <div class="dropdown active">
              <a href="./projects_active.php" class="sidebar-item">
                <span class="material-icons">description</span>
                Projects
</a>
              <!-- <ul class="list-unstyled ps-0 mb-0 sidebar-dropdown-list">
                <li class="active">
                  <a href="./projects_active.php">Active</a>
                </li>
                <li>
                  <a href="./projects_inactive.php">Archived</a>
                </li>
              </ul> -->
            </div>
          </li>
        </ul>
      </aside>
      <div class="content">
        <div
          class="d-flex align-items-end justify-content-between flex-wrap mb-3"
        >
          <div>
            <h1 class="mainUserText">Projects</h1>
            <!-- <p class="fs-20 mb-sm-0">Welcome back</p> -->
          </div>
          <div class="row g-3">
            <div class="col-6">
              <div class="position-relative" style="visibility: hidden;">
                <input
                  type="text"
                  class="form-control border border-dark rounded px-3"
                  placeholder="Search"
                />
                <p
                  class="fs-5 position-absolute mb-0 end-0 top-50"
                  style="transform: translate(-50%, -50%)"
                >
                  <span class="material-icons"> search </span>
                </p>
              </div>
            </div>
            <div class="col-6">
              <select
              style="visibility: hidden;"
                name=""
                id=""
                class="form-select border border-dark rounded px-3"
              >
                <option value="">Show All</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row g-4">
          <?php
            $sql = "SELECT * FROM projects  where status1 = 'active'";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                $id= $row['id'];
                $sql324 = "SELECT count(*) as total FROM properties where project_id = '$id' and status1 = 'Available'";
                $result324 = $conn->query($sql324);

                if ($result324->num_rows > 0) {
                  // output data of each row
                  $row324 = $result324->fetch_assoc();
                  $totalavailable = $row324['total'];
                }
                $sql325 = "SELECT count(*) as total FROM properties where project_id = '$id'";
                $result325 = $conn->query($sql325);

                if ($result325->num_rows > 0) {
                  // output data of each row
                  $row325 = $result325->fetch_assoc();
                  $total = $row325['total'];
                }
                $sql326 = "SELECT count(*) as total FROM properties where project_id = '$id' and status1 = 'Sold'";
                $result326 = $conn->query($sql326);

                if ($result326->num_rows > 0) {
                  // output data of each row
                  $row326 = $result326->fetch_assoc();
                  $totalsold = $row326['total'];
                }
                $sql328 = "SELECT count(*) as total FROM properties where project_id = '$id' and status1 = 'Reserved'";
                $result328 = $conn->query($sql328);

                if ($result328->num_rows > 0) {
                  // output data of each row
                  $row328 = $result328->fetch_assoc();
                  $totalreserved = $row328['total'];
                }
                ?>
                  <div class="col-lg-4 col-md-6">
                    <div class="my-card apartments">
                    <?php 

$sql32 = "SELECT * FROM project_documents where project_id = '$id' and file_type = 'image' and thumbnail = 'yes'";
$result32 = $conn->query($sql32);

if ($result32->num_rows > 0) {
  // output data of each row
    $row32 = $result32->fetch_assoc();
    $projectimageaddress = $row32['document_name'];
    ?>
              <img src="<?php echo "../photo_gallery/".$projectimageaddress; ?>"/>
    <?php
}
else{
  ?>
  <img src="./assets/images/pictures/project-card-img.png"/>
  <?php
}

?>
                      <div class="my-card-body">
                      <a href="project-overview.php?id=<?php echo $id; ?>" style="text-decoration: none; color:black;">
                      <p class="type">Type: <b><?php echo $row['Type1']; ?></b></p>
                      <h1 class="name">Title: <b><?php echo $row['Title']; ?></b></h1>
                      <h3 class="location">
                        <b>Address: </b><?php echo $row['Street_Number']." ".$row['Street_Name']; ?>
                        <br />
                        <?php echo $row['State1']." ".$row['Postal_Code']." ".$row['Country']; ?>
                      </h3>
                      <h3 class="location">
                      <b>Total: </b><?php echo $total;?>
                      <br />  
                      <b>Total Available: </b><?php echo $totalavailable;?>
                        <br />
                        <b>Total Sold: </b><?php echo $totalsold;?>
                        <?php //echo $row['State1']." ".$row['Postal_Code']." ".$row['Country']; ?>
                      </h3>
                      </a>
                        <div class="mx-auto" style="width: 85%">
                          <hr class="mb-3 w-75 mx-auto" />
                          <div
                            class="text-center"
                          >
                            <!-- <button class="btn btn-sm btn-primary fs-12" onclick="editproject('<?php //echo $id; ?>')">
                              <span class="material-icons"> edit </span>
                              Edit
                          </button>
                            <div class="border border-end"></div>
                            <div class="dropdown">
                              <button
                                class="btn btn-sm fs-12"
                                type="button"
                                id="dropdownMenuButton1"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                              >
                                <span class="material-icons">settings</span>
                                Settings
                              </button>
                              <ul
                                class="dropdown-menu"
                                aria-labelledby="dropdownMenuButton1"
                              >
                                <li>

                                  <button disabled onclick="activateproject('<?php //echo $id; ?>')" class="dropdown-item">Publish</button>
                                </li>
                                <li>
                                  <div class="dropdown-divider"></div>
                                </li>
                                <li><button onclick="disableproject('<?php //echo $id; ?>')" class="dropdown-item">Archive</button></li>
                              </ul>
                            </div>
                            <div class="border border-end"></div> -->
                            <a class="btn btn-sm fs-12" href="project-overview.php?id=<?php echo $id; ?>">
                              <span class="material-icons"> visibility </span>
                              Preview
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php
              }
            }
            else{
              echo "<h3 class='text-center mt-5'>No Projects Added...</h3>";
            }
          ?>

        </div>
      </div>
    </main>
    <div id="div111"></div>
    <div class="loading" id="loader1" style="visibility: hidden;">Loading&#8230;</div>
    <footer></footer>
    <script>
      // function editproject(x){
      //   document.getElementById("loader1").style.visibility = "visible";
      //   $.ajax({
      //     type: "post",
      //     data: {x:x},
      //     url: "edit-project.php",
      //     success: function (result) {
      //       $("#projectsmain").html(result);
      //       document.getElementById("loader1").style.visibility = "hidden";
      //     }
      //   });
      // }
      // function disableproject(x2){
      //   document.getElementById("loader1").style.visibility = "visible";
      //   $.ajax({
      //     type: "post",
      //     data: {x2:x2},
      //     url: "controllers.php",
      //     success: function (result) {
      //       $("#div111").html(result);
      //       document.getElementById("loader1").style.visibility = "hidden";
      //     }
      //   });
      // }
      // function activateproject(x3){
      //   document.getElementById("loader1").style.visibility = "visible";
      //   $.ajax({
      //     type: "post",
      //     data: {x3:x3},
      //     url: "controllers.php",
      //     success: function (result) {
      //       $("#div111").html(result);
      //       document.getElementById("loader1").style.visibility = "hidden";
      //     }
      //   });
      // }
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
