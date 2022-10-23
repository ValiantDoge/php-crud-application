<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form_db";

$conn = new mysqli($servername, $username, $password, $dbname) or die(mysqli_error($conn));

if (isset($_POST['save'])) {
    # code...
    $name = $_POST["name"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $gender = $_POST["gender"];
    $phone_no = intval($_POST["phone_no"]);

    $sql = "INSERT INTO form(name, email, address, gender, phone_no)
VALUES ('$name','$email','$address','$gender', '$phone_no')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "Record added Successfully!";
        $_SESSION['msg_type'] = "success";

        header("location: form.php");
    //     echo '<script type="text/JavaScript">
	// alert("Record entered succesfully")
	// </script>';
    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
}




?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Detail</title>
</head>
<body>
<form class='form-group' method='POST' action='delete.php'>
<div class='d-flex flex-row justify-content-center'>
<div class='p-2 col-lg-2'>
    <input class='form-control' name='id' type='number' placeholder='ID'/>
</div>
</div>

<div class='pt-2'>
    <center><button class='btn btn-danger' type='submit' id="submitBtn">DELETE</button></center>
</div>
</form>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

$("#submitBtn").click(function(event){
  // action goes here!!
  event.preventDefault();
  $("#form_table").load(location.href + " #form_table");

});
   
</script>

</html> -->