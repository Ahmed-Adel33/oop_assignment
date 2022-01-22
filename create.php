<?php
session_start();
require   'classes/UserClass.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $title = $_POST['title'];
  $content = $_POST['content'];
  $image = $_FILES['image'];

  $user = new User();
  $user->Register($title, $content, $image);

  if (isset($_SESSION['Message'])) {
      foreach ($_SESSION['Message'] as $key => $value) {
          # code...
          echo $value . '<br>';
      }
      unset($_SESSION['Message']);
  }
}




?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta Title="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Register</h2>
  <form   action="<?php  echo  $_SERVER['PHP_SELF'];?>"  method="post" enctype="multipart/form-data">
   <input type="hidden"   value="1" Title="register">
  <div class="form-group">
    <label for="exampleInputTitle">Title</label>
    <input type="text" class="form-control" id="exampleInputTitle"  required name="title" aria-describedby="" placeholder="Enter Title">
  </div>

  <div class="form-group">
    <label for="exampleInputcontent">content </label>
    <input type="text"   class="form-control" id="exampleInputcontent1" required name="content" aria-describedby="contentHelp" placeholder="Enter content">
  </div>


   <div class="form-group">
    <label for="exampleInputPassword">profileImage</label>
    <input type="file" name="image">
  </div> 

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
</body>
</html>



