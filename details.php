<?php

include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");


// check logged in
if (isset($_SESSION['id'])) {

   echo template("templates/partials/header.php");
   echo template("templates/partials/nav.php");

   echo "<div class='container-fluid'>
   <div class='d-sm-flex justify-content-between align-items-center mb-4'>
      <h2 class='text-dark mb-0'>Profile Details</h2>
   </div>
   <div class='row'>
      <div style='height:30em;' class='col-lg-6 mb-4 overflow-auto'>";
         

   // if the form has been submitted
   if (isset($_POST['submit'])) {
      
      // build an sql statment to update the student details
      $sql = "update student set firstname ='" . $_POST['txtfirstname'] . "',";
      $sql .= "lastname ='" . $_POST['txtlastname']  . "',";
      $sql .= "house ='" . $_POST['txthouse']  . "',";
      $sql .= "town ='" . $_POST['txttown']  . "',";
      $sql .= "county ='" . $_POST['txtcounty']  . "',";
      $sql .= "country ='" . $_POST['txtcountry']  . "',";
      $sql .= "postcode ='" . $_POST['txtpostcode']  . "',";
      $sql .= "photo = NULL ";
      $sql .= "where studentid = '" . $_SESSION['id'] . "';";
      $result = mysqli_query($conn,$sql);

      if(!empty($_FILES['photo']['tmp_name']))
      {
         $photo = $_FILES["photo"]["tmp_name"]; 
         $imagedata = addslashes(fread(fopen($photo, "r"), filesize($photo)));
         $sql .= "update student set photo = '" . $imagedata ."' where studentid = '" . $_SESSION['id'] . "';";
         $result = mysqli_query($conn,$sql);
      }

      $data['content'] = "<p>Your details have been updated</p>";
   }
   else {
      // Build a SQL statment to return the student record with the id that
      // matches that of the session variable.
      $sql = "select * from student where studentid='". $_SESSION['id'] . "';";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result);

      if(!empty($row['photo']))
         echo "<img src='templates/getjpg.php' height='150'</td>";

      // using <<<EOD notation to allow building of a multi-line string
      // see http://stackoverflow.com/questions/6924193/what-is-the-use-of-eod-in-php for info
      // also http://stackoverflow.com/questions/8280360/formatting-an-array-value-inside-a-heredoc
      $data['content'] = <<<EOD
   
   <form name="frmdetails" enctype="multipart/form-data" action="" method="post">
   <label for="photo" class="form-label mt-2">Student Picture</label>
   <input class="form-control" type="file" name="photo" accept="image/jpeg"/>
   <label for="txtfirstname" class="form-label mt-2">First Name</label>
   <input class="form-control" name="txtfirstname" type="text" value="{$row['firstname']}" />
   <label for="txtlastname" class="form-label mt-2">Surname</label>
   <input class="form-control" name="txtlastname" type="text"  value="{$row['lastname']}" />
   <label for="txthouse" class="form-label mt-2">Street</label>
   <input class="form-control" name="txthouse" type="text"  value="{$row['house']}" />
   <label for="txttown" class="form-label mt-2">Town</label>
   <input class="form-control" name="txttown" type="text"  value="{$row['town']}" />
   <label for="txtcounty" class="form-label mt-2">County</label>
   <input class="form-control" name="txtcounty" type="text"  value="{$row['county']}" />
   <label for="txtcountry" class="form-label mt-2">Country</label>
   <input class="form-control" name="txtcountry" type="text"  value="{$row['country']}" />
   <label for="txtpostcode" class="form-label mt-2">Postcode</label>
   <input class="form-control" name="txtpostcode" type="text"  value="{$row['postcode']}" /><br/>
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
