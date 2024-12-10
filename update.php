<?php session_start();

    require("connection.php");

?>

<?php

    if(isset($_GET['cid'])){

    $cid=$_GET['cid'];

    $q_cust=$mysqli->query("SELECT * FROM customer_tbl WHERE cid='$cid'");

    $r_cust=$q_cust->fetch_assoc();

}

?>

<!doctype html>

<html>

<script type="text/javascript">

function cancelChanges(){

var con=confirm("Are you sure you want to cancel this update?");

if(con){

window.location="searchrecord.php";

}

}

</script>

<head>

<title>Update record</title>

</head>

<body>

    <form method="post" action="">

    <h2>Update Record &nbsp<a href="add_record.php">Add record</a></h2>

    <table border="0" cellpadding="2" cellspacing="2" width="300">

    <tr>

    <td>Customer ID:</td>

    <td><input type="text" name="cid" value="<?=$r_cust['cid'];?>"/></td></tr>

    <tr>

    
    <td>M. I.:</td>

    <td><input type="text" name="cmi" value="<?=$r_cust['cmi'];?>" size="1" maxlengt="1"/></td></tr>

    <tr>

    <td>Last name:</td>

    <td><input type="text" name="clname" value="<?=$r_cust['clname'];?>"/></td></t>

    <tr>

    <td>Gender:</td>

    <td><select name="gender">

    <option value="<?=$r_cust['gender'];?>"><?=$r_cust['gender'];?></option>

    <option value="Male">Male</option>

    <option value="Female">Female</option></select>

    </td></tr><tr>

    <td><input type="text" name="contact_no" value="<?=$r_cust['contact_no'];?>"/></td></tr>

    <tr>

    <td>Contact No:</td>

    <td>Address:</td>

    <td><input type="text" name="address" value="<?=$r_cust['address'];?>"/></td></tr>

    <td colspan="2" align="center"><input type="submit" name="save_changes" value="Save Chages"/>
     <input type="button" onClick="cancel Changes()" value="Cancel"/></td></table>

<?php

if (isset($_POST['save_changes'])){ 
$cid=$_POST['cid']; 
$cfname=$_POST['cfname']; 
$cmi=$_POST['cmi']; 
$clname=$_POST['clname']; 
$gender=$_POST['gender']; 
$contact_no=$_POST['contact_no'];
$address=$_POST['address'];

$s_update="UPDATE customer_tbl SET cid='$cid', cfname='$cfname', cmi='$cmi', clname='$clname', gender='$gender', contact_no='$contact_no', address='$address' WHERE cid='$cid'";

$q_update=$mysqli->query($s_update); 
if(!$q_update){
     echo $mysqli->error;
}
exit();

}
 else if ($mysqli->affected_rows==0){
     echo "Update Error";
}

else{
?>
<script type="text/javascript">
alert("Record has been updated.");
window.location=""<?=$_SERVER['REQUEST_URI'];?>";
</script>
<?php
}

?>
</form>
</body>
</html>