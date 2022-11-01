<?php
session_start();

?>



<!--=================================== PHP START============================ -->
<!--===   php code for registration form  start === -->

<?php
$conection=mysqli_connect("localhost","root","","demo");
if(isset($_POST["data"]))
{
  $name=mysqli_real_escape_string($conection,$_POST["username"]);
  $Email=mysqli_real_escape_string($conection,$_POST["email"]);
  $phone=mysqli_real_escape_string($conection,$_POST["phone"]);
  $cpass=mysqli_real_escape_string($conection,$_POST["Cpass"]);
  $rpass=mysqli_real_escape_string($conection,$_POST["Rpass"]);
  $gender=mysqli_real_escape_string($conection,$_POST["gender"]);
  $dob=mysqli_real_escape_string($conection,$_POST["dob"]);
  $CRpass=password_hash($cpass,PASSWORD_BCRYPT);
  $REpass=password_hash($rpass,PASSWORD_BCRYPT);

// <============================== image upload query ==============================.>
    $IMAGES=$_FILES["pics"]["name"];
    echo  $IMAGES;
    $tmp_name=$_FILES["pics"]["tmp_name"];
    $path="Ipisc/".$IMAGES;
   $UPLOAD= move_uploaded_file($tmp_name, $path);
// <============================== image upload query ==============================.>

$Address=$_POST["ADD"];
$HOBB=$_POST["hobb"];
$Newhobb=implode(",",$HOBB);
$City=$_POST["Ycity"];

  $emailquery="select * from registration where Email='$Email'";
  $query=mysqli_query($conection,$emailquery);
  $emailcount=mysqli_num_rows($query);
  if($emailcount>0)
      {
        ?>
              <script>
              alert("email already exists");
              </script>
            <?php
      }
  else{
        if($cpass===$rpass)
        {

            $insertQuery="INSERT INTO registration(Name,Email,Phone,cepass,repass,Gender,DOB,HOBBY,CITY,ADDRESS,file_pisc) VALUE('$name','$Email','$phone','$CRpass','$REpass','$gender','$dob','$Newhobb','$City','$Address','$IMAGES')";
          $iquery=mysqli_query($conection,$insertQuery);
            if($iquery)
            {
              ?>
              <script>
              alert("connection successful");
              </script>
            <?php
            }
            else
            {
              ?>
              <script>
              alert("connection not successful");
              </script>
            <?php
            }
        }
        else
        {
          ?>
              <script>
              alert("password are not matching");
              </script>
            <?php
          
        }

      } 
}
?>
<!--===   php code for registration form  End === -->
<!--===   php code for Login into a website  start === -->


<?php
$conection=mysqli_connect("localhost","root","","demo");
if(isset($_POST["submit"])){

  $email=$_POST["Email"];
  $password=$_POST["password"];

  $email_search="select * from registration where Email='$email'";
  $equery=mysqli_query($conection,$email_search);
  $email_count=mysqli_num_rows($equery);

  if($email_count)
  {
    $email_pass=mysqli_fetch_assoc($equery);
    
    $db_pass=$email_pass["cepass"];

    $_SESSION['username']=$email_pass['Name'];

    $pass_decode=password_verify( $password,$db_pass);

        if($pass_decode){
          echo"login successful";
          ?>
          <script>
            location.replace("Home.php");
          </script>
          <?php
        }else{
          echo"password Incorrect";
        }
  }     
  else
  {
       echo"Invalid Email";
  }

  

}
?>
<!--===   php code for Login into a website  End === -->

<!--============================= html start===================================== -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>

   
    <?php include 'link/link.php'   ?>
       <?php include 'res.php'   ?>

