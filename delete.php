<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form_db";

$conn = new mysqli($servername, $username, $password, $dbname) or die(mysqli_error($conn));

if (isset($_GET['delete'])) {
    # code...
    $id = $_GET['delete'];

    $sql = "DELETE FROM form WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "Record Deleted Successfully!";
        $_SESSION['msg_type'] = "danger";

        header("location: form.php");
  //       echo '<script type="text/JavaScript">
	// alert("Record Deleted succesfully")
	// </script>';
    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
}


?>