<?php
include("./admin_header.php");
$id = $_GET['id'];
$idofproperty = $_GET['propertyid'];
// require_once ('../vendor/autoload.php');
// use Phppot\DataSource;
// use PhpOffice\PhpSpreadsheet\Reader\Xlsx;



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





    $sql = "SELECT * FROM properties where id='$idofproperty'";
    $result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  $row = $result->fetch_assoc();
    $idbyadmin = $row['idbyadmin'];
    $price = $row[ 'price'];
    $Beds = $row[ 'Beds'];
    $Baths = $row[ 'Baths'];
    $Cars = $row[ 'Cars'];
    $Car_lots = $row[ 'Car_lots'];
    $Storage_lots = $row[ 'Storage_lots'];
    $level1 = $row[ 'level1'];
    $aspect = $row[ 'aspect'];
    $totalarea = $row[ 'totalarea'];
    $internalarea = $row[ 'internalarea'];
    $externalarea = $row[ 'externalarea'];
    $status1 = $row[ 'status1'];
    // echo "<script>alert('".$status1."')</script>";
  }
?>
    <div class="content">
        <h1 class="mainUserText"><?php echo $Title; ?></h1>
        <p class="fs-20 mb-3"><?php echo $Street_Number." ".$Street_Name." ".$State; ?></p>
        <div class="d-flex align-items-center justify-content-between flex-wrap">

            <form id="editproperty">
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
                                <th class="border-0 text-nowrap">Internal Area</th>
                                <th class="border-0 text-nowrap">External Area</th>
                                <th class="border-0">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="text" name="idbyadmin" class="border-0 py-0 form-control"
                                        value="<?php echo $idbyadmin; ?>" />
                                </td>
                                <td>
                                    <input type="text" name="price" class="border-0 py-0 form-control"
                                        value="<?php echo $price; ?>" />
                                </td>
                                <td>
                                    <input type="text" name="Beds" class="border-0 py-0 form-control"
                                        value="<?php echo $Beds; ?>" />
                                </td>
                                <td>
                                    <input type="text" name="Baths" class="border-0 py-0 form-control"
                                        value="<?php echo $Baths; ?>" />
                                </td>
                                <td>
                                    <input type="text" name="Cars" class="border-0 py-0 form-control"
                                        value="<?php echo $Cars; ?>" />
                                </td>
                                <td>
                                    <input type="text" name="Car_lots" class="border-0 py-0 form-control"
                                        value="<?php echo $Car_lots; ?>" />
                                </td>
                                <td>
                                    <input type="text" name="Storage_lots" class="border-0 py-0 form-control"
                                        value="<?php echo $Storage_lots; ?>" />
                                </td>
                                <td>
                                    <input type="text" name="level1" class="border-0 py-0 form-control"
                                        value="<?php echo $level1; ?>" />
                                </td>
                                <td>
                                    <input type="text" name="aspect" class="border-0 py-0 form-control"
                                        value="<?php echo $aspect; ?>" />
                                </td>
                                <td>
                                    <input type="text" name="totalarea" class="border-0 py-0 form-control"
                                        value="<?php echo $totalarea; ?>" />
                                </td>
                                <td>
                                    <input type="text" name="internalarea" class="border-0 py-0 form-control"
                                        value="<?php echo $internalarea; ?>" />
                                </td>
                                <td>
                                    <input type="text" name="externalarea" class="border-0 py-0 form-control"
                                        value="<?php echo $externalarea; ?>" />
                                </td>
                                <td>
                                    <select name="status" id="" class="border-0 py-0 form-select">
                                        <option value="Available">Available</option>
                                        <option value="Sold">Sold</option>
                                        <option value="Held">Held</option>
                                        <option value="Conditional">Conditional</option>
                                        <option value="Contracted">Contracted</option>
                                        <option value="Settled">Settled</option>
                                        <option value="Reserved">Reserved</option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <input type="text" name="editproperty" style="visibility: hidden;" value="<?php echo $idofproperty; ?>">
                <div class="col-12 text-end">
                    <button class="btn btn-primary btn-lg px-5 py-2" type="submit">Save</button>
                </div>
                <hr>
            </form>
            <?php
            // echo "<script>alert('".$idofproperty.$id."')</script>";
    $sql = "SELECT * FROM properties_details where property_id='$idofproperty' and project_id='$id'";
    $result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
    $row = $result->fetch_assoc();
    $Advertise_as = $row['Advertise_as']; 
    $Match_as = $row['Match_as']; 
    $Balcony_Size = $row['Balcony_Size']; 
    $Courtyard_Size = $row['Courtyard_Size']; 
    $Study_Space = $row['Study_Space']; 
    $Ceiling_Height = $row['Ceiling_Height']; 
    $Council_Rate = $row['Council_Rate']; 
    $Water_Rate = $row['Water_Rate']; 
    $Stamp_Duty = $row['Stamp_Duty']; 
    $Owners_Corp = $row['Owners_Corp']; 
    $Dutiable_Value = $row['Dutiable_Value']; 
    $Interior_Designer = $row['Interior_Designer']; 
    $Landscape_Architect = $row['Landscape_Architect'];
    // echo "<script>alert('".$Advertise_as."')</script>";
    ?>
            <form id="editpropertydetails">
                <h5 class="mt-5 mb-4 fs-28">
                    Additional Information
                </h5>
                <h5 class="fs-22 mb-2">Price</h5>
                <div class="row g-4">
                    <div class="col-lg-6">
                        <label for="" class="form-label2">Advertise as</label>
                        <input type="text" class="form-control form-control2" name="Advertise_as"
                            value="<?php echo $Advertise_as ?>" />
                    </div>
                    <div class="col-lg-6">
                        <label for="" class="form-label2">Match as</label>
                        <input type="text" class="form-control form-control2" name="Match_as"
                            value="<?php echo $Match_as ?>" />
                    </div>
                </div>

                <h5 class="fs-22 mt-4 mb-2">Key Features</h5>
                <div class="row g-4">

                    <div class="col-lg-6">
                        <label for="" class="form-label2">Balcony Size</label>
                        <input type="text" class="form-control form-control2" name="Balcony_Size"
                            value="<?php echo $Balcony_Size ?>" />
                    </div>
                    <div class="col-lg-6">
                        <label for="" class="form-label2">Courtyard Size</label>
                        <input type="text" class="form-control form-control2" name="Courtyard_Size"
                            value="<?php echo $Courtyard_Size ?>" />
                    </div>
                    <div class="col-lg-6">
                        <label for="" class="form-label2">Study Space</label>
                        <input type="text" class="form-control form-control2" name="Study_Space"
                            value="<?php echo $Study_Space ?>" />
                    </div>
                    <div class="col-lg-6">
                        <label for="" class="form-label2">Ceiling Height</label>
                        <input type="text" class="form-control form-control2" name="Ceiling_Height"
                            value="<?php echo $Ceiling_Height ?>" />
                    </div>
                </div>

                <h5 class="fs-22 mt-4 mb-2">Fees</h5>
                <div class="row g-4">
                    <div class="col-lg-6">
                        <label for="" class="form-label2">Council Rate</label>
                        <input type="text" class="form-control form-control2" name="Council_Rate"
                            value="<?php echo $Council_Rate ?>" />
                    </div>
                    <div class="col-lg-6">
                        <label for="" class="form-label2">Water Rate</label>
                        <input type="text" class="form-control form-control2" name="Water_Rate"
                            value="<?php echo $Water_Rate ?>" />
                    </div>
                    <div class="col-lg-6">
                        <label for="" class="form-label2">Stamp Duty</label>
                        <input type="text" class="form-control form-control2" name="Stamp_Duty"
                            value="<?php echo $Stamp_Duty ?>" />
                    </div>
                    <div class="col-lg-6">
                        <label for="" class="form-label2">Owners Corp</label>
                        <input type="text" class="form-control form-control2" name="Owners_Corp"
                            value="<?php echo $Owners_Corp ?>" />
                    </div>
                    <div class="col-lg-6">
                        <label for="" class="form-label2">Dutiable Value</label>
                        <input type="text" class="form-control form-control2" name="Dutiable_Value"
                            value="<?php echo $Dutiable_Value ?>" />
                    </div>
                </div>

                <h5 class="fs-22 mt-4 mb-2">Project Details</h5>
                <div class="row g-4">
                    <div class="col-lg-6">
                        <label for="" class="form-label2">Developer</label>
                        <input type="text" class="form-control form-control2" disabled
                            value="<?php echo $Developer ?>" />
                    </div>

                    <div class="col-lg-6">
                        <label for="" class="form-label2">Builder</label>
                        <input type="text" class="form-control form-control2" disabled value="<?php echo $Builder ?>" />
                    </div>

                    <div class="col-lg-6">
                        <label for="" class="form-label2">Architect</label>
                        <input type="text" class="form-control form-control2" disabled
                            value="<?php echo $Architect ?>" />
                    </div>
                    <div class="col-lg-6">
                        <label for="" class="form-label2">Interior Designer</label>
                        <input type="text" class="form-control form-control2" name="Interior_Designer"
                            value="<?php echo $Interior_Designer ?>" />
                    </div>
                    <div class="col-lg-6">
                        <label for="" class="form-label2">Landscape Architect</label>
                        <input type="text" class="form-control form-control2" name="Landscape_Architect"
                            value="<?php echo $Landscape_Architect ?>" />
                    </div>

                    <div class="col-lg-6">
                        <label for="" class="form-label2">Expected Construction Date</label>
                        <input type="text" class="form-control form-control2" disabled
                            value="<?php echo $Completion_Date ?>" />
                    </div>
                    <input type="text" name="idofproject1" style="visibility: hidden;" value="<?php echo $id; ?>">
                    <input type="text" name="idofproperty1" style="visibility: hidden;" value="<?php echo $idofproperty; ?>">

                    <div class="col-12 text-end">
                        <button class="btn btn-primary btn-lg px-5 py-2" type="submit">Save</button>
                    </div>
                </div>
            </form>
            <?php
}
    // if (!$conn -> query($sql)) {
    //     echo("Error description: " . $conn -> error);
    //   }
