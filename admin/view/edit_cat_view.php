<?php
    $edit_id = $_GET['id'];
    $cat_info = $obj->display_cat_data($edit_id);
    if(isset($_POST["update_cat"])){
       $update_msg = $obj->update_cat($_POST);
    }
    
?>

<form action="" method="POST">
<div class="form-group">
    <label class=" mb-1" for="cat_name">Category Name</label>
    <input name="u_cat_name" class="form-control py-4" id="u_cat_name" type="text" value="<?php echo $cat_info['cat_name']?>"/>
</div>
<div class="form-group">
    <label class=" mb-1" for="cat_des">Category description</label>
    <input name="u_cat_des" class="form-control py-4" id="u_cat_des" type="text" value="<?php echo $cat_info['cat_des']?>"/>
</div>
<input type="submit" value="Update category" name="update_cat" class="form-control btn btn-block btn-primary">
<input name="edit_id" type="hidden" value="<?php echo $edit_id;?>">
</form>
<?php if(isset($update_msg)){
    echo $update_msg;
    }?>
