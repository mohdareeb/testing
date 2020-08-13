<?php

$u=$_POST['uname'];
$p=$_POST['password'];
$p2=$_POST['password2'];
$alert=false;
mysql_connect("localhost","root","");
mysql_select_db("questions");

if($u==""||$p==""||$p2==""){

    echo "please fill all the credentials";
}

else{
    $query="SELECT * FROM users WHERE username ='$u' ";
    $result=mysql_query($query);
    $count=mysql_num_rows($result);
    if($count>0){
        echo "user exists";
    }

else{

    if($p==$p2){

    $query2="INSERT INTO  `questions`.`users` (
        
        `username` ,
        `userpass`
        )
        VALUES (
        '$u',  '$p'
        )";

     mysql_query($query2); 

     /*$alert=true;
     if($alert){

        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Holy guacamole!</strong> Sign up done .
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';

     } */
     header("location:../index.php");
     
        }
        
     
}

}
?>