<?php   
    require_once './actions/db_connect.php';
    require_once './components/boot.php';

    $sql = "SELECT * FROM cars"; //holds the query as a string
    $result = mysqli_query($connect ,$sql); //holds what the query returned. the function mysqli_query() generates the object
    $tbody=''; //this variable will hold the body for the table
    if(mysqli_num_rows($result)  > 0) {    
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){  // this mysqli_fetch_array turns the object from $result into an associative array      
            $tbody .= "<tr>

                        <td><img class='img-thumbnail' src='pictures/$row[picture]'</td>
                        <td>$row[name]</td>
                        <td>$row[price]</td>
                        <td>$row[location]</td>
                        <td>
                            <a href='update.php?id=$row[carsID]'>
                                <button class='btn btn-warning btn-sm' type='button'>Edit</button>
                            </a>
                            <a href='delete.php?id=$row[carsID]'>
                                <button class='btn btn-danger btn-sm' type='button'>Delete</button>
                            </a>
                        </td>
                    </tr>";
        };
    } else {
        $tbody =  "<tr><td colspan='5' class='bg-light text-dark'><center>No Data Available </center></td></tr>";
    }

    /* $mysqli_close($connect); */ // I got an error with it
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index_file</title>
</head>
<body>
<div class="container">
        <h1 class="mt-5 text-center">Car Rental Agency</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis, quam quaerat repudiandae eveniet possimus harum fugit debitis! Minima, beatae quas odio est architecto eos nemo magni amet corrupti! Quo, laudantium!</p>
        <a href= "create.php"><button class='btn btn-warning mb-2'type="button" >Add a new car!</button></a><!-- create.php inserted here -->
            <table class="table table-dark text-center">
                <thead>
                    <tr>
                        <th scope="col w-25">Photo</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Location</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <?=$tbody?>
                </tbody>
            </table>
    </div>
</body>
</html>