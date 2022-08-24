<?php
session_start();
include 'doc_start.php';
include 'header.php';
include 'core/User.php';

$user = new User();

if(!isset($_SESSION['user_id'])){
    header("location:login.php");
}
?>
<br>
<br>
<br>
<br>
<br>
<br>

<?php
include 'doc_end.php';
include 'footer.php';

?>