<?php
include("./db.php");
include("./email_templates/email_settings.php");
session_start();
$username = $_SESSION['employee_username'];
$ifcondition = 0;
$maxsize    = 2097152;
$errors     = array();

//add new agent
if(isset($_POST['addagent'])){
    $z = $_POST['addagent'];
    $z1 = $_POST['fname'];
    $z2 = $_POST['lname'];
    $z3 = $_POST['email'];
    $z4 = $_POST['phone'];
    $z5 = $_POST['pass'];
    $z6 = $_POST['cpass'];
    if($z5 == $z6){
      $sql = "SELECT email1 FROM users where email1 = '$z3'";
      $result = $conn->query($sql);
      
      if ($result->num_rows > 0) {
        // output data of each row
        echo "<script>
        Swal.fire(
            'Oops...',
            'This email is already registered!',
            'error'
          )
        </script>";
      }
      else{
        $sql = "INSERT INTO users (firstname, lastname, email1, pass1, role1, phone, status)
        VALUES ('$z1', '$z2', '$z3', '$z5','agent','$z4', 'active')";
        if ($conn->query($sql) === TRUE) {
          try{
            $mail->setFrom('info@mexil.it', 'test account');
            $mail->addAddress($z3);     //Add a recipient
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'New Agent Registration';
            require './email_templates/template1.php';
            $mail->Body    = $new_agent_registration;
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            $mail->send();
            echo "<script>Swal.fire(
              'Success!',
              'New Agent has been added and an email has been sent to the Agent!',
              'success'
            )</script>";
          
        } catch (Exception $e) {
            echo "Message could not be sent";
          }
        }
    }
  }
    else{
        echo "<script>
        Swal.fire(
            'Oops...',
            'Passwords are not the same!',
            'error'
          )
        </script>";
    }
    // echo "<script>alert('".$z."')</script>";
}


//diable agents
if(isset($_POST['x'])){
  $x = $_POST['x'];
  $sql = "SELECT * FROM users where id='$x'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
  $row = $result->fetch_assoc();
  $email = $row['email1'];
  }
  $sql = "UPDATE users SET status='inactive' WHERE id='$x'";

    if ($conn->query($sql) === TRUE) {
      try{
        $mail->setFrom('info@mexil.it', 'test account');
        $mail->addAddress($email);     //Add a recipient
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Disable Account';
        require './email_templates/template1.php';
        $mail->Body    = $disable_account;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        echo "<script>Swal.fire(
          'Success!',
          'Agent has been disabled and an email has been sent to the Agent!',
          'success'
        )</script>";
      
    } catch (Exception $e) {
        echo "Message could not be sent";
      }
    }
  // echo "<script>alert('".$x."')</script>";
}


//activate agents
if(isset($_POST['x1'])){
  $x = $_POST['x1'];
  $sql = "SELECT * FROM users where id='$x'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
  $row = $result->fetch_assoc();
  $email = $row['email1'];
  }
  $sql = "UPDATE users SET status='active' WHERE id='$x'";

    if ($conn->query($sql) === TRUE) {
      try{
        $mail->setFrom('info@mexil.it', 'test account');
        $mail->addAddress($email);     //Add a recipient
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Activated Account';
        require './email_templates/template1.php';
        $mail->Body    = $activate_account;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        echo "<script>Swal.fire(
          'Success!',
          'Agent has been activated and an email has been sent to the Agent!',
          'success'
        )</script>";
      
    } catch (Exception $e) {
        echo "Message could not be sent";
      }
    }
  // echo "<script>alert('".$x."')</script>";
}


//add new project
if(isset($_POST['newproject'])){
  $Type = $_POST['Type'];
  $Developer = $_POST['Developer'];
  $Title = $_POST['Title'];
  $Enquiry_Only_Email = $_POST['Enquiry_Only_Email'];
  $Websites = $_POST['Websites'];
  $Name_Sales_Request_Recipient = $_POST['Name_Sales_Request_Recipient'];
  $phone_Sales_Request_Recipient = $_POST['phone_Sales_Request_Recipient'];
  $email_Sales_Request_Recipient = $_POST['email_Sales_Request_Recipient'];
  $Architect = $_POST['Architect'];
  $Levels = $_POST['Levels'];
  $Builder = $_POST['Builder'];
  $Completion_Date = $_POST['Completion_Date'];
  $Introduction = $_POST['Introduction'];
  $Features = $_POST['Features'];
  $Reservation_no = $_POST['Reservation_no'];
  $Street_Number = $_POST['Street_Number'];
  $Street_Name = $_POST['Street_Name'];
  $Suburb = $_POST['Suburb'];
  $State = $_POST['State'];
  $Postal_Code = $_POST['Postal_Code'];
  $Country = $_POST['Country'];
  $Latitude = $_POST['Latitude'];
  $Longitude = $_POST['Longitude'];
  $Retail_Sales_Commission = $_POST['Retail_Sales_Commission'];
  $Developer_Sales_Commission = $_POST['Developer_Sales_Commission'];
  $Partner_Sales_Commission = $_POST['Partner_Sales_Commission'];
  $Offshore_Commission = $_POST['Offshore_Commission'];
  $Other_Offshore_Commission = $_POST['Other_Offshore_Commission'];
  $Other_Developer_Sales_Commission = $_POST['Other_Developer_Sales_Commission'];
  $other_Partner_Sales_Commission = $_POST['other_Partner_Sales_Commission'];
  $Currency = $_POST['Currency'];

  $sql12 = "INSERT INTO projects (Type1, Developer, Title, Enquiry_Only_Email, Websites, Name_Sales_Request_Recipient, phone_Sales_Request_Recipient, email_Sales_Request_Recipient, Architect, Levels, Builder, Expected_Completion_Date, Introduction, Features, Reservation_no, Street_Number, Street_Name, Suburb, State1, Postal_Code, Country, Latitude, Longitude, Retail_Sales_Commission_percentage, Developer_Sales_Commission_percentage, Partner_Sales_Commission_percentage, Offshore_Commission_percentage, other_Offshore_Commission_percentage, other_Developer_Sales_Commission_percentage, other_Partner_Sales_Commission_percentage, Currency, status1)
  VALUES ('$Type', '$Developer', '$Title','$Enquiry_Only_Email','$Websites','$Name_Sales_Request_Recipient','$phone_Sales_Request_Recipient','$email_Sales_Request_Recipient','$Architect','$Levels','$Builder','$Completion_Date','$Introduction','$Features','$Reservation_no','$Street_Number','$Street_Name','$Suburb','$State','$Postal_Code','$Country','$Latitude','$Longitude','$Retail_Sales_Commission','$Developer_Sales_Commission','$Partner_Sales_Commission','$Offshore_Commission','$Other_Offshore_Commission','$Other_Developer_Sales_Commission','$other_Partner_Sales_Commission','$Currency', 'active')";

  if ($conn->query($sql12) === TRUE) {
    echo "<script>Swal.fire({
      icon: 'success',
      title: 'Done...',
      text: 'New Project has been added!',
      allowOutsideClick: false
    })
    $( 'button.swal2-confirm' ).click(function() {
      window.location.replace('./new-project.php');
    });
    </script>";
  }
  
  // else{
  //   echo "<script>alert('asdfasd');</script>";
  // }
  //   if (!$conn -> query($sql12)) {
  //     echo("Error description: " . $conn -> error);
  // }
  // echo "<script>console.log('".$Type."')</script>";
  // echo "<script>console.log('".$Developer."')</script>";
  // echo "<script>console.log('".$Title."')</script>";
  // echo "<script>console.log('".$Enquiry_Only_Email."')</script>";
  // echo "<script>console.log('".$Websites."')</script>";
  // echo "<script>console.log('".$Name_Sales_Request_Recipient."')</script>";
  // echo "<script>console.log('".$phone_Sales_Request_Recipient."')</script>";
  // echo "<script>console.log('".$email_Sales_Request_Recipient."')</script>";
  // echo "<script>console.log('".$Architect."')</script>";
  // echo "<script>console.log('".$Levels."')</script>";
  // echo "<script>console.log('".$Builder."')</script>";
  // echo "<script>console.log('".$Completion_Date."')</script>";
  // echo "<script>console.log('".$Introduction."')</script>";
  // echo "<script>console.log('".$Features."')</script>";
  // echo "<script>console.log('".$Reservation_no."')</script>";
  // echo "<script>console.log('".$Street_Number."')</script>";
  // echo "<script>console.log('".$Street_Name."')</script>";
  // echo "<script>console.log('".$Suburb."')</script>";
  // echo "<script>console.log('".$State."')</script>";
  // echo "<script>console.log('".$Postal_Code."')</script>";
  // echo "<script>console.log('".$Country."')</script>";
  // echo "<script>console.log('".$Latitude."')</script>";
  // echo "<script>console.log('".$Longitude."')</script>";
  // echo "<script>console.log('".$Retail_Sales_Commission."')</script>";
  // echo "<script>console.log('".$Developer_Sales_Commission."')</script>";
  // echo "<script>console.log('".$Partner_Sales_Commission."')</script>";
  // echo "<script>console.log('".$Offshore_Commission."')</script>";
  // echo "<script>console.log('".$Other_Offshore_Commission."')</script>";
  // echo "<script>console.log('".$Other_Developer_Sales_Commission."')</script>";
  // echo "<script>console.log('".$other_Partner_Sales_Commission."')</script>";
  // echo "<script>console.log('".$Currency."')</script>";

}


