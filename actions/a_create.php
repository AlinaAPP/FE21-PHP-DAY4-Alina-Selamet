<!--a_create.php file inserts data from the form into the database. This script will communicate with the database, bring the data from the form and execute the SQL query written in it. -->

<?php
require_once 'db_connect.php';
require_once 'file_upload.php';
require_once '../components/boot.php';

if ($_POST) {  //if a method $_POST was used: true or false. The POST method generated an associative array 
    $name = $_POST['name'];
    $price = $_POST['price'];
    $location = $_POST['location'];
    $uploadError = '';
    //this function exists in the service file upload.
    $picture = file_upload($_FILES['picture']);  
  
    $sql = "INSERT INTO cars (name, price, location, picture) VALUES ('$name', $price, '$location', '$picture->fileName')"; //$sql holds the query that will INSERT the data in the products table.
 
    if (mysqli_query($connect, $sql)) { // we run the query
        $class = "success";
        $message = "The entry below was successfully created <br>
            <table class='table'>
                <tr>
                    <td> $name </td>
                    <td> $price Euro/day</td>
                    <td> pick up location: $location </td>
                </tr>
            </table><hr>";
        $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
    } else {
        $class = "warning";
        $message = "Error while creating record. Try again: <br>" . $connect->error;
        $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
    }
    mysqli_close($connect);
 } else {
    header("location: ../error.php"); // what is this???
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A_Update_file</title>
</head>
<body>
    <div class="container">
        <div class="mt-3 mb-3">
            <h1>Create request response</h1>
        </div>
        <div class="alert alert-<?=$class;?>" role="alert">
            <p><?php echo ($message) ?? ''; ?></p>
            <p><?php echo ($uploadError) ?? ''; ?></p>
            <a href='../index.php'><button class="btn btn-primary" type='button'>Home</button></a>
        </div>
    </div>
</body>
</html>