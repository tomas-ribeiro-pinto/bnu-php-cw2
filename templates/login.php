<?php echo $message; ?>

<div class="row h-100 d-flex align-items-center justify-content-center">
   <div>
      <div class="col-3 p-3 m-auto text-center bg-dark">
         <h1 class="text-white">Login to Student Centre</h1>
      </div>
      <div class="col-3 p-3 m-auto bg-warning">
      <form name="frmLogin" action="authenticate.php" method="post">
         Student ID:
         <input class="form-control" name="txtid" type="text" />
         <br/>
         Password:
         <input class="form-control" name="txtpwd" type="password" />
         <br/>
         <div class="">
            <button class="btn btn-dark w-100" type="submit" name="btnlogin">Login</button>
         </div>
      </form>
   </div>
   </div>
</div>
