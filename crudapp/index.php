<?php
    include("function.php");

    $objCrudAdmin = new crudApp();

    if(isset($_POST['add_info'])){
        $return_msg = $objCrudAdmin->add_data($_POST);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container shadow">

    <h2>Student details</h2>
    
        <form action="" class="form" method="post" enctype="multipart/form-data">
        <?php if(isset($return_msg)){echo $return_msg;} ?>
        <input class="form-control mb-2" type="text" name="std_name" placeholder="Enter your name">
        <input class="form-control mb-2" type="number" name="std_roll" placeholder="Enter your roll">
        <label for="image"> Upload your image</label>
        <input class="form-control mb-2" type="file" name="std_img">

        <input class="form-control bg-warning" type="submit" name="add_info" value="Add Information">


        </form>
    </div>

    <div class="container shadow">
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Roll</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Noman</td>
                    <td>329431</td>
                    <td></td>
                    <td>
                        <a href="" class="btn btn-success">Edit</a>
                        <a href="" class="btn btn-warning">Delete</a>

                    </td>
                </tr>
            </tbody>
        </table>
    </div>

<script src="js/bootstrap.min.js"></script>
</body>
</html>