//edit project
if(isset($_POST['editproject'])){
  $id = $_POST['editproject'];
  // echo "<script>alert('".$id."')</script>";
  $Type = $_POST['Type'];
  $Developer = $_POST['Developer'];
  $Title = $_POST['Title'];
  $Enquiry_Only_Email = $_POST['Enquiry_Only_Email'];
  $Websites = $_POST['Websites'];
  $Name_Sales_Request_Recipient = $_POST['Name_Sales_Request_Recipient'];
  $phone_Sales_Request_Recipient = $_POST['phone_Sales_Request_Recipient'];
  $email_Sales_Request_Recipient = $_POST['email_Sales_Request_Recipient'];
  $Architect = $_POST['Architect'];
  $Levels = $_POST['Levels'];
  $Builder = $_POST['Builder'];
  $Completion_Date = $_POST['Completion_Date'];
  $Introduction = $_POST['Introduction'];
  $Features = $_POST['Features'];
  $Reservation_no = $_POST['Reservation_no'];
  $Street_Number = $_POST['Street_Number'];
  $Street_Name = $_POST['Street_Name'];
  $Suburb = $_POST['Suburb'];
  $State = $_POST['State'];
  $Postal_Code = $_POST['Postal_Code'];
  $Country = $_POST['Country'];
  $Latitude = $_POST['Latitude'];
  $Longitude = $_POST['Longitude'];
  $Retail_Sales_Commission = $_POST['Retail_Sales_Commission'];
  $Developer_Sales_Commission = $_POST['Developer_Sales_Commission'];
  $Partner_Sales_Commission = $_POST['Partner_Sales_Commission'];
  $Offshore_Commission = $_POST['Offshore_Commission'];
  $Other_Offshore_Commission = $_POST['Other_Offshore_Commission'];
  $Other_Developer_Sales_Commission = $_POST['Other_Developer_Sales_Commission'];
  $other_Partner_Sales_Commission = $_POST['other_Partner_Sales_Commission'];
  $Currency = $_POST['Currency'];

  $sql = "UPDATE projects SET Type1 = '$Type', Developer='$Developer', Title='$Title', Enquiry_Only_Email='$Enquiry_Only_Email', Websites='$Websites', Name_Sales_Request_Recipient='$Name_Sales_Request_Recipient', phone_Sales_Request_Recipient='$phone_Sales_Request_Recipient', email_Sales_Request_Recipient='$email_Sales_Request_Recipient', Architect='$Architect', Levels='$Levels', Builder='$Builder', Expected_Completion_Date='$Completion_Date', Introduction='$Introduction', Features='$Features', Reservation_no='$Reservation_no', Street_Number='$Street_Number', Street_Name='$Street_Name', Suburb='$Suburb', State1='$State', Postal_Code='$Postal_Code', Country='$Country', Latitude='$Latitude', Longitude='$Longitude', Retail_Sales_Commission_percentage='$Retail_Sales_Commission', Developer_Sales_Commission_percentage='$Developer_Sales_Commission', Partner_Sales_Commission_percentage='$Partner_Sales_Commission', Offshore_Commission_percentage='$Offshore_Commission', other_Offshore_Commission_percentage='$Other_Offshore_Commission', other_Developer_Sales_Commission_percentage='$Other_Developer_Sales_Commission', other_Partner_Sales_Commission_percentage='$other_Partner_Sales_Commission', Currency='$Currency' WHERE id='$id'";

  if ($conn->query($sql) === TRUE) {
    echo "<script>Swal.fire({
      icon: 'success',
      title: 'Done...',
      text: 'Project has been Updated!',
      allowOutsideClick: false
    })
    $( 'button.swal2-confirm' ).click(function() {
      window.location.replace('./projects.php');
    });
    </script>";
  }
  if (!$conn -> $sql ) {
    echo("Error description: " . $conn -> error);
  }
  
    // echo "<script>console.log('".$Type."')</script>";
  // echo "<script>console.log('".$Developer."')</script>";
  // echo "<script>console.log('".$Title."')</script>";
  // echo "<script>console.log('".$Enquiry_Only_Email."')</script>";
  // echo "<script>console.log('".$Websites."')</script>";
  // echo "<script>console.log('".$Name_Sales_Request_Recipient."')</script>";
  // echo "<script>console.log('".$phone_Sales_Request_Recipient."')</script>";
  // echo "<script>console.log('".$email_Sales_Request_Recipient."')</script>";
  // echo "<script>console.log('".$Architect."')</script>";
  // echo "<script>console.log('".$Levels."')</script>";
  // echo "<script>console.log('".$Builder."')</script>";
  // echo "<script>console.log('".$Completion_Date."')</script>";
  // echo "<script>console.log('".$Introduction."')</script>";
  // echo "<script>console.log('".$Features."')</script>";
  // echo "<script>console.log('".$Reservation_no."')</script>";
  // echo "<script>console.log('".$Street_Number."')</script>";
  // echo "<script>console.log('".$Street_Name."')</script>";
  // echo "<script>console.log('".$Suburb."')</script>";
  // echo "<script>console.log('".$State."')</script>";
  // echo "<script>console.log('".$Postal_Code."')</script>";
  // echo "<script>console.log('".$Country."')</script>";
  // echo "<script>console.log('".$Latitude."')</script>";
  // echo "<script>console.log('".$Longitude."')</script>";
  // echo "<script>console.log('".$Retail_Sales_Commission."')</script>";
  // echo "<script>console.log('".$Developer_Sales_Commission."')</script>";
  // echo "<script>console.log('".$Partner_Sales_Commission."')</script>";
  // echo "<script>console.log('".$Offshore_Commission."')</script>";
  // echo "<script>console.log('".$Other_Offshore_Commission."')</script>";
  // echo "<script>console.log('".$Other_Developer_Sales_Commission."')</script>";
  // echo "<script>console.log('".$other_Partner_Sales_Commission."')</script>";
  // echo "<script>console.log('".$Currency."')</script>";
 }
// else{
//   echo "<script>alert('naa bachya')</script>";
// }


// disable project
if(isset($_POST['x2'])){
  $id = $_POST['x2'];
  $sql = "UPDATE projects SET status1='inactive' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
      echo "<script>
      Swal.fire({
        icon: 'success',
        title: 'Done...',
        text: 'Project has been disabled and no agent is able to access this project!',
        allowOutsideClick: false
      })
      $( 'button.swal2-confirm' ).click(function() {
        location.reload();
      });
      </script>";
    }
}


// activate project
if(isset($_POST['x3'])){
  $id = $_POST['x3'];
  $sql = "UPDATE projects SET status1='active' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
        Swal.fire({
          icon: 'success',
          title: 'Done...',
          text: 'Project has been activated!',
          allowOutsideClick: false
        })
        $( 'button.swal2-confirm' ).click(function() {
          location.reload();
        });
        </script>";
        
    }
}


//images upload
if(isset($_POST['imagesuploadform'])){
  $id = $_POST['imagesuploadform'];
  $id = (int)$id;
      // echo "<script>alert('".$id."')</script>";
  extract($_POST);
  // $error=array();
  $countercheck = 0;
  // echo "sadfs";
  $extension=array("jpeg","jpg","png","gif");
  foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name) {
      // echo "sadfs";
      $file_name=str_replace(' ', '', $_FILES["files"]["name"][$key]);
      
      $file_tmp=$_FILES["files"]["tmp_name"][$key];
      $ext=pathinfo($file_name,PATHINFO_EXTENSION);
      // echo $file_name;
      if($_FILES['files']['size'][$key] >= $maxsize) {
        $errors[] = 'File too large. File must be less than 2 megabytes.';
      }
      if(in_array($ext,$extension) && count($errors) === 0) {
          if(!file_exists("../../photo_gallery/".$file_name)) {
            $file_name = str_replace("'", '', $file_name);
            // echo "<script>alert('".$file_name."')</script>";
              if(move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"../../photo_gallery/".$file_name)){
                $sql = "INSERT INTO project_documents (document_name, project_id, file_type, thumbnail)
                VALUES ('$file_name', '$id', 'image' ,'no')";
                if ($conn->query($sql) === TRUE) {
                  $countercheck++;
                }
                
                // echo $file_name;
              }
          }
          else {
              $filename=basename($file_name,$ext);
              $filename=$filename.time().".".$ext;
              
              $newFileName = str_replace(' ', '', $filename);
              $newFileName = str_replace("'", '', $newFileName);
              // echo "<script>alert('".$newFileName."')</script>";
              // echo $newFileName;
              if(move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"../../photo_gallery/".$newFileName)){
                // echo "File uploaded with time function";
                $sql = "INSERT INTO project_documents (document_name, project_id, file_type, thumbnail)
                VALUES ('$newFileName', '$id', 'image','no')";

                if ($conn->query($sql) === TRUE) {
                  $countercheck++;
                }
                // if (!$conn -> query($sql)) {
                //   echo("Error description: " . $conn -> error);
                // }
                                // echo $newFileName;
              }
          }
      }
      else {
        echo "<script>
        Swal.fire(
            'Oops...',
            'This is not an image file or files size is too large!',
            'error'
          )
        </script>";
          // array_push($error,"$file_name, ");
          // print_r($error);
      }

  }
  if($countercheck > 0){
    echo "<script>
    Swal.fire({
      icon: 'success',
      title: 'Done...',
      text: 'Images have been uploaded!',
      allowOutsideClick: false
    })
    $( 'button.swal2-confirm' ).click(function() {
      location.reload();
    });
    </script>";
  }
    // echo "<script>alert('".$id."')</script>";
}


//project thumbnail image setting
if(isset($_POST['x4'])){
  $id = $_POST['x4'];
  $xaa = $_POST['xaa'];
  // echo "<script>alert('".$id."')</script>";
  $sql = "UPDATE project_documents SET thumbnail='yes' WHERE id='$id' and project_id = '$xaa'";

  if ($conn->query($sql) === TRUE) {
    $sql1 = "UPDATE project_documents SET thumbnail='no' WHERE id != '$id' and project_id = '$xaa'";

      if ($conn->query($sql1) === TRUE) {
    
      echo "<script>
      Swal.fire({
        icon: 'success',
        title: 'Done...',
        text: 'This image has been selected as a Thumbnail!',
        allowOutsideClick: false
      })
      $( 'button.swal2-confirm' ).click(function() {
        location.reload();
      });
      </script>";
    }
    if (!$conn -> query($sql1)) {
      echo("Error description: " . $conn -> error);
    }
  }
  if (!$conn -> query($sql)) {
    echo("Error description: " . $conn -> error);
  }
}


//delete images
if(isset($_POST['x5'])){
  $id = $_POST['x5'];
  $xaa = $_POST['xaa'];
  // echo "<script>alert('".$id."')</script>";
  $sql = "DELETE FROM project_documents WHERE id='$id' and project_id = '$xaa'";

      if ($conn->query($sql) === TRUE) {
      echo "<script>
      Swal.fire({
        icon: 'success',
        title: 'Done...',
        text: 'This image has been deleted!',
        allowOutsideClick: false
      })
      $( 'button.swal2-confirm' ).click(function() {
        location.reload();
      });
      </script>";
    }
}