else{

?>
            <form id="addpropertydetails">
                <h5 class="mt-5 mb-4 fs-28">
                    Additional Information
                </h5>
                <h5 class="fs-22 mb-2">Price</h5>
                <div class="row g-4">
                    <div class="col-lg-6">
                        <label for="" class="form-label2">Advertise as</label>
                        <input type="text" class="form-control form-control2" name="Advertise_as"
                             />
                    </div>
                    <div class="col-lg-6">
                        <label for="" class="form-label2">Match as</label>
                        <input type="text" class="form-control form-control2" name="Match_as"
                            />
                    </div>
                </div>

                <h5 class="fs-22 mt-4 mb-2">Key Features</h5>
                <div class="row g-4">

                    <div class="col-lg-6">
                        <label for="" class="form-label2">Balcony Size</label>
                        <input type="text" class="form-control form-control2" name="Balcony_Size"
                           />
                    </div>
                    <div class="col-lg-6">
                        <label for="" class="form-label2">Courtyard Size</label>
                        <input type="text" class="form-control form-control2" name="Courtyard_Size"
                        />
                    </div>
                    <div class="col-lg-6">
                        <label for="" class="form-label2">Study Space</label>
                        <input type="text" class="form-control form-control2" name="Study_Space"
                           />
                    </div>
                    <div class="col-lg-6">
                        <label for="" class="form-label2">Ceiling Height</label>
                        <input type="text" class="form-control form-control2" name="Ceiling_Height"
                             />
                    </div>
                </div>

                <h5 class="fs-22 mt-4 mb-2">Fees</h5>
                <div class="row g-4">
                    <div class="col-lg-6">
                        <label for="" class="form-label2">Council Rate</label>
                        <input type="text" class="form-control form-control2" name="Council_Rate"
                            />
                    </div>
                    <div class="col-lg-6">
                        <label for="" class="form-label2">Water Rate</label>
                        <input type="text" class="form-control form-control2" name="Water_Rate"
                            />
                    </div>
                    <div class="col-lg-6">
                        <label for="" class="form-label2">Stamp Duty</label>
                        <input type="text" class="form-control form-control2" name="Stamp_Duty"
                             />
                    </div>
                    <div class="col-lg-6">
                        <label for="" class="form-label2">Owners Corp</label>
                        <input type="text" class="form-control form-control2" name="Owners_Corp"
                             />
                    </div>
                    <div class="col-lg-6">
                        <label for="" class="form-label2">Dutiable Value</label>
                        <input type="text" class="form-control form-control2" name="Dutiable_Value"
                             />
                    </div>
                </div>

                <h5 class="fs-22 mt-4 mb-2">Project Details</h5>
                <div class="row g-4">
                    <div class="col-lg-6">
                        <label for="" class="form-label2">Developer</label>
                        <input type="text" class="form-control form-control2" disabled
                        value="<?php echo $Developer ?>"  />
                    </div>

                    <div class="col-lg-6">
                        <label for="" class="form-label2">Builder</label>
                        <input type="text" class="form-control form-control2" disabled 
                        value="<?php echo $Builder ?>" />
                    </div>

                    <div class="col-lg-6">
                        <label for="" class="form-label2">Architect</label>
                        <input type="text" class="form-control form-control2" disabled
                        value="<?php echo $Architect ?>"  />
                    </div>
                    <div class="col-lg-6">
                        <label for="" class="form-label2">Interior Designer</label>
                        <input type="text" class="form-control form-control2" name="Interior_Designer"
                            />
                    </div>
                    <div class="col-lg-6">
                        <label for="" class="form-label2">Landscape Architect</label>
                        <input type="text" class="form-control form-control2" name="Landscape_Architect"
                            />
                    </div>

                    <div class="col-lg-6">
                        <label for="" class="form-label2">Expected Construction Date</label>
                        <input type="text" class="form-control form-control2" disabled
                        value="<?php echo $Completion_Date ?>" />
                    </div>
                    <input type="text" name="idofproject" style="visibility: hidden;" value="<?php echo $id; ?>">
                    <input type="text" name="idofproperty" style="visibility: hidden;" value="<?php echo $idofproperty; ?>">
                    <div class="col-12 text-end">
                        <button class="btn btn-primary btn-lg px-5 py-2" type="submit">Save</button>
                    </div>
                </div>
            </form>
<?php
}
?>

        </div>
        <hr />
