<div style="background:url('img/bg.jpg');background-size: cover;background-repeat: no-repeat;">
   <div class="row h-100 d-flex align-items-center justify-content-center">
      <div>
         <div class="col-lg-5 col-md-5 col-sm-5 p-3 m-auto text-center text-light bg-dark rounded">
            <h1>Register</h1>
            <p style="font-size: 1.5em;">Student Centre</p>
         </div>
         <div class="row d-flex justify-content-center">
            <div class="col-lg-5 col-md-5 col-sm-5">
               <div class="card mb-5">
                  <div style="height:30em;" class="card-body d-flex flex-column align-items-center overflow-auto">
                     <form name="frmRegister" enctype="multipart/form-data" action="add_student.php" method="post">
                        Student Picture :
                        <input type="file" name="photo" accept="image/jpeg" class="form-control" required/>
                        Student ID:
                        <input class="form-control" name="id" type="text" />
                        First Name:
                        <input class="form-control" name="fname" type="text" />
                        Last Name:
                        <input class="form-control" name="lname" type="text" />
                        Date of Birth:
                        <input class="form-control" name="dob" type="date" />
                        <br/>
                        Address:
                        House:
                        <input class="form-control" name="house" type="txt" />
                        Town:
                        <input class="form-control" name="town" type="txt" />
                        County:
                        <input class="form-control" name="county" type="txt" />
                        Country:
                        <input class="form-control" name="country" type="txt" />
                        Postcode:
                        <input class="form-control" name="postcode" type="txt" />
                        <br/>
                        Password:
                        <input class="form-control" name="pwd" type="password" />
                        <br/>
                        <div class="d-flex">
                           <a class="btn btn-danger w-100 m-2" href="index.php">Cancel</a>
                           <button class="btn btn-dark w-100 m-2" type="submit" name="submit">Register</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