//import excelsheet properties
if(isset($_POST["mynaawe"])){
    // echo "asdf";
  $id = $_POST["mynaawe"];
  $id = (int)$id;

      $allowedFileType = [
          'application/vnd.ms-excel',
          'text/xls',
          'text/xlsx',
          'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
      ];

      if (in_array($_FILES["file"]["type"], $allowedFileType)) {

          $targetPath = "../../uploads/".$_FILES['file']['name'];
          if(move_uploaded_file($_FILES['file']['tmp_name'], $targetPath)){
            // echo "moved";
          };

          $Reader = new PhpOffice\PhpSpreadsheet\Reader\Xlsx();

          $spreadSheet = $Reader->load($targetPath);
          $excelSheet = $spreadSheet->getActiveSheet();
          $spreadSheetAry = $excelSheet->toArray();
          $sheetCount = count($spreadSheetAry);
          // echo $sheetCount;
          for ($i = 1; $i < $sheetCount; $i++) {
              
              if (isset($spreadSheetAry[$i][0])) {
                  // $name = mysqli_real_escape_string($conn, $spreadSheetAry[$i][0]);
                  // echo "<script></script>";
                  $c2n = trim($spreadSheetAry[$i][0]);
                  // echo "<script>console.log('".$spreadSheetAry[$i][0]."')</script>";
              }
              else{
                $c2n = '';
              }
              if (isset($spreadSheetAry[$i][1])) {
                  // $description = mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
                  // echo $spreadSheetAry[$i][1];
                  // echo "<script>console.log('".$spreadSheetAry[$i][1]."')</script>";
                  $c2a = trim($spreadSheetAry[$i][1]);
              }
              else{
                $c2a = '';
              }
              if (isset($spreadSheetAry[$i][2])) {
                // $description = mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
                // echo $spreadSheetAry[$i][1];
                $c2b = trim($spreadSheetAry[$i][2]);
                // echo "<script>console.log('".$spreadSheetAry[$i][2]."')</script>";
              }
              else{
                $c2b = '';
              }
                if (isset($spreadSheetAry[$i][3])) {
                  // $description = mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
                  // echo $spreadSheetAry[$i][1];
                  $c2c = trim($spreadSheetAry[$i][3]);
                  // echo "<script>console.log('".$spreadSheetAry[$i][3]."')</script>";
              }
              else{
                $c2c = '';
              }
                if (isset($spreadSheetAry[$i][4])) {
                  // $description = mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
                  // echo $spreadSheetAry[$i][1];
                  $c2d = trim($spreadSheetAry[$i][4]);
                  // echo "<script>console.log('".$spreadSheetAry[$i][4]."')</script>";
              }
              else{
                $c2d = '';
              }
                if (isset($spreadSheetAry[$i][5])) {
                  // $description = mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
                  // echo $spreadSheetAry[$i][1];
                  $c2e = trim($spreadSheetAry[$i][5]);
                  // echo "<script>console.log('".$spreadSheetAry[$i][5]."')</script>";
              }
              else{
                $c2e = '';
              }
                if (isset($spreadSheetAry[$i][6])) {
                  // $description = mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
                  // echo $spreadSheetAry[$i][1];
                  $c2f = trim($spreadSheetAry[$i][6]);
                  // echo "<script>console.log('".$spreadSheetAry[$i][6]."')</script>";
              }
              else{
                $c2f = '';
              }
                if (isset($spreadSheetAry[$i][7])) {
                  // $description = mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
                  // echo $spreadSheetAry[$i][1];
                  $c2g = trim($spreadSheetAry[$i][7]);
                  // echo "<script>console.log('".$spreadSheetAry[$i][7]."')</script>";
                }
                else{
                  $c2g = '';
                }
                if (isset($spreadSheetAry[$i][8])) {
                  // $description = mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
                  // echo $spreadSheetAry[$i][1];
                  $c2h = trim($spreadSheetAry[$i][8]);
                  // echo "<script>console.log('".$spreadSheetAry[$i][8]."')</script>";
                }
                else{
                  $c2h = '';
                }
                if (isset($spreadSheetAry[$i][9])) {
                  // $description = mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
                  // echo $spreadSheetAry[$i][1];
                  $c2i = trim($spreadSheetAry[$i][9]);
                  // echo "<script>console.log('".$spreadSheetAry[$i][9]."')</script>";
                }
                else{
                  $c2i = '';
                }
                if (isset($spreadSheetAry[$i][10])) {
                  // $description = mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
                  // echo $spreadSheetAry[$i][1];
                  $c2j = trim($spreadSheetAry[$i][10]);
                  // echo "<script>console.log('".$spreadSheetAry[$i][10]."')</script>";
                }
                else{
                  $c2j = '';
                }
                if (isset($spreadSheetAry[$i][11])) {
                  // $description = mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
                  // echo $spreadSheetAry[$i][1];
                  $c2k = trim($spreadSheetAry[$i][11]);
                  // echo "<script>console.log('".$spreadSheetAry[$i][11]."')</script>";
                }
                else{
                  $c2k = '';
                }
                if (isset($spreadSheetAry[$i][12])) {
                  // $description = mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
                  // echo $spreadSheetAry[$i][1];
                  $c2l = trim($spreadSheetAry[$i][12]);
                  // echo "<script>console.log('".$spreadSheetAry[$i][12]."')</script>";
                }
                else{
                  $c2l = '';
                }
                $sql = "SELECT idbyadmin FROM properties WHERE idbyadmin = '$c2n' and project_id = '$id'";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                $sql = "UPDATE properties SET price='$c2a',Beds='$c2b',Baths='$c2c',Cars='$c2d',Car_lots='$c2e',Storage_lots='$c2f',level1='$c2g',aspect='$c2h',totalarea='$c2i',internalarea='$c2j',externalarea='$c2k',status1='$c2l' WHERE idbyadmin = '$c2n' and project_id = '$id'";
                
                if ($conn->query($sql) === TRUE) {
                  echo "<script>
                  Swal.fire({
                    icon: 'success',
                    title: 'Done...',
                    text: '".$sheetCount." Properties have been added successfully!',
                    allowOutsideClick: false
                  })
                  $( 'button.swal2-confirm' ).click(function() {
                    location.reload();
                  });
                  </script>";
                }
                  }
                }
                else{
                $sql = "INSERT INTO properties (project_id, idbyadmin, price, Beds,Baths,Cars,Car_lots,Storage_lots,level1,aspect,totalarea,internalarea,externalarea,status1)
                VALUES ('$id', '$c2n', '$c2a', '$c2b', '$c2c', '$c2d', '$c2e', '$c2f', '$c2g', '$c2h', '$c2i', '$c2j', '$c2k', '$c2l')";
                
                if ($conn->query($sql) === TRUE) {
                  echo "<script>
                  Swal.fire({
                    icon: 'success',
                    title: 'Done...',
                    text: '".$sheetCount." Properties have been added successfully!',
                    allowOutsideClick: false
                  })
                  $( 'button.swal2-confirm' ).click(function() {
                    location.reload();
                  });
                  </script>";
                    }
                }
                  // if (!$conn -> query($sql)) {
                  //   echo("Error description: " . $conn -> error);
                  // }
                
          //     if (! empty($name) || ! empty($description)) {
          //         $query = "insert into tbl_info(name,description) values(?,?)";
          //         $paramType = "ss";
          //         $paramArray = array(
          //             $name,
          //             $description
          //         );
          //         $insertId = $db->insert($query, $paramType, $paramArray);
          //         // $query = "insert into tbl_info(name,description) values('" . $name . "','" . $description . "')";
          //         // $result = mysqli_query($conn, $query);

          //         if (! empty($insertId)) {
          //             $type = "success";
          //             $message = "Excel Data Imported into the Database";
          //         } else {
          //             $type = "error";
          //             $message = "Problem in Importing Excel Data";
          //         }
          //     }
          }
      } else {
          $type = "error";
          $message = "Invalid File Type. Upload Excel File.";
      }
}


//add new property
if(isset($_POST['addnewproperty'])){
  $project_id = $_POST['addnewproperty'];

  $propertyidbyadmin = $_POST['propertyidbyadmin'];
  $price = $_POST['price'];
  $beds = $_POST['beds'];
  $baths = $_POST['baths'];
  $cars = $_POST['cars'];
  $car_lots = $_POST['car_lots'];
  $storage_lots = $_POST['storage_lots'];
  $level1 = $_POST['level1'];
  $aspect = $_POST['aspect'];
  $total_area = $_POST['total_area'];
  $internal_area = $_POST['internal_area'];
  $external_area = $_POST['external_area'];
  $status1 = $_POST['status1'];
  
  $sql = "INSERT INTO properties (project_id, idbyadmin, price, Beds,Baths,Cars,Car_lots,Storage_lots,level1,aspect,totalarea,internalarea,externalarea,status1)
  VALUES ('$project_id', '$propertyidbyadmin', '$price', '$beds', '$baths', '$cars', '$car_lots', '$storage_lots', '$level1', '$aspect', '$total_area', '$internal_area', '$external_area', '$status1')";
  
  if ($conn->query($sql) === TRUE) {
    echo "<script>
    Swal.fire({
      icon: 'success',
      title: 'Done...',
      text: 'New Property has been added successfully!',
      allowOutsideClick: false
    })
    $( 'button.swal2-confirm' ).click(function() {
      location.reload();
    });
    </script>";

  }

  // echo "<script>alert('".$project_id."')</script>";
}


//delete property
if(isset($_POST['x6'])){
  $x6 = $_POST['x6'];
  // echo "<script>alert('".$x6."')</script>";
  $sql = "INSERT INTO properties_archived (id, project_id, idbyadmin, price, Beds,Baths,Cars,Car_lots,Storage_lots,level1,aspect,totalarea,internalarea,externalarea,status1)
  SELECT * FROM properties where id = '$x6'";

  if ($conn->query($sql) === TRUE) {
    $sql = "DELETE FROM properties WHERE id='$x6'";

    if ($conn->query($sql) === TRUE) {
      echo "<script>
      Swal.fire({
        icon: 'success',
        title: 'Done...',
        text: 'Property has been deleted successfully!',
        allowOutsideClick: false
      })
      $( 'button.swal2-confirm' ).click(function() {
        location.reload();
      });
      </script>";
    }
  }
  // if (!$conn -> query($sql)) {
  //   echo("Error description: " . $conn -> error);
  // }

}


//recover property
if(isset($_POST['x7'])){
  $x7 = $_POST['x7'];
  // echo "<script>alert('asdasd')</script>";
  $sql = "INSERT INTO properties (id, project_id, idbyadmin, price, Beds,Baths,Cars,Car_lots,Storage_lots,level1,aspect,totalarea,internalarea,externalarea,status1)
  SELECT id, project_id, idbyadmin, price, Beds,Baths,Cars,Car_lots,Storage_lots,level1,aspect,totalarea,internalarea,externalarea,status1 FROM properties_archived where id = '$x7'";

  if ($conn->query($sql) === TRUE) {
    $sql = "DELETE FROM properties_archived WHERE id='$x7'";

    if ($conn->query($sql) === TRUE) {
      echo "<script>
      Swal.fire({
        icon: 'success',
        title: 'Done...',
        text: 'Property has been recovered successfully!',
        allowOutsideClick: false
      })
      $( 'button.swal2-confirm' ).click(function() {
        location.reload();
      });
      </script>";
    }
  }
  // if (!$conn -> query($sql)) {
  //   echo("Error description: " . $conn -> error);
  // }

}


