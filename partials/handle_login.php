<?php

$u=$_POST['uname'];
$p=$_POST['password'];

mysql_connect("localhost","root","");
mysql_select_db("questions");

$query="SELECT * FROM users WHERE username='$u' AND userpass='$p' ";
$result=mysql_query($query);
$count=mysql_num_rows($result);
if($count==1){
    $row=mysql_fetch_assoc($result);
    session_start();
    $_SESSION['name']=$u;
    $_SESSION['sno']=$row['sno'];
    header("location: ../index.php");

}
else{

    echo "type mismatch";
}


?>