<?php
if(isset($_SESSION['session_status']) and isset($_SESSION['uid'])) {
$uid=$_SESSION['uid'];
$q_user=$mysqli->query("select ufname, ulname from users_tbl where uid='$uid'");
$r_user=$q_user->fetch_assoc();
$ufname=$r_user['ufname'];
$ulname=$r_user['ulname'];
}else{
?>
<script type="text/javascript">
window.location="index.php";
</script>
<?php
}
?>