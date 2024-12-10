<?php session_start();
require("connection.php");
require("authenticate.php");
?>

<?php
if(isset($_POST['save'])){
$cid=$_POST['cid'];
$cfname=$_POST['cfname'];
$cmi=$_POST['cmi'];
$clname=$_POST['clname'];
$gender=$_POST['gender'];
$contact=$_POST['contact'];
$address=$_POST['address'];
$s_save="INSERT INTO customer_tbl SET cid='$cid', cfname='$cfname', cmi='$cmi', clname='$clname', gender='$gender',contact='$contact', address='$address' ";
$q_save=$mysqli->query($s_save);
if(!$q_save){
echo $mysqli->error;
exit();
}
else if($mysqli->affected_rows==0){
echo"Save Error";
}
else{
?>
<script type="text/javascript">
alert("New Record has been saved");
window.location="add_record.php";
</script>
<?php
}
}
?>


<!DOCTYPE html>
<head>
    <title>Add Record</title>
</head>
<body>
  <form method="post" action="add_record.php">  
    <h2>Add Record</h2>
    <table border="0" cellpadding="2" cellspacing="2" width="300">

    <tr>
                  <td>cid</td>
            <td><input type="text" name="cid"/></td></tr>
        <tr>
                  <td>first Name:</td>
            <td><input type="text" name="cfname"/></td></tr>
                 
            <tr>
              <td>M.I</td>
              <td><input type="text" name="cmi" size="1" maxlength="1"/></td></tr>
              <tr>
<td>Last Name:</td>
<td><input type="text" name="clname"/></td></tr>
<tr>
<td>Gender:</td>
<td><select name="gender">
  <option value=""> select Gender</option>
  <option value="Male">Male</option>
  <option value="Female">Female</option></select>
  </td></tr>
<tr>
<td>Contact Number:</td>
<td><input type="text" name="contact"/><td></tr>
  <tr>
    <td>address:</td>
    <td><input type="text" name="address"/></td></tr>
    <td colspan="2" align="center"><input type="submit" name="save" value="Save Record"/>
      <input type="Reset" value="clear"/></td></table>
      </form>
      </body>
</html>