<h3 class="text-center">Upload Images of Properties</h3>
        <div class="col-12">
            <form id="imageuploadformforproperty" class="text-center">
                <div class="mt-3">
                    <div>
                    <input type="text" style="visibility: hidden;" name="project_id32" value="<?php echo $id; ?>">
                    

                    </div>
        <div>
        <input type="text" style="visibility: hidden;" name="property_id32" value="<?php echo $idofproperty; ?>">
        <input type="file" multiple name="files[]" id="signleao">

        </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>

        </div>
        <hr />
<h3 class="text-center">Upload Floor Plans of Properties</h3>
        <div class="col-12">
            <form id="floorplansuploadformforproperty" class="text-center">
                <div class="mt-3">
                    <div>
                    <input type="text" style="visibility: hidden;" name="project_id33" value="<?php echo $id; ?>">
                    

                    </div>
        <div>
        <input type="text" style="visibility: hidden;" name="property_id33" value="<?php echo $idofproperty; ?>">
        <input type="file" multiple name="files[]" id="signleao1">

        </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>

        </div>
    </div>

    <div id="div12"></div>
    <div class="loading" id="loader1" style="visibility: hidden;">Loading&#8230;</div>
    <script>
        var request;

$("#floorplansuploadformforproperty").submit(function (event) {
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




        var request;

        $("#imageuploadformforproperty").submit(function (event) {
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



        $("#editproperty").submit(function (event) {
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


        $("#addpropertydetails").submit(function (event) {
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

        $("#editpropertydetails").submit(function (event) {
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
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="./assets/js/script.js"></script>
    </body>

    </html>