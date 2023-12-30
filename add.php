<?php

include('connection.php');

    $pid=$_POST['pid'];
    
    $nqty=$_POST['nqty'];
    
    $ip=$_POST['ip'];
    
    $sql=mysqli_query($conn,"select * from cart where (ip='$ip' and pid='$pid') ");
    $data=mysqli_fetch_assoc($sql);
    
    $qty=$data['qty'];
    
    $new_qty=$qty + 1;
    
    
    $sql1=mysqli_query($conn,"update cart set qty='$new_qty' where (ip='$ip' and pid='$pid')");




?>