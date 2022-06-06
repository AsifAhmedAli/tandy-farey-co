<?php
include("./admin_header.php");
$id = $_GET['id'];
?>

<main>
  <?php
include("./properties_sidebar.php");
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
    <div class="d-flex align-items-center justify-content-between">
      <h5 class="fs-28 fw-normal mt-4 mb-3">
        Videos & Virtual Tours
      </h5>
      <div class="row g-3">
        <div class="col-6">
          <div class="position-relative">
            <input type="text" class="form-control border border-dark rounded px-3" placeholder="Search" />
            <p class="fs-5 position-absolute mb-0 end-0 top-50" style="transform: translate(-50%, -50%)">
              <span class="material-icons"> search </span>
            </p>
          </div>
        </div>
        <div class="col-6">
          <button class="btn btn-primary d-block w-100" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Now</button>
        </div>
      </div>
    </div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Video</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
      <form id="videouploadform">
        <!-- <label for="file"><span>Filename:</span></label> -->
        <input type="file" class="btn btn-primary btn-sm col-12" name="file" id="file" /> 
        <input type="text" name="fileuploadcall" style="visibility: hidden;" value="<?php echo $id; ?>">
        <br />
        
        <input type="submit" class="btn btn-outline-primary" name="submit" value="Submit" />
        </form>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
    <hr>
    <div class="table-responsive">
      <table class="table">
        <thead class="text-uppercase">
          <tr>
            <th scope="col">Video Name</th>
            <th scope="col" class="text-end">Actions</th>
          </tr>
        </thead>
        <tbody class="fs-14">
          <?php
          $sql = "SELECT * FROM project_documents where project_id = '$id' and file_type = 'video'";
          $result = $conn->query($sql);
          
          if ($result->num_rows > 0) {
            // output data of each row
            $i = 0;
            while($row = $result->fetch_assoc()) {
              $nameoffile  = $row['document_name'];
              $idofdocument = $row['id'];
?>
          <tr>
            <td>
              <img src="./assets/images/icons/video-icon.png" width="52" height="52" class="d-inline-block me-3"
                alt="Image" />
              <a href="../../uploads/<?php echo $nameoffile; ?>" target="_blank"><?php echo $nameoffile; ?></a>
            </td>
            <td class="text-end">
              <button class="btn btn-lg opacity-50" type="button" id="dropdownMenuClickableInside"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                <span class="material-icons"> more_vert </span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuClickableInside">
              <li class="dropdown-item">
                <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $i ?>">
                      Watch Video
                </button>
                </li>
                <li>
                    <hr class="dropdown-divider" />
                  </li>
                <li class="dropdown-item">
                <button onclick="deletevideo('<?php echo $idofdocument; ?>')" class="dropdown-item" >
                      Delete
                </button>
                </li>

              </ul>
            </td>
          </tr>
          <div class="modal fade" id="exampleModal<?php echo $i; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Watch Video</h5>
                  <button type="button" class="btn-close" onclick="closemodal('<?php echo $i; ?>')"></button>
                </div>
                <div class="modal-body">
                  <video id="video<?php echo $i; ?>" class="col-12" controls>
                    <source src="../../uploads/<?php echo $nameoffile; ?>" type="video/mp4">
                    Your browser does not support the video tag.
                  </video>
                </div>
                <div class="modal-footer">

                  <button type="button" class="btn btn-secondary"  onclick="closemodal('<?php echo $i; ?>')">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>

<?php
$i++;
            }

          }
          ?>


<!-- Modal -->

        </tbody>
      </table>
    </div>
  </div>
</main>

<div id="div12"></div>
<div class="loading" id="loader1" style="visibility: hidden;">Loading&#8230;</div>
<script>
            function closemodal(x12){
              var x13 = "video"+x12;
              document.getElementById(x13).pause();
              x12 = "#exampleModal"+x12;
              // alert(x12);
              $(x12).on("hidden.bs.modal", function () {
                // put your default event here
                // alert("modal is hidden");
            });
            $(x12).modal('hide');
            }

          </script>
<script>
function deletevideo(x11){
  $.ajax({
    type: "post",
    data: {x11:x11},
    url: "controllers.php",
    success: function (result) {
        $("#div12").html(result);
        document.getElementById("loader1").style.visibility = "hidden";
    },
});
}
      var request;

$("#videouploadform").submit(function (event) {

  // Prevent default posting of form - put here to work in case of errors
  event.preventDefault();

// Abort any pending request
if (request) {
    request.abort();
}
// setup some local variables
var formData = new FormData(this);
$('#exampleModal').modal('hide');
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