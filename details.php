<?php

include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");


// check logged in
if (isset($_SESSION['id'])) {

   echo template("templates/partials/header.php");
   echo template("templates/partials/nav.php");

   echo "<div style='height:30em;' class='container-fluid overflow-auto'>
   <div class='d-sm-flex justify-content-between align-items-center mb-4'>
      <h2 class='text-dark mb-0'>Profile Details</h2>
   </div>
   <div class='row'>
      <div class='col-lg-6 mb-4'>";
         

   // if the form has been submitted
   if (isset($_POST['submit'])) {
      
      // build an sql statment to update the student details
      $sql = "update student set firstname ='" . mysqli_real_escape_string($conn, $_POST['txtfirstname']) . "',";
      $sql .= "lastname ='" . mysqli_real_escape_string($conn, $_POST['txtlastname'])  . "',";
      $sql .= "house ='" . mysqli_real_escape_string($conn, $_POST['txthouse'])  . "',";
      $sql .= "town ='" . mysqli_real_escape_string($conn, $_POST['txttown'])  . "',";
      $sql .= "county ='" . mysqli_real_escape_string($conn, $_POST['txtcounty'])  . "',";
      $sql .= "country ='" . mysqli_real_escape_string($conn, $_POST['txtcountry'])  . "',";
      $sql .= "postcode ='" . mysqli_real_escape_string($conn, $_POST['txtpostcode'])  . "',";
      $sql .= "photo = NULL ";
      $sql .= "where studentid = '" . $_SESSION['id'] . "';";
      $result = mysqli_query($conn,$sql);

      if(!empty($_FILES['photo']['tmp_name']))
      {
         $photo = $_FILES["photo"]["tmp_name"]; 
         $imagedata = addslashes(fread(fopen($photo, "r"), filesize($photo)));
         $sql1 = "update student set photo = '" . $imagedata ."' where studentid = '" . $_SESSION['id'] . "';";
         $result = mysqli_query($conn,$sql1);
      }

      $data['content'] = "<p>Your details have been updated</p></div></div></div></div></div></div>";
   }
   else {
      // Build a SQL statment to return the student record with the id that
      // matches that of the session variable.
      $sql = "select * from student where studentid='". $_SESSION['id'] . "';";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result);

      if(!empty($row['photo']))
         echo "<img src='templates/getjpg.php?id=" . $_SESSION['id'] . "' height='150'</td>";

      // using <<<EOD notation to allow building of a multi-line string
      // see http://stackoverflow.com/questions/6924193/what-is-the-use-of-eod-in-php for info
      // also http://stackoverflow.com/questions/8280360/formatting-an-array-value-inside-a-heredoc
      $data['content'] = <<<EOD
   
   <form name="frmdetails" enctype="multipart/form-data" action="" method="post">
   <label for="photo" class="form-label mt-2">Student Picture</label>
   <input class="form-control" type="file" name="photo" accept="image/jpeg"/>
   <label for="txtfirstname" class="form-label mt-2">First Name</label>
   <input class="form-control" name="txtfirstname" type="text" value="{$row['firstname']}" disabled/>
   <label for="txtlastname" class="form-label mt-2">Surname</label>
   <input class="form-control" name="txtlastname" type="text"  value="{$row['lastname']}" disabled/>
   <label for="txthouse" class="form-label mt-2">Street</label>
   <input class="form-control" name="txthouse" type="text"  value="{$row['house']}" required/>
   <label for="txttown" class="form-label mt-2">Town</label>
   <input class="form-control" name="txttown" type="text"  value="{$row['town']}" required/>
   <label for="txtcounty" class="form-label mt-2">County</label>
   <input class="form-control" name="txtcounty" type="text"  value="{$row['county']}" required/>
   <label for="txtcountry" class="form-label mt-2">Country</label>
   <input class="form-control" name="txtcountry" type="text"  value="{$row['country']}" required/>
   <label for="txtpostcode" class="form-label mt-2">Postcode</label>
   <input class="form-control" name="txtpostcode" type="text"  value="{$row['postcode']}" required/><br/>
   <input class="btn btn-warning float-right" type="submit" value="Save Details" name="submit"/>
   </form>
   </div></div></div></div></div></div>

EOD;

   }

   // render the template
   echo template("templates/default.php", $data);

} else {
   header("Location: index.php");
}

echo template("templates/partials/footer.php");

?>
