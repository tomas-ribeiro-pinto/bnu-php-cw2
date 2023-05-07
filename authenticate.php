<?php

   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");

   // If the student has already been authenticated the $_SESSION['id'] variable
   // will been assigned their student id.

   global $conn;

   // redirect to index if $_POST values not set or $_SESSION['id'] is already set
   if (!isset($_POST['txtid']) || !isset($_POST['txtpwd']) || isset($_SESSION['id'])) {
      header("Location: index.php");
	} else {
      if (validatelogin(mysqli_real_escape_string($conn, $_POST['txtid']), mysqli_real_escape_string($conn, $_POST['txtpwd'])) == true) {
         // valid
         header("Location: index.php?return=success");
      } else {
         // invalid
         unset($_SESSION['id']);
         header("Location: index.php?return=fail");
      }
	}
?>
