<?php 
        if(isset($_GET['status'])){
            if(($_GET['status']=='editimg')){
                $id = $_GET['id'];
            }
        }

        if(isset($_POST['change_img'])){
            $msg = $obj->edit_post_img($_POST);
        }

?>
<?php if(isset($msg)){echo $msg;} ?>
<form class="form" action="" method="post" enctype="multipart/form-data">
    <input name="edit_img_id" type="hidden" value="<?php echo $id; ?>">
<div class="form-group">
    <label for="img" class="h3">Change Image</label>
    <br>
    <input name="edit_post_img" type="file" class="btn btn-danger">

</div>

<div class="form-group">
    <input name="change_img" type="submit" value="Submit" class="btn btn-success">
</div>

</form>