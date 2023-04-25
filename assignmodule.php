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
      <h2 class='text-dark mb-0'>Assign Module</h2>
   </div>
   <div class='row'>
      <div class='col-4 p-4'>";

   // If a module has been selected
   if (isset($_POST['selmodule'])) {
      $sql = "insert into studentmodules values ('" .  $_SESSION['id'] . "','" . $_POST['selmodule'] . "');";
      $result = mysqli_query($conn, $sql);
      $data['content'] .= "<p>The module " . $_POST['selmodule'] . " has been assigned to you</p></div></div></div></div></div></div>";
   }
   else  // If a module has not been selected
   {

     // Build sql statment that selects all the modules
     $sql = "select * from module";
     $result = mysqli_query($conn, $sql);

     $data['content'] .= "<form name='frmassignmodule' action='' method='post' >";
     $data['content'] .= "Select a module to assign<br/>";
     $data['content'] .= "<select class='form-control' name='selmodule' >";
     // Display the module name sin a drop down selection box
     while($row = mysqli_fetch_array($result)) {
        $data['content'] .= "<option value='$row[modulecode]'>$row[name]</option>";
     }
     $data['content'] .= "</select><br/>";
     $data['content'] .= "<input class='btn btn-dark form-control' type='submit' name='confirm' value='Save' />";
     $data['content'] .= "</form></div></div></div></div></div></div>";
   }

   // render the template
   echo template("templates/default.php", $data);

} else {
   header("Location: index.php");
}

echo template("templates/partials/footer.php");

?>
