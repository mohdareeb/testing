<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Questions Discuss</title>
</head>

<body>
    <?php
    
    include 'partials/_nav.php';
   
    ?>

<?php
    $alert=false;
    $id2=$_GET['id'];
    $req2= $_SERVER['REQUEST_METHOD'];
    mysql_connect("localhost","root","");
    mysql_select_db("questions");
    if($req2=='POST'){
        $title2=$_POST['title'];
        $des2=$_POST['des'];
        $sno=$_POST['sno'];
       
        
        /*$user=0;
        echo $title;
        echo $des;*/
        $q2="INSERT INTO `questions`.`aquestions` (`title`, `des`, `cat_id`, `user_id`) VALUES ('$title2', '$des2', '$id2', '$sno')";
        /*$q3="INSERT INTO qthreads VALUES('$title','$des','$idi','0')";*/
        $result2=mysql_query($q2);
        if($result2){
            $alert=true;
     

        }

    }
    
    ?>


<?php
if($alert){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Thank You </strong> Your comment is saved
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';


}

?>

    <!--jumbotron starts -->
    <div class="container">
    
        <?php  /* jumbo tron ke liye data fetch hua hhai */
$id=$_GET['id'];
mysql_connect("localhost","root","");
mysql_select_db("questions");

$query="SELECT * FROM categories WHERE sno ='$id'";
$result=mysql_query($query);

while($row=mysql_fetch_assoc($result)){
    $title=$row['title'];
    $des=$row['des'];

}
echo '<div class="jumbotron my-2">
  <h1 class="display-4">Welcome to '.$title.'</h1>
  <p class="lead">'.$des.'</p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
</div>';
?>
    </div>

    <!--jumbotron ends -->


    <!--Question ke liye text area start -->
 
    <?php

    if(isset($_SESSION['name'])){
    
    echo '<div class="container">
        <form action=" '.$_SERVER['REQUEST_URI'].'" method="POST">
    <div class="form-group">
        <label for="exampleInputEmail1">Write a question title here </label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
    </div>
    <input type="hidden" name="sno" value="'.$_SESSION['sno'].'">
    <div class="form-group">
        <label for="exampleInputPassword1">Write your concern in breif </label>
        <input type="text" class="form-control" id="des" name="des">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    </div>';}

    else{

        echo '<div class="container">
        <p class="lead">You are logged in ,kindly login to ask your question</p>
        
        </div>';
    }
    ?>

<div class="container">
<h2>Browse Questions </h2>
<?php
$id3=$_GET['id'];        
mysql_connect("localhost","root","");
mysql_select_db("questions");


$q3="SELECT * FROM aquestions WHERE cat_id='$id3' ";
$result3=mysql_query($q3);
$check=true;
while($row3=mysql_fetch_assoc($result3)){
    $check=false;
    $title3=$row3['title'];
    $des3=$row3['des'];
    $id3=$row3['cat_id'];
    $userid=$row3['user_id'];
    

$s2 = "SELECT * FROM users WHERE sno='$userid' ";
$result4=mysql_query($s2);

$naya=mysql_fetch_assoc($result4);

      echo '  <div class="media my-2">
            <img src="partials/1.png" width="40px" class="mr-3" alt="...">
            <div class="media-body" >
            <h5> Questions asked by : '.$naya['username'].'</h5>
                <h5 class="mt-0"><a href="3.php?id='.$id3.'">'.$title3.'</a></h5>
                '.$des3.'
            </div>
        </div>';
}

if($check ){
    echo '<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">No Questions </h1>
    <p class="lead">No questions yet be the first person  to ask the question .</p>
  </div>
</div>';
}

?>

    </div>






    <?php
    include 'partials/_footer.php';
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>