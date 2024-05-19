<?php
include ('conn.php');

if(isset($_GET['deleteid'])){
    $id= $_GET['deleteid'];

    $query = $con->query("DELETE FROM `book` WHERE id = $id ");
    if($query){
        echo "<script>alert('Booking information have been deleted successfully.')</script>";
        if($query)
        {
            header("Location:dashboard.php");
        }
    } else{
        echo "Something went wrong!";
    }
}

?>