</head>
<body>
  <!-- start navigation bar -->
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">

   <div class="container"> 
      <a class="navbar-brand" href="#">Manohar</a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#abc">
        <span class="navbar-toggle-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="abc">
        <ul class="navbar-nav text-center ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Active</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <!-- dropdown list start -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Link</a>
            <ul class="dropdown-menu">
              <li class="dropdown-header">line one</li>
              <li><a href="#" class="dropdown-item">about us</a></li>
              <li><a href="#" class="dropdown-item">addition</a></li>
              <li><a href="#" class="dropdown-item">new</a></li>
            </ul>
          </li>
          <!-- dropdown list end -->
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
        </ul>
      </div> 
     </div>
  </nav>  
   <!-- end navigation bar  -->
   <!-- start carousel sliding image  -->

   <div id="myslide" class="carousel slide" data-ride="carousel">

    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images.jpg" alt="...">
        <div class="carousel-caption">
          <h5>First slide label</h5>
          <p>Some representative placeholder content for the first slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images (1).jpg" alt="...">
        <div class="carousel-caption">
          <h5>Second slide label</h5>
          <p>Some representative placeholder content for the second slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images (2).jpg" alt="...">
        <div class="carousel-caption">
          <h5>Third slide label</h5>
          <p>Some representative placeholder content for the third slide.</p>
        </div>
      </div>
    </div>
    <ul class="carousel-indicators">
      <li data-target="#myslide" data-slide-to="0" class="active"></li>
      <li data-target="#myslide" data-slide-to="1" class=""></li>
      <li data-target="#myslide" data-slide-to="2" class=""></li>
    </ul>
    <a href="#myslide" data-slide="prev" class="carousel-control-prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a href="#myslide" data-slide="next" class="carousel-control-next">
      <span class="carousel-control-next-icon"></span>
    </a>
  </div> 
   <br> 

   <!-- ending carousel sliding image  -->

  <br>
   <!-- start registration form -->

  <div class="container" id="con">
			<!-- Content Row -->
		  <div class="row">
			<!-- Map Column -->
				<div class="col-lg-6 mb-4 contact-left">
					<h3>Student Registration Form</h3>
          <form method="post" enctype="multipart/form-data" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
              <div class="form-group input-group ">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                </div>
                <input name="username"  class="form-control" placeholder="Full Name" type="text" required>
              </div>

              <div class="form-group input-group ">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-address-book"></i></span>
                </div>
                <input name="email" type="email"  class="form-control" placeholder="Email Addess" required>
              </div>

              <div class="form-group input-group ">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-phone-square-alt"></i></span>
                </div>
                <input name="phone" type="text"  class="form-control" placeholder="Phone Number" required>
              </div>

              <div class="form-group input-group ">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>
                <input name="Cpass" type="password"  class="form-control" placeholder="Create Password" required>
              </div>

              <div class="form-group input-group ">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>
                <input name="Rpass" type="password"  class="form-control" placeholder="Repeat Password" required>
              </div>

              <div class="form-group input-group ">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-male"></i></span>
                </div>
              &nbsp;&nbsp; Male<input type="radio"  class="form-control" name="gender" value="male" id="gr"required >
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-female"></i></span>
                </div>
                &nbsp;&nbsp; Female <input type="radio"  class="form-control" name="gender" value="female" id="gr" required>
              </div>

             <p> Date of Birth</p>
              <div class="form-group input-group ">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                </div>
                <input name="dob" type="date"  class="form-control" placeholder="dd/mm/yyyy" required>
              </div>

              <p> Uplond Image File</p>
                <div class="form-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                 <input name="pics" type="file"  class="form-control"  required>
                </div>
                </div>  
               
          <div class="form-group input-group ">
          &nbsp;<input class="form-control" type="checkbox" name="hobb[]" value="readingbook" id="gr">reading book
             <input class="form-control" type="checkbox" name="hobb[]" value="cricket" id="gr">cricket
           </div>
           <div class="form-group input-group ">
             <input class="form-control" type="checkbox" name="hobb[]" value="football" id="gr">football
             <input class="form-control" type="checkbox" name="hobb[]" value="travalling" id="gr">travalling
           </div>


                <div class="form-group form-select">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-key"></i></span>
                    <select name="Ycity" class="custom-select">
                      <option value="">select city</option>
                      <option value="Baglore">Baglore</option>
                      <option value="Hedrabad">Hedrabad</option>
                      <option value="Pune">Pune</option>
                      <option value="Mumbai">Mumbai</option>
                      <option value="Dehli">Dehli</option>
                    </select>
                    </div>
                    </div>

                    <div class="form-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                      <textarea class="form-control" name="ADD" placeholder="Enter Your Address"></textarea>
                      </div>
                    </div>     
                        

              <div> <input type="submit" class="btn btn-primary" value="Create account" name="data"></div>
            </form>
				</div>
				<!-- Contact Details Column -->
        <!-- end of registration form -->
        <!-- <==========student login service start=========================> -->
				<div class="col-lg-6 mb-4 contact-right">
        <h3>Student Service
        </h3>
          <form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
              <div class="form-group input-group ">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                </div>
                <input name="Email"  class="form-control" placeholder="Email Addess" type="email" required>
              </div>

              <div class="form-group input-group ">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-address-book"></i></span>
                </div>
                <input name="password" type="password"  class="form-control" placeholder="Password" required>
              </div>
              <div> <input type="submit" class="btn btn-primary" value="Login" name="submit"></div>

              </form>  
        <!-- <==========student login service end=========================> -->

			</div>
			<!-- /.row -->
		</div>

  

</body>
</html>