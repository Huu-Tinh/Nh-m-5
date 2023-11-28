<?php
$id = $_GET['id_cmt'];
$id_pr = $_GET['id_pr'];
$cmt = new comment();
$select= $cmt->delete($id,$_SESSION['username']);
header('location: index.php?act=shop-single&id_pr='.$id_pr);


?>