//edit property
if(isset($_POST['editproperty'])){
  $idofproperty = $_POST['editproperty'];
  $idbyadmin = $_POST['idbyadmin'];
  $price = $_POST[ 'price'];
  $Beds = $_POST[ 'Beds'];
  $Baths = $_POST[ 'Baths'];
  $Cars = $_POST[ 'Cars'];
  $Car_lots = $_POST[ 'Car_lots'];
  $Storage_lots = $_POST[ 'Storage_lots'];
  $level1 = $_POST[ 'level1'];
  $aspect = $_POST[ 'aspect'];
  $totalarea = $_POST[ 'totalarea'];
  $internalarea = $_POST[ 'internalarea'];
  $externalarea = $_POST[ 'externalarea'];
//   $status1 = $_POST[ 'status'];
//   $etsdf = 0;
//   $sql45 = "SELECT * FROM property_reserved_by WHERE property_id='$idofproperty'";
//   $result45 = $conn->query($sql45);
//   if ($result45->num_rows > 0) {
//   // output data of each row
//   while($row45 = $result45->fetch_assoc()) {
//   $soldby = $row45['reserved_by'];
//     }
//   }
//   else{
//     $etsdf++; 
//   }
//   if($status1 == "Reserved"){
//   $etsdf++;
//     if ($result45->num_rows > 0) {
//     // output data of each row
//     echo "<script>
//     Swal.fire({
//       icon: 'error',
//       title: 'Not Done',
//       text: 'Property has already been reserved!',
//       allowOutsideClick: false
//     })
//     $( 'button.swal2-confirm' ).click(function() {
//       location.reload();
//     });
//     </script>";
//     }else{
//       echo "<script>
//       Swal.fire({
//         icon: 'error',
//         title: 'Not Done',
//         text: 'You being admin cannot reserve the property!',
//         allowOutsideClick: false
//       })
//       $( 'button.swal2-confirm' ).click(function() {
//         location.reload();
//       });
//       </script>";
//     }
//     }
    
//     if($etsdf == 0){

    // echo "<script>console.log('".$idofproperty."')</script>";
    // echo "<script>console.log('".$idbyadmin."')</script>";
    // echo "<script>console.log('".$price."')</script>";
    // echo "<script>console.log('".$Beds."')</script>";
    // echo "<script>console.log('".$Baths."')</script>";
    // echo "<script>console.log('".$Cars."')</script>";
    // echo "<script>console.log('".$Car_lots."')</script>";
    // echo "<script>console.log('".$Storage_lots."')</script>";
    // echo "<script>console.log('".$level1."')</script>";
    // echo "<script>console.log('".$aspect."')</script>";
    // echo "<script>console.log('".$totalarea."')</script>";
    // echo "<script>console.log('".$internalarea."')</script>";
    // echo "<script>console.log('".$externalarea."')</script>";
    // echo "<script>console.log('".$status1."')</script>";
    $sql = "UPDATE properties SET idbyadmin='$idbyadmin',price='$price',Beds='$Beds',Baths='$Baths',Cars='$Cars',Car_lots='$Car_lots',Storage_lots='$Storage_lots',level1='$level1',aspect='$aspect',totalarea='$totalarea',internalarea='$internalarea',externalarea='$externalarea' where id = '$idofproperty'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
         Swal.fire({
           icon: 'success',
           title: 'Done...',
           text: 'Property has been updated successfully!',
           allowOutsideClick: false
         })
         $( 'button.swal2-confirm' ).click(function() {
           location.reload();
         });
         </script>";
    //   if($status1 == "Sold"){
    //         $sql21 = "INSERT INTO property_sold_by (sold_by, property_id)
    //         VALUES ('$soldby', '$idofproperty')";
    
    //         if ($conn->query($sql21) === TRUE) {
    //           $sql = "DELETE FROM property_reserved_by WHERE property_id='$idofproperty'";
    //           if ($conn->query($sql) === TRUE) {
    //           }
    //           echo "<script>
    //           Swal.fire({
    //             icon: 'success',
    //             title: 'Done...',
    //             text: 'Property has been updated successfully (Sold)!',
    //             allowOutsideClick: false
    //           })
    //           $( 'button.swal2-confirm' ).click(function() {
    //             location.reload();
    //           });
    //           </script>";
    //     }
    // }
    //   elseif($status1 == "Available"){
    //     $sql = "DELETE FROM property_reserved_by WHERE property_id='$idofproperty'";
    //     if ($conn->query($sql) === TRUE) {
    //       $sql321 = "INSERT INTO cancelled (emplyeename, idofproperty)
    //         VALUES ('$soldby', '$idofproperty')";

    //         if ($conn->query($sql321) === TRUE) {
    //           echo "<script>
    //           Swal.fire({
    //             icon: 'success',
    //             title: 'Done...',
    //             text: 'Property has been updated successfully!',
    //             allowOutsideClick: false
    //           })
    //           $( 'button.swal2-confirm' ).click(function() {
    //             location.reload();
    //           });
    //           </script>";
    //         }
    //           // if (!$conn -> query($sql321)) {
    //           //   echo("Error description: " . $conn -> error);
    //           // }
    
    //     }
    //   }
    //   elseif($status1 == "Held"){
    //     $sql = "DELETE FROM property_reserved_by WHERE property_id='$idofproperty'";
    //     if ($conn->query($sql) === TRUE) {
    //       $sql = "INSERT INTO cancelled (emplyeename, idofproperty)
    //         VALUES ('$soldby', '$idofproperty')";

    //         if ($conn->query($sql) === TRUE) {
    //           echo "<script>
    //           Swal.fire({
    //             icon: 'success',
    //             title: 'Done...',
    //             text: 'Property has been updated successfully!',
    //             allowOutsideClick: false
    //           })
    //           $( 'button.swal2-confirm' ).click(function() {
    //             location.reload();
    //           });
    //           </script>";
    //         }    
    //     }
    //   }
    //   elseif($status1 == "Contracted"){
    //     $sql = "DELETE FROM property_reserved_by WHERE property_id='$idofproperty'";
    //     if ($conn->query($sql) === TRUE) {
    //       $sql = "INSERT INTO cancelled (emplyeename, idofproperty)
    //         VALUES ('$soldby', '$idofproperty')";

    //         if ($conn->query($sql) === TRUE) {
    //           echo "<script>
    //           Swal.fire({
    //             icon: 'success',
    //             title: 'Done...',
    //             text: 'Property has been updated successfully!',
    //             allowOutsideClick: false
    //           })
    //           $( 'button.swal2-confirm' ).click(function() {
    //             location.reload();
    //           });
    //           </script>";
    //         }    
    //     }
    //   }
    //   elseif($status1 == "Settled"){
    //     $sql = "DELETE FROM property_reserved_by WHERE property_id='$idofproperty'";
    //     if ($conn->query($sql) === TRUE) {
    //       $sql = "INSERT INTO cancelled (emplyeename, idofproperty)
    //         VALUES ('$soldby', '$idofproperty')";

    //         if ($conn->query($sql) === TRUE) {
    //           echo "<script>
    //           Swal.fire({
    //             icon: 'success',
    //             title: 'Done...',
    //             text: 'Property has been updated successfully!',
    //             allowOutsideClick: false
    //           })
    //           $( 'button.swal2-confirm' ).click(function() {
    //             location.reload();
    //           });
    //           </script>";
    //         }
    //     }
    //   }
      // else{
      //   echo "<script>
      //   Swal.fire({
      //     icon: 'success',
      //     title: 'Done...',
      //     text: 'Property has been updated successfully!',
      //     allowOutsideClick: false
      //   })
      //   $( 'button.swal2-confirm' ).click(function() {
      //     location.reload();
      //   });
      //   </script>";
      // }

    }


    // }
    // else{
    //   echo "<script>
    //   Swal.fire({
    //     icon: 'error',
    //     title: 'Not Done',
    //     text: 'This property is not reserved, So this action cannot be done!',
    //     allowOutsideClick: false
    //   })
    //   $( 'button.swal2-confirm' ).click(function() {
    //     location.reload();
    //   });
    //   </script>";
    // }
  // echo "<script>alert('".$idofproperty."')</script>";
}




