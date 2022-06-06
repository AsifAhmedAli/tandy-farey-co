<?php
include("./db.php");
include("./email_templates/email_settings.php");
session_start();
$property_id321 = $_POST['property_id'];
// $project_id321 = $_GET['id'];
// $username = $_SESSION['employee_username'];
$advancepaid = $_POST['advancepaid'];
$buyername = $_POST['buyername'];
$Agent_email = $_POST['Agent_email'];
// $status = $_POST['status'];
// echo "<script>alert('".$username.$advancepaid.$buyername.$property_id321.$Agent_email."')</script>";
$sql = "SELECT firstname FROM users where email1 = '$Agent_email'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  $firstname = $row['firstname'];
    }
  }
  $sql = "UPDATE properties SET status1='Reserved' WHERE id='$property_id321'";

  if ($conn->query($sql) === TRUE) {

    $sql = "INSERT INTO property_reserved_by (reserved_by, property_id , buyername, advance_paid)
  VALUES ('$Agent_email', '$property_id321','$buyername', '$advancepaid')";

    if ($conn->query($sql) === TRUE) {
      $sql035 = "SELECT * FROM properties where id = '$property_id321'";
      $result035 = $conn->query($sql035);

      if ($result035->num_rows > 0) {
        // output data of each row
        while ($row035 = $result035->fetch_assoc()) {
          $idofproject324 = $row035['project_id'];
          $idbyadmin = $row035['idbyadmin'];
          $sql036 = "SELECT Title FROM projects where id = '$idofproject324'";
          $result036 = $conn->query($sql036);

          if ($result036->num_rows > 0) {
            // output data of each row
            while ($row036 = $result036->fetch_assoc()) {
              $Title = $row036['Title'];
            }
          }
        }
      }
      $sql033 = "SELECT email1 FROM users where email1 != '$Agent_email'";
      $result033 = $conn->query($sql033);
      $notification_text = $firstname . ' has updated the status of '.$idbyadmin.' in '.$Title.' to Reserved!';
      if ($result033->num_rows > 0) {
        // output data of each row
        while ($row033 = $result033->fetch_assoc()) {
          $user = $row033['email1'];
          $sql034 = "INSERT INTO notification (notification_text, by_user, project_name, is_read)
        VALUES ('$notification_text', '$user', '$Title', 'false')";

          if ($conn->query($sql034) === TRUE) {
          }
        }
      }
      echo "<script>
  Swal.fire({
    icon: 'success',
    title: 'Done...',
    text: 'Status of the property has been updated!',
    allowOutsideClick: false
  })
  $( 'button.swal2-confirm' ).click(function() {
    location.reload();
  });
  </script>";
    }
  }
    
?>