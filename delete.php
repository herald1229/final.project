<?php session_start();
require("connection.php");
?>

<?php
$cid=$_GET['cid'];
if(isset($_GET['con']) and $_GET['con']=="delete"){
    ?>
    <script type="text/javascript">
    var con=confirm("Are you sure want to delete this record");
    if(con){
        window.location="delete.php?cid=<?=$cid?>&com=delete";
    }else{
        window.location="searchrecord.php";
    }
</script>

<?php
}

if(isset($_GET['com']) and $_GET['com']=="delete"){
$q_delete=$mysqli->query("DELETE FROM customer_tbl WHERE cid='$cid'");
if(!$q_delete){
    echo $mysqli->error;
exit();
}
elseif($mysqli->affected_rows==0){
echo "Delete error.";
}else{
?>
<script type="text/javascript">
alert("Record has been successfuly deleted.");
window.location="searchrecord.php";
</script>
<?php
}
}
?>