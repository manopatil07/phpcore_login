<?php

$connection=mysqli_connect("localhost","root","","demo");
$searchByName=$_REQUEST["search_by"];
// echo $searchByName;
$searchQuery=mysqli_query($connection,"SELECT * FROM registration WHERE Name='$searchByName'");
$rowcount=mysqli_num_rows($searchQuery);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
    #img{
        width:100px;
        height:100px;
    }
    table{
        margin-top:30px;
    }
    table  th{
        text-align: center;
        font-size: 16px;
    }
    table  td{
        text-align: center;
        font-size: 16px;
    }
    </style>
</head>

<body>
    
<div class="container">
    <table border="1px" width="100%" cellspacing="0px">
    <tr>
    <th>Name</th>
    <th>Email Id</th>
    <th>Phone</th>
    <th>Gender</th>
    <th>Date of birth</th>
    <th>City Name</th>
    <th>Address</th>
    <th>HOBBY</th>
    <th>Image</th>
    <th>Delete row data</th>
    <th>Edit</th>

    </tr>
<?php
    for($i=1; $i<=$rowcount;$i++)
    {
      $datafatch=  mysqli_fetch_array($searchQuery);
        ?>
    <tr>
    <td><?php echo $datafatch["Name"]; ?></td>
    <td><?php echo $datafatch["Email"]; ?></td>
    <td><?php echo $datafatch["Phone"]; ?></td>
    <td><?php echo $datafatch["Gender"]; ?></td>
    <td><?php echo $datafatch["DOB"]; ?></td>
    <td><?php echo $datafatch["CITY"]; ?></td>
    <td><?php echo $datafatch["ADDRESS"]; ?></td>
    <td><?php echo $datafatch["HOBBY"]; ?></td>
    <td><img  src="Ipisc/<?php echo $datafatch["file_pisc"]; ?>" id="img"></td>
  
   <td><a href="res_select.php?DeleteId=<?php echo $datafatch["id"];?>">delete</a></td>
   <td><a href="res_update.php?EditId=<?php echo $datafatch["id"];?>">Edit</a></td>
    </tr>


<?php
   }



?>

    </table>
 </div>


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>