<?php
$connection=mysqli_connect("localhost","root","","demo");
$EDIT_ID=$_REQUEST["EditId"];
$Olddata_fatch=mysqli_query($connection,"SELECT * FROM registration WHERE id='$EDIT_ID'");
$Odata_fatch=mysqli_fetch_array($Olddata_fatch);
// echo $Odata_fatch["Name"];
 $oldhobby=$Odata_fatch["HOBBY"];
$fetchobby=explode(",",$oldhobby);

 if(isset($_POST["update_btn"]))
    {
        $name=$_POST["username"];
        $phone=$_POST["phone"];
        $gender=$_POST["gender"];
        $dob=$_POST["dob"];
        $City=$_POST["Ycity"];
        $Address=$_POST["ADD"];
        $HOBB=$_POST["hobb"];
        $Newhobb=implode(",",$HOBB);
        $EdituserId=$_POST["hidden_Id"];
        // echo $EdituserId;
        $IMAGES=$_FILES["pics"]["name"];
        // echo  $IMAGES;
    if(empty($IMAGES))
    // in this condition image not select than image remain unchanged on data (without this condition image not show in select page and database )
    {
            $updeteQUERY=mysqli_query($connection,"UPDATE registration SET Name='$name',Phone='$phone',Gender='$gender',DOB='$dob',HOBBY='$Newhobb',CITY='$City',ADDRESS='$Address' WHERE id='$EdituserId'");
            if($updeteQUERY)
            {
                // echo " data update successfull";
                header("location:res_select.php"); // after update return to select file
            }
            else
            {
                echo " data update not successfull";
        
            }
    }
    else // in this condition image select than image uoload on data
    {
            $tmp_name=$_FILES["pics"]["tmp_name"];
            $path="Ipisc/".$IMAGES;
        $UPLOAD= move_uploaded_file($tmp_name, $path);
            $updeteQUERY=mysqli_query($connection,"UPDATE registration SET Name='$name',Phone='$phone',Gender='$gender',DOB='$dob',HOBBY='$Newhobb',CITY='$City',ADDRESS='$Address',file_pisc='$IMAGES' WHERE id='$EdituserId'");
        
            if($updeteQUERY)
            {
                // echo " data update successfull";
                
                header("location:res_select.php");
            }
            else
            {
                echo " data update not successfull";
            }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post" enctype="multipart/form-data">
<table>
<tr><td>Enter Your Name</td>
<td><input name="username" value="<?php echo $Odata_fatch["Name"]; ?>"  placeholder="Full Name" type="text"></td>
</tr>

<tr><td>Enter Your Phone number</td>
<td><input name="phone" value="<?php echo $Odata_fatch["Phone"]; ?>"  placeholder="Phone number" type="text"></td>
</tr>

<tr><td>Select Your CITY</td>
<td><select name="Ycity">
    <option value="">select city</option>
    <option value="Baglore" <?php if($Odata_fatch["CITY"]=="Baglore"){ echo "selected";} ?>>Baglore</option>
    <option value="Hedrabad" <?php if($Odata_fatch["CITY"]=="Hedrabad"){ echo "selected";} ?>>Hedrabad</option>
    <option value="Pune" <?php if($Odata_fatch["CITY"]=="Pune"){ echo "selected";} ?>>Pune</option>
    <option value="Mumbai" <?php if($Odata_fatch["CITY"]=="Mumbai"){ echo "selected";} ?>>Mumbai</option>
    <option value="Dehli" <?php if($Odata_fatch["CITY"]=="Dehli"){ echo "selected";} ?>>Dehli</option>
    </select>
</td> 
</tr>

<tr><td>Enter Your Phone number</td>
<td><textarea name="ADD"> <?php echo $Odata_fatch["ADDRESS"]; ?> </textarea></td>
</tr>

<tr><td>Date of birth</td>
<td><input name="dob" value="<?php echo $Odata_fatch["DOB"]; ?>"   type="date"></td>
</tr>

<tr><td>Gender</td>
<td>
     Male<input type="radio"   name="gender" value="male"<?php if($Odata_fatch["Gender"]=="male"){ echo "checked";} ?>>
 Female <input type="radio"   name="gender" value="female" <?php if($Odata_fatch["Gender"]=="female"){ echo "checked";} ?>>
</td>
 </tr>
 
 <tr><td>Hobby</td>
    <td>  <input  type="checkbox" name="hobb[]" value="readingbook" <?php if(in_array("readingbook",$fetchobby)) { echo "checked";}?> >reading book
        <input  type="checkbox" name="hobb[]" value="cricket" <?php if(in_array("cricket",$fetchobby)) { echo "checked";}?>>cricket
        <input  type="checkbox" name="hobb[]" value="football"<?php if(in_array("football",$fetchobby)) { echo "checked";}?> >football
        <input  type="checkbox" name="hobb[]" value="travalling"<?php if(in_array("travalling",$fetchobby)) { echo "checked";}?> >travalling
    </td>
 </tr>

        <tr><td>UPload Image</td>
        <td> <input name="pics" type="file"  > 
        </td></tr>
     
</table>
<input type="hidden" name="hidden_Id" value="<?php echo $Odata_fatch["id"]; ?>">
<input type="submit" name="update_btn" value="Update">
</form>
    
</body>
</html>