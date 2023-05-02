<div style="background:url('img/bg.jpg');background-size: cover;background-repeat: no-repeat;">
   <div class="row h-100 d-flex align-items-center justify-content-center">
      <div>
         <div class="col-lg-3 col-md-5 col-sm-5 p-3 m-auto text-center text-light bg-dark rounded">
            <h1>Login</h1>
            <p style="font-size: 1.5em;">Student Centre</p>
         </div>
         <div class="row d-flex justify-content-center">
            <div class="col-lg-3 col-md-5 col-sm-5">
               <div class="card mb-5">
                  <div class="card-body d-flex flex-column align-items-center">
                     <div class="border rounded-circle p-2 border-dark my-3"><svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-person">
                              <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"></path>
                        </svg></div>
                     <form name="frmLogin" action="authenticate.php" method="post">
                        <?php echo $message ?>
                        <div class="mb-3"><input class="form-control" type="text" name="txtid" placeholder="Student ID" required></div>
                        <div class="mb-3"><input class="form-control" type="password" name="txtpwd" placeholder="Password" required></div>
                        <div class="mb-3"><button class="btn btn-dark w-100" type="submit" name="btnlogin">Login</button></div>
                        <div class="mb-3 text-center"><a href="addstudent.php">Register</a></div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
