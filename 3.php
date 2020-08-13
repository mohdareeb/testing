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


    <!-- post comment start-->

    <?php
$alert=false;
$id2=$_GET['id'];
$req2= $_SERVER['REQUEST_METHOD'];
mysql_connect("localhost","root","");
mysql_select_db("questions");

if($req2=='POST'){

$sno=$_POST['sno'];
    $c2=$_POST['comment'];
    
   $q2= "INSERT INTO  `questions`.`comments` (
        
        `content` ,
        `id` ,
        `user_id`
        )
        VALUES (
          '$c2',  '$id2',  '$sno'
        )";
        
    
    $result=mysql_query($q2);
    if($result){
        $alert=true;
    }
    
}
?>


    <?php
    if($alert)
{    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
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

$query="SELECT * FROM aquestions WHERE cat_id ='$id' ";
$result=mysql_query($query);

while($row=mysql_fetch_assoc($result)){
    $title=$row['title'];
    $des=$row['des'];
    

}
echo '<div class="jumbotron my-2">
  <h1 class="display-4">'.$title.'</h1>
  <p class="lead">'.$des.'</p>
  <hr class="my-4">
  <p>Asked by :<b></b><p>
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
</div>';
?>
    </div>

    <!--jumbotron ends -->

<?php
if(isset($_SESSION['name'])){
   echo '<div class="container">
        <h1>Post your comment here </h1>
        <form action="'.$_SERVER['REQUEST_URI'].'?>" method="POST">

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Type your Comment </label>
                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
            </div>
            <input type="hidden" name="sno" value="'.$_SESSION['sno'].'">
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>';
}

else{

    echo '<div class="container">
    <p class="lead">You are logged in ,kindly login to post your comment</p>
    
    </div>';
}
?>    
    <!--post your comment ends -->


    <!--show comments starts-->

    <div class="container">
        <h1>Discussion</h1>

        <?php

$id3=$_GET['id'];
mysql_connect("localhost","root","");
mysql_select_db("questions");

$query3="SELECT * FROM comments WHERE id='$id3' ";
$result3=mysql_query($query3);
while($row3=mysql_fetch_assoc($result3)){
    $content=$row3['content'];
    $userid=$row3['user_id'];
     
    $query4="SELECT * FROM users WHERE sno ='$userid'";
    $naya=mysql_query($query4);
    $naam=mysql_fetch_assoc($naya);


echo'
<div class="media">
  <img src="partials/1.png" width="40px" class="mr-3" alt="...">
  <div class="media-body">
    <h5 class="mt-0">By : '.$naam['username'].'</h5>
    <p>'.$content.'</p>
  </div>
</div>';
}

?>

    </div>

    <!--Question ke liye text area start -->



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