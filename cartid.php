<?php

include_once('connection.php');


// $userid=$_POST['userid'];
$pid=$_POST['pid'];
$price=$_POST['price'];
$qty=$_POST['qty'];
$ip=$_POST['ip'];
$userid=$_POST['userid'];

$sql=mysqli_query($conn,"select * from cart where (ip='$ip' and pid='$pid')");

$data=mysqli_fetch_assoc($sql);


if(!empty($data)){

$qty1=$data['qty'];

$new_qty=$qty1+$qty;

$sql1=mysqli_query($conn,"update cart set qty='$new_qty' where (ip='$ip' and pid='$pid' ) ");


}else{


$sqlqry=mysqli_query($conn,"INSERT INTO cart(pid,price,qty,ip,userid) VALUES ('$pid','$price','$qty','$ip','$userid')");


}



?>