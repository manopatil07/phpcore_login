<?php
session_start();

if(!isset($_SESSION['username'])){
  echo"You are logout this session";
  header('location:registration.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  
</head>
<body>
<button style="float:right;"><a href="logout.php">Logout</a></button>
<div class="jumbotron text-center">
  <h1>welcome my Home page, hello <?php echo  $_SESSION['username'];  ?> </h1>
  <p>Resize this responsive page to see the effect!</p> 
</div>
<br>
<div class="container">
  <ul class="nav-tabs nav nav-justified">
    <li class="nav-item">
      <a href="#home" class="nav-link" data-toggle="tab">Home</a>
    </li>
    <li class="nav-item dropdown">
      <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">about us</a>
      <div class="dropdown-menu">
        <a href="#" class="dropdown-item">line1</a>
        <a href="#" class="dropdown-item">line1</a>
        <a href="#" class="dropdown-item">line1</a>
        <a href="#" class="dropdown-item">line1</a>
      </div>
    </li>
    <li class="nav-item">
      <a href="#noti" class="nav-link" data-toggle="tab">notification</a>
    </li>
    <li class="nav-item">
      <a href="#cont" class="nav-link" data-toggle="tab">contact us</a>
    </li>

  </ul>
  <div class="tab-content container">
    <div class="tab-pane" id="home"><br>
      <h2>home page</h2>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat nobis asperiores aperiam doloremque, consectetur sapiente quaerat, voluptas culpa nostrum ipsum, distinctio vitae! Enim possimus similique ratione reiciendis assumenda corporis dignissimos consectetur dicta ipsa, rem minus vel provident voluptates rerum iure delectus magnam aliquid facere et vero sed tempora nemo. Est necessitatibus ab, voluptates rerum cumque harum blanditiis autem repellat maxime dicta vitae. Animi a facere, cupiditate, vero explicabo minus porro asperiores temporibus reiciendis laboriosam repellendus sint quisquam maxime natus eligendi fugiat ut. Ipsum a dolores, maxime quasi recusandae temporibus tenetur quisquam saepe animi laudantium eius excepturi sequi porro aperiam possimus.
    </div>
  
    <div class="tab-pane" id="noti"><br>
      <h2>notification</h2>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat nobis asperiores aperiam doloremque, consectetur sapiente quaerat, voluptas culpa nostrum ipsum, distinctio vitae! Enim possimus similique ratione reiciendis assumenda corporis dignissimos consectetur dicta ipsa, rem minus vel provident voluptates rerum iure delectus magnam aliquid facere et vero sed tempora nemo. Est necessitatibus ab, voluptates rerum cumque harum blanditiis autem repellat maxime dicta vitae. Animi a facere, cupiditate, vero explicabo minus porro asperiores temporibus reiciendis laboriosam repellendus sint quisquam maxime natus eligendi fugiat ut. Ipsum a dolores, maxime quasi recusandae temporibus tenetur quisquam saepe animi laudantium eius excepturi sequi porro aperiam possimus.
    </div>
 
    <div class="tab-pane" id="cont"><br>
      <h2>contact us</h2>
       laboriosam repellendus sint quisquam maxime natus eligendi fugiat ut. Ipsum a dolores, maxime quasi recusandae temporibus tenetur quisquam saepe animi laudantium eius excepturi sequi porro aperiam possimus.
    </div>
  
  </div>
</div>
<br><br>
<div class="container">
  <a href="#" title="Manohar Patil" data-toggle="tooltip">Hover me</a><br><br>
  <a href="#" title="Manohar Patil" data-toggle="tooltip" data-placement="top">Hover me</a><br><br>
  <a href="#" title="Manohar Patil" data-toggle="tooltip" data-placement="bottom">Hover me</a><br><br>
  <a href="#" title="Manohar Patil" data-toggle="tooltip" data-placement="left">Hover me</a><br><br>
  <a href="#" title="Manohar Patil" data-toggle="tooltip" data-placement="right">Hover me</a><br><br>

</div>

<script type="text/javascript">
$(document).ready(function(){
$('[data-toggle="tooltip"]').tooltip();
});

</script>
  


</body>
</html>
