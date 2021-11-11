<!-- An update is an edited version of an original. The file update.php contains an HTML form that will show the selected product information to be updated. The particular data will need to be fetched first, shown on the screen and be available in the form inputs, ready to be modified, giving the chance to update the data to the user.
 -->

 <?php
require_once 'actions/db_connect.php';
require_once 'components/boot.php';

if ($_GET['id']) {
   $id = $_GET['id'];
   $sql = "SELECT * FROM cars WHERE carsID = $id";
   $result = mysqli_query($connect, $sql);
   if (mysqli_num_rows($result) == 1) {
       $data = mysqli_fetch_assoc($result);
       $name = $data['name'];
       $price = $data['price'];
       $location = $data['location'];
       $picture = $data['picture'];
   } else {
       header("location: error.php");
   }
   mysqli_close($connect);
} else {
   header("location: error.php");
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Update_file</title>
    <style type= "text/css">
        fieldset {
            margin: auto;
            margin-top: 100px;
            width: 60% ;
        }  
        .img-thumbnail{
            width: 70px !important;
            height: 70px !important;
        }    
    </style>
</head>
<body>
    <fieldset>
        <legend class='h2'>Update request <img class='img-thumbnail rounded-circle' src='pictures/<?php echo $picture ?>' alt="<?php echo $name ?>"></legend>
        <form action="actions/a_update.php"  method="post" enctype="multipart/form-data">
            <table class="table">
                <tr>
                    <th>Name</th>
                    <td><input class="form-control" type="text"  name="name" placeholder ="Product Name" value="<?php echo $name ?>"  /></td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td><input class="form-control" type= "number" name="price" step="any"  placeholder="Price" value ="<?php echo $price ?>" /></td>
                </tr>
                <tr>
                    <th>Location</th>
                    <td>
                        <input class='form-control' type="text" name= "location" list="locations" placeholder="Pick up location" />
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
                    <td><input class="form-control" type="file" name= "picture" /></td>
                </tr>
                <tr>
                    <input type= "hidden" name= "id" value= "<?php echo $data['carsID'] ?>" />

                    <input type= "hidden" name= "picture" value= "<?php echo $data['picture'] ?>" />
                    <td><button class="btn btn-success" type= "submit">Save Changes</button></td>
                    <td><a href= "index.php"><button class="btn btn-warning" type="button">Back</button></a></td>
                </tr>
            </table>
        </form>
    </fieldset>
</body>
</html>