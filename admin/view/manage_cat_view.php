<?php
    $categories = $obj->display_category();
    if(isset($_GET['status'])){
        if($_GET['status']='delete'){
            $delete_id = $_GET['id'];
            $del_msg = $obj->delete_cat($delete_id);
        }
    }

   
?>

<h2>manage category page</h2>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php while($category=mysqli_fetch_assoc($categories)){ ?>
        <tr>
            <td><?php echo $category["cat_id"]?></td>
            <td><?php echo $category["cat_name"]?></td>
            <td><?php echo $category["cat_des"]?></td>
            <td>
                <a class="btn btn-primary" href="edit_cat.php?status=edit&&id=<?php echo $category["cat_id"]?>">Edit</a>
                <a class="btn btn-danger" href="?status=delete&&id=<?php echo $category["cat_id"]?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>




<h3><?php if(isset($del_msg)){
    echo $del_msg;
    
    }?></h3>