//edit status
if(isset($_POST['property_idqw'])){
    $idofproejctdsfop = $_POST['project_idqw'];
      $status1 = $_POST[ 'status'];
      $idofproperty = $_POST['property_idqw'];
      $reservecheck = 0;
    //   echo "<script>alert('".$idofproperty."')</script>";
  $etsdf = 0;
  $sql45 = "SELECT * FROM property_reserved_by WHERE property_id='$idofproperty'";
  $result45 = $conn->query($sql45);
  if ($result45->num_rows > 0) {
  // output data of each row
  while($row45 = $result45->fetch_assoc()) {
  $soldby = $row45['reserved_by'];
  $buyername = $row45['buyername'];
  $reservecheck = 1;
    }
  }
  // else{
  //   $etsdf++;
  //   if($status1 != "Reserved"){
  //       $sql = "UPDATE properties SET status1='$status1' where id = '$idofproperty'";

  //   if ($conn->query($sql) === TRUE) {
  //           echo "<script>
  //             Swal.fire({
  //               icon: 'success',
  //               title: 'Done...',
  //               text: 'Property has been updated successfully!',
  //               allowOutsideClick: false
  //             })
  //             $( 'button.swal2-confirm' ).click(function() {
  //               location.reload();
  //             });
  //             </script>";
  //   }
  //   }
  // }
  if($status1 == "Reserved"){
  $etsdf++;
    if ($result45->num_rows > 0) {
    // output data of each row
    echo "<script>
    Swal.fire({
      icon: 'error',
      title: 'Not Done',
      text: 'Property has already been reserved!',
      allowOutsideClick: false
    })
    $( 'button.swal2-confirm' ).click(function() {
      location.reload();
    });
    </script>";
    }
    else{
        echo "<script>window.location.replace('./options.php?id=".$idofproejctdsfop."&propertyid=".$idofproperty."');</script>";
    }
    }
    
    if($etsdf == 0){

    // echo "<script>console.log('".$idofproperty."')</script>";
    // echo "<script>console.log('".$idbyadmin."')</script>";
    // echo "<script>console.log('".$price."')</script>";
    // echo "<script>console.log('".$Beds."')</script>";
    // echo "<script>console.log('".$Baths."')</script>";
    // echo "<script>console.log('".$Cars."')</script>";
    // echo "<script>console.log('".$Car_lots."')</script>";
    // echo "<script>console.log('".$Storage_lots."')</script>";
    // echo "<script>console.log('".$level1."')</script>";
    // echo "<script>console.log('".$aspect."')</script>";
    // echo "<script>console.log('".$totalarea."')</script>";
    // echo "<script>console.log('".$internalarea."')</script>";
    // echo "<script>console.log('".$externalarea."')</script>";
    // echo "<script>console.log('".$status1."')</script>";
    $sql = "UPDATE properties SET status1='$status1' where id = '$idofproperty'";

    if ($conn->query($sql) === TRUE) {
      if($status1 == "Sold"){
        if($reservecheck == 1){
          $sql21 = "INSERT INTO property_sold_by (sold_by, property_id, buyer_name)
          VALUES ('$soldby', '$idofproperty', '$buyername')";
  
          if ($conn->query($sql21) === TRUE) {
            $sql = "DELETE FROM property_reserved_by WHERE property_id='$idofproperty'";
            if ($conn->query($sql) === TRUE) {
            }
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
        }
        else{
          include("./buyername_modal_when_selling.php");
        }

    }
      elseif($status1 == "Available"){
        $sql = "DELETE FROM property_reserved_by WHERE property_id='$idofproperty'";
        if ($conn->query($sql) === TRUE) {
          $sql321 = "INSERT INTO cancelled (emplyeename, idofproperty)
            VALUES ('$soldby', '$idofproperty')";

            if ($conn->query($sql321) === TRUE) {
              echo "<script>
              Swal.fire({
                icon: 'success',
                title: 'Done...',
                text: 'Property has been updated successfully!',
                allowOutsideClick: false
              })
              $( 'button.swal2-confirm' ).click(function() {
                location.reload();
              });
              </script>";
            }
              // if (!$conn -> query($sql321)) {
              //   echo("Error description: " . $conn -> error);
              // }
    
        }
      }
      elseif($status1 == "Held"){
        $sql = "DELETE FROM property_reserved_by WHERE property_id='$idofproperty'";
        if ($conn->query($sql) === TRUE) {
          $sql = "INSERT INTO cancelled (emplyeename, idofproperty)
            VALUES ('$soldby', '$idofproperty')";

            if ($conn->query($sql) === TRUE) {
              echo "<script>
              Swal.fire({
                icon: 'success',
                title: 'Done...',
                text: 'Property has been updated successfully!',
                allowOutsideClick: false
              })
              $( 'button.swal2-confirm' ).click(function() {
                location.reload();
              });
              </script>";
            }    
        }
      }
      elseif($status1 == "Contracted"){
        $sql = "DELETE FROM property_reserved_by WHERE property_id='$idofproperty'";
        if ($conn->query($sql) === TRUE) {
          $sql = "INSERT INTO cancelled (emplyeename, idofproperty)
            VALUES ('$soldby', '$idofproperty')";

            if ($conn->query($sql) === TRUE) {
              echo "<script>
              Swal.fire({
                icon: 'success',
                title: 'Done...',
                text: 'Property has been updated successfully!',
                allowOutsideClick: false
              })
              $( 'button.swal2-confirm' ).click(function() {
                location.reload();
              });
              </script>";
            }    
        }
      }
      elseif($status1 == "Settled"){
        $sql = "DELETE FROM property_reserved_by WHERE property_id='$idofproperty'";
        if ($conn->query($sql) === TRUE) {
          $sql = "INSERT INTO cancelled (emplyeename, idofproperty)
            VALUES ('$soldby', '$idofproperty')";

            if ($conn->query($sql) === TRUE) {
              echo "<script>
              Swal.fire({
                icon: 'success',
                title: 'Done...',
                text: 'Property has been updated successfully!',
                allowOutsideClick: false
              })
              $( 'button.swal2-confirm' ).click(function() {
                location.reload();
              });
              </script>";
            }
        }
      }
       else{
         echo "<script>
         Swal.fire({
           icon: 'success',
           title: 'Done...',
           text: 'Property has been updated successfully!',
           allowOutsideClick: false
         })
         $( 'button.swal2-confirm' ).click(function() {
           location.reload();
         });
         </script>";
       }

    }


    // }

  // echo "<script>alert('".$idofproperty."')</script>";
}
}




//add property details
if(isset($_POST['idofproperty'])){
  $idofproject = $_POST['idofproject'];
  $idofproperty = $_POST['idofproperty']; 
  $Advertise_as = $_POST['Advertise_as']; 
  $Match_as = $_POST['Match_as']; 
  $Balcony_Size = $_POST['Balcony_Size']; 
  $Courtyard_Size = $_POST['Courtyard_Size']; 
  $Study_Space = $_POST['Study_Space']; 
  $Ceiling_Height = $_POST['Ceiling_Height']; 
  $Council_Rate = $_POST['Council_Rate']; 
  $Water_Rate = $_POST['Water_Rate']; 
  $Stamp_Duty = $_POST['Stamp_Duty']; 
  $Owners_Corp = $_POST['Owners_Corp']; 
  $Dutiable_Value = $_POST['Dutiable_Value']; 
  $Interior_Designer = $_POST['Interior_Designer']; 
  $Landscape_Architect = $_POST['Landscape_Architect'];

  $sql = "INSERT INTO properties_details(project_id, property_id, Advertise_as, Match_as, Balcony_Size, Courtyard_Size, Study_Space, Ceiling_Height, Council_Rate, Water_Rate, Stamp_Duty, Owners_Corp, Dutiable_Value, Interior_Designer, Landscape_Architect) 
  VALUES (
    '$idofproject',
    '$idofproperty',
    '$Advertise_as',
    '$Match_as',
    '$Balcony_Size',
    '$Courtyard_Size',
    '$Study_Space',
    '$Ceiling_Height',
    '$Council_Rate',
    '$Water_Rate',
    '$Stamp_Duty',
    '$Owners_Corp',
    '$Dutiable_Value',
    '$Interior_Designer',
    '$Landscape_Architect'
  )";
  if ($conn->query($sql) === TRUE) {
    echo "<script>
    Swal.fire({
      icon: 'success',
      title: 'Done...',
      text: 'Property Details have been added successfully!',
      allowOutsideClick: false
    })
    $( 'button.swal2-confirm' ).click(function() {
      location.reload();
    });
    </script>";
  }

}


//edit property details
if(isset($_POST['idofproperty1'])){
  $idofproject = $_POST['idofproject1'];
  $idofproperty = $_POST['idofproperty1']; 
  $Advertise_as = $_POST['Advertise_as']; 
  $Match_as = $_POST['Match_as']; 
  $Balcony_Size = $_POST['Balcony_Size']; 
  $Courtyard_Size = $_POST['Courtyard_Size']; 
  $Study_Space = $_POST['Study_Space']; 
  $Ceiling_Height = $_POST['Ceiling_Height']; 
  $Council_Rate = $_POST['Council_Rate']; 
  $Water_Rate = $_POST['Water_Rate']; 
  $Stamp_Duty = $_POST['Stamp_Duty']; 
  $Owners_Corp = $_POST['Owners_Corp']; 
  $Dutiable_Value = $_POST['Dutiable_Value']; 
  $Interior_Designer = $_POST['Interior_Designer']; 
  $Landscape_Architect = $_POST['Landscape_Architect'];

  $sql = "UPDATE properties_details SET
  Advertise_as = '$Advertise_as',
  Match_as = '$Match_as',
  Balcony_Size = '$Balcony_Size',
  Courtyard_Size = '$Courtyard_Size',
  Study_Space ='$Study_Space',
  Ceiling_Height = '$Ceiling_Height',
  Council_Rate = '$Council_Rate',
  Water_Rate = '$Water_Rate',
  Stamp_Duty = '$Stamp_Duty',
  Owners_Corp = '$Owners_Corp',
  Dutiable_Value = '$Dutiable_Value',
  Interior_Designer = '$Interior_Designer',
  Landscape_Architect = '$Landscape_Architect'
  where project_id = '$idofproject' and   property_id = '$idofproperty'";
  if ($conn->query($sql) === TRUE) {
    echo "<script>
    Swal.fire({
      icon: 'success',
      title: 'Done...',
      text: 'Property Details have been updated successfully!',
      allowOutsideClick: false
    })
    $( 'button.swal2-confirm' ).click(function() {
      location.reload();
    });
    </script>";
  }
}


//show property details
if(isset($_POST['x8'])){
  $project_id = $_POST['x9'];
  $property_id = $_POST['x10'];
            $sql43 = "SELECT * FROM properties_details where property_id='$property_id' and project_id='$project_id'";
            $result43 = $conn->query($sql43);

            if ($result43->num_rows > 0) {
              // output data of each row
                $row43 = $result43->fetch_assoc();
                $Advertise_as = $row43['Advertise_as']; 
                $Match_as = $row43['Match_as']; 
                $Balcony_Size = $row43['Balcony_Size']; 
                $Courtyard_Size = $row43['Courtyard_Size']; 
                $Study_Space = $row43['Study_Space']; 
                $Ceiling_Height = $row43['Ceiling_Height']; 
                $Council_Rate = $row43['Council_Rate']; 
                $Water_Rate = $row43['Water_Rate']; 
                $Stamp_Duty = $row43['Stamp_Duty']; 
                $Owners_Corp = $row43['Owners_Corp']; 
                $Dutiable_Value = $row43['Dutiable_Value']; 
                $Interior_Designer = $row43['Interior_Designer']; 
                $Landscape_Architect = $row43['Landscape_Architect'];
                // echo "<script>alert('".$Advertise_as."')</script>";
                $sql41 = "SELECT * FROM properties where project_id = '$project_id' and id = '$property_id'";
                $result41 = $conn->query($sql41);
                $i = 0;
                if ($result41->num_rows > 0) {
                  $row41 = $result41->fetch_assoc();
                }
                $sql = "SELECT * FROM projects where id='$project_id'";
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
                  ?>
            <div class="table-responsive additional-info-table">
                <table class="table table-striped table-borderless text-start" style="table-layout: fixed">
                  <tbody>
                    <tr>
                      <td>
                        <h6 class="item-heading">Price:</h6>
                        <p class="item-details">
                          Advertise As:
                          <span class="item-details-value ms-1"><?php echo "$".number_format(intval($Advertise_as)); ?></span>
                        </p>
                      </td>
                      <td class="align-bottom">
                        <p class="item-details">
                          Match As:
                          <span class="item-details-value ms-1"><?php echo "$".number_format(intval($Match_as)); ?></span>
                        </p>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <h6 class="item-heading">Key Features:</h6>
                        <p class="item-details">
                          Internal Size:
                          <span class="item-details-value ms-1"><?php echo $row41['internalarea'];; ?></span>
                        </p>
                        <p class="item-details">
                          Courtyard Size:
                          <span class="item-details-value ms-1"><?php echo $Courtyard_Size; ?></span>
                        </p>
                        <p class="item-details">
                          Car Lot:
                          <span class="item-details-value ms-1"><?php echo $row41['Car_lots']; ?></span>
                        </p>
                        <p class="item-details">
                          Ceiling Height:
                          <span class="item-details-value ms-1"><?php echo $Ceiling_Height; ?></span>
                        </p>
                      </td>
                      <td>
                        <h6 class="item-heading">&nbsp;</h6>
                        <p class="item-details">
                          Balcony Size:
                          <span class="item-details-value ms-1"><?php echo $Balcony_Size; ?></span>
                        </p>
                        <p class="item-details">
                          Study Space:
                          <span class="item-details-value ms-1"><?php echo $Study_Space; ?></span>
                        </p>
                        <p class="item-details">
                          Storage Lot:
                          <span class="item-details-value ms-1"><?php echo $row41['Storage_lots']; ?></span>
                        </p>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <h6 class="item-heading">Fees:</h6>
                        <p class="item-details">
                          Council Rate:
                          <span class="item-details-value ms-1"><?php echo "$".number_format(intval($Council_Rate)); ?></span>
                        </p>
                        <p class="item-details">
                          Stamp Duty:
                          <span class="item-details-value ms-1"><?php echo "$".number_format(intval($Stamp_Duty)); ?></span>
                        </p>
                        <p class="item-details">
                          Dutaible Value:
                          <span class="item-details-value ms-1"><?php echo "$".number_format(intval($Dutiable_Value)); ?></span>
                        </p>
                      </td>
                      <td>
                        <h6 class="item-heading">&nbsp;</h6>
                        <p class="item-details">
                          Water Rate:
                          <span class="item-details-value ms-1"><?php echo "$".number_format(intval($Water_Rate)); ?></span>
                        </p>
                        <p class="item-details">
                          Owners Corp:
                          <span class="item-details-value ms-1"><?php echo "$".number_format(intval($Owners_Corp)); ?></span>
                        </p>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <h6 class="item-heading">Project Details:</h6>
                        <p class="item-details">
                          Developer:
                          <span class="item-details-value ms-1"><?php echo $Developer; ?></span>
                        </p>
                        <p class="item-details">
                          Builder:
                          <span class="item-details-value ms-1"><?php echo $Builder; ?></span>
                        </p>
                        <p class="item-details">
                          Architect:
                          <span class="item-details-value ms-1"><?php echo $Architect; ?></span>
                        </p>
                        <p class="item-details">
                          Interior Designer:
                          <span class="item-details-value ms-1"><?php echo $Interior_Designer; ?></span>
                        </p>
                        <p class="item-details">
                          Landscpae Architect:
                          <span class="item-details-value ms-1"><?php echo $Landscape_Architect; ?></span>
                        </p>
                        <p class="item-details">
                          Expected Completion:
                          <span class="item-details-value ms-1"><?php echo $Completion_Date; ?></span>
                        </p>
                      </td>
                      <td>
                        <h6 class="item-heading">Project Financial Details:</h6>
                        <p class="item-details">
                        Project Gross Price:
                        <span class="item-details-value ms-1"><?php echo "$".number_format(intval($Retail_Sales_Commission)); ?></span>
                        </p>
                        <p class="item-details">
                        Developer Sales Commission %:
                          <span class="item-details-value ms-1"><?php echo $Developer_Sales_Commission; ?></span>
                          
                        </p>
                        <p class="item-details">
                        Partner Sales Commission %:
                          <span class="item-details-value ms-1"><?php echo $Partner_Sales_Commission; ?></span>
                        </p>
                        <p class="item-details">
                        Offshore Commission %:
                        <span class="item-details-value ms-1"><?php echo $Offshore_Commission; ?></span>
                        </p>
                        <p class="item-details">
                       Other Offshore Commission %:
                       <span class="item-details-value ms-1"><?php echo $Other_Offshore_Commission; ?></span>
                        </p>
                        <p class="item-details">
                       Other Developer Sales Commission %:
                          <span class="item-details-value ms-1"><?php echo $Other_Developer_Sales_Commission; ?></span>
                        </p>
                        <p class="item-details">
                        Partner Sales Commission %:
                        <span class="item-details-value ms-1"><?php echo $other_Partner_Sales_Commission; ?></span>
                        </p>
                        <p class="item-details">
                        Currency:
                        <span class="item-details-value ms-1"><?php echo $Currency; ?></span>
                        </p>
                      </td>
                    </tr>
                  </tbody>
                </table>
            </div>
                  <?php
    
            }
            else{
              echo "The details of this property are not added.";
            }
  // echo "<script>alert('".$showhere."')</script>";
}


//video upload
if(isset($_POST['fileuploadcall'])){
    $idofproject = $_POST['fileuploadcall'];
    $allowedExts = array("mp4");
  $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

  if ((($_FILES["file"]["type"] == "video/mp4"))

  && ($_FILES["file"]["size"] < 20000000000)
  && in_array($extension, $allowedExts))

    {
    if ($_FILES["file"]["error"] > 0)
      {
      echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
      }
    else
      {
        $t=time();
  // echo($t );
        $targetfilenamewithoutdirectory = $t.$_FILES["file"]["name"];
        $targetfilename = '../../uploads/'.$t.$_FILES["file"]["name"];

      echo "Upload: " . $targetfilenamewithoutdirectory . "<br />";
      echo "Type: " . $_FILES["file"]["type"] . "<br />";
      echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
      // echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
      if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetfilename))
        {
          $sql = "INSERT INTO project_documents(document_name,project_id, file_type, thumbnail) 
    VALUES ('$targetfilenamewithoutdirectory', '$idofproject', 'video', 'no')";
    if ($conn->query($sql) === TRUE) {
      echo "<script>
      Swal.fire({
        icon: 'success',
        title: 'Done...',
        text: 'Uploaded and Stored!',
        allowOutsideClick: false
      })
      $( 'button.swal2-confirm' ).click(function() {
        location.reload();
      });
      </script>";
      }

          // echo " . $targetfilename;
        }
      }
    }
    else
      {
      echo "Invalid file";
      }
}


