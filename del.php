<?php

include('connection.php');

    $pid=$_POST['pid'];
    
    $ip=$_POST['ip'];
    
    $sql=mysqli_query($conn,"delete from cart where (ip='$ip' and pid='$pid') ");
 
 

?>