<?php 
 
$message='';
if(isset($_POST['firstname']) && isset($_POST['email']) && isset($_POST['number']) && isset($_POST['gender']) && isset($_POST['hobbies'])){
$firstname=$_POST['firstname'];
$email =$_POST['email'];
$number=$_POST['number'];
$gender=$_POST['gender'];
$hobbies=$_POST['hobbies'];
$checkbox= implode(", ", $hobbies);


if(strlen($firstname)<5){
$message='Must be atleast 5 characters.';
} 
elseif(filter_var($email,FILTER_VALIDATE_EMAIL)!=true){
  $message=" Email Validation failed ";
  }

else{
  $con = mysqli_connect('localhost','root','','form') or die('Unable To connect');
  $result = mysqli_query($con,"INSERT INTO table1 (name,email,number,gender,hobbies) VALUES ('$firstname','$email', '$number', '$gender', '$checkbox')");
  if(mysqli_num_rows($result>0){

    echo "success";
  }
}

}

 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Form</title>
      <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

  <div class="container">
    <div class="row ">
        <div class="col-md-12">
        <h1 class="text-dark">Form</h1>
          <form action="" method="post">
          <?php 
            if($message!=''){
            ?>
            <div class= "alert alert-danger">
                  <?php
                  echo $message; 
                  ?>
            </div>
            <?php
            }
            ?>
      

            <div class="form-group">
              <label for="firstname">Name</label>
              <input type="text" class="form-control" id="firstname" name="firstname" required>
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="text"  class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
              <label for="number">Phone no.</label>
              <input type="number"  class="form-control" id="number" name="number" required>
            </div>

            <div class="form-group">
              <label for="gender">Gender</label><div> 
              <label for="male" class="radio-inline"><input type="radio" name="gender" id="male" value="m">Male</label>
              <label for="female" class="radio-inline"><input type="radio" name="gender" id="female" value="f">Female</label>
              <label for="others" class="radio-inline"><input type="radio" name="gender" id="others" value="o">Others</label>
            </div>

            <div class="form-group">
                <label for="hobbies">Hobbies</label>
                <div> 
                    <label for="read" class="checkbox-inline"><input type="checkbox" name="hobbies[]" id="read" value="reading">Reading</label>
                    <label for="travel" class="checkbox-inline"><input type="checkbox" name="hobbies[]" id="travel" value="travelling" >Travelling</label>
                    <label for="music" class="checkbox-inline"><input type="checkbox" name="hobbies[]" id="music" value="music" >Music</label>
                </div>
            </div>

              <input type="submit"  class="btn btn-success">
          </form>
        </div>
      </div>
    </div>


  

</body>
</html>