// delete video
if(isset($_POST['x11'])){
  $deleteid = $_POST['x11'];
  // echo "<script>alert('".$deleteid."')</script>";
  $sql = "DELETE FROM project_documents WHERE id='$deleteid'";

  if ($conn->query($sql) === TRUE) {
    echo "<script>
    Swal.fire({
      icon: 'success',
      title: 'Done...',
      text: 'Video has been deleted successfully!',
      allowOutsideClick: false
    })
    $( 'button.swal2-confirm' ).click(function() {
      location.reload();
    });
    </script>";
  }
}


//images upload for property
if(isset($_POST['project_id32'])){
        $project_id = $_POST['project_id32'];
        $property_id = $_POST['property_id32'];
            // echo "<script>alert('".$id."')</script>";
        extract($_POST);
        // $error=array();
        $countercheck = 0;
        // echo "sadfs";
        $extension=array("jpeg","jpg","png","gif","pdf", "xlsx", "csv");
        foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name) {
            // echo "sadfs";
            $file_name=str_replace(' ', '', $_FILES["files"]["name"][$key]);
            $file_tmp=$_FILES["files"]["tmp_name"][$key];
            $ext=pathinfo($file_name,PATHINFO_EXTENSION);
            // echo $file_name;
            if($_FILES['files']['size'][$key] >= $maxsize) {
              $errors[] = 'File too large. File must be less than 2 megabytes.';
            }
            if(in_array($ext,$extension) && count($errors) === 0) {
                if(!file_exists("../../uploads/".$file_name)) {
                    if(move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"../../uploads/".$file_name)){
                      $sql = "INSERT INTO property_documents (document_name, project_id, property_id)
                      VALUES ('$file_name', '$project_id', '$property_id')";
      
                      if ($conn->query($sql) === TRUE) {
                        $countercheck++;
                      }
                      
                      // echo $file_name;
                    }
                }
                else {
                    $filename=basename($file_name,$ext);
                    $filename=$filename.time().".".$ext;
                    $newFileName = str_replace(' ', '', $filename);
                    // echo $newFileName;
                    if(move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"../../uploads/".$newFileName)){
                      // echo "File uploaded with time function";
                      $sql = "INSERT INTO property_documents (document_name, project_id, property_id)
                      VALUES ('$newFileName', '$project_id', '$property_id')";
                      if ($conn->query($sql) === TRUE) {
                        $countercheck++;
                      }
                      // if (!$conn -> query($sql)) {
                      //   echo("Error description: " . $conn -> error);
                      // }
                                      // echo $newFileName;
                    }
                }
            }
            else {
              echo "<script>
              Swal.fire(
                  'Oops...',
                  'This is not a supported file or file size is larger than 2 MB!',
                  'error'
                )
              </script>";
                // array_push($error,"$file_name, ");
                // print_r($error);
            }
      
        }
        if($countercheck > 0){
          echo "<script>
          Swal.fire({
            icon: 'success',
            title: 'Done...',
            text: 'Documents have been uploaded!',
            allowOutsideClick: false
          })
          $( 'button.swal2-confirm' ).click(function() {
            location.reload();
          });
          </script>";
        }
          // echo "<script>alert('".$id."')</script>";
}


if(isset($_POST['x13'])){
  $project_id = $_POST['x14'];
  $property_id = $_POST['x15'];
  // echo "<script>alert('".$property_id.$project_id."')</script>";
  $sql = "SELECT * FROM property_documents where project_id = '$project_id' and property_id = '$property_id'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $imagename = $row['document_name'];
      ?>
      <div class="row my-3">
        <div class="col text-center">
          <div class="col-12 ps-3 text-center my-1 py-2 border">
            <a href="../../uploads/<?php echo $imagename ?>" target="_blank"><?php echo $imagename; ?></a>
          </div>
        </div>
        <div class="col text-center me-3 my-1 border">
          <button class="btn btn-primary" onclick="deletepropertyimage('<?php echo $imagename; ?>')">
            Delete
          </button>
        </div>
      </div>
      <script>
            function deletepropertyimage(imagenbame){
                $.ajax({
                  type: "post",
                  data: {imagenbame:imagenbame},
                  url: "controllers.php",
                  success: function (result) {
                      $("#div1251q4").html(result);
                      document.getElementById("loader1").style.visibility = "hidden";
                  }
                });
            }
      </script>
      <?php
    }
  }
}


//Floor Plans upload
if(isset($_POST['floorplan'])){
  $id = $_POST['floorplan'];
  $id = (int)$id;
      // echo "<script>alert('".$id."')</script>";
  extract($_POST);
  // $error=array();
  $countercheck = 0;
  // echo "sadfs";
  $extension=array("jpeg","jpg","png","gif","pdf", "xlsx", "csv");
  foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name) {
      // echo "sadfs";
      $file_name=str_replace(' ', '', $_FILES["files"]["name"][$key]);
      $file_tmp=$_FILES["files"]["tmp_name"][$key];
      $ext=pathinfo($file_name,PATHINFO_EXTENSION);
      // echo $file_name;
      if($_FILES['files']['size'][$key] >= $maxsize) {
        $errors[] = 'File too large. File must be less than 2 megabytes.';
      }
      if(in_array($ext,$extension) && count($errors) === 0) {
          if(!file_exists("../../photo_gallery/".$file_name)) {
              if(move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"../../photo_gallery/".$file_name)){
                $sql = "INSERT INTO project_documents (document_name, project_id, file_type, thumbnail)
                VALUES ('$file_name', '$id', 'floorPlans' ,'no')";

                if ($conn->query($sql) === TRUE) {
                  $countercheck++;
                }
                
                // echo $file_name;
              }
          }
          else {
              $filename=basename($file_name,$ext);
              $filename=$filename.time().".".$ext;
              $newFileName = str_replace(' ', '', $filename);
              // echo $newFileName;
              if(move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"../../photo_gallery/".$newFileName)){
                // echo "File uploaded with time function";
                $sql = "INSERT INTO project_documents (document_name, project_id, file_type, thumbnail)
                VALUES ('$newFileName', '$id', 'floorPlans','no')";

                if ($conn->query($sql) === TRUE) {
                  $countercheck++;
                }
                // if (!$conn -> query($sql)) {
                //   echo("Error description: " . $conn -> error);
                // }
                                // echo $newFileName;
              }
          }
      }
      else {
        echo "<script>
        Swal.fire(
            'Oops...',
            'This is not a supported file or image size is too large!',
            'error'
          )
        </script>";
          // array_push($error,"$file_name, ");
          // print_r($error);
      }

  }
  if($countercheck > 0){
    echo "<script>
    Swal.fire({
      icon: 'success',
      title: 'Done...',
      text: 'Documents have been uploaded!',
      allowOutsideClick: false
    })
    $( 'button.swal2-confirm' ).click(function() {
      location.reload();
    });
    </script>";
  }
    // echo "<script>alert('".$id."')</script>";
}



