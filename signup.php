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
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Sanitize user input to prevent SQL injection (you can use other methods like prepared statements)
  $name = mysqli_real_escape_string($con, $name);
  $email = mysqli_real_escape_string($con, $email);
  $password = mysqli_real_escape_string($con, $password);

  // Query to check if the email is already registered
  $check_query = "SELECT * FROM users WHERE email = '$email'";
  $check_result = mysqli_query($con, $check_query);

  // Check if the email is already registered
  if (mysqli_num_rows($check_result) > 0) {
      echo "<script>alert('Email is already registered. Please choose another email.')</script>";
  } else {
      // Insert new user into the database
      $insert_query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
      if (mysqli_query($con, $insert_query)) {
          // If user registration is successful, redirect to a success page or login page
          header("Location: login.php");
          exit();
      } else {
          echo "<script>alert('Error: " . mysqli_error($con) . "')</script>";
      }
  }

  // Free result set
  mysqli_free_result($check_result);
}

// Close connection
mysqli_close($con);


/*if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //SOMETHING WAS POSTED
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    

    $query = $con->query("SELECT* FROM users 
    WHERE email = '$email'limit 1 ");
    if($query == 1)
			{
                   
                   echo "<script>This email already have an account!</script>";
                   
                    
				} else{
          $query = $con->query("INSERT INTO addpost (username,email,password)
          VALUES ('$username','$email','$password')")
          or die(mysqli_error());
          header("Location:index.php");

        }
            }	 */           
                ?>
                
<div class="container mt-5"> 
   <div class="row justify-content-center"> 
    <div class="col-md-5"> 
   
     <h2 class="text-center mb-4 card-header">SIGNUP</h2>
     <form  method="POST"> 
     <div class="mb-3"> <label for="name" class="form-label"><strong>NAME</strong></label> 
       <input type="text" class="form-control" name="name" required="" placeholder=""> 
      </div> 
     <div class="mb-3"> <label for="email" class="form-label"><strong>EMAIL</strong></label> 
       <input type="email" class="form-control" name="email" required="" placeholder="e.g.example@sc.com"> 
      </div> 
      <div class="mb-3"> <label for="password" class="form-label"><strong>PASSWORD</strong></label> 
       <input type="password" class="form-control" name="password" required=""  placeholder="Enter your password"> 
      </div> 
      <button type="submit" class="btn btn-info">SIGNUP</button> <br><br>
      <strong><p>Already have an account, click <a href="login.php">here</a> to login.</p></strong>
     </form> 
</div>
</div>
</div>
</div>
