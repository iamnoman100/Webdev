<?php

    if(isset($_POST["add_cat"])){
       $add_cat_msg = $obj->add_category($_POST);
    }

?>

<h2>Add category page</h2>
<form action="" method="POST">
<div class="form-group">
    <label class=" mb-1" for="cat_name">Category name</label>
    <input name="cat_name" class="form-control py-4" id="cat_name" type="text"/>
</div>
<div class="form-group">
    <label class=" mb-1" for="cat_des">Category description</label>
    <input name="cat_des" class="form-control py-4" id="cat_des" type="text"/>
</div>
<input type="submit" value="Add category" name="add_cat" class="form-control btn btn-block btn-primary">
</form>
<h3><?php if(isset($add_cat_msg)){
    echo $add_cat_msg;
} ?></h3>