//delete documents floor plans
if(isset($_POST['x16'])){
  $id = $_POST['x16'];
  $xaa = $_POST['xaa'];
  // echo "<script>alert('".$id."')</script>";
  $sql = "DELETE FROM project_documents WHERE id='$id' and project_id = '$xaa'";

      if ($conn->query($sql) === TRUE) {
      echo "<script>
      Swal.fire({
        icon: 'success',
        title: 'Done...',
        text: 'This document has been deleted!',
        allowOutsideClick: false
      })
      $( 'button.swal2-confirm' ).click(function() {
        location.reload();
      });
      </script>";
    }
}


//Floor Plates Upload
if(isset($_POST['floorplates'])){
  $id = $_POST['floorplates'];
  $id = (int)$id;
      // echo "<script>alert('".$id."')</script>";
  extract($_POST);
  // $error=array();
  $countercheck = 0;
  // echo "sadfs";
  $extension=array("jpeg","jpg","png","gif","pdf", "xlsx", "csv");
  foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name) {
      // echo "sadfs";
      $file_name=str_replace(' ', '', $_FILES["files"]["name"][$key]);
      $file_tmp=$_FILES["files"]["tmp_name"][$key];
      $ext=pathinfo($file_name,PATHINFO_EXTENSION);
      // echo $file_name;
      if($_FILES['files']['size'][$key] >= $maxsize) {
        $errors[] = 'File too large. File must be less than 2 megabytes.';
      }
      if(in_array($ext,$extension) && count($errors) === 0) {
          if(!file_exists("../../photo_gallery/".$file_name)) {
              if(move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"../../photo_gallery/".$file_name)){
                $sql = "INSERT INTO project_documents (document_name, project_id, file_type, thumbnail)
                VALUES ('$file_name', '$id', 'floorplates' ,'no')";

                if ($conn->query($sql) === TRUE) {
                  $countercheck++;
                }
                
                // echo $file_name;
              }
          }
          else {
              $filename=basename($file_name,$ext);
              $filename=$filename.time().".".$ext;
              $newFileName = str_replace(' ', '', $filename);
              // echo $newFileName;
              if(move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"../../photo_gallery/".$newFileName)){
                // echo "File uploaded with time function";
                $sql = "INSERT INTO project_documents (document_name, project_id, file_type, thumbnail)
                VALUES ('$newFileName', '$id', 'floorplates','no')";

                if ($conn->query($sql) === TRUE) {
                  $countercheck++;
                }
                // if (!$conn -> query($sql)) {
                //   echo("Error description: " . $conn -> error);
                // }
                                // echo $newFileName;
              }
          }
      }
      else {
        echo "<script>
        Swal.fire(
            'Oops...',
            'This is not a supported file or image size is too large!',
            'error'
          )
        </script>";
          // array_push($error,"$file_name, ");
          // print_r($error);
      }

  }
  if($countercheck > 0){
    echo "<script>
    Swal.fire({
      icon: 'success',
      title: 'Done...',
      text: 'Documents have been uploaded!',
      allowOutsideClick: false
    })
    $( 'button.swal2-confirm' ).click(function() {
      location.reload();
    });
    </script>";
  }
    // echo "<script>alert('".$id."')</script>";
}


//delete documents floor plates
if(isset($_POST['x17'])){
  $id = $_POST['x17'];
  $xaa = $_POST['xaa'];
  // echo "<script>alert('".$id."')</script>";
  $sql = "DELETE FROM project_documents WHERE id='$id' and project_id = '$xaa'";

      if ($conn->query($sql) === TRUE) {
      echo "<script>
      Swal.fire({
        icon: 'success',
        title: 'Done...',
        text: 'This document has been deleted!',
        allowOutsideClick: false
      })
      $( 'button.swal2-confirm' ).click(function() {
        location.reload();
      });
      </script>";
    }
}

//mark notification as read
if(isset($_POST['x35'])){
  $x35 = $_POST['x35'];
  // echo "<script>alert('".$x35."')</script>";
  $sql = "UPDATE notification SET is_read='true' WHERE by_user = '$x35'";

  if ($conn->query($sql) === TRUE) {
    echo "<script>location.reload()</script>";
    // echo "Record updated successfully";
  }
}


//Brochure Upload
if(isset($_POST['Brochure'])){
  $id = $_POST['Brochure'];
  $id = (int)$id;
      // echo "<script>alert('".$id."')</script>";
  extract($_POST);
  // $error=array();
  $countercheck = 0;
  // echo "sadfs";
  $extension=array("jpeg","jpg","png","gif","pdf", "xlsx", "csv");
  foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name) {
      // echo "sadfs";
      $file_name=str_replace(' ', '', $_FILES["files"]["name"][$key]);
      $file_tmp=$_FILES["files"]["tmp_name"][$key];
      $ext=pathinfo($file_name,PATHINFO_EXTENSION);
      // echo $file_name;
      if($_FILES['files']['size'][$key] >= $maxsize) {
        $errors[] = 'File too large. File must be less than 2 megabytes.';
      }
      if(in_array($ext,$extension) && count($errors) === 0) {
          if(!file_exists("../../photo_gallery/".$file_name)) {
              if(move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"../../photo_gallery/".$file_name)){
                $sql = "INSERT INTO project_documents (document_name, project_id, file_type, thumbnail)
                VALUES ('$file_name', '$id', 'Brochure' ,'no')";

                if ($conn->query($sql) === TRUE) {
                  $countercheck++;
                }
                
                // echo $file_name;
              }
          }
          else {
              $filename=basename($file_name,$ext);
              $filename=$filename.time().".".$ext;
              $newFileName = str_replace(' ', '', $filename);
              // echo $newFileName;
              if(move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"../../photo_gallery/".$newFileName)){
                // echo "File uploaded with time function";
                $sql = "INSERT INTO project_documents (document_name, project_id, file_type, thumbnail)
                VALUES ('$newFileName', '$id', 'Brochure','no')";

                if ($conn->query($sql) === TRUE) {
                  $countercheck++;
                }
                // if (!$conn -> query($sql)) {
                //   echo("Error description: " . $conn -> error);
                // }
                                // echo $newFileName;
              }
          }
      }
      else {
        echo "<script>
        Swal.fire(
            'Oops...',
            'This is not a supported file or image size is too large!',
            'error'
          )
        </script>";
          // array_push($error,"$file_name, ");
          // print_r($error);
      }

  }
  if($countercheck > 0){
    echo "<script>
    Swal.fire({
      icon: 'success',
      title: 'Done...',
      text: 'Documents have been uploaded!',
      allowOutsideClick: false
    })
    $( 'button.swal2-confirm' ).click(function() {
      location.reload();
    });
    </script>";
  }
    // echo "<script>alert('".$id."')</script>";
}


//delete documents Brochure
if(isset($_POST['x18'])){
  $id = $_POST['x18'];
  $xaa = $_POST['xaa'];
  // echo "<script>alert('".$id."')</script>";
  $sql = "DELETE FROM project_documents WHERE id='$id' and project_id = '$xaa'";

      if ($conn->query($sql) === TRUE) {
      echo "<script>
      Swal.fire({
        icon: 'success',
        title: 'Done...',
        text: 'This document has been deleted!',
        allowOutsideClick: false
      })
      $( 'button.swal2-confirm' ).click(function() {
        location.reload();
      });
      </script>";
    }
}


//Brochure Upload
if(isset($_POST['Fixtures'])){
  $id = $_POST['Fixtures'];
  $id = (int)$id;
      // echo "<script>alert('".$id."')</script>";
  extract($_POST);
  // $error=array();
  $countercheck = 0;
  // echo "sadfs";
  $extension=array("jpeg","jpg","png","gif","pdf", "xlsx", "csv");
  foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name) {
      // echo "sadfs";
      $file_name=str_replace(' ', '', $_FILES["files"]["name"][$key]);
      $file_tmp=$_FILES["files"]["tmp_name"][$key];
      $ext=pathinfo($file_name,PATHINFO_EXTENSION);
      // echo $file_name;
      if($_FILES['files']['size'][$key] >= $maxsize) {
        $errors[] = 'File too large. File must be less than 2 megabytes.';
      }
      if(in_array($ext,$extension) && count($errors) === 0) {
          if(!file_exists("../../photo_gallery/".$file_name)) {
              if(move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"../../photo_gallery/".$file_name)){
                $sql = "INSERT INTO project_documents (document_name, project_id, file_type, thumbnail)
                VALUES ('$file_name', '$id', 'Fixtures' ,'no')";

                if ($conn->query($sql) === TRUE) {
                  $countercheck++;
                }
                
                // echo $file_name;
              }
          }
          else {
              $filename=basename($file_name,$ext);
              $filename=$filename.time().".".$ext;
              $newFileName = str_replace(' ', '', $filename);
              // echo $newFileName;
              if(move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"../../photo_gallery/".$newFileName)){
                // echo "File uploaded with time function";
                $sql = "INSERT INTO project_documents (document_name, project_id, file_type, thumbnail)
                VALUES ('$newFileName', '$id', 'Fixtures','no')";

                if ($conn->query($sql) === TRUE) {
                  $countercheck++;
                }
                // if (!$conn -> query($sql)) {
                //   echo("Error description: " . $conn -> error);
                // }
                                // echo $newFileName;
              }
          }
      }
      else {
        echo "<script>
        Swal.fire(
            'Oops...',
            'This is not a supported file or image size is too large!',
            'error'
          )
        </script>";
          // array_push($error,"$file_name, ");
          // print_r($error);
      }

  }
  if($countercheck > 0){
    echo "<script>
    Swal.fire({
      icon: 'success',
      title: 'Done...',
      text: 'Documents have been uploaded!',
      allowOutsideClick: false
    })
    $( 'button.swal2-confirm' ).click(function() {
      location.reload();
    });
    </script>";
  }
    // echo "<script>alert('".$id."')</script>";
}


//delete documents Fixtures
if(isset($_POST['x19'])){
  $id = $_POST['x19'];
  $xaa = $_POST['xaa'];
  // echo "<script>alert('".$id."')</script>";
  $sql = "DELETE FROM project_documents WHERE id='$id' and project_id = '$xaa'";

      if ($conn->query($sql) === TRUE) {
      echo "<script>
      Swal.fire({
        icon: 'success',
        title: 'Done...',
        text: 'This document has been deleted!',
        allowOutsideClick: false
      })
      $( 'button.swal2-confirm' ).click(function() {
        location.reload();
      });
      </script>";
    }
}


//delete agent permanently
if(isset($_POST['x20'])){
  $id = $_POST['x20'];
  // echo "<script>alert('".$id."')</script>";
  $sql = "DELETE FROM users WHERE id='$id'";

      if ($conn->query($sql) === TRUE) {
      echo "<script>
      Swal.fire({
        icon: 'success',
        title: 'Done...',
        text: 'Agent has been deleted permanently!',
        allowOutsideClick: false
      })
      $( 'button.swal2-confirm' ).click(function() {
        location.reload();
      });
      </script>";
    }
}


