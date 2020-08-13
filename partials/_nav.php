<html>
<style>
.navbar-brand{
  padding:8px;
}

</style>

</html>
<?php

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<img src="partials/a.jpg" height="60px" alt="..." class="rounded-circle">
  <a class="navbar-brand " href="index.php">Areeb Forum</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">About</a>
      </li>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Categories
        </a>';
        ?>
        <?php
        mysql_connect("localhost","root","");
        mysql_select_db("questions");

        $query="SELECT * FROM  categories ";
        $result=mysql_query($query);
    
       while($row= mysql_fetch_assoc($result)){

        $title=$row['title'];
         echo '
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">'.$title.'</a>
        </div>';
       }
       echo '
      </li>
    </ul>';
    ?>
    <?php
    session_start();
    if(isset($_SESSION['name'])){
      echo '<form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0 mr-2" type="submit">Search</button>
      <p class="text-light my-0 mr-2">Welcome '.$_SESSION['name'].'</p>
    <button class="btn btn-outline-success my-2 my-sm-0 mr-2" type="submit"><a href="partials/handle_logout.php">Logout</a></button>
    </form>';

    }else{
   echo '
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0 mr-2" type="submit">Search</button>
    </form>
    <button class="btn btn-outline-success my-2 my-sm-0 mr-2" type="submit" data-toggle="modal" data-target="#loginmodal">Login</button>
    <button class="btn btn-outline-success my-2 my-sm-0 mr-2" type="submit"  data-toggle="modal" data-target="#signupmodal">Signup</button>
  </div>';
    }
    echo'
</nav>';
include 'partials/signup.php';
include 'partials/login.php';

?>