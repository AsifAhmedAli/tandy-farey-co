<?php
include("./db.php");
session_start();
$adminemail = $_SESSION['employee_username'];
// $projectid = $_POST['projectaiadid'];
$idofproperty = $_POST['propertyaida'];
$buyaahaahname = $_POST['buyaahaahname'];
          $sql21 = "INSERT INTO property_sold_by (sold_by, property_id, buyer_name)
          VALUES ('$adminemail', '$idofproperty', '$buyaahaahname')";
  
          if ($conn->query($sql21) === TRUE) {
            echo "<script>
            Swal.fire({
              icon: 'success',
              title: 'Done...',
              text: 'Property has been updated successfully (Sold)!',
              allowOutsideClick: false
            })
            $( 'button.swal2-confirm' ).click(function() {
              location.reload();
            });
            </script>";
      }
// echo "<script>alert('".$adminemail.$idofproperty.$buyaahaahname."')</script>";
?>