//floorplans upload for property
if(isset($_POST['project_id33'])){
  $project_id = $_POST['project_id33'];
  $property_id = $_POST['property_id33'];
      // echo "<script>alert('".$id."')</script>";
  extract($_POST);
  // $error=array();
  $countercheck = 0;
  // echo "sadfs";
  $extension=array("jpeg","jpg","png","gif");
  foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name) {
      // echo "sadfs";
      $file_name=str_replace(' ', '', $_FILES["files"]["name"][$key]);
      $file_tmp=$_FILES["files"]["tmp_name"][$key];
      $ext=pathinfo($file_name,PATHINFO_EXTENSION);
      // echo $file_name;
      if($_FILES['files']['size'][$key] >= $maxsize) {
        $errors[] = 'File too large. File must be less than 2 megabytes.';
      }
      if(in_array($ext,$extension) && count($errors) === 0) {
          if(!file_exists("../../uploads/".$file_name)) {
              if(move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"../../uploads/".$file_name)){
                $sql = "INSERT INTO property_floorplans (document_name, project_id, property_id)
                VALUES ('$file_name', '$project_id', '$property_id')";

                if ($conn->query($sql) === TRUE) {
                  $countercheck++;
                }
                
                // echo $file_name;
              }
          }
          else {
              $filename=basename($file_name,$ext);
              $filename=$filename.time().".".$ext;
              $newFileName = str_replace(' ', '', $filename);
              // echo $newFileName;
              if(move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"../../uploads/".$newFileName)){
                // echo "File uploaded with time function";
                $sql = "INSERT INTO property_floorplans (document_name, project_id, property_id)
                VALUES ('$newFileName', '$project_id', '$property_id')";
                if ($conn->query($sql) === TRUE) {
                  $countercheck++;
                }
                // if (!$conn -> query($sql)) {
                //   echo("Error description: " . $conn -> error);
                // }
                                // echo $newFileName;
              }
          }
      }
      else {
        echo "<script>
        Swal.fire(
            'Oops...',
            'This is not a supported file or image size is too large!',
            'error'
          )
        </script>";
          // array_push($error,"$file_name, ");
          // print_r($error);
      }

  }
  if($countercheck > 0){
    echo "<script>
    Swal.fire({
      icon: 'success',
      title: 'Done...',
      text: 'Floor Plans have been uploaded!',
      allowOutsideClick: false
    })
    $( 'button.swal2-confirm' ).click(function() {
      location.reload();
    });
    </script>";
  }
    // echo "<script>alert('".$id."')</script>";
}


//delete floorplans for property
if(isset($_POST['x40'])){
  $x40 = $_POST['x40'];
  $sql = "DELETE FROM property_floorplans WHERE document_name='$x40'";

  if ($conn->query($sql) === TRUE) {
    echo "<script>
    Swal.fire({
      icon: 'success',
      title: 'Done...',
      text: 'Document has been deleted permanently!',
      allowOutsideClick: false
    })
    $( 'button.swal2-confirm' ).click(function() {
      location.reload();
    });
    </script>";
  }
}
//delete documents of properties
if(isset($_POST['imagenbame'])){
  $imagename1 = $_POST['imagenbame'];
    // echo "<script>alert('".$imagename1."')</script>";
    $sql = "DELETE FROM property_documents WHERE document_name='$imagename1'";

    if ($conn->query($sql) === TRUE) {
      if (unlink("../../uploads/".$imagename1)) {
        echo "<script>
        Swal.fire({
          icon: 'success',
          title: 'Done...',
          text: 'Document has been deleted permanently!',
          allowOutsideClick: false
        })
        $( 'button.swal2-confirm' ).click(function() {
          location.reload();
        });
        </script>";
      }
      else{
        echo "<script>
        Swal.fire({
          icon: 'success',
          title: 'Done...',
          text: 'Document has been deleted permanently - still present in file manager!',
          allowOutsideClick: false
        })
        $( 'button.swal2-confirm' ).click(function() {
          location.reload();
        });
        </script>";

      }
    }
    else {
      echo 'There was a error deleting the file ' . $filename;
    }
}
// forgot password
if(isset($_POST['forgotpasswordemail'])){
//   echo "<script>alert('asdfasdf')</script>";
}


//filter for available properties
if(isset($_POST['x51']) && isset($_POST['x52']) ){
  $ifcondition = 1;
  // echo "<script>console.log('".$ifcondition."')</script>"; 
}
elseif(isset($_POST['x53']) && isset($_POST['x54'])){
  $ifcondition = 2;
}



//ifcondition code to write functionality in switch case
switch ($ifcondition) {
  //filter for available properties
  case 1:
    $project_id = $_POST['x51'];
    $agent_id = $_POST['x52'];
    if($project_id == "Project Title" && $agent_id != "Agent Name"){
      $filterquery = "SELECT p.*, r.*, p1.Title  FROM properties p  join property_sold_by r on r.property_id = p.id join projects p1 on p.project_id = p1.id where p.status1 = 'Sold' and r.sold_by = '$agent_id'";
      // echo "<script>console.log('project name not selected')</script>";
    }
    elseif($project_id != "Project Title" && $agent_id == "Agent Name"){
      $filterquery = "SELECT p.*, r.*, p1.Title  FROM properties p  join property_sold_by r on r.property_id = p.id join projects p1 on p.project_id = p1.id where p.status1 = 'Sold' and p.project_id = '$project_id'";
      // echo "<script>console.log('Agent name not selected')</script>";
    }
    elseif($project_id == "Project Title" && $agent_id == "Agent Name"){
      $filterquery = "SELECT p.*, r.*, p1.Title  FROM properties p  join property_sold_by r on r.property_id = p.id join projects p1 on p.project_id = p1.id where p.status1 = 'Sold'";
      // echo "<script>console.log('both not selected')</script>";
    }
    elseif($project_id != "Project Title" && $agent_id != "Agent Name"){
      $filterquery = "SELECT p.*, r.*, p1.Title  FROM properties p  join property_sold_by r on r.property_id = p.id join projects p1 on p.project_id = p1.id where p.status1 = 'Sold' and p.project_id = '$project_id' and r.sold_by = '$agent_id'";
      // echo "<script>console.log('both selected')</script>";
    }
      // echo "<script>console.log('".$project_id.$agent_id."')</script>";
    // $sql = "SELECT * FROM properties where status1 = 'Available' and project_id = '$project_id'";
    $result = $conn->query($filterquery);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $email1 = $row['sold_by'];
        ?>
        <tr>
        <td><?php echo $row['idbyadmin']; ?></td>
        <td><?php echo $row['Title']; ?></td>
        <td><?php echo "$".number_format(intval($row['price'])); ?></td>
        <td><?php echo $row['Beds']; ?></td>
        <td><?php echo $row['Baths']; ?></td>
        <td><?php echo $row['Cars']; ?></td>
        <td><?php echo $row['Car_lots']; ?></td>
        <td><?php echo $row['Storage_lots']; ?></td>
        <td><?php echo $row['level1']; ?></td>
        <td><?php echo $row['aspect']; ?></td>
        <td><?php echo $row['totalarea']; ?></td>
        <td><?php echo $row['status1']; ?></td>
        
        <?php
          $sql433 = "SELECT * FROM users where email1 = '$email1'";
          $result433 = $conn->query($sql433);

          if ($result433->num_rows > 0) {
            // output data of each row
            while($row433 = $result433->fetch_assoc()) {
              $first_name1 = $row433['firstname'];
              $lastnaem = $row433['lastname'];
              ?>
        <td><?php echo $first_name1." ".$lastnaem; ?></td>
              <?php
            }
          }
          else{
            ?>
                        <td><?php echo $email1; ?></td>
            <?php
          }
        ?>
        <td></td>
      </tr>
      <?php
          }
      }
    break;
  case 2:{
    $project_id = $_POST['x53'];
    $agent_id = $_POST['x54'];
    if($project_id == "Project Title" && $agent_id != "Agent Name"){
      $filterquery = "SELECT p.*, r.*, p1.Title  FROM properties p  join property_reserved_by r on r.property_id = p.id join projects p1 on p.project_id = p1.id where p.status1 = 'Reserved' and r.reserved_by = '$agent_id'";
      // echo "<script>console.log('project name not selected')</script>";  
    }
    elseif($project_id != "Project Title" && $agent_id == "Agent Name"){
      $filterquery = "SELECT p.*, r.*, p1.Title  FROM properties p  join property_reserved_by r on r.property_id = p.id join projects p1 on p.project_id = p1.id where p.status1 = 'Reserved' and p.project_id = '$project_id'";
      // echo "<script>console.log('Agent name not selected')</script>";
    }
    elseif($project_id == "Project Title" && $agent_id == "Agent Name"){
      $filterquery = "SELECT p.*, r.*, p1.Title  FROM properties p  join property_reserved_by r on r.property_id = p.id join projects p1 on p.project_id = p1.id where p.status1 = 'Reserved'";
      // echo "<script>console.log('both not selected')</script>";
    }
    elseif($project_id != "Project Title" && $agent_id != "Agent Name"){
      $filterquery = "SELECT p.*, r.*, p1.Title  FROM properties p  join property_reserved_by r on r.property_id = p.id join projects p1 on p.project_id = p1.id where p.status1 = 'Reserved' and p.project_id = '$project_id' and r.reserved_by = '$agent_id'";
      // echo "<script>console.log('both selected')</script>";
    }
    $result = $conn->query($filterquery);
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $email1 = $row['reserved_by'];
        ?>
        <tr>
        <td><?php echo $row['idbyadmin']; ?></td>
        <td><?php echo $row['Title']; ?></td>
        <td><?php echo "$".number_format(intval($row['price'])); ?></td>
        <td><?php echo $row['Beds']; ?></td>
        <td><?php echo $row['Baths']; ?></td>
        <td><?php echo $row['Cars']; ?></td>
        <td><?php echo $row['Car_lots']; ?></td>
        <td><?php echo $row['Storage_lots']; ?></td>
        <td><?php echo $row['level1']; ?></td>
        <td><?php echo $row['aspect']; ?></td>
        <td><?php echo $row['totalarea']; ?></td>
        <td><?php echo $row['status1']; ?></td>
        
        <?php
          $sql433 = "SELECT * FROM users where email1 = '$email1'";
          $result433 = $conn->query($sql433);

          if ($result433->num_rows > 0) {
            // output data of each row
            while($row433 = $result433->fetch_assoc()) {
              $first_name1 = $row433['firstname'];
              $lastnaem = $row433['lastname'];
              ?>
        <td><?php echo $first_name1." ".$lastnaem; ?></td>
              <?php
            }
          }
          else{
            ?>
                        <td><?php echo $email1; ?></td>
            <?php
          }
        ?>
        <td></td>
      </tr>
      <?php
          }
      }
    // echo "<script>console.log('".$project_id.$agent_id."')</script>";
  }
  default:
    # code...
    break;
}
?>