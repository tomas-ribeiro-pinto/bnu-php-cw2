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
               <h2 class='text-dark mb-0'>Dashboard</h2>
            </div>
            <div class='row'>
               <div class='col-lg-6 mb-4'>
                  <div class='card shadow mb-4'>
                        <div class='card-header py-3'>
                           <h6 class='text-dark fw-bold m-0'>My Modules</h6>
                        </div>";

      // Build SQL statment that selects a student's modules
      $sql = "select * from studentmodules sm, module m where m.modulecode = sm.modulecode and sm.studentid = '" . $_SESSION['id'] ."';";

      $result = mysqli_query($conn,$sql);

      // prepare page content
      $data['content'] .= "<div class='card-body'>";
      // Display the modules within the html table
      while($row = mysqli_fetch_array($result)) {
         $data['content'] .= "<h4 class='small fw-bold'>$row[modulecode] - $row[name]<span class='text-bg-warning float-end'>Level $row[level]</span></h4>";
      }
      if(mysqli_num_rows($result) == 0)
      {
         $data['content'] .= "<h4 class='small fw-bold text-danger'>No Modules Assigned</h4>";
      }
      $data['content'] .= "</table>";

      // render the template
      echo template("templates/default.php", $data);

   } else {
      header("Location: index.php");
   }

   echo "</div></div></div></div></div></div></div></div>";

   echo template("templates/partials/footer.php");

?>
