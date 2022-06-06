<?php
include("./admin_header.php");
$id = $_GET['id'];
$idofproperty = $_GET['propertyid'];
// require_once ('../vendor/autoload.php');
// use Phppot\DataSource;
// use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

// echo "<script>alert('".$id."')</script>";

?>

<main>
    <?php
include("./properties_sidebar.php");
?>
<div class="content">
        <h1 class="mainUserText"><?php echo $Title; ?></h1>
        <p class="fs-20 mb-3"><?php echo $Street_Number." ".$Street_Name." ".$State; ?></p>

        <hr />
        <div class="col-12">
            <div class="row">
                <div class="col-md-6 text-center p-3 my-3"  style="border: 1px solid black">
                    <form id="assignagent">
                        <select class="form-select" name="Agent_email" aria-label="Default select example">
                      <option selected>Select Agent</option>
                        <?php
                        $sql = "SELECT * FROM users where role1 = 'agent'";
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {
                          // output data of each row
                          while($row = $result->fetch_assoc()) {
                              $agentemail = $row['email1'];
                            ?>
                              <option value="<?php echo $agentemail; ?>"><?php echo $row['firstname']." ". $row['lastname']; ?></option>
                            <?php
                          }
                        } 
                        ?>
                        </select>            
                    <input style="visibility:hidden;" value="<?php echo $idofproperty ?>" name="property_id">
            
                    <div class="mb-3 text-start">
                        <label for="exampleDropdownFormEmail2" class="form-label">Buyer Name</label>
                        <input type="text" class="border-1" name="buyername" id="exampleDropdownFormEmail2">
                      </div>
                    <div class="form-check text-start">
                      <input class="form-check-input" name="advancepaid" type="checkbox" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        $2,000 holding deposit paid?
                      </label>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary">
                        Assign Agent and Reserve
                    </button>                        
                    </form>

                </div>
                <div class="col-md-6 text-center my-3">
                    <button class="btn btn-sm btn-primary" onclick="reservewithoutagent('<?php echo $idofproperty ?>')">
                        Reserve without Agent
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="loading" id="loader1" style="visibility: hidden;">Loading&#8230;</div>
    <div id="asdfqfq"></div>
    <script>
    var request;
        $("#assignagent").submit(function (event) {
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
                url: "controller2.php",
                success: function (result) {
                    $("#asdfqfq").html(result);
                    document.getElementById("loader1").style.visibility = "hidden";
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });    
        function reservewithoutagent(reservewithoutagent){
                        document.getElementById("loader1").style.visibility = "visible";
            $.ajax({
                type: "post",
                data: {reservewithoutagent:reservewithoutagent},
                url: "controller1.php",
                success: function (result) {
                    $("#asdfqfq").html(result);
                    document.getElementById("loader1").style.visibility = "hidden";
                }
            });
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="./assets/js/script.js"></script>
    </body>

    </html>