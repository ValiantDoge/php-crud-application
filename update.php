<!-- Header -->
<?php 
session_start();


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form_db";

$conn = new mysqli($servername, $username, $password, $dbname) or die(mysqli_error($conn));
?>
 
<?php


   // checking if the variable is set or not and if set adding the set data value to variable userid
   if(isset($_GET['id']))
    {
      $id = $_GET['id']; 
    }
      // SQL query to select all the data from the table where id = $userid
      $query="SELECT * FROM form WHERE id = '$id' ";
      $view_users= mysqli_query($conn,$query);
 
      while($row = mysqli_fetch_assoc($view_users))
        {
  

          $id = $row['id'];
          $name = $row['name'];
          $email = $row['email'];
          $address = $row['address'];
          $gender = $row['gender'];
          $phone_no = $row['phone_no'];
          
        }
  
    //Processing form data when form is submitted
    if(isset($_POST['update'])) 
    {
          
          $name = $_POST['name'];
          $email = $_POST['email'];
          $address = $_POST['address'];
          $phone_no = $_POST['phone_no'];
          $gender = $_POST['gender'];
       
      // SQL query to update the data in user table where the id = $userid 
    
      $query = "UPDATE form SET name = '{$name}' , email = '{$email}' , address = '{$address}',gender = '{$gender}', phone_no = '{$phone_no}' WHERE id = $id";
      $update_user = mysqli_query($conn, $query);
      if ($update_user) {
        # code...
        $_SESSION['message']="Data updated succesfully";
        $_SESSION['msg_type']="warning";
        header("Location:form.php");

      }
      

    }   
    
    










?>
 <html>


<head>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

    <body>
    <center>

        <br>

        <div class="row-6 pb-3"><br>


            <br><br>

            <div class="col-3">
                <form action="" method="POST" class="p-4 rounded-5 border border-success">
                    <h2 class="pt-5"> UPDATE</h2>
                    <br><br>
                    <div class="mb-3">
                        <input type="text" class="form-control form-control-lg" value="<?php echo $name  ?>" name="name" placeholder="Name" required>
                    </div>

                    <div class="mb-3 ">
                        <input type="text" class="form-control form-control-lg"  value="<?php echo $email  ?>" name="email"  placeholder="Email" required>
                    </div>

                    <div class="mb-3">

                        <input type="text" class="form-control form-control-lg" value="<?php echo $address  ?>" name="address" placeholder="Address" required>
                        <div class="form-text"></div>
                    </div>

                    <div class="mb-3">
                        <select name="gender" class="form-select form-select-lg mb-3"
                            aria-label=".form-select-lg example">
                            <option selected value="<?php echo $gender ?>" name=gender >Select a Gender</option>
                            <option name="gender" value="Male">Male</option>
                            <option name="gender" value="Female">Female</option>
                            <option name="gender" value="Other">Other</option>
                        </select>
                    </div>
                    <div class="mb-3">

                        <input type="number" class="form-control form-control-lg" value="<?php echo $phone_no  ?>" name="phone_no"
                            placeholder="Phone Number">
                        <div class="form-text"></div>
                    </div>

                    
                    <br>
                    <button type="submit" name="update" class="btn btn-success btn-lg">Submit</button>
                    <div class="container text-center mt-5">
      <a href="form.php" class="btn btn-warning mt-5"> Back </a>
    <div>
 
                    
    </center>
    </form>

    </div>
    </div>

</body>

<?php 

?>

</html>