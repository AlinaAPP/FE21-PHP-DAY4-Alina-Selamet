<!-- The create.php file contains an HTML form from which the user's input data will be passed to the server-side (a_create.php) and new records will be inserted in the database. -->
<?php require_once 'components/boot.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create_file</title>
</head>
<body>
    <div class="container mt-5">
        <p class='h2 text-center mb-5'>Add a new Car</p>
        <form action="actions/a_create.php" method= "POST" enctype="multipart/form-data"><!-- a_create.php inserted here -->
            <table class='table'>
                <tr>
                    <th>Name</th>
                    <td><input class='form-control' type="text" name="name"  placeholder="Car name" /></td>
                </tr>   
                <tr>
                    <th>Price</th>
                    <td><input class='form-control' type="number" name= "price" placeholder="Price" step="any" /></td>
                </tr>
                <tr>
                    <th>Location</th>
                    <td>
                        <input class='form-control' type="text" name= "location" list="locations" placeholder="Pick up location" step="any" />
                        <datalist id="locations">
                            <option value="Vienna, Erdberg 20"></option>
                            <option value="Vienna, Reisnerstarsse 10"></option>
                            <option value="Vienna, Strohgasse 13"></option>
                            <option value="Vienna, Landstrasse 16"></option>
                        </datalist>
                    </td>
                </tr>
                <tr>
                    <th>Photo</th>
                    <td>
                        <input class='form-control' type="file" name="picture"/>

                    </td>
                </tr>
                <tr>
                    <td><button class='btn btn-success' type="submit">Send</button></td>
                    <td><a href="index.php"><button class='btn btn-warning' type="button">Home</button></a></td><!-- index.php inserted here -->
                </tr>
            </table>
        </form>
    </div>
    
</body>
</html>