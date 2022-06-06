<?php
include("./db.php");
include("./email_templates/email_settings.php");
session_start();

//select agent to reserve property
// if(isset($_POST['selectagents'])){
$idofproperty21 = $_POST['reservewithoutagent'];
// echo "<script>alert('".$idofproperty21."')</script>";
  $sql = "UPDATE properties SET status1='Reserved' WHERE id='$idofproperty21'";

  if ($conn->query($sql) === TRUE) {
            $sql035 = "SELECT * FROM properties where id = '$idofproperty21'";
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
    ?>