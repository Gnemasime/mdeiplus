<?php include ('conn.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mediplus | Login</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  </head>
  <style>
  body{
    background-color: azure;

  }

    </style>
 
<?php

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Sanitize user input to prevent SQL injection (you can use other methods like prepared statements)
  $email = mysqli_real_escape_string($con, $email);
  $password = mysqli_real_escape_string($con, $password);

  // Query to check if the email and password match
  $check_query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
  $check_result = mysqli_query($con, $check_query);

  // Check if there is a matching user
  if (mysqli_num_rows($check_result) == 1) {
      // If login is successful, redirect to a success page or dashboard
      header("Location: dashboard.php");
      exit();
  } else {
      echo "<script>alert('Invalid email or password. Please try again.')</script>";
  }

  // Free result set
  mysqli_free_result($check_result);
}

// Close connection
mysqli_close($con);
?>

<div class="container mt-5"> 
   <div class="row justify-content-center"> 
    <div class="col-md-5"> 
   
     <h2 class="text-center mb-4 card-header">LOGIN</h2>
     <form method="POST"> 
     <div class="mb-3"> <label for="email" class="form-label"><strong>EMAIL</strong></label> 
       <input type="email" class="form-control" name="email" required="" placeholder="e.g. example@sc.com"> 
      </div> 
      <div class="mb-3"> <label for="password" class="form-label"><strong>PASSWORD</strong></label> 
       <input type="password" class="form-control" name="password" required=""  placeholder="Enter your password"> 
      </div> 
      <button type="submit" class="btn btn-info">LOGIN</button> <br><br>
      <strong><p>Don't have an account? <a href="signup.php">Sign up here</a>.</p></strong>
     </form> 
</div>
</div>
</div>
</div>
