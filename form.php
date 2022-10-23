<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Form</title>
</head>

<body>
    <?php require_once 'add.php'; ?>
    <?php require_once 'delete.php'; ?>


    <?php
    
    $name = '';
    $email = '';
    $address = '';
    $gender = '';
    $phone_no = '';

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "form_db";

    $conn = new mysqli($servername, $username, $password, $dbname) or die(mysqli_error($conn));
    $result = mysqli_query($conn, "SELECT * FROM form");
    ?>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-md">
            <a class="navbar-brand" href="#">Web Tech ISA II - CRUD Application</a>
        </div>
    </nav>

    <!-- Message -->
    <?php
    if (isset($_SESSION['message'])):?>

    <div class="alert alert-<?=$_SESSION['msg_type']?> alert-dismissible fade show" role="alert">
    <strong>
    <?php
        echo $_SESSION['message'];
        
    ?>
    </strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>




    <?php
unset($_SESSION['message']);
endif;?>

    <!-- Create     -->
    <center>
        <h1 class="pt-5">Registration Form</h1>
    </center>
    <hr>
    <form action="add.php" class="form-group" method="POST">
        <input type="hidden" name='id' value = "<?php echo $id?>">
        <div class="d-flex flex-row justify-content-center">
            <div class="p-2 col-lg-4">
                <label>Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name?>" required>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-center">
            <div class="p-2 col-lg-4">
                <label>E-Mail</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email?>" required>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-center">
            <div class="p-2 col-lg-4">
                <label>Address</label>
                <input type="text" class="form-control" id="address" name="address" value="<?php echo $address?>" required>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-center">
            <div class="p-2 col-lg-4">
                <label for="exampleFormControlSelect1">Gender</label>

                <select class="form-control" id="exampleFormControlSelect1" id="gender" name="gender" value="<?php echo $gender?>" required>
                    <option name="gender">Male</option>
                    <option name="gender">Female</option>
                </select>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-center">
            <div class="p-2 col-lg-4">
                <label>Phone Number</label>
                <input type="number" class="form-control" id="phone_no" name="phone_no" value="<?php echo $phone_no?>" required>
            </div>
        </div>

        <div class="form-group">
            
        
                <center><button class="btn btn-primary" type="submit" name="save">Submit</button></center>
           
        </div>

       
    </form>
    <hr>

    <!-- Table -->
    <center>
        <h1 class="pt-2">Users </h1>
    </center>
    <table class='table table-striped-columns' id='form_table'>
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Gender</th>
            <th>Phone Number</th>
            <th>Action</th>
        </tr>
        </thead>
      
        <?php 
        while ($row = mysqli_fetch_array($result)): ?> 
        <tr>
            <td><?php echo $row['id'] ?></td> 
            <td><?php echo $row['name'] ?></td> 
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['address'] ?></td>
            <td><?php echo $row['gender'] ?></td>
            <td><?php echo $row['phone_no'] ?></td>
            <td>
                <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-info">Update</a>
                
                <a href="delete.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    
      

    </table>
    
    
